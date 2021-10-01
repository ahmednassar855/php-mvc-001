<?php

namespace Illuminate\Validation;

use Illuminate\Validation\Rules\MaxRule;
use Illuminate\Validation\Rules\EmailRule;
use Illuminate\Validation\Rules\UniqueRule;
use Illuminate\Validation\Rules\BetweenRule;
use Illuminate\Validation\Rules\AlphaNumRule;
use Illuminate\Validation\Rules\RequiredRule;
use Illuminate\Validation\Rules\ConfirmedRule;

trait RulesMapper
{
    protected static  $map = [
        'required' => RequiredRule::class,
        'alnum' => AlphaNumRule::class,
        'max' => MaxRule::class,
        'between' => BetweenRule::class,
        'email' => EmailRule::class,
        'confirmed' => ConfirmedRule::class,
        'unique' => UniqueRule::class,
    ];

    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}