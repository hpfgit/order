<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/demo/bootstrap/css/normalize.css" rel="stylesheet">
    <link href="/demo/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/demo/bootstrap/css/style.css" rel="stylesheet">

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
                    <li>
                        <div class="function-order">订单管理</div>
                        <div class="user-function">用户管理</div>
                        <div class="user-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/demo/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="user-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </li>
                    <li>
                        <div class="function-order">菜谱管理</div>
                        <div class="user-function">菜系管理</div>
                        <div class="user-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/demo/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="user-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                        <div class="user-function">菜类管理</div>
                        <div class="user-list">
                            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><a href="/demo/index.php/Index/orderManagement/id/<?php echo ($vo["id"]); ?>" target="order" class="user-a"><?php echo ($vo["dishesuser"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </li>
                    <li>餐桌管理</li>
                    <li>厨房管理</li>
                    <li>财务管理</li>
                    <li>用户管理</li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border: 1px solid #000000;">
        <iframe name="order" src="/demo/app/Home/View/index/user.html" frameborder="0" scrolling="no" id="order" width="100%" height="300" style="display: none;"></iframe>
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
<script src="/demo/bootstrap/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="/demo/bootstrap/js/bootstrap.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".function ul li").click(function () {
            var index = $(this).index();
            var func = $(".function ul li");
            func.eq(index).find('.user-function').show();
            var size = func.eq(index).find(".user-function").length;
            if (size == 1) {
                func.eq(index).find('.user-function').click(function () {
                    func.eq(index).find('.user-list').show();
                });
            } else {
                var user = func.eq(index).find(".user-function");
                user.each(function (num) {
                    user.eq(num).click(function () {
                        var list = func.eq(num).find(".user-list");
                        console.log(num);
                        list.eq(num).show();
                    });
                });
            }
            func.eq(index).find('.user-list').find(".user-a").click(function () {
                $("#order").show();
            });
        });
    });

</script>
</body>
</html>
<SCRIPT Language=VBScript><!--

//--></SCRIPT>