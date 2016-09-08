<?php

namespace App\Model;

use App\Model\Interfaces\TitleInterface;
use Core\Lib\Model;

class Title extends Model implements TitleInterface
{

    const TITLE_TYPE = 'type';

    const TITLE_USED = 'used';

    const TITLE_CONTENT_EN = 'content-en';

    const TITLE_CONTENT_ZH = 'content-zh';

    const TITLE_ICON = 'icon';

    /**
     * @return Title
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getTitlesByType(int $type)
    {
        $result = $this->getMasterDB()->select(self::getTableName(), [
            self::TITLE_CONTENT_EN,
            self::TITLE_CONTENT_ZH,
            self::TITLE_ICON
        ], [
            'AND' => [
                self::TITLE_TYPE => $type,
                self::TITLE_USED => 1
            ]
        ]);

        return $result;
    }
}