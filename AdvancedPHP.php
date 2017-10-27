<?php

/**
 * Этот класс позволяет улучшить и упростить работу с PHP.
 */
class AdvancedPHP {

    /**
     * Если функция не найдена то вызывается этот магический метод.
     * @param $name
     * @param $args
     */
    public function __call($name, $args) {
        die("Fatal Error: method \'" . $name . "\' not exists!");
    }

    /**
     * Эта функция позволяет одной строчкой подключить сразу несколько фалов спомощью метода 'include'.
     * @param $files
     */
    public function include_all($files) {
        if (!isset($files)) {
            die("Fatal Error: not files!");
        }

        foreach ($files as $file => $path) {
            if (!file_exists($path)) {
                die("Fatal Error: file \'" . $file . "\' not exists!");
            }

            include $path;
        }
    }

    /**
     * Эта функция позволяет одной строчкой подключить сразу несколько фалов спомощью метода 'include_once'.
     * @param $files
     */
    public function include_once_all($files) {
        if (!isset($files)) {
            die("Fatal Error: not files!");
        }

        foreach ($files as $file => $path) {
            if (!file_exists($path)) {
                die("Fatal Error: file \'" . $file . "\' not exists!");
            }

            include_once $path;
        }
    }

    /**
     * Эта функция позволяет одной строчкой подключить сразу несколько фалов спомощью метода 'require'.
     * @param $files
     */
    public function require_all($files) {
        if (!isset($files)) {
            die("Fatal Error: not files!");
        }

        foreach ($files as $file => $path) {
            if (!file_exists($path)) {
                die("Fatal Error: file \'" . $file . "\' not exists!");
            }

            require $path;
        }
    }

    /**
     * Эта функция позволяет одной строчкой подключить сразу несколько фалов спомощью метода 'require_once'.
     * @param $files
     */
    public function require_once_all($files) {
        if (!isset($files)) {
            die("Fatal Error: not files!");
        }

        foreach ($files as $file => $path) {
            if (!file_exists($path)) {
                die("Fatal Error: file \'" . $file . "\' not exists!");
            }

            require_once $path;
        }
    }

    /**
     * @param $text
     * @return string
     */
    public function clearString($text) {
        $clearedString = nl2br(htmlentities(htmlspecialchars(addslashes(stripslashes($text)))));
        if ($clearedString == $text or !$clearedString) {
            die("Fatal Error: failed to clear string!");
        }
        return $clearedString;
    }
}