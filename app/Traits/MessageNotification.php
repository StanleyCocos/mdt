<?php

namespace App\Traits;

use App\Http\Services\Api\V1\ApnsPushService;

trait MessageNotification
{

    //fcm推送
    public function toFcmPush($notifiable, $registrationId)
    {
        try {
            $message = $this->createMessage($notifiable);
//            $result  = (new FcmPushService)->send($registrationId, $message);
            $result = \App\Facades\PushRepositoryFacade::sendAndroid($registrationId, $message);
            logs('push_daily')->info('fcmResult========' . print_r($result, true));
            return $result;
        } catch (\Exception $e) {
            logs('push_daily')->error('fcmException========' . print_r($e->getMessage(), true));
        }
    }

    // apns推送
    public function toApnsPush($notifiable,$registrationId)
    {
        try {
            $message = $this->createMessage($notifiable);
            $result = (new ApnsPushService)->send($registrationId, $message);
            logs('push_daily')->info('apnsResult========' . print_r($result, true));
            return $result;
        } catch (\Exception $e) {
            logs('push_daily')->error('apnsException========' . print_r($e->getMessage(), true));
        }
    }
}
