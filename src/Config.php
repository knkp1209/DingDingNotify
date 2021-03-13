<?php
/**
 * Created by PhpStorm.
 * Email: 1203860880@qq.com
 * User: YangKNKP
 * Date: 2021/3/12
 * Time: 8:54 下午
 */
namespace Yangwenhang\DingDingNotify;

class Config
{

    private $secret = null;
    private $webhook = null;

    public function setSecret($value)
    {
        $this->secret = $value;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function setWebhook($value)
    {
        $this->webhook = $value;
    }

    public function getWebhook()
    {
        return $this->webhook;
    }



}