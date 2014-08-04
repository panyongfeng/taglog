<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>Taglog后台管理系统</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="Taglog后台管理系统"/>
	<link type="text/css" href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/css/docs.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
	<script src="__PUBLIC__/js/jquery-1.9.0.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/WdatePicker.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm.js" type="text/javascript"></script>
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap-ie6.css">
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/ie.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->
	<!--[if lt IE 9]>
	<link type="text/css" href="__PUBLIC__/css/jquery.ui.1.10.0.ie.css" rel="stylesheet"/>
	<![endif]-->	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="__PUBLIC__/js/respond.min.js"></script>
	<![endif]-->
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div style="line-height: 40px;padding-right: 5px;padding-top: 6px;" class="pull-left"><img src="__PUBLIC__/img/logomini.png"/></div>
			<a class="brand" href="<?php echo (__APP__); ?>" alt="<?php echo C('defaultinfo.description');?>">Taglog后台管理系统</a>
			<?php echo W("Navigation");?>
		</div> 
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h4>系统设置</h4>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>	
	<div class="tabbable">
		<div class="row">
		<form class="form-horizontal" action="<?php echo U('setting/smtp');?>" method="post">
			<table class="span6 table">
				<tbody>
					<tr>
						<th colspan="2">smtp基本配置信息&nbsp;&nbsp;(若不设置则无法使用密码找回功能)</th>
					</tr>
					<tr>
						<td class="tdleft">邮箱地址:</td>  
						<td>
							<input name="address" id="address" type="text" value="<?php echo ($smtp['MAIL_ADDRESS']); ?>"/> <span style="color:red;">*必填</span>
						</td>
					</tr>
					<tr>
						<td class="tdleft">smtp服务器地址:</td>  
						<td>
							<input value="<?php echo ($smtp['MAIL_SMTP']); ?>" id="smtp" name="smtp" type="text"> <span style="color:red;">*必填</span>
						</td>
					</tr><tr>
						<td class="tdleft">smtp服务器端口号：</td>  
						<td>
							<input value="<?php echo (($smtp['MAIL_PORT'])?($smtp['MAIL_PORT']):25); ?>" id="port" name="port" type="text"> <span style="color:red;">*必填</span>
						</td>
					</tr>
					<tr>
						<td class="tdleft">登录名:</td>  
						<td>
							<input value="<?php echo ($smtp['MAIL_LOGINNAME']); ?>" id="loginName" name="loginName" type="text"/> <span style="color:red;">*必填</span>
						</td>
					</tr>
					<tr>
						<td class="tdleft">密码:</td>  
						<td>
							<input value="<?php echo ($smtp['MAIL_PASSWORD']); ?>" id="password" name="password" type="password"> <span style="color:red;">*必填</span>
						</td>
					</tr>
					<tr>
						<td class="tdleft">测试邮箱:</td>  
						<td>
							<input name="test_email" id="test_email" type="text"/> &nbsp; <input class="btn btn-mini" id="test" name="submit" type="button" value="测试">
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input name="submit" class="btn btn-primary" type="submit" value="保存"/>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		</div>
	</div> <!-- End #main-content -->
</div>
<script type="text/javascript">	
	$('#test').click(
		function(){
			address = $('#address').val();
			smtp = $('#smtp').val();
			port = $('#port').val();
			name = $('#loginName').val();
			pw = $('#password').val();
			email = $('#test_email').val();
			if(address !='' & smtp !='' & port !='' & name!='' & pw!='' & email!=''){
				$.post('<?php echo U("setting/smtp");?>',
				{   address:address,
					smtp:smtp,
					port:port,
					loginName:name,
					password:pw,
					test_email:email},
				function(data){
					alert(data.info);
				},
				'json');
			} else {
				alert('请填写完整信息!');
			}
		}
	);
</script>

</body>
</html>