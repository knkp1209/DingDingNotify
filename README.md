# DingDingNotify

## 介绍

DingDingNotify 是 PHP 开发的钉钉群机器人通知

## 前置条件
1、创建一个钉钉群
2、添加一个自定义的群机器人，安全设置选择 加密

## 使用方法

```
$dingDingConfig = new Config();
$dingDingConfig->setWebhook('钉钉群机器人地址');
$dingDingConfig->setSecret('密钥');
$data = [
    'msgtype' => 'text',
    'text' => [
          'content' => "字段串内容",
        ],
    ];
(new Notify())->send($dingDingConfig, $data);
```

