<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;

class WechatController extends HomeBaseController
{
    public function index()
    {


        $options = [
            'debug'     => true,
            'app_id'    => 'wxa838e2848c6675ee',
            'secret'    => '3a81809172f0ed57ec64bbfab4ac9756',
            'token'     => 'easywechat',
            'log' => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log',
            ]
        ];

        $app = new \EasyWeChat\Foundation\Application($options);

        $server = $app->server;
        $user = $app->user;

        $server->setMessageHandler(function($message) use ($user) {
            $fromUser = $user->get($message->FromUserName);

            return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
        });

        $server->serve()->send();
    }
}
