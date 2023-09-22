<?php


use itd\EnvReader;

if (!function_exists('iEnv')) {
    /**
     * 获取环境变量值
     * @access public
     * @param string|null $name 环境变量名（支持二级 .号分割）
     * @param null $default 默认值
     * @param string $envName
     * @return mixed
     */
    function iEnv(string $name = null, $default = null, string $envName = '')
    {
        return EnvReader::get($name, $default, $envName);
    }
}