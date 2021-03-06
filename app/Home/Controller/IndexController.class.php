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
                    $this->success('登录成功！请稍后', 'login', 1);
                    return false;
                } else if ($ret[0]['jurisdiction'] == "服务员") {
                    $this->success("登陆成功！请稍后", "waiter", 1);
                    $this->display("waiter");
                    return false;
                }
            } else {
                $this->error("用户名或密码错误，请重新填写", "index", 30);
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
        $ni = "nihao";
        $this->assign('alluser',$alluser)->assign("nihao",$ni);
        $this->display('index');
    }
    public function orderManagement() {
//        $state = I("get.state");
        $model = M('order');
        $userdata = $model->where("state=0")->select();
        $userdataid = "userdataid";
        if ($userdata) {
            $this->assign('userdata', $userdata)->assign("userdataid", $userdataid);
        }
//        if (empty($_POST['state'])) {
//            $model = M('order');
//            $id = I('get.id');
//            $userdata = $model->where("id=$id")->select();
//            $userdataid = "userdataid";
//            $this->assign('userdata', $userdata)->assign("userdataid", $userdataid);
//        } else {
//            $id = I("post.id");
//            $data["state"] = I("post.state");
//            $model = M("order");
//            $ret = $model->where("id='$id'")->data($data)->save();
//            if ($ret) {
//                $this->success("修改成功！","orderManagement");
//            }
//        }
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
            $data["jurisdiction"] = I("post.jurisdiction");
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
    // 订单管理
    public function administrationorder() {
        $model = M('order');
        $order = M("order");
        $menu = M("menu");
        $dishes = $order->select();
        foreach ($dishes as $key=>$value) {
            $data[] = explode("|",$value["dishes"]);
        }
        foreach ($data as $value) {
            foreach ($value as $value) {
                $array[] = explode(":",$value);
            }
        }
//        echo "<pre>";
//        print_r($array);
//        echo "</pre>";
        $page = $this->GetPage();
        $state = I("get.state");
        $userdataid = "userdataid";
        $count = $model->where("state='$state'")->count();
        $pagedata = 1;
        $pagenum = ceil($count/$pagedata);
        $pagedata = $model->where("state='$state'")->page($page,$pagedata)->select();
        foreach ($array as $value) {
//            echo "<pre>";
//            print_r($value);
//            echo "</pre>";
//            foreach ( $value as $value ) {
//                echo $value;
                $userorderingdata = $menu->where("id=$value[0]")->select();
                $dishes = $userorderingdata[0]["dishes"];
                $pagedata[0]["dishes"] = $dishes;
                $pagedata[0]["number"] = $value[1];
//            }
        }
//        echo "<pre>";
//        print_r($pagedata);
//        echo "</pre>";
//        exit();
        $this->assign("pagedata",$pagedata)->assign("userdataid",$userdataid)->assign("state",$state)->assign("total",$pagenum);
        $this->PageList($page,$pagenum,$state);
        $this->display("user");
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
    public function cai() {
        $model = M('menu');
        $caidata = $model->select();
        $dataid = "dataid";
        $this->assign('caidata',$caidata)->assign("dataid",$dataid);
        $this->display('user');
    }
    // 添加菜品
    public function adddishes() {
        if (!empty($_POST)) {
            $model = M("menu");
            $data["dishes"] = I("post.dishes");
            $data["package"] = 0;
            $data["price"] = I("post.price");
            $ret = $model->data($data)->add();
            if ($ret) {
                $this->success("添加成功！请稍后","/order/index.php/Index/cai",1);
            }
        }
        $this->display("adddishes");
    }
    // 添加套餐
    public function addpackage() {
        if (!empty($_POST)) {
            $model = M("menu");
            $data["dishes"] = I("post.dishes");
            $data["price"] = I("post.price");
            $data["package"] = 1;
            $data["packagename"] = I("post.packagename");
            $ret = $model->data($data)->add();
            if ($ret) {
                $this->success("添加成功！","cai",1);
            }
        }
        $this->display("addpackage");
    }
    // 套餐管理
    public function package() {
        $model = M("menu");
        $package = $model->where("package=1")->select();
        $packageid = "packageid";
        $this->assign("package",$package)->assign("packageid",$packageid);
        $this->display("user");
    }
    // 传菜
    public function dish() {

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
        $model = M("order");
        $id = I("get.id");
        if (is_numeric($id)) {
            $data["state"] = 1;
            $ret = $model->where("id=$id")->data($data)->save();
            if ($ret) {
                $this->success("修改成功！", "/order/index.php/Index/orderManagement");
            }
        }
    }
    //获取地址
    public function GetUrl() {
        $url = $_SERVER['REQUEST_URI'];
        $par = parse_url($url);
        if (isset($par['query'])) {
            parse_str($par['query'], $query);
            unset($query['page']);
            $url = $par['path'].'?'.http_build_query($query);
        }
        return $url;
    }
    // 获取页码
    public function GetPage() {
        if (empty(I("get.page"))) {
            $page = 1;
        } else {
            $page = I("get.page");
        }
        return $page;
    }
    // 页码列表
    private function PageList($page,$pagenum,$state) {
        $start = 1;
        $showpage = 5;
        $pageoffset = ($showpage-1)/2;
        $pagelist = "";
        $end = $pagenum;
        if ($pagenum > $showpage) {
            if ($page > $pageoffset + 1) {
                $pagelist .= "<li><a>...</a></li>";
            }
            if ($page > $pageoffset) {
                $start = $page - $pageoffset;
                $end = $pagenum > $pageoffset + $page ? $page + $pageoffset : $pagenum;
            } else {
                $start = 1;
                $end = $pagenum > $showpage ? $showpage : $pagenum;
            }
            if ($page + $pageoffset > $pagenum) {
                $start = $start - ($page + $pageoffset - $end);
            }
        }
        for ($i=$start;$i<=$end;$i++) {
            if ($page == $i) {
                $pagelist .= "<li class='active'><a href='/order/index.php/Index/administrationorder/state/$state/page/$i'>$i</a></li>";
                continue;
            }
            $pagelist .= "<li><a href='/order/index.php/Index/administrationorder/state/$state/page/$i'>$i</a></li>";
        }
        if ($pagenum > $showpage && $pagenum > $page + $pageoffset) {
            $pagelist .= "<li><a>...</a></li>";
        }
        $this->assign("pagelist",$pagelist);
    }
}