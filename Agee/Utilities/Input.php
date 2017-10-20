<?php
namespace Agee\Utilities;

class Input
{
    static $proxy;
    static $data = array();

    public static function boot()
    {
        self::buildArray($_POST);
    }

    public static function buildArray($array, $keys = false)
    {
        foreach ($array as $k => $v) {
            self::$data[$k] = $v;
        }
    }

    public static function get($name)
    {
        if (isset(self::$data[$name])) {
            return self::$data[$name];
        }

        return false;
    }

    public static function getAll()
    {
        return self::$data;
    }

    public static function set($name, $value)
    {
        self::$data[$name] = $value;

        return true;
    }

    public static function setAll($object)
    {
        foreach ($object as $key => $value) {
            self::set($key, $value);
        }

        return true;
    }

    public static function has($value)
    {
        if (isset(self::$data[$value])) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($key)
    {
        unset(self::$data[$key]);
    }

    public static function value($object_name)
    {
        $value = str_replace('"', "'", self::get($object_name));
        if ($value === false) {
            return '';
        } else {
            return 'value="' . $value . '"';
        }
    }

    public static function src($object_name)
    {
        $value = self::get($object_name);

        if ($value === false) {
            return 'src=""';
        } else {
            return 'src="' . $value . '"';
        }
    }

    public static function display($object_name)
    {
        $value = self::get($object_name);

        if ($value === false) {
            return 'style="display:none;"';
        } else {
            return 'style="display:block;"';
        }
    }

    public static function checkbox($object_name, $value = 1)
    {
        $objectValue = self::get($object_name);

        if ($objectValue == $value) {
            return 'checked="checked"';
        }
        return '';

    }

    public static function radio($object_name, $value)
    {
        $objectValue = self::get($object_name);

        if ($objectValue == $value) {
            return 'selected="true"';
        }
        return '';
    }

    public static function option($object_name, $value)
    {
        $objectValue = self::get($object_name);

        if ($objectValue == $value) {
            return 'selected="selected"';
        }
        return '';
    }

}
