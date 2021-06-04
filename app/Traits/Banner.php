<?php

namespace App\Traits;

use App\Jobs\BannerExplode;
use App\Models\T591\TextBanner;
use App\Models\T591\Video;
use App\Transformers\TextBannerTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\ArraySerializer;

trait Banner
{

    protected $banner_route = [
//        'api/app/v1/works/index' => 3,
        '/api/videos' => [
            'model' => Video::class,
            'cate_id' => 7,
        ],
    ];

    public function fireBannerExplodeEvent($banners)
    {
        if (!$banners) {
            return;
        }
        $user = auth('api')->user();
        $user_id = $user ? $user->user_id : 0;
        $params = [
            'banner' => $banners,
            'date' => (string) now()->toDateString(),
            'created_at' => (string) now()->toDateTimeString(),
            'timestamps' => (string) date('Y-m-d\TH:i:sP'),
            'imei' => (string) IMEI,
            'ip' => (string) ip(),
            'client' => (string) CLIENT,
            'user_agent' => (string) request()->header('user-agent'),
            'user_id' => $user_id,
        ];
        // 暂时关闭曝光统计数据（需要时再开启）
        dispatch(new BannerExplode($params));
    }

    //获取每个页面额外的banner数据
    public function getBannerData($model_data)
    {
        $uri = request()->route()->uri();
        if (!in_array($uri, array_keys($this->banner_route))) {
            return [];
        };

        $cate_id = $this->banner_route[$uri]['cate_id'];
        $source_id = TextBanner::with(['content'])
            ->where([
                ['cate_id', $cate_id],
                ['startDate', '<=', time()],
                ['endDate', '>=', time()],
                ['type', 'fixedBanner'],
                ['client', 'mobile'],
            ])
            ->pluck('page_id')
            ->toArray();
        //去重
        //        $source_data = collect($model_data)->filter(function ($item) use($source_id){
        //
        //                            return !in_array($item->id,$source_id);
        //                        })
        //                        ->pluck('id')
        //                        ->toArray();
        //
        //        $source_model = new  $this->banner_route[$uri]['model'];
        //        $data = $source_model->whereIn('id',$source_id)->get();
    }

    // 获取和统计广告位
    public function getAndStatisticBanners($cateId)
    {
        $page = (int) request()->input('page') > 0 ? request()->input('page') : 1;
        if ($page != 1) {
            return [];
        }
        $params = [
            'cateId' => $cateId,
            'type' => 'fixedBanner',
            'active' => true,
            'sort' => 'displayOrder DESC,id DESC',
            'client' => CLIENT,
        ];
        $banners = TextBanner::with(['image'])->filter($params)->get();
        $manager = new Manager();
        $collection = new Collection();
        $arraySerializer = new ArraySerializer();
        $textBannerTransformer = new TextBannerTransformer();
        $collection->setData($banners);
        $resource = $collection->setTransformer($textBannerTransformer);
        $manager->parseIncludes(['image', 'content.company', 'content.hotestWorks', 'content.number']);
        $manager->setSerializer($arraySerializer);
        $banners = $manager->createData($resource)->toArray();
        $this->fireBannerExplodeEvent($banners['data']);
        return $banners;
    }
}
