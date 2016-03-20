<?php

namespace common\utils;

use common\utils\phpthumb\PhpThumbFactory;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FileUtils {
    
    public static $allow_remove_folder_contains_less = 30;    

    public static $file_name_replace = [
        '#' => '_', 
        '?' => '_', 
        '/' => '_',
        '&ndash;' => '-',
        ' - ' => '-',
        ' ' => '-'
    ];
    public static $allow_extensions = [
        'jpg',
        'jpeg',
        'png',
        'gif',
        'pdf',
        'doc',
        'docx',
        'xsl',
        'apk',
        'ipa',
        'xap',
        'rar',
        'zip'
    ];


    // Hàm kiểm tra file có tồn tại trên url không
    public static function checkRemoteFile($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) !== FALSE) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function getImage($params = [
        'imageName' => '',
        'suffix' => '',
        'imagePath' => '',
        'imagesFolder' => '',
        'imagesUrl' => '',
        'defaultImage' => ''
    ])
    {
        isset($params['suffix']) or $params['suffix'] = null;
        isset($params['defaultImage']) or $params['defaultImage'] = '';
        
        $_image = '';
        if ($params['suffix'] == null) {
            if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $params['imageName']))) {
                $_image = $params['imagesUrl'] . $params['imagePath'] . $params['imageName'];
            }
        } else {
            $name_map = explode('.', $params['imageName']);
            if (count($name_map) >= 2) {
                $extension = $name_map[count($name_map) - 1];
                $basename = substr($params['imageName'], 0, -(1 + strlen($extension)));
                if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $basename . $params['suffix'] . '.' . $extension))) {
                    $_image = $params['imagesUrl'] . $params['imagePath'] . $basename . $params['suffix'] . '.' . $extension;
                } else {
                    if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $params['imageName']))) {
                        $_image = $params['imagesUrl'] . $params['imagePath'] . $params['imageName'];
                    }
                }
            }
        }
        if ($_image != '') {
            return str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_image)));
        } else {
            return $params['defaultImage'];
        }        
    }

    // Hàm copy ảnh và resize theo các kích thước cho trước
    // Sử dụng thư viện PhpThumbFactory:
    /**
     * PhpThumb Library Definition File
     * 
     * This file contains the definitions for the PhpThumbFactory class.
     * It also includes the other required base class files.
     * 
     * If you've got some auto-loading magic going on elsewhere in your code, feel free to
     * remove the include_once statements at the beginning of this file... just make sure that
     * these files get included one way or another in your code.
     * 
     * PHP Version 5 with GD 2.0+
     * PhpThumb : PHP Thumb Library <http://phpthumb.gxdlabs.com>
     * Copyright (c) 2009, Ian Selby/Gen X Design
     * 
     * Author(s): Ian Selby <ian@gen-x-design.com>
     * 
     * Licensed under the MIT License
     * Redistributions of files must retain the above copyright notice.
     * 
     * @author Ian Selby <ian@gen-x-design.com>
     * @copyright Copyright (c) 2009 Gen X Design
     * @link http://phpthumb.gxdlabs.com
     * @license http://www.opensource.org/licenses/mit-license.php The MIT License
     * @version 3.0
     * @package PhpThumb
     * @filesource
     */
    public static function copyImage(
        $params = [
            'imageName' => '',
            'fromFolder' => '',
            'toFolder' => '',
//            'removeInputImage' => false,
//            'resize' => [],
//            'resizeType' => 1,
//            'resizeQuality' => 100,
//            'resizeSuffixTemplate' => '--{x}x{y}',
//            'sequenceSuffixTemplate' => '--{sequence}',
//            'sequenceStart' => 2,
//            'imageNameReplace' => static::$file_name_replace,
        ]
    )
    {
        $params['fromFolder'] = rtrim(trim($params['fromFolder']), '/') . '/';
        $params['toFolder'] = rtrim(trim($params['toFolder']), '/') . '/';
        isset($params['removeInputImage']) or $params['removeInputImage'] = false;
        isset($params['resize']) or $params['resize'] = [];
        isset($params['resizeType']) or $params['resizeType'] = 1;
        isset($params['resizeQuality']) or $params['resizeQuality'] = 100;
        isset($params['resizeSuffixTemplate']) or $params['resizeSuffixTemplate'] = '--{x}x{y}';
        isset($params['sequenceSuffixTemplate']) or $params['sequenceSuffixTemplate'] = '--{sequence}';
        isset($params['sequenceStart']) or $params['sequenceStart'] = 2;
        isset($params['imageNameReplace']) or $params['imageNameReplace'] = static::$file_name_replace;
        
        $resize_suffixes = [];
        foreach ($params['resize'] as $dim) {
            $resize_suffixes[] = static::getResizeSuffix($dim[0], $dim[1], $params['resizeSuffixTemplate']);
        }
        $img_name = trim($params['imageName']);
        while (strpos($img_name, '  ') !== false) {
            $img_name = str_replace('  ', ' ', $img_name);
        }
        $img_extension = trim(strrev(explode('.', strrev($img_name))[0]));
        $img_basename = trim(rtrim($img_name, '.' . $img_extension));
        if (static::fileWithSuffixesExists($params['toFolder'], $img_name, $resize_suffixes)) {
            $suffix_rev_map = static::getSequenceSuffixRevMap($params['sequenceSuffixTemplate']);
            $img_basename = trim(strrev(preg_replace('/' . $suffix_rev_map[1] . '(|\s)[0-9](|\s)' . $suffix_rev_map[0] . '/', '', strrev($img_basename), 1)));
        }
        foreach ($params['imageNameReplace'] as $search => $replace) {
            $img_basename = str_replace(html_entity_decode($search), $replace, $img_basename);
        }
        if (trim($img_basename) == ''){
            $img_basename = 'Untitle';
        }
        $img_name = $img_basename . '.' . $img_extension;
        while (static::fileWithSuffixesExists($params['toFolder'], $img_name, $resize_suffixes)) {
            $img_name = $img_basename . static::getSequenceSuffix($params['sequenceStart'] ++, $params['sequenceSuffixTemplate']) . '.' . $img_extension;
        }
        $result = [
            'imageName' => $img_name,
            'success' => false,
            'removeInputImage' => false,
            'resize' => [],
        ];
        if (!file_exists($params['toFolder'])) {
            mkdir($params['toFolder'], 0777, true);
        }
        if (is_file($params['fromFolder'] . $params['imageName']) 
        || static::checkRemoteFile($params['fromFolder'] . $params['imageName'])
        ) {
            $name_map = explode('.', $img_name);
            if (count($name_map) > 1) {
                $extension = $name_map[count($name_map) - 1];
                $basename = substr($img_name, 0, -1 - strlen($extension));
                if (copy($params['fromFolder'] . $params['imageName'], $params['toFolder'] . $img_name)) {
                    $result['success'] = true;
                    if ($params['removeInputImage']) {
                        if (is_file($params['fromFolder'] . $params['imageName'])) {
                            if (@unlink($params['fromFolder'] . $params['imageName'])) {
                                $result['removeInputImage'] = true;
                            }
                        }
                    }
                    if (count($params['resize']) > 0) {
                        if (filesize($params['toFolder'] . $img_name) > 0) {
                            $formatInfo = getimagesize($params['toFolder'] . $img_name);
                            if ($formatInfo !== false && (isset($formatInfo['mime']) ? in_array($formatInfo['mime'], ['image/jpeg', 'image/png', 'image/gif']) : false)) {
                                foreach ($params['resize'] as $dim) {
                                    $thumb = PhpThumbFactory::create($params['toFolder'] . $img_name);
                                    $thumb->setOptions(['jpegQuality' => $params['resizeQuality']]);
                                    switch ($params['resizeType']) {
                                        case 1:
                                            if ($thumb->resize($dim[0], $dim[1])) {
                                                if ($thumb->save($params['toFolder'] . $basename . static::getResizeSuffix($dim[0], $dim[1], $params['resizeSuffixTemplate']) . '.' . $extension)) {
                                                    $result['resize'][] = $basename . static::getResizeSuffix($dim[0], $dim[1], $params['resizeSuffixTemplate']) . '.' . $extension;
                                                }
                                            }
                                            break;
                                        case 2:
                                            if ($thumb->adaptiveResize($dim[0], $dim[1])) {
                                                if ($thumb->save($params['toFolder'] . $basename . static::getResizeSuffix($dim[0], $dim[1], $params['resizeSuffixTemplate']) . '.' . $extension)) {
                                                    $result['resize'][] = $basename . static::getResizeSuffix($dim[0], $dim[1], $params['resizeSuffixTemplate']) . '.' . $extension;
                                                }
                                            }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $result;
    }

    // Hàm copy ảnh trong nội dung text và trả về nội dung chứa đường dẫn ảnh mới
    public static function copyContentImages($params = [
        'content' => '',
//        'defaultFromFolder' => '',
        'toFolder' => '',
        'toUrl' => '',
//        'regex' => '',
//        'removeInputImage' => false,
    ])
    {
        if (empty($params['regex'])) {
            $regex = '/(http|https):\/\/+[^\"]+.(';
            foreach (static::$allow_extensions as $i => $ext) {
                $regex .= ($i > 0 ? '|' : '') . $ext . '|' . strtoupper($ext);
            }
            $regex .= ')/';
        }
        if (empty($params['removeInputImage'])) {
            $params['removeInputImage'] = true;
        }
        if (isset($params['defaultFromFolder'])) {
            $params['defaultFromFolder'] = rtrim($params['defaultFromFolder'], '/') . '/';
        }
        $params['toFolder'] = rtrim($params['toFolder'], '/') . '/';
        $toUrl = rtrim($params['toUrl'], '/') . '/';
        $content = $params['content'];
        $matches = array();
        preg_match_all($regex, $content, $matches);
        if (!empty($matches[0])) {
            foreach ($matches[0] as $img_url) {
                if (strpos($img_url, $toUrl) === false) {
                    $img_name = strrev(explode('/', strrev($img_url))[0]);
                    if (empty($params['defaultFromFolder']) || !is_file($params['defaultFromFolder'] . $img_name)) {
                        $fromFolder = substr($img_url, 0, strlen($img_url) - strlen($img_name));
                    } else {
                        $fromFolder = $params['defaultFromFolder'];
                    }
                    $copyResult = static::copyImage([
                                'imageName' => $img_name,
                                'fromFolder' => $fromFolder,
                                'toFolder' => $params['toFolder'],
                                'removeInputImage' => $params['removeInputImage'],
                    ]);
                    if ($copyResult['success']) {
                        $content = str_replace($img_url, $toUrl . $copyResult['imageName'], $content);
                    }
                }
            }
        }
        return $content;
    }
    
    public static function removeFolder($dir)
    {
        if (is_dir($dir)) {
            $files = glob(rtrim($dir, '/') . '/*');
            if (count($files) < static::$allow_remove_folder_contains_less) {
                foreach ($files as $item) {
                    if (is_file($item)) {
                        @unlink($item);
                    }
                }
                @rmdir($dir);
            }
        }
    }

    public static function generatePath($time)
    {
        return '/' . date('Y', $time) . '/' . date('m', $time) . '/' . date('d', $time) . '/' . static::generateRandomString(2) . '/';
    }

    // private function
    private static function generateRandomString($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count - 1)];
        }
        return $str;
    }

    private static function getSequenceSuffixRevMap($template)
    {
        $suffix_map = explode('{sequence}', $template);
        return [
            isset($suffix_map[0]) ? preg_quote(strrev($suffix_map[0])) : '',
            isset($suffix_map[1]) ? preg_quote(strrev($suffix_map[1])) : '',
        ];
    }

    private static function getSequenceSuffix($sequence, $template)
    {
        if ($result = str_replace('{sequence}', $sequence, $template)) {
            return $result;
        }
        return '';
    }

    private static function getResizeSuffix($dimx, $dimy, $template)
    {
        if ($result = str_replace('{y}', $dimy, str_replace('{x}', $dimx, $template))) {
            return $result;
        }
        return '';
    }

    private static function fileWithSuffixesExists($container, $filename, $suffixes = [])
    {
        if (is_file($container . $filename)) {
            return true;
        }
        $name_map = explode('.', $filename);
        if (count($name_map) >= 2) {
            $extension = $name_map[count($name_map) - 1];
            $basename = substr($filename, 0, -1 - strlen($extension));
            foreach ($suffixes as $suffix) {
                if (is_file($container . $basename . $suffix . '.' . $extension)) {
                    return true;
                }
            }
        }
        return false;
    }

}
