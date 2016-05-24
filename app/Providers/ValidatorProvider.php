<?php

namespace App\Providers;

use Core\Lib\Validator\Validator;

class ValidatorProvider
{
    public static function LoginRules()
    {
        return $rules = [
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ]
        ];
    }

    public static function registerRules()
    {
        return $rules = [
            'username' => [
                'required',
                'lengthMin' => 6,
                'lengthMax' => 30,
            ],
            'password' => [
                'required',
                'lengthMin' => 6,
                'lengthMax' => 64,
            ],
            'email' => [
                'required',
                'email',
                'lengthMax' => 64,
            ]
        ];
    }

    public static function validate(array $data, string $rule)
    {

        $v = new Validator($data, self::$rule());

        if ($v->validate()) {
            return [
                'result' => true,
            ];
        } else {
            return [
                'result' => false,
                'errors' => $v->errors(),
            ];
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $className = $name . 'Rules';

        return self::$className();
    }
}