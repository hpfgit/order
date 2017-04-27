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
        <div class="col-md-10" style="border: 1px solid #000000;">
            <div class="function-content">
                <ul>
                    <?php if(is_array($userdata)): foreach($userdata as $key=>$vo): ?><li class="order-content">
                            <div class="container-fluid">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">姓名</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="姓名" value="<?php echo ($vo["dishesuser"]); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-1 control-label">菜名</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" id="inputPassword4" placeholder="菜名" value="<?php echo ($vo["dishes"]); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-1 control-label">数量</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" id="inputPassword5" placeholder="数量" value="<?php echo ($vo["number"]); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-1 control-label">单价</label>
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
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
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
            func.eq(index).find('.user-function').click(function () {
                func.eq(index).find('.user-list').show();
            });
        });
    });

</script>
</body>
</html>
<SCRIPT Language=VBScript><!--

//--></SCRIPT>