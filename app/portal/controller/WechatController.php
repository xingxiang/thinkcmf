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
          'app_id'    => 'wx3cf0f39249eb0e60',
          'secret'    => 'f1c242f4f28f735d4687abb469072a29',
          'token'     => 'easywechat',
          'log' => [
              'level' => 'debug',
              'file'  => '/tmp/easywechat.log',
          ]
      ];

      $app = new Application($options);

      $server = $app->server;
      $user = $app->user;

      $server->setMessageHandler(function($message) use ($user) {
          $fromUser = $user->get($message->FromUserName);

          return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
      });

      $server->serve()->send();
    }
}
