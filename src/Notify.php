<?php
/**
 * Created by PhpStorm.
 * Email: 1203860880@qq.com
 * User: YangKNKP
 * Date: 2021/3/12
 * Time: 09:05 下午
 */
namespace Yangwenhang\DingDingNotify;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Notify
{
    /**
     * @author Yang wen hang <1203860880@qq.com>
     * @param Config $config
     * @param $data
     * @return bool
     */
    public function send(Config $config, $data)
    {
        $config->getSecret();
        $timestamp = time() . mt_rand(100, 999);
        $secret = $config->getSecret();
        $secret_t = $timestamp . "\n" . $secret;
        $sign = urlencode(base64_encode(hash_hmac(
                    'sha256',
                    utf8_encode($secret_t),
                    utf8_encode($secret),
                    true
                )
            )
        );
        $url = $config->getWebhook() . '&timestamp=' . $timestamp . '&sign=' . $sign;
        $client = new Client();
        try {
            $data = $client->post($url, [
                'body' => json_encode($data, JSON_UNESCAPED_UNICODE),
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);
            $response = json_decode($data->getBody(), true);
            if (isset($response['errcode']) && $response['errcode'] == 0) {
                return true;
            } else {
                return false;
            }
        } catch (GuzzleException $e) {
            return false;
        }
    }
}