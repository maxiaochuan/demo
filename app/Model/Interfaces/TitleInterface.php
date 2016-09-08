<?php

namespace App\Model\Interfaces;

interface TitleInterface
{
    public function getTitlesByType(int $type);
}