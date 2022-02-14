<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Exercise;


class ExerciseQuery
{

    public function search($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = \Auth::user();
        $exerciseQuery = Exercise::query();

        if(isset($args['id']))
        {
            $exerciseQuery = $exerciseQuery->where('id', $args['id']);
        }

        if(isset($args['starts']))
        {
            $exerciseQuery = $exerciseQuery->where('starts',$args['starts']);
        }

        if(isset($args['between']))
        {
            $exerciseQuery = $exerciseQuery->whereBetween('starts',[$args['between']['from'],$args['between']['to']]);
        }

        if(isset($args['my_matches']))
        {   
            if($args['my_matches']){
                $user = \Auth::user();
                $exerciseQuery = $exerciseQuery->where('user_id',$user->id);
            }
        }
         
        return $exerciseQuery;
    }

}