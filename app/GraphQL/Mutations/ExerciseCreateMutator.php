<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;
use App\Helpers\SMSapp;
use App\User;
use App\Model\Trainer;
use App\Model\Exercise;
use App\Model\ExerciseSchedule;

class ExerciseCreateMutator
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
        $user = \Auth::user();
        $args['user_id'] = $user->id;
        $exercise = Exercise::create($args);
        
        foreach($args['exercise_schedules'] as $exercise_schedule){
            ExerciseSchedule::create([
                "exercise_id"=>$exercise->id,
                "weekday_id"=>$exercise_schedule['weekday_id'],
                "time_id"=>$exercise_schedule['time_id']
            ]);
        }

        $exercise = Exercise::find($exercise->id);
        return $exercise;
    }
}
