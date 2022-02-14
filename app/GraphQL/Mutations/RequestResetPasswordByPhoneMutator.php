<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;
use App\Helpers\SMSapp;
use App\User;

class RequestResetPasswordByPhoneMutator
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::where('phone', $args['phone'])->first();

        if(isset($user)){
            $otp_code = mt_rand(1000, 9999);
            $user->otp_code = $otp_code;
            $user->save();
            $input_arr = array(
                "phone" => $user->phone,
                "otp_code" => $otp_code
            );
            SMSapp::sendSMS($input_arr);
            return array(
                "status" => 1,
                "message" => "Success",
            );
        }

        return array(
            "status" => 0,
            "message" => __('lang.user_not_registered'),
        );
    }
}
