<?php

namespace App\GraphQL\Directives;

use Illuminate\Validation\Rule;
use App\Rules\DuplicatePhone;
use App\Rules\DuplicateEmail;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class RequestRegisterValidationDirective extends ValidationDirective
{
    public function rules(): array
    {
        return [
            'phone' => ["min:10","numeric", new DuplicatePhone([ $this->args('role') ]) ],
        ];
    }

}