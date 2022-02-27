<?php

namespace App\Libraries;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingProducer
{
    /**
     * @var SettingProducer|null
     */
    private static $instance = null;

    /**
     * @var array|string[]
     */
    private array $acceptableParts = ['admin', 'home'];

    /**
     * @var Collection
     */
    private static Collection $settings;

    /**
     * @param string $part
     * @throws \Exception
     */
    public function __construct(string $part)
    {

        if (is_null(self::$instance)) {

            if (!in_array($part, $this->acceptableParts)) {
                throw new \Exception('بخش مورد نظر جهت بارگزاری تنظیمات صحیح نیست!');
            }

            self::$settings = Setting::where(function ($q) use ($part) {
                $q->where('part', $part)
                    ->orWhere('part', null)
                    ->orWhere('part', '');
            })->get();

            self::$instance = $this;
        }

        return self::$instance;

    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public static function getItem(string $name, $default = null)
    {
        $item = self::$settings->where('key', $name)->first();
        $defaultLanguage = 'fa';

        if (!is_null($item)) {
            if( ($item->type =='string' ||  $item->type =='text')&&  __lng() != $defaultLanguage && $item->translations->where('language', __lng())->first()!== null){
            return __tr($item->key);
        }

            $type = $item->type;

            $value = $item->value;

            $setTypeMethodName = 'setType' . ucfirst(strtolower($type));

            return self::$instance->$setTypeMethodName($value);

        }

        return $default;
    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public static function getItemStraight(string $name, $default = null)
    {
        $item = Setting::where('key', $name)->first();

        if (!is_null($item)) {

            $type = $item->type;

            $value = $item->value;

            $setTypeMethodName = 'setType' . ucfirst(strtolower($type));

            return self::$instance->$setTypeMethodName($value);

        }

        return $default;
    }

    /**
     * @param $value
     * @return int
     */
    private function setTypeInt($value)
    {
        return intval($value);
    }

    /**
     * @param $value
     * @return string
     */
    private function setTypeString($value)
    {
        return (string)$value;
    }

    /**
     * @param $value
     * @return string
     */
    private function setTypeText($value)
    {
        return (string)$value;
    }

    /**
     * @param $value
     * @return float
     */
    private function setTypeFloat($value)
    {
        return (double)$value;
    }

    /**
     * @param $value
     * @return bool
     */
    private function setTypeBool($value)
    {
        return intval($value) === 1;
    }

    /**
     * @param $value
     * @return mixed
     */
    private function setTypeJson($value)
    {
        return json_decode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    private function setTypeArray($value)
    {
        return unserialize($value);
    }
}
