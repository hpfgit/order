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
        <div class="col-md-10">
            <div class="function-content">
                <ul>
                    <?php if($userdataid == 'userdataid'): if(is_array($userdata)): foreach($userdata as $key=>$vo): ?><li class="order-content">
                                <div class="container-fluid">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">姓名</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="姓名" value="<?php echo ($vo["dishesuser"]); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword4" class="col-sm-1 control-label">菜名</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="inputPassword4" placeholder="菜名" value="<?php echo ($vo["dishes"]); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword5" class="col-sm-1 control-label">数量</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="inputPassword5" placeholder="数量" value="<?php echo ($vo["number"]); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-sm-1 control-label">单价</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="inputPassword6" placeholder="单价" value="<?php echo ($vo["price"]); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-1 col-sm-10">
                                                <button type="submit" class="btn btn-default">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li><?php endforeach; endif; endif; ?>
                    <?php if($oneuserid == 'oneuserid'): if(is_array($oneuser)): foreach($oneuser as $key=>$vo): ?><li class="order-content">
                                <div class="container-fluid">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">用户名</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" value="<?php echo ($vo["username"]); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword4" class="col-sm-1 control-label">密码</label>
                                            <div class="col-sm-11">
                                                <input type="password" class="form-control" id="inputPassword4" placeholder="密码" value="<?php echo ($vo["userpass"]); ?>">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-1 col-sm-10">
                                                <button type="submit" class="btn btn-default">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li><?php endforeach; endif; endif; ?>
                    <?php if($adduserid == 'adduserid'): ?><li class="order-content">
                            <div class="container-fluid">
                                <form class="form-horizontal" method="post" action="/order/index.php/Index/adduser">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">用户名</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="用户名">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-1 control-label">密码</label>
                                        <div class="col-sm-11">
                                            <input type="password" class="form-control" id="inputPassword4" name="userpass" placeholder="密码">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-10">
                                            <button type="submit" class="btn btn-default">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li><?php endif; ?>
                    <?php if($onevieworderid == 'onevieworderid'): ?><table class="table table-bordered table-hover">
                            <?php if(is_array($onevieworder)): foreach($onevieworder as $key=>$vo): ?><tr>
                                    <td>菜名：<?php echo ($vo["username"]); ?></td>
                                    <td>单价：<?php echo ($vo["dishes"]); ?></td>
                                    <td>数量：<?php echo ($vo["num"]); ?></td>
                                    <td>总价：<?php echo ($vo["total"]); ?></td>
                                </tr><?php endforeach; endif; ?>
                        </table><?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/order/bootstrap/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="/order/bootstrap/js/bootstrap.min.js"></script>-->
</body>
</html>
<SCRIPT Language=VBScript><!--

//--></SCRIPT>