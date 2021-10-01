<?php

namespace Illuminate\Validation\Rules;

use Illuminate\Validation\Rules\Contract\Rule;

class RequiredRule implements Rule

{
    public function apply($field, $value, $data = [])
    {
        return !empty($value);
    }

    public function __toString()
    {
        return '%s is required and cannot be empty';
    }

}