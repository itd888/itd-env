<?php

namespace itd;

class EnvReader
{
    /**
     * 应用根目录
     * @var string
     */
    protected static $rootPath = '';
    /**
     * @var Env
     */
    private static $env;

    private static $envNames = [];


    /**
     * 加载环境变量定义
     * @access public
     * @param string $envName 环境标识
     * @return void
     */
    public static function init(string $envName = ''): void
    {
        if (!self::$env) {
            self::$env = new Env();
        }
        $envFile = self::getEnvFile($envName);
        if (is_file($envFile)) {
            self::$env->load($envFile);
        }else{
            echo "env file not found:".$envFile."<br>";
        }
        self::$envNames[] = $envName;
    }

    private static function getEnvFile($envName)
    {
        self::$rootPath = self::$rootPath ? rtrim(self::$rootPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : self::getDefaultRootPath();
        // 加载环境变量
        $envFile = $envName ? self::$rootPath . '.env.' . $envName : self::$rootPath . '.env';
        return $envFile;
    }

    /**
     * 获取应用根目录
     * @access protected
     * @return string
     */
    private static function getDefaultRootPath(): string
    {
        return dirname(realpath(dirname(__DIR__)) . DIRECTORY_SEPARATOR, 3) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string|null $name
     * @param null $default
     * @param string $envName 指定配置名称默认没有名称就是.env有名称就是 .env.名称
     * @return mixed
     */
    public static function get(string $name = null, $default = null, string $envName = '')
    {
        if (!in_array($envName, self::$envNames)) {
            self::init($envName);
        }
        return self::$env->get($name, $default);
    }

    public static function has(string $name, $envName = '')
    {
        if (!in_array($envName, self::$envNames)) {
            self::init($envName);
        }
        return self::$env->has($name);
    }


}