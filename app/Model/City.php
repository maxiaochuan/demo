<?php

namespace App\Model;

use App\Model\Interfaces\CityInterface;
use Core\Lib\Model;

class City extends Model implements CityInterface
{

    const CITY_TITLE = 'title';

    const CITY_CONTENT_EN = 'content-en';

    const CITY_CONTENT_ZH = 'content-zh';

    const CITY_ICON = 'icon';

    /**
     * @return City
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getAllCity()
    {
        $data = $this->getMasterDB()->select(self::getTableName(), [
            self::CITY_TITLE,
            self::CITY_CONTENT_EN,
            self::CITY_CONTENT_ZH,
            self::CITY_ICON
        ]);

        return $data;
    }
}