<?php
namespace Agee\Services;

class Curl
{

    public static function get($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_CONNECTTIMEOUT => 12,
            CURLOPT_TIMEOUT => 12
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public static function post($url, $fields)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_TIMEOUT => 3
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


    public static function delete($url, $fields)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_TIMEOUT => 3
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


}