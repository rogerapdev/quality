<?php
namespace App\Services;

use Illuminate\Validation\Validator as IlluminateValidator;
use Carbon\Carbon;

class Validation extends IlluminateValidator
{

    /**
     * Valida o formato do cpf
     * @param string $attribute
     * @param string $value
     * @return boolean
     */
    protected function validateDateLessThan($attribute, $value, $parameters)
    {
        $timestamp = str_replace('/', '-', $value);
        $timestamp = date('Y-m-d', strtotime($timestamp));

        $inserted = Carbon::createFromFormat('Y-m-d', $timestamp);
        $since = array_shift($parameters);

        $diffYears = Carbon::now()->diffInYears($inserted);

        return $diffYears <= $since;

    }

    //Custom Replacers
    /**
     * The replacer that goes with my specific custom validator. They
     * should be named the same with a different prefix word so laravel
     * knows they should be run together.
     */
    protected function replaceDateLessThan($message, $attribute, $rule, $parameters)
    {
        //All custom placeholders that live in the message for
        //this rule should live in the first parameter of str_replace
        return str_replace([':years'], array_shift($parameters), $message);
    }
}