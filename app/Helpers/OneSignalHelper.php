<?php

namespace App\Helpers;

use App\Model\LogNotification;
use App\User;

class OneSignalHelper
{
    public static function notification($id,$user_id,$user_id_to_notify,$type,$group,$filter,$pushData = ""){

        // $filter3 = array(
        //     array("field"=>"tag","key"=>"userId","value"=>"userId_".$event->user->id,"relation"=>"=")
        // );

        $content = self::selectMessage($type,$pushData);
        
        //switch force to send AR
        $contents['en'] = $content['ar'];
        
        $title = array(
            "en" => "Wawan",
            "ar" => "Wawan"
        );
        $hashes_array = array();
        $user_to_notify = User::find($user_id_to_notify);

        $app_id = getenv('ONESIGNAL_APP_ID');
        $rest_api_key = getenv('ONESIGNAL_REST_API_KEY');


        $data = array(
            "id"=>"",
        );
        $fields = array(
            'app_id' => $app_id,
            'data'=> $data,
            // 'data'=> '',
            'headings'=> $title,
            'contents' => $contents,
            'android_group'=>$group,
            'filters' => $filter
        );

        
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic '.$rest_api_key
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            \Log::debug(print_r($fields, true));
            \Log::debug(print_r($response, true));
        }
        curl_close($ch);
        

        

        self::logNotification($user_id, $content['en'],$content['ar'], $type, $user_id_to_notify);
    }
    
    public static function logNotification($user_id, $message_en,$message_ar, $type, $user_id_to_notify,$title = ""){
        $logNotification = new LogNotification;
        $logNotification->user_id = $user_id;
        $logNotification->user_id_to_notify = $user_id_to_notify;
        $logNotification->type = $type;
        $logNotification->message_en = $message_en;
        $logNotification->read = 0;
        $logNotification->message_ar = $message_ar;
        
        $logNotification->save();
    }

    public static function selectMessage($type,$data){

        switch ($type) {

            case 'MESSAGE':
                $message="";
                $message_ar="";
                break;

            case 'EARLY_CALL':
                $message="remind : you have a booking today at starting!";
                $message_ar= "تذكير : لديك موعد اليوم في  starting!";
                break;
            
            case 'EXPIRATION_NOTIFICATION':
                $message ="Your Subscription is about to end!";
                $message_ar="اشتراكك على وشك الانتهاء";
                break;

            case 'ADMIN_NOTIFICATION':
                $message=$data['message_en'];
                $message_ar=$data['message_ar'];
                break;
        }

        return array(
            "en" =>  $message,
            "ar" => $message_ar
        );
    }

}