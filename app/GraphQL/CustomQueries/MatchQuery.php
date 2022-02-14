<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Match;


class MatchQuery
{

    public function search($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = \Auth::user();
        $matchQuery = Match::query();

        if(isset($args['id']))
        {
            $matchQuery = $matchQuery->where('id', $args['id']);
        }

        if(isset($args['starts']))
        {
            $matchQuery = $matchQuery->where('starts',$args['starts']);
        }

        if(isset($args['between']))
        {
            $matchQuery = $matchQuery->whereBetween('starts',[$args['between']['from'],$args['between']['to']]);
        }

        if(isset($args['my_matches']))
        {   
            if($args['my_matches']){
                $user = \Auth::user();
                $matchQuery = $matchQuery->where('user_id',$user->id);
            }
        }
         
        return $matchQuery;
    }

}