<?php

namespace App\Service;

use App\Model\City;
use App\Model\Title;
use App\Service\Interfaces\CityServiceInterface;
use Core\Lib\Singleton;

class CityService extends Singleton implements CityServiceInterface
{
    const CITY_TITLE_TYPE = 1;

    protected $_city = null;
    protected $_title = null;

    public function __construct()
    {
        if ($this->_city === null) {
            $this->_city = City::getInstance();
        }
        if ($this->_title === null) {
            $this->_title = Title::getInstance();
        }
    }

    /**
     * @return CityService
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getList()
    {
        $cities = $this->_city->getAllCity();
        $title = $this->_title->getTitleByType(self::CITY_TITLE_TYPE);

        foreach ($cities as $index => $city) {
            $cities[$index]['img-src'] = imgSrc($city[City::CITY_ICON]);
        }

        $title['img-src'] = imgSrc($title[Title::TITLE_ICON]);

        $result = [
            'title' => $title,
            'list' => $cities
        ];

        return $result;
    }
}