<?php

namespace App\Providers;

use App\Lib\Validator;

class ValidatorProvider
{
    protected static function LoginRules()
    {
        return $rules = [
            'username' => [
                'required',
                'lengthMin' => 6,
                'lengthMax' => 30
            ],
            'password' => [
                'required',
                'lengthMin' => 6,
                'lengthMax' => 64
            ]
        ];
    }

    protected static function registerRules()
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

    public static function validate(string $data, string $rule)
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

    public function __call($name, $arguments)
    {
        $className = $name . 'Rules';

        return call_user_func($className);
    }
}