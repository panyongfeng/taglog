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
		<h4>视频列表</h4>
	</div>
	<ul class="nav nav-tabs">
		<li <?php if(!$_GET['content']): ?>class="active"<?php endif; ?>><a  href="<?php echo U('video/index');?>"><img src="__PUBLIC__/img/customer_icon.png"/>&nbsp; 所有数据</a></li>
		<li <?php if($_GET['content'] == 'free' ): ?>class="active"<?php endif; ?>><a  href="<?php echo U('video/index','content=free');?>"><img src="__PUBLIC__/img/customer_source_icon.png"/>&nbsp; 疑为垃圾数据</a></li>
	</ul>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<a id="delete_btn" class="btn" style="margin-right: 5px;"><i class="icon-remove"></i>删除</a>
				</li>
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
					<ul class="nav pull-left">
						<li class="pull-left">
							<select style="width:auto" name="field" id="field" onchange="changeCondition()">
								<option class="word" value="vid">vid</option>
								<option class="date" value="update_time">更新时间</option>
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
							<input type="hidden" name="m" value="video"/>
							<?php if($Think.get.by): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
							<?php if($Think.get.content): ?><input type="hidden" name="content" value="<?php echo ($_GET['content']); ?>"/><?php endif; ?>
							<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  搜索</button> &nbsp; &nbsp;
						</li>
						
						<li class="pull-left">
							<a class="btn" id="update_data" href="javascript:void(0)"><i class="icon-repeat"></i>  检查平台垃圾视频</a>
						</li>
					</ul>
					</form>
				</li>
			</ul>
		</div>
		<div class="span12">
			<form id="form1" action="<?php echo U('video/delete');?>" method="post">
				<table class="table table-hover table-striped"> 
					<thead> 
						<tr>
							<th width="5%"><input type="checkbox" id="check_all"/></th>
							<th width="15%">视频id</th>
							<th width="15%">状态</th>
							<th width="10%">
								<a title="升序" href="<?php echo U('video/index','order=ut_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'ut_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								更新时间
								<a title="降序" href="<?php echo U('video/index','order=ut_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'ut_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<th width="10%">
								视频接口回调时间
							</th>
							<?php if($_GET['content'] != 'free'): ?><th width="15%">
								说明书
							</th><?php endif; ?>
							<th width="10%">
								上传人
							</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tfoot>
						<tr><?php if(!$_GET['content']): ?><td colspan="9"><?php else: ?><td colspan="8"><?php endif; ?>
							<span style="background-color: #f2dede;width: 63px;height: 21px;display: inline-block;"></span> 保利威视没有系统有 &nbsp; <span style="background-color: #faf2cc;width: 63px;height: 21px;display: inline-block;"></span>保利威视有系统没有</tr>
						<tr><?php if(!$_GET['content']): ?><td colspan="9"><?php echo ($page); ?></td><?php else: ?><td colspan="8"><?php echo ($page); ?></td><?php endif; ?></tr>
						
					</tfoot>
					<tbody>
						<?php if($videolist == null): ?><tr>
								<?php if(!$_GET['content']): ?><td colspan="9">----暂无数据！----</td>
								<?php else: ?>
									<td colspan="8">----暂无数据！----</td><?php endif; ?>
							</tr>
						<?php else: ?>
							<?php if(is_array($videolist)): $i = 0; $__LIST__ = $videolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- in_polyv=1 系统有保利威视有 in_polyv=0保利威视没有系统有 is_updated保利威视有系统没有  -->
								<tr <?php if($_GET['content'] == 'free'): if($vo['in_polyv'] == 0): ?>class="error"
									<?php elseif($vo['is_updated'] == 1): ?>class="warning"<?php endif; endif; ?>>
									<td><input name="video_id[]" class="check_list" type="checkbox" value="<?php echo ($vo["vid"]); ?>"/></td>
									<td><?php echo ($vo["vid"]); ?></td>
									<td><?php if($vo['status'] == 1): ?>审核通过<?php elseif($vo['status'] == 2): ?>审核没有通过<?php elseif($vo['status'] == 3): ?>已删除<?php else: ?>未审核<?php endif; ?></td>
									<td><?php if($vo['update_time'] > 0): echo (date("Y-m-d H:i",$vo["update_time"])); endif; ?></td>
									<td>
									<?php if($vo['call_type_time'] > 0): echo (date("Y-m-d H:i",$vo["call_type_time"])); endif; ?></td>
									<?php if($_GET['content'] != 'free'): ?><td width="15%">
											<?php if(!empty($vo['product'])): ?><a href=" prd/<?php echo ($vo["product_id"]); ?>" title="<?php echo ($vo["product"]["name"]); ?>" target="_blank"><?php echo (msubstr($vo["product"]["name"],0,19)); ?></a><?php else: ?>暂无信息<?php endif; ?>
										</td><?php endif; ?>
									<td>
										<?php if(!empty($vo['member'])): ?><a href="javascript:void(0)" class="member_info" rel="<?php echo ($vo["member"]["member_id"]); ?>"><?php echo (($vo["member"]["short_name"])?($vo["member"]["short_name"]):$vo['member']['email']); ?></a>
										<?php else: ?>暂无信息<?php endif; ?>
									</td>
									<td>
										<a target="_blank" class="showvideo" rel="<?php echo ($vo['vid']); ?>" href="javascript:void(0)">查看</a>
										<a target="_blank" class="deletevideo" rel="<?php echo ($vo['vid']); ?>" href="javascript:void(0)">删除</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
					
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="商家信息">loading...</div>
<div class="hide" id="dialog-delete-info" title="视频删除">
	<p id="delete_info"></p>
