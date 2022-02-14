<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Academy;


class AcademyQuery
{

    public function search($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = \Auth::user();
        $academyQuery = Academy::query();

        if(isset($args['id']))
        {
            $academyQuery = $academyQuery->where('id', $args['id']);
        }
         
        return $academyQuery;
    }

}