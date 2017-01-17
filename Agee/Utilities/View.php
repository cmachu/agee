<?php

namespace Agee\Utilities;

use Agee\Agee;

class View
{
    static $mainTemplate = 'main';
    static $path = 'Views';
    static $data = [];
    static $router;

    public static function getMainTemplate()
    {
        return self::$mainTemplate;
    }

    public static function setMainTemplate($name = 'main')
    {
        self::$mainTemplate = $name;
    }

    public static function setPath($path)
    {
        self::$path = $path;
    }

    public static function getPath()
    {
        return self::$path;
    }

    public static function template($name, $extraData = array())
    {

        global $ageeConfig;

        if (empty($name)) {
            return false;
        }

        ob_start();

        $filename = 'Apps/' . Agee::getAppName() . '/' . self::$path . '/' . $name . '.tpl';
        $cachedName = str_replace('/', '__', Agee::getAppName() . '_' . self::$path . '/' . $name);
        $cachedFilename = 'Cache/' . $cachedName . '.php';

        $mtime = @filemtime($filename);
        $mtimeCached = @filemtime($cachedFilename);

        if ($mtime === false) {
            throw new \Exception("Template {$filename} does not exists !");
        }

        if ($ageeConfig['forceBuildTemplate'] == true || $mtimeCached < $mtime) {
            $body = file_get_contents($filename);
            $template = str_replace(array('{{=', '{{', '}}'), array('<?php echo ', '<?php ', ' ?>'), $body);
            file_put_contents($cachedFilename, $template);
        }

        extract(self::$data);
        extract($extraData);

        $template = include($cachedFilename);

        $body = ob_get_contents();
        ob_end_clean();

        return $body;
    }

    public static function set($name, $value)
    {
        self::$data[$name] = $value;
    }

}