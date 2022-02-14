<?php

namespace App\Helpers;
use App\Model\OldClient;
use App\Model\ClientSubscription;

class OldClientChecker
{
    public static function check_phone_exist($phone) {
        $oldclients = OldClient::where('phone',$phone);
        if($oldclients->count() > 0)
            return $oldclients->first();
        
        return null;
    }

    public static function create_subscription($args) {
        if($args['ends'] <= date('Y-m-d'))
            $args['starts'] = $args['ends'];
            else
                $args['starts'] = date('Y-m-d');

        $args['status'] = "ACCEPTED";
        $subcription = ClientSubscription::create($args);

        return $subcription;
    }
}