<?php


namespace App\Traits;

trait Sign
{
    protected  $errors;

    protected  function  generateSign($key, $secret)
    {
        $nonce= mt_rand();
        $timestamps = time();
        return [
            'nonce' => $nonce,
            'time-stamp' => $timestamps,
            'app-key'   => $key,
            'sign' => sha1(trim($secret) . $nonce . $timestamps),
        ];

    }


    protected  function  validate($params)
    {
       $validator =  \Validator::make($params, [
            'time-stamp' => 'required',
            'nonce'      => 'required',
            'sign'       => 'required'
        ]);

        if( $validator->fails()){
            $this->errors = '签名参数缺失';
            return false;
        }

        $timestamps = $params['time-stamp'];
        $sign = $params['sign'];
        if($sign != sha1(trim(config('im.app_secret')) . $params['nonce'] . $timestamps)){
            $this->errors = '签名错误';
            return false;
        }

        if(time() - strtotime($timestamps) > 60){
            $this->errors = '签名已失效';
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    //發送消息用sign
    public function  generateSendSignData($target_uid, $token, $type = 'auto')
    {
        $uri = '/messages/send';
        $host = str_replace(array('https://', 'http://'), '', config('im.host'));
        $url = $host.$uri;
        $client = CLIENT;
        $reply = config('im.auto_reply')[$type];
        $secret = config('im.app_message_secret')[$client]['secret'];
        $app_id = config('im.app_message_secret')[$client]['app_id'];
        $time = time();
        $content = [
            'content'    => "{\"content\":\"{$reply}\",\"extra\":\"system100\"}",
            'device'     => $client,
            'target_uid' => $target_uid,
            'token'      => $token,
            'type'       => 'Msg:Txt',
        ];
        $params = [
            'method'     => 'POST',
            'url'        => $url,
            'content'    => $this->paramsToString($content),
            'secret'     => $secret,
            'time'       => $time,
            'ran_str'    => 'BMSXKLLf',
        ];
        return array_merge($content, [
            '_appid'     => $app_id,
            '_signature' => base64_encode(md5(hash('sha256', implode("", $params)))),
            '_randomstr' => 'BMSXKLLf',
            '_timestamp' => $time,
        ]);
    }


    /**
     * 建立参数字符串
     * @return string
     */
    protected function paramsToString($parms)
    {
        $arrParamsStr = array();
        foreach ($parms as $key => $value) {
            if (is_array($value)) {
                continue;
            } else {
                $arrParamsStr[] = $key . '=' . $value;
            }
        }
        return implode('`', $arrParamsStr);
    }


}