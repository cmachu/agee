<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 02.01.15
 * Time: 15:19
 */

namespace Tools;


class Header {

    public static function getIp($debug = false,$force = false) {
        if($force != false) return $force;

        if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
        }

        $ip = filter_var($ip, FILTER_VALIDATE_IP);
        $ip = ($ip === false) ? '0.0.0.0' : $ip;

        if($debug) return '87.99.107.212';
        if($ip == '127.0.0.1') return rand(1,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
        return $ip;
    }

    public static function location($url, $time=false) {
        if(self::isAjax()===true)
            return true;

        if($time!==false) {
            header("Refresh:{$time};url={$url}");
            return true;
        }
        else {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$url);
            return true;
        }
    }

    public static function refresh() {
        header("Refresh:0");
        return true;
    }

    public static function back($time=false) {
        if(isset($_SERVER['HTTP_REFERER']))
            return self::location($_SERVER['HTTP_REFERER'], $time);
        else
            return self::location('/', $time);
    }

    public static function isAjax() {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            return false;
        }
    }

    public static function setDownload($file, $filename, $type='application/pdf', $download=true){
        header('Content-type: '.$type);
        if($download)
            header('Content-Disposition:attachment;filename="' . $filename . '"');
        else
            header('Content-Disposition: inline; filename="' . $filename . '"');

        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }

}
