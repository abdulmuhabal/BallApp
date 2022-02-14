<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;

use App\Model\ClientRequest;

class DocumentUploadMutator
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

        
        if(isset($args['photo']))
        {
            $file = $args['photo'];
            $photo_file = array();
            if($file)
            {
                $fileName = 'photo_'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('documents',$fileName);
                $photo_file['filename'] = $fileName;
                $photo_file['url'] = asset('documents/'.$fileName);
            }
            return array(
                "status" => 1,
                "message" => "Success",
                "photo" =>  $photo_file
            );
        }
        
        return array(
            "status" => 0,
            "message" => __('lang.cant_upload_image'),
            "photo" =>  null
        ); 
    }
}
