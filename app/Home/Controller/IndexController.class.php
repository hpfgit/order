<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        if (!empty($_POST)) {
            $model = M('user');
            $username = $_POST['username'];
            $userpass = $_POST['userpass'];
            $ret = $model->where("username='$username' AND userpass='$userpass'")->select();
            if ($ret) {
                if ($ret[0]['jurisdiction'] == "管理员") {
                    $this->success('登录成功！请稍后','login',1);
                } else if ($ret[0]['jurisdiction'] == "服务员") {
                    $this->success("登陆成功！请稍后","waiter",1);
                    $this->display("waiter");
                    return false;
                }
            } else {
                $this->error("用户名或密码错误，请重新填写","index",30);
            }
        }
        $this->display('login');
    }
    public function login() {
        $model = M('order');
        $data = $model->select();
        $this->assign('data',$data);
        $model = M('user');
        $alluser = $model->select();
        $this->assign('alluser',$alluser);
        $this->display('index');
    }
    public function orderManagement() {
        $model = M('order');
        $id = I('get.id');
        $userdata = $model->where("id=$id")->select();
        $userdataid = "userdataid";
        $this->assign('userdata',$userdata)->assign("userdataid",$userdataid);
        $this->display('user');
    }
    public function order() {
        $model = M('menu');
        $menudata = $model->select();
        $this->assign('menudata',$menudata);
        $this->display('ordering');
    }
    // 添加用户
    public function adduser() {
        if (!empty($_POST)) {
            $model = M('user');
            $data['username'] = I('post.username');
            $data['userpass'] = I('post.userpass');
            $ret = $model->data($data)->add();
            if ($ret) {
                $this->success('添加成功','login');
            }
        }
        $adduserid = "adduserid";
        $this->assign('adduserid',$adduserid);
        $this->display('user');
    }
    public function oneuser() {
        $model = M('user');
        $id = I('get.id');
        $oneuser = $model->where("id=$id")->select();
        $oneuserid = "oneuserid";
        $this->assign('oneuser',$oneuser)->assign("oneuserid",$oneuserid);
        $this->display('user');
    }
    // 查询订单
    public function queryorder() {
        $model = M('userordering');
        if (empty($_POST)) {
            $username = $_POST['username'];
            $queryorder = $model->where("username='$username'")->select();
            $queryorderid = "queryorderid";
            $this->assign('queryordering',$queryorder)->assign('queryorderid',$queryorderid);
        }
        $this->display('queryorder');
    }
    public function ownorder() {
        $model = M("userordering");
        $currentid =I("get.id");
        $current = $model->where("id=$id")->select();
        $this->assign("current",$current);
        $this->display('');
    }
    // 服务员
    public function waiter() {
        $model = M("userordering");
        $vieworder = $model->select();
        $this->assign("vieworder",$vieworder);
        $this->display("waiter");
    }
    // 查看订单
    public function vieworder() {
        $model = M("userordering");
        $id = I("get.id");
        $onevieworder = $model->where("id=$id")->select();
        $onevieworderid = "onevieworderid";
        $this->assign("onevieworder",$onevieworder)->assign("onevieworderid",$onevieworderid);
        $this->display("user");
    }
    // 所有的菜
    public function cai(){
        $model = M('caipu');
        $caidata = $model->select();
        $dataid = "dataid";
        $this->assign('caidata',$caidata)->assign("dataid",$dataid);
        $this->display('user');
    }
    // 加菜
    public function adddish() {
        $model = M("userordering");
    }
    // 退菜
    public function retreatfood() {

    }
    // 结账
    public function checkout() {

    }
    // 修改状态
    public function modifystate() {
        $state = $_POST["state"];
        $model = M("userordering");
        $data["state"] = $state;
        $ret = $model->data($data)->save();
        if ($ret) {
            $this->success("修改成功！","");
        }
    }
}