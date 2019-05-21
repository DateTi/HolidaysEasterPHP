<?php
declare(strict_types=1);

namespace DateTi\Holidays\Easter\PHP;

use DateTi\Holidays\EasterHolidayInterface;
use DateTime;

class Easter implements EasterHolidayInterface
{

    public static function getMonday(int $year): DateTime
    {
        $easter = self::getEaster($year);
        $day = self::createDateTime($easter);
        $day->modify('+1 day');
        return $day;
    }

    public static function getEaster(int $year): DateTime
    {
        return new DateTime(date(easter_date($year)));
    }

    public static function getGoodFriday(int $year): DateTime
    {
        $easter = self::getEaster($year);
        $day = self::createDateTime($easter);
        $day->modify('-2 day');
        return $day;
    }

    private static function createDateTime(DateTime $dateTime): DateTime
    {
        return new DateTime($dateTime->format('Y-m-d H:i:s.u'));
    }
}
