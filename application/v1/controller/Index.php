<?php
namespace app\v1\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    protected static $default_url_index = [
        'base_url'   => 'https://www.hecanhelp.com',
        'user_url'   => 'https://api.wecanhelp.com/v1.0/user',
        'school_url' => 'https://api.wecanhelp.com/v1.0/school',
    ];
    public function index() {
        return json(self::$default_url_index);
    }
    public function test_request_ip () {
        $request = Request::instance();
        return json($request->ip());
    }
    public function get_wsf_info () {
        return json(["wsf"=>"wsf is an sb."]);
    }
    public function get_single_info () {
        return json(["single"=>"single, too."]);
    }
}
