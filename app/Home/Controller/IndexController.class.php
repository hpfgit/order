<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        $model = M('user');
        $username = 'hao';
        $userpass = 'hao';
        $ret = $model->where("username='$username' AND userpass='$userpass'")->select();
        if ($ret) {
            $this->success('登录成功！请稍后','./index.php/Index/login');
        }
        $this->display('login');
    }
    public function login() {
        $model = M('order');
        $data = $model->select();
        $this->assign('data',$data);
        $this->display('index');
    }
    public function orderManagement() {
        $model = M('order');
        $id = I('get.id');
        $userdata = $model->where("id=$id")->select();
        $this->assign('userdata',$userdata);
        $this->display('user');
    }
    public function is_login() {
        $username = I('post.username','string');
        $password = I('post.password','string');
        $model = M('userinfo');
        $ret = $model->where("username='$username' AND userpass='$password'")->select();
        if ($ret) {
            if (!$_COOKIE['uniqid'] && $ret[0]['userstatus']) {
                $uniqid = md5(uniqid(mt_rand(),0));
                setcookie('uniqid',$uniqid);
            }
            return true;
        } else {
            return false;
        }
    }
}