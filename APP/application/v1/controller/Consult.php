<?php
namespace app\v1\controller;

use think\Controller;
use app\v1\Logic\ConsultingCenter;

/**
 * consult 模块
 * 
 * 这个模块主要是应用于平台的核心功能（咨询）
 * 
 * 主要通过tp5框架Composer引用workerman
 */
class Consult extends Controller
{
  public function index () {
    $consult = new ConsultingCenter();
    return json($consult->index());
  }
}
?>