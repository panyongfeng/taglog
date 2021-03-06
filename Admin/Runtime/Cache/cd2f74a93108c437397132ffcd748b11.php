<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($message)): ?>操作成功<?php else: ?>操作失败<?php endif; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="用户宝">

     <!-- Le styles -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 400px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	  .wukong {
	    margin-top:30px;
		padding-top:10px;
		border-top:1px solid #e5e5e5;		
	  }
    </style>
    
  </head>
  <body>
    <div class="container">
      <form action="" method="post" class="form-signin">
		<fieldset>
			<legend><h3><?php if(isset($message)): ?>操作成功<?php else: ?>操作失败<?php endif; ?></h3></legend>		
			
			<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
			<?php if(empty($alert)): if(isset($message)): ?><div class="alert alert-success"><?php echo($message); ?></div>
			<?php else: ?>
			<div class="alert alert-error"><?php echo($error); ?></div><?php endif; endif; ?>
			<p class="jump">
			页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></p> 
			<div class="row-fluid wukong">
				<div class="row-fluid wukong">
					<div class="span3"><img src="__PUBLIC__/img/logo_img.png" width="140" height="50" alt="<?php echo C('defaultinfo.name');?>"/></div>
					<div class="span9">
						<p>沪ICP备11046618号-1　Copyright©2014</p>
						<p><small>
							<a href="http://www.yhb360.com/index.php" target="_blank">用户宝官网</a>
							&nbsp; <a href="http://www.yhb360.com/index.php" target="_blank">官网首页</a>
						</small></p>
					</div>
				</div>
			</div>
      </form>
    </div> <!-- /container -->
	<script type="text/javascript">
	(function(){
	var wait = document.getElementById('wait'),href = document.getElementById('href').href;
	var interval = setInterval(function(){
		var time = --wait.innerHTML;
		if(time == 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
	})();
	</script>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo ($APP_PATH); ?>/resources/assets/js/jquery.js"></script>
    <script src="<?php echo ($APP_PATH); ?>/resources/assets/js/bootstrap.min.js"></script>
  </body>
</html>