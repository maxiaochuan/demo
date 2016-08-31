<?php

namespace App\Service;

use App\Model\Title;
use App\Service\Interfaces\TitleServiceInterface;

class TitleService implements TitleServiceInterface
{
    const TITLE_TYPE_CITY = 1;

    const TITLE_USED_ENABLED = 1;

    const TITLE_USED_DISABLED = 0;

    protected $_title = null;

    public function __construct()
    {
        if ($this->_title === null) {
            $this->_title = Title::getInstance();
        }
    }

    public function getCityTitle()
    {
        $data = $this->_title->getTitleByType(self::TITLE_TYPE_CITY);

        return $data;
    }
}
