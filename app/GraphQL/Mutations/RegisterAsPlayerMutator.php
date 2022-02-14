<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;
use App\Helpers\SMSapp;
use App\Helpers\OldClientChecker;
use App\User;
use App\Model\Player;

class RegisterAsPlayerMutator
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

        $token = Str::random(60).uniqid();

        $user = new User();
        $args['role'] = "PLAYER";
        $args['password'] = bcrypt($args['password']);
        $user = $user->create($args);
        $user->api_token = $token;
        $user->is_verified = true;
        $user->save();
        $args['user_id'] = $user->id;
        $player = Player::create($args);
        $user = User::find($user->id);

        return $user;
    }
}
