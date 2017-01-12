<?php
/**
 * Created by PhpStorm.
 * User: Paweł
 * Date: 2015-01-19
 * Time: 13:41

 */
namespace Tools;

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
            //if (!empty($keys))
            //    $k = $keys . '[' . $k . ']';

            //if (is_array($v))
            //    self::buildArray($v, $k);
            //else

                self::$data[$k] = $v;
        }
    }

    public static function get($name)
    {
        if (isset(self::$data[$name]))
            return self::$data[$name];
        else {
            $data = self::getFilter($name);
            if(sizeof($data)==0)
                return false;
            else
                return $data;
        }
    }

    public static function getAll($filter=false)
    {
        if($filter===false)
            return self::$data;
        else
        {
            $filter = '#'.str_replace(array('[', ']'), array('\[', '\]'), $filter).'#ius';

            $list=array();
            foreach(self::$data as $key=>$value)
            {
                preg_match($filter, $key, $result);

                if(sizeof($result)==3)
                    $list[$result[1]][$result[2]] = $value;
                if(sizeof($result)==2)
                    $list[$result[1]] = $value;
                if(sizeof($result)==1)
                    $list[$result[0]] = $value;
            }
            return $list;
        }
    }

    public static function value($name) {
        $value = self::get($name);
        $value = str_replace('"',"'",$value);
        if($value==false)
            return '';
        else
            return 'value="'.$value.'"';
    }

    public static function src($name) {
        $value = self::get($name);

        if($value==false)
            return 'src=""';
        else
            return 'src="'.$value.'"';
    }

    public static function display($name) {
        $value = self::get($name);

        if($value==false)
            return 'style="display:none;"';
        else
            return 'style="display:block;"';
    }

    public static function getFilter($filter) {
        $filter = '#^'.str_replace(array('[', ']', '\[\]'), array('\[', '\]', '\[\\d+\]'), $filter).'$#ius';

        $list=array();
        foreach(self::$data as $key=>$value)
        {
            preg_match($filter, $key, $result);

            if(sizeof($result)==1)
                $list[$result[0]] = $value;
            elseif(sizeof($result)==2)
                $list[$result[1]] = $value;
            elseif(sizeof($result)==3)
                $list[$result[1]][$result[2]] = $value;
            elseif(sizeof($result)==4)
                $list[$result[1]][$result[2]][$result[3]] = $value;
            elseif(sizeof($result)==5)
                $list[$result[1]][$result[2]][$result[3]][$result[4]] = $value;
        }
        return $list;
    }

    public static function set($name, $value) {
        self::$data[$name] = $value;
        return true;
    }

    public static function setObject($object, $array=array()) {
        if(sizeof($array)>0)
            $filter = true;
        else
            $filter = false;

        foreach($object as $key=>$value) {
            if($filter===false || ($filter===true && in_array($key, $array))) {
                self::set($key, $value);
            }
        }
        return true;
    }

    public static function  setDefault($name, $value) {
        if(!isset(self::$data[$name]))
            self::$data[$name] = $value;
        return true;

    }

    public static function checkbox($field, $value = 1) {

        if(Input::get($field) == $value)
            return 'checked="checked"';

    }
    public static function multiCheckbox($fieldArrayName, $value = 1) {
        $fieldArray = Input::get($fieldArrayName);
        foreach($fieldArray as $field) {
            if ($field == $value)
                return 'checked="checked"';
        }
    }

    public static function radio($field, $value) {
        if(Input::get($field) == $value)
            return 'selected="true"';
    }

    public static function option($field,$value){
        if(Input::get($field) == $value)
            return 'selected="selected"';
    }

    public static function optionPlain($fieldValue,$value){
        if($fieldValue == $value)
            return 'selected="selected"';
    }

    public static function has($value){
        if(isset(self::$data[$value]))
            return true;
        else
            return false;
    }

    public static function delete($key){
        unset(self::$data[$key]);
    }

}
