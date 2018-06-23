<?php

namespace app\v1\controller;

use think\Controller;

/**
 * User 模块
 * 
 * 该模块主要用于用户的信息获取
 */
class User extends Controller
{
  public function index() {
    $userid = input("get.userid");
  }
}
