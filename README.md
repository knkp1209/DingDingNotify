# DingDingNotify

## 介绍

DingDingNotify 是 PHP 开发的钉钉群机器人通知

## 前置条件
1、创建一个钉钉群
2、添加一个自定义的群机器人，安全设置选择 加密

## 使用方法
$dingDingConfig = new Config();
$dingDingConfig->setWebhook('https://oapi.dingtalk.com/robot/send?access_token=a9fa2b9a809cad03d15822d63f135e5df2554c9e0691566f7fbcb960318c960b');
$dingDingConfig->setSecret('SEC20adb2a9c764ae7505a20a65f49c7b9189f4feb2da7596f47366959dda6f29a6');
$data = [
    'msgtype' => 'text',
    'text' => [
          'content' => "字段串内容",
        ],
    ];
(new Notify())->send($dingDingConfig, $data);

