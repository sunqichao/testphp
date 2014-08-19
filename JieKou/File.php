<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-8-14
 * Time: 上午10:42
 */

    class File
    {
        private $_dir;
        public function _construct()
        {
            $this->_dir = dirname(__FILE__).'/files/';
        }
        public function cacheData($key,$value='',$path='')
        {

        }

    }