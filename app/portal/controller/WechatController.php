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

        $wechat = new \Gaoming13\WechatPhpSdk\Wechat(array(
            'appId' => 'wx3cf0f39249eb0e60',
            'token' => 	'easywechat',
            'encodingAESKey' =>	'f1c242f4f28f735d4687abb469072a29',
        ));

        // 获取微信消息
        $msg = $wechat->serve();

// 回复微信消息
        if ($msg->MsgType == 'text' && $msg->Content == '你好') {
            $wechat->reply("你也好！");
        } else {
            $wechat->reply("听不懂！");
        }
    }
}
