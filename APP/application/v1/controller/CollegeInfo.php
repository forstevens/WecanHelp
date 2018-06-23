<?php

namespace app\v1\controller;

use think\Controller;
use app\v1\model\colleges;
use app\v1\model\provinces;

class collegeInfo extends Controller
{
  public function index () {

  }

  // 分省份院校简介（图）
  public function brief () {
    $province = input("get.province");
    $cos = colleges::where("college_province",$province)->select();
    return json_encode($cos);
  }
  
  // 已经存在院校资料的省份清单
  public function provinces () {
    $p = new provinces();
    $provinces = $p->select();
    return json_encode($provinces);
  }

  // 院校详情
  public function detail () {
    $college = input("get.college");
    $c = new colleges();
    $co = $c->where("name_brief",$college)
          ->field('id,college_name,college_brief_education,college_brief_life,college_brief_policy,college_background_url')
          ->select();
    return json_encode($co);
  }
}