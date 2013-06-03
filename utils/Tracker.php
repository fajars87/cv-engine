<?php
/**
 * Author: Sergey Grigoriev
 */

class Tracker {
    private static $instance;
    private $filename;
    private $folder;

    const MAX_RECORD_NUMBER = 5000;
    const DELIMITER = ', ';

    const DEFAULT_FILENAME = 'visitors.txt';
    const COOKIE_EXPIRE_TIME = 86400;
    const DEFAULT_FOLDER = '.';

    public function setFilename($filename) {
        $this->filename = $filename;
    }

    public function setFolder($folder) {
        $this->folder = $folder;
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function logUser() {
        $info = $this->getTime() . self::DELIMITER . $this->getRealIpAddress() . self::DELIMITER .
            $this->getUserAgent() . self::DELIMITER . $this->getRequestedUrl();
        $this->writeToFile($info);
        return $info;
    }

    private function __construct() {
        $this->filename = self::DEFAULT_FILENAME;
        $this->folder = self::DEFAULT_FOLDER;

        $this->checkPath();

        date_default_timezone_set("Europe/Minsk");
    }

    private function getPath() {
        return $this->folder . '/' . $this->filename;
    }

    private function checkPath() {
        if (!empty($this->folder)) {
            if (!is_dir($this->folder)) {
                mkdir($this->folder, 0755);
            }
        }
        touch($this->filename);
    }

    private function getRealIpAddress() {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { // get IP address
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // if IP via proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    private function getUserAgent() {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if (strstr($agent, 'YandexBot')) {
            $agent = 'YandexBot';
        } elseif (strstr($agent, 'Googlebot')) {
            $agent = 'Googlebot';
        }
        return $agent;
    }

    private function getTime() {
        return date("d.m.Y H:i:s");
    }

    private function getRequestedUrl() {
        return $_SERVER['HTTP_HOST'] . '/' . $_SERVER['REQUEST_URI'];
    }

    private function writeToFile($msg) {
        $result = false;
        $filename = $this->getPath();
        if (is_writable($filename)) {
            $handle = fopen($filename, 'a');
            if ($handle) {
                $result = fwrite($handle, $msg . PHP_EOL);
            }
            fclose($handle);
        }
        return $result;
    }
}