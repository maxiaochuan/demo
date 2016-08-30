<?php
namespace Core\Lib\Validator;


use Core\Lib\Validator\Interfaces\ValidatorErrorInterface;

class ValidatorError implements ValidatorErrorInterface
{
    protected static $errors = [
        'required' => 'can not be empty',
        'lengthMin' => '',
        'lengthBetween' =>  'should contain *0* - *1* characters.',
        'email' => 'must be email'
    ];

    public static function getError(string $files, string $rule, array $param = null)
    {
        if (!array_key_exists($rule, self::$errors)) {

        }

        $error = ucfirst($files) . ' ' . self::$errors[$rule];

        if (!is_null($param)) {
            foreach ($param as $k => $value) {
                $pattern = '/\*' . $k . '\*/';
                $error = preg_replace($pattern, $value, $error);
            }
        }
        return $error;
    }
}