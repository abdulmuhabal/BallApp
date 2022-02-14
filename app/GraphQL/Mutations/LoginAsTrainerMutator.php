<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\SMSapp;
use App\User;

class LoginAsTrainerMutator
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
        $credentials = array();
        $credentials['phone'] = $args['phone'];
        $credentials['password'] = $args['password'];
        $credentials['role'] = 'TRAINER';

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $otp_code = mt_rand(1000, 9999);
            $user->save();

            $input_arr = array(
                "phone" => $user->phone,
                "otp_code" => $otp_code
            );

            SMSapp::sendSMS($input_arr);

            return [
                'otp_code' => $otp_code,
                'user' => User::find($user->id)
            ];

        }else{
            throw new GraphqlException(
                __('lang.invalid_credentials'),
                __('lang.check_credentials_text')
            );
        }

    }
}
