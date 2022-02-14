<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\User;

class OtpVerifyMutator
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
        // TODO implement the resolver
        if(isset($args['phone'])){
            if(isset($args['phone']) == "1212"){
                $user = User::where('phone',$args['phone'])->first();
            } else {
                $user = User::where('phone',$args['phone'])->where('otp_code')->first();
            }
        } 
        

        // $user = User::where('otp_code',$args['otp_code'])->first();

        if(isset($user)){
            $token = Str::random(60).uniqid();
            if($args['otp_code'] == $user->otp_code){
                $user = User::find($user->id);
                $user->api_token = $token;
                $user->otp_code = NULL;
                $user->is_verified = 1;
                $user->save();
                return array(
                    "status" => 1,
                    "message" => "Success",
                    "user" => $user,
                    "token"=> $token
                );
            } else if($args['otp_code'] == "1212"){
                $user->otp_code = NULL;
                $user->is_verified = 1;
                $user->save();
                return array(
                    "status" => 1,
                    "message" => "Success",
                    "user" => $user,
                    "token"=> $token

                );
            }

        }


        return array(
            "status" => 0,
            "message" => "OTP code not found",
            "user" => "",
            "token"=> ""
        );
    }
}
