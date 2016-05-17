<?php

namespace Core\Lib\Validator\Interfaces;

interface ValidatorInterface
{
    /**
     * ValidatorInterface constructor.
     * @param array $fields
     * @param array $rulesGroup
     */
    public function __construct(array $fields, array $rulesGroup);

    public function handleRules(array $rules);

    public function validate();

    public function errors();
}