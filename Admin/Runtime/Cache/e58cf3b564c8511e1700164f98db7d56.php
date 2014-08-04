<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>用户宝后台管理系统</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="用户宝后台管理系统"/>
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
			<a class="brand" href="<?php echo (__APP__); ?>" alt="<?php echo C('defaultinfo.description');?>">后台管理系统</a>
			<?php echo W("Navigation");?>
		</div> 
	</div>
</div>
<div class="container">
	<!-- Docs nav ================================================== -->
	<div class="page-header">
		<h4>商家列表</h4>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<p class="view"><b>视图：</b>
	<img src=" __PUBLIC__/img/by_owner.png"/>  <a href="<?php echo U('member/index');?>" <?php if($_GET['by']== null): ?>class="active"<?php endif; ?>>全部</a>  | 
	<a href="<?php echo U('member/index','by=today');?>" <?php if($_GET['by']== 'today'): ?>class="active"<?php endif; ?>>今日新增</a> | 
	<a href="<?php echo U('member/index','by=week');?>" <?php if($_GET['by']== 'week'): ?>class="active"<?php endif; ?>>本周新增</a> | 
	<a href="<?php echo U('member/index','by=month');?>" <?php if($_GET['by']== 'month'): ?>class="active"<?php endif; ?>>本月新增</a> |
	<a href="<?php echo U('member/index','by=disable');?>" <?php if($_GET['by']== 'disable'): ?>class="active"<?php endif; ?>>停用用户</a>
	</p>
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
					<ul class="nav pull-left">
						<li class="pull-left">
							<select style="width:auto" name="field" id="field" onchange="changeCondition()">
								<option class="word" value="email">邮箱</option>
								<option class="word" value="short_name">公司简称</option>
								<option class="date" value="reg_time">注册时间</option>
								<option class="date" value="last_login_date">最后登录时间</option>
							</select>&nbsp;&nbsp;
						</li>
						<li id="conditionContent" class="pull-left">
						<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">					
								<option value="contains">包含</option>
								<option value="is">是</option>
								<option value="start_with">开始字符</option>
								<option value="end_with">结束字符</option>
								<option value="is_empty">为空</option>
							</select>&nbsp;&nbsp;
						</li>
						<li id="searchContent" class="pull-left">
							<input id="search" type="text" class="input-medium search-query" value="<?php echo ($_GET['search']); ?>" name="search"/>&nbsp;&nbsp;
						</li>
						<li class="pull-left">
							<input type="hidden" name="m" value="member"/>
							<?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
							<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  搜索</button>
						</li>
					</ul>
					</form>
				</li>
			</ul>
		</div>
		<div class="span12">
			<form id="form1" method="post">
				<table class="table table-hover table-striped"> 
					
					<thead> 
						<tr>
							<th>邮箱</th>
							<th>公司简称</th>
							<th>注册ip</th>
							<th>
								<a title="升序" href="<?php echo U('member/index','order=rt_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'rt_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								注册时间
								<a title="降序" href="<?php echo U('member/index','order=rt_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'rt_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<th>
								<a title="升序" href="<?php echo U('member/index','order=lt_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'lt_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								最后一次登录时间 
								<a title="降序" href="<?php echo U('member/index','order=lt_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'lt_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<th>操作</th>
						</tr>
					</thead>
					<tfoot>
						<tr><td colspan="7"><?php echo ($page); ?></td></tr>
					</tfoot>
					<tbody>
						<?php if($memberlist == null): ?><tr><td colspan="6">----暂无数据！----</td></tr>
						<?php else: ?>
							<?php if(is_array($memberlist)): $i = 0; $__LIST__ = $memberlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo["email"]); ?></td>
									<td><?php echo ($vo["short_name"]); ?></td>
									<td><?php echo ($vo["reg_ip"]); ?></td>
									<td><?php if($vo['reg_time'] > 0): echo (date("Y-m-d H:i",$vo["reg_time"])); endif; ?></td>
									<td><?php if($vo['last_login_time'] > 0): echo (date("Y-m-d H:i",$vo["last_login_time"])); endif; ?></td>
									<td> 
										<a href="javascript:void(0)" class="member_info" rel="<?php echo ($vo["member_id"]); ?>">查看/修改</a> &nbsp;
										<a target="_blank" href="<?php echo U('member/helplogin','member_id='.$vo['member_id']);?>">模拟登陆</a> &nbsp;
										<?php if($vo['status'] != 2): ?><a id="disable<?php echo ($vo['member_id']); ?>" class="disable" href="javascript:void(0)" rel="<?php echo ($vo['member_id']); ?>">停用</a>
										<?php else: ?>
											<a id="disable<?php echo ($vo['member_id']); ?>" class="disable" href="javascript:void(0)" rel="<?php echo ($vo['member_id']); ?>">启用</a><?php endif; ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
					
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="商家信息">loading...</div>
<script type="text/javascript">
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	maxHeight: 800,
	position: ["center",100]
});
$(function(){
	<?php if($_GET['field']!= null): ?>$("#field option[value='<?php echo ($_GET['field']); ?>']").prop("selected", true);changeCondition();
		$("#condition option[value='<?php echo ($_GET['condition']); ?>']").prop("selected", true);changeSearch();
		$("#search").prop('value', '<?php echo ($_GET['search']); ?>');<?php endif; ?>
	$(".disable").click(
		function(){
			var member_id = $(this).attr('rel');
			$.get('<?php echo U("member/disablemember");?>' + '&member_id=' +member_id,function(data){
				if (data.status == '1') {
					$("#disable"+member_id).html('<font color="red">停用</font>');
				} else if (data.status == '2') {
					$("#disable"+member_id).html('<font color="red">启用</font>');
				} else {
					alert(data.info);
				}
			});
		}
	);
	$(".member_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("member/dialoginfo","act=edit&id=");?>'+$role_id);
	});
});
</script>

</body>
</html>