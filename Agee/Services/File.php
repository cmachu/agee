<?php
namespace Agee\Services;

class File
{
    public static function getExtension($filename)
    {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }

    public static function getDimensions($filename)
    {
        $dimensions = getimagesize($filename);

        if ($dimensions === false)
            return false;
        else {
            return ['width' => $dimensions[0], 'height' => $dimensions[1]];
        }
    }

    public static function convertFileSize($size, $flag = 'toMb')
    {
        switch ($flag) {
            case 'toKb':
                return round($size / 1024, 2);
                break;
            case 'toMb':
                return round($size / 1024 / 1024, 2);
                break;
            case 'toGb':
                return round($size / 1024 / 1024 / 1024, 2);
                break;
            case 'toTb':
                return round($size / 1024 / 1024 / 1024, 2);
                break;
        }
        return $size;
    }

    public static function getFolderSize($path)
    {
        $total_size = 0;
        $files = scandir($path);
        $cleanPath = rtrim($path, '/') . '/';

        foreach ($files as $t) {
            if ($t <> "." && $t <> "..") {
                $currentFile = $cleanPath . $t;
                if (is_dir($currentFile)) {
                    $size = self::getFolderSize($currentFile);
                    $total_size += $size;
                } else {
                    $size = filesize($currentFile);
                    $total_size += $size;
                }
            }
        }

        return $total_size;
    }

    public static function saveUploadedFile($file, $path = 'upload/', $folder = '')
    {
        if ($folder != '')
            if (!is_dir($path . $folder))
                mkdir($path . $folder);

        $exp = explode('.', $file['name']);
        $extension = $exp[count($exp) - 1];
        $uploadFile = $path . $folder . '' . md5($file['name'] . '-' . mktime()) . '.' . $extension;

        if (move_uploaded_file($file['tmp_name'], $uploadFile))
            return '/' . $uploadFile;
        else
            return false;
    }

    public static function saveBlobFile($data, $path = 'upload/', $folder = '', $extension = 'png')
    {
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $tmpFilename = rand(0, 10000) . '.' . $extension;
        $tmpFilePath = 'upload/' . $tmpFilename;
        file_put_contents($tmpFilePath, $data);

        if ($folder != '')
            if (!is_dir($path . $folder))
                mkdir($path . $folder);

        $exp = explode('.', $tmpFilename);
        $extension = $exp[count($exp) - 1];
        $uploadFile = $path . $folder . '' . md5($tmpFilename . '-' . mktime()) . '.' . $extension;

        if (rename($tmpFilePath, $uploadFile))
            return '/' . $uploadFile;
        else
            return false;
    }

    public static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return false;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
        return true;
    }
}