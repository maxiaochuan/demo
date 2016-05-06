<?php

namespace App\Lib;

use App\Lib\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $_fields = [];

    /**
     * @var array
     */
    public $_validations = [];

    /**
     * @var array
     */
    protected $_errors = [];

    public function __construct(array $fields, array $rulesGroup)
    {
        $this->_fields = $fields;
        $this->handleRules($rulesGroup);
    }

    public function handleRules(array $rulesGroup)
    {
        foreach ($rulesGroup as $field => $rules) {
            if (!array_key_exists($field, $this->_fields)) {
                continue;
            }
            foreach ($rules as $rule => $param) {
                if (is_numeric($rule)) {
                    $rule = $param;
                }
                $validation = [
                    'field' => $field,
                    'value' => $this->_fields[$field],
                    'rule' => $rule,
                    'param' => $param,
                    'error' => 'ha ha'
                ];

                array_push($this->_validations, $validation);
            }
        }
    }

    public function __call($name, $arguments)
    {
        $funcName = 'validate' . ucfirst($name);

        return call_user_func_array([$this, $funcName], $arguments);
    }

    public function validate()
    {
        foreach ($this->_validations as $validation) {
            $func = $validation['rule'];
            $result = $this->$func($validation['value'], $validation['param']);
            if ($result === false) {
                array_push($this->_errors, [$validation['field'], $validation['error']]);
            }
        }

        return count($this->_errors) === 0;
    }

    public function errors($field = null)
    {
        if ($field !== null) {
            return isset($this->_errors[$field]) ? $this->_errors[$field] : false;
        }
        return $this->_errors;
    }

    protected function validateRequired($value)
    {
        if (is_null($value)) {
            return false;
        } elseif (is_string($value) && trim($value) === '') {
            return false;
        }

        return true;
    }


    protected function stringLength($value)
    {
        if (!is_string($value)) {
            return false;
        } elseif (function_exists('mb_strlen')) {
            return (mb_strlen($value) + strlen($value)) / 2;
        }
        return strlen($value);
    }

    protected function validateLength()
    {

    }

    protected function validateLengthMin($value, $param)
    {
        $length = $this->stringLength($value);

        return ($length !== false) && $length >= $param;
    }

    protected function validateLengthMax($value, $param)
    {
        $length = $this->stringLength($value);

        return ($length !== false) && $length <= $param;
    }
}