<?php

namespace sky_com;

class ComEnvMain
{
    /**
     * 框架目录
     * @var string
     */
    protected $thinkPath = '';
    /**
     * 应用根目录
     * @var string
     */
    protected $rootPath = '';
    /**
     * @var SkEnv
     */
    private $env;

    /**
     * 架构方法
     * @access public
     */
    public function __construct(string $rootPath = '')
    {
        $this->thinkPath   = realpath(dirname(__DIR__)) . DIRECTORY_SEPARATOR;
        $this->rootPath    = $rootPath ? rtrim($rootPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : $this->getDefaultRootPath();
        $this->env = new SkEnv();

    }

    /**
     * 获取应用根目录
     * @access protected
     * @return string
     */
    protected function getDefaultRootPath(): string
    {
        return dirname($this->thinkPath, 4) . DIRECTORY_SEPARATOR;
    }

    /**
     * 加载环境变量定义
     * @access public
     * @param string $envName 环境标识
     * @return void
     */
    public function init(string $envName = ''): void
    {
        // 加载环境变量
        $envFile = $envName ? $this->rootPath . '.env.' . $envName : $this->rootPath . '.env';

        if (is_file($envFile)) {
            $this->env->load($envFile);
        }
    }


}