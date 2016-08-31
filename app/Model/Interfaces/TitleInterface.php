<?php

namespace App\Model\Interfaces;

interface TitleInterface
{
    public function getTitleByType(int $type);
}