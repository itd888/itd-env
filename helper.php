<?php


use sky_com\SkEnv;

if (!function_exists('sn_env')) {
    /**
     * 获取环境变量值
     * @access public
     * @param string $name 环境变量名（支持二级 .号分割）
     * @param string $default 默认值
     * @return mixed
     */
    function sn_env(string $name = null, $default = null) {
        static $env;
        if (empty($env)) {
            $env = new SkEnv();
        }
        return $env->get($name, $default);
    }
}