<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/order/bootstrap/css/normalize.css" rel="stylesheet">
    <link href="/order/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/order/bootstrap/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"><h1>点餐系统</h1></div>
        <div class="col-md-8"></div>
    </div>
    <div class="row">
        <div class="col-md-1" style="border: 1px solid #000000;">
            <div class="function">
                <ul>
                    <li class="function-li">订单管理</li>
                    <div class="function-box">
                        <div class="user-function">用户管理</div>
                        <div class="user-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/order/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="user-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <li class="function-caipu-li">菜谱管理</li>
                    <div class="function-caipu">
                        <div class="cai-function">菜系管理</div>
                        <div class="cai-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/order/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="cai-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="function-caipu">
                        <div class="cai-function">菜类管理</div>
                        <div class="cai-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/order/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="cai-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="function-caipu">
                        <div class="cai-function">菜品管理</div>
                        <div class="cai-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/order/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>/type/data" target="order" class="cai-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="function-caipu">
                        <div class="cai-function">套餐管理</div>
                        <div class="cai-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/order/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="cai-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <li>餐桌管理</li>
                    <li>厨房管理</li>
                    <li>财务管理</li>
                    <li class="function-u">用户管理</li>
                    <div class="function-user">
                        <div class="users-function">所有用户</div>
                        <div class="users-list">
                            <?php if(is_array($alluser)): foreach($alluser as $key=>$vo): ?><a href="/order/index.php/Index/oneuser/id/<?php echo ($vo["id"]); ?>" target="order" class="users-a"><?php echo ($vo["username"]); ?></a><?php endforeach; endif; ?>
                        </div>
                        <a href="/order/index.php/Index/adduser" target="order" class="users-a">添加用户</a>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border-top: 1px solid #000000;">
        <iframe name="order" src="/order/app/Home/View/index/user.html" frameborder="0" scrolling="no" id="order" width="100%" height="500" style="display: none;"></iframe>
        </div>
            <!--<div class="col-md-10" style="border: 1px solid #000000;">-->
                <!--<div class="function-content">-->
                    <!--<ul>-->
                        <!--<?php if(is_array($data)): foreach($data as $key=>$vo): ?>-->
                            <!--<li class="order-content">-->
                                <!--<div class="container-fluid">-->
                                    <!--<form class="form-horizontal">-->
                                        <!--<div class="form-group">-->
                                            <!--<label for="inputEmail3" class="col-sm-1 control-label">姓名</label>-->
                                            <!--<div class="col-sm-11">-->
                                                <!--<input type="text" class="form-control" id="inputEmail3" placeholder="姓名" value="<?php echo ($vo["dishesuser"]); ?>">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <!--<label for="inputPassword3" class="col-sm-1 control-label">菜名</label>-->
                                            <!--<div class="col-sm-11">-->
                                                <!--<input type="text" class="form-control" id="inputPassword4" placeholder="菜名" value="<?php echo ($vo["dishes"]); ?>">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <!--<label for="inputPassword3" class="col-sm-1 control-label">数量</label>-->
                                            <!--<div class="col-sm-11">-->
                                                <!--<input type="text" class="form-control" id="inputPassword5" placeholder="数量" value="<?php echo ($vo["number"]); ?>">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <!--<label for="inputPassword3" class="col-sm-1 control-label">单价</label>-->
                                            <!--<div class="col-sm-11">-->
                                                <!--<input type="text" class="form-control" id="inputPassword6" placeholder="单价" value="<?php echo ($vo["price"]); ?>">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <!--<div class="col-sm-offset-1 col-sm-10">-->
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</form>-->
                                <!--</div>-->
                            <!--</li>-->
                        <!--<?php endforeach; endif; ?>-->
                    <!--</ul>-->
                <!--</div>-->
            <!--</div>-->
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/order/bootstrap/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="/order/bootstrap/js/bootstrap.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".function-li").click(function () {
            var funcbox = $(".function-box"),
                list = funcbox.find(".user-list"),
                user = funcbox.find(".user-function");
            funcbox.toggle();
            user.toggle();
            if (user.css('display') == 'none') {
                list.hide();
            }
            user.click(function () {
                list.toggle();
            });
            list.click(function () {
                $("#order").show();
            });
        });
        $(".function-u").click(function () {
            var funcbox = $(".function-user"),
                list = funcbox.find(".users-list"),
                user = funcbox.find(".users-function");
            funcbox.toggle();
            user.toggle();
            if (user.css('display') == 'none') {
                list.hide();
            }
            user.click(function () {
                list.toggle();
            });
            list.click(function () {
                $("#order").show();
            });
            $(".users-a").click(function () {
                $("#order").show();
            });
        });
        $(".function-caipu-li").click(function () {
            var list = $(".function-caipu"),
                cai = $(".cai-function"),
                user = $(".cai-list");
            list.each(function (index) {
                if ((list.eq(index).find('.cai-function').css('display')) == 'block') {
                    user.hide();
                }
                list.eq(index).find(".cai-function").toggle();
                list.eq(index).find(".cai-function").click(function () {
                    user.eq(index).toggle();
                });
                list.eq(index).find(".cai-a").click(function () {
                    $("#order").show();
                });
            });
        });
    });
</script>
</body>
</html>
<SCRIPT Language=VBScript><!--

//--></SCRIPT>