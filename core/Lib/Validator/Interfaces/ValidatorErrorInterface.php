<?php
namespace Core\Lib\Validator\Interfaces;


interface ValidatorErrorInterface
{
    /**
     * @param string $files
     * @param string $rule
     * @return mixed
     */
    public static function getError(string $files, string $rule, array $param);
}