</div>
<div class="hide" id="dialog-update-info" title="垃圾视频检查">
	<p id="update_info"></p>
</div>
<div class="hide" id="dialog-video-info" title="查看视频">
	<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="500" width="620" id="polyvplayer<?php echo ($file["vid"]); ?>"><PARAM id="video_src" NAME=movie VALUE="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf"><param name="allowscriptaccess" value="always"><param name="wmode" value="opaque"><param name="allowFullScreen" value="true" /><EMBED id="video_player" src="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf" width="620" height="500" TYPE="application/x-shockwave-flash" allowscriptaccess="always" wmode="opaque" name="polyvplayer<?php echo ($file["vid"]); ?>" allowFullScreen="true" /></EMBED></OBJECT>
</div>
<script type="text/javascript">
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	maxHeight: 800,
	position: ["center",100]
});
$("#dialog-delete-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	maxHeight: 600,
	position: ["center",100],
	buttons: {
		"Ok": function () {
			$(this).dialog("close");
		}
	}
});
$("#dialog-update-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	maxHeight: 600,
	position: ["center",100],
	buttons: {
		"Ok": function () {
			$(this).dialog("close");
			location.reload();
		}
	}
});
$("#dialog-video-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	height: 600,
	position: ["center",100]
});
$(function(){
<?php if($_GET['field']!= null): ?>$("#field option[value='<?php echo ($_GET['field']); ?>']").prop("selected", true);changeCondition();
	$("#condition option[value='<?php echo ($_GET['condition']); ?>']").prop("selected", true);changeSearch();
	$("#search").prop('value', '<?php echo ($_GET['search']); ?>');<?php endif; ?>
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	
	$("#delete_btn").click(function(){
		
		var id_array = new Array();
		$("input[class='check_list']:checked").each(function(){  
			id_array.push($(this).val());
		});
		if(id_array.length == 0){
			alert('请选择要删除的视频！');
		}else{
			$("#dialog-delete-info").dialog('open');
			$('#delete_info').nextAll().remove();
			for(var key in id_array){
				$.get('<?php echo U("video/delete");?>' + '&vid=' +id_array[key],function(data){
					if (data.status == '1') {
						$("input[value="+data.data+"]").parent().parent().remove();
						$('#delete_info').after('<h4 style="color:green;">视频:'+data.data+'--删除成功！</h4>');
					} else {
						$('#delete_info').after('<h4 style="color:red;">视频:'+data.data+'--删除失败！</h4>');
					}
				});
			}
		}
	});
	
	function update_list(page_num){
		$.get('<?php echo U("video/update");?>' + '&page_num='+page_num,function(data){
			$('#update_info').after('<h4 style="color:green;">'+data.info+'   更新成功！</h4>');
			if (data.status == '1') {
				update_list(data.data.nexpage);
			}else{
				return;
			}
		});
	}
	
	$("#update_data").click(function(){
		$("#dialog-update-info").dialog('open');
		$('#delete_info').nextAll().remove();
		update_list(1);
	});

	$('.deletevideo').click(function(){
		var swf_vid = $(this).attr('rel');
		if(confirm('你确定要删除,此操作不可恢复，删除后将归入视频管理后台回收站!')){
			$.get('<?php echo U("video/delete");?>' + '&vid=' +swf_vid,function(data){
				if (data.status == '1') {
					$("input[value="+data.data+"]").parent().parent().remove();
				} else {
					$('#delete_info').after('<h4 style="color:red;">视频:'+data.data+'--删除失败！</h4>');
					alert('删除失败!');
				}
			});
		}
	});
	
	$(".member_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("member/dialoginfo","id=");?>'+$role_id);
	});
	
	$(".showvideo").click(function(){
		var swf_path = $(this).attr('rel');
		var video_src = "http://player.polyv.net/videos/"+swf_path+".swf";
		
		$("#video_src").attr('VALUE', video_src);
		$("#video_player").attr('src', video_src);
		$('#dialog-video-info').dialog('open');
		return false;
	});
});
</script>

</body>
</html>