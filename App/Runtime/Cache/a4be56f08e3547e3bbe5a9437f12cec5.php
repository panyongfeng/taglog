<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>用户宝</title>
<meta name="keywords" content="视频说明书，电子说明书，二维码，二维码说明书，二维码链接，专业说明书平台，说明书，说明书引擎，免费视频">
<meta name="description" content="不只是电子化的产品说明书，而是动态的、全方位的产品描述平台。让消费者为您传播品牌，让口碑“转”起来。扫描即可浏览，让用户更直观地理解你的产品与品牌文化">
<link rel="shortcut icon" href="./favicon.png"/>
<link href="http://yhb360.qiniudn.com/css/bootstrap.min.css" rel="stylesheet">
<link href="http://yhb360.qiniudn.com/css/style.css" rel="stylesheet">
<link type="text/css" href="http://yhb360.qiniudn.com/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link href="./css/style.css" rel="stylesheet">
<script type="text/javascript">
	var browserInfo = {browser:"", version: ""};
	var ua = navigator.userAgent.toLowerCase();
	if (window.ActiveXObject) {
		browserInfo.browser = "IE";
		browserInfo.version = ua.match(/msie ([\d.]+)/)[1];
		if(browserInfo.version <= 7){
			if(confirm("您的浏览器版本过低，请使用IE8及以上浏览器，或者firefox、chrome、360等浏览器;")){}
			location.href = 'http://www.google.cn/intl/zh-CN/chrome/browser/';
		}
	}
</script>
<script src="http://yhb360.qiniudn.com/js/jquery-1.9.0.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/jquery-ui-1.10.0.custom.min.js"></script>
</head>
<body class="no_index">
    <div class="top">
	<div class="w980">
		<div class="login">
			<?php if(session('?email')): ?><a title="个人中心" href="<?php echo U('member/home');?>"><?php echo session('email');?>&nbsp;<font id="message_tips" color="#1DB1AB">(0)</font></a>
			<span><a href="<?php echo U('member/index');?>">我的说明书</a></span>
			<a href="<?php echo U('member/logout');?>">退出</a>
			<?php else: ?>
			<span><a href="<?php echo U('member/login');?>">登录</a></span>
			<a href="<?php echo U('member/register');?>">注册</a><?php endif; ?>
		</div>
		<a href="<?php echo U('index/index');?>" style="float:left"><img src="http://yhb360.qiniudn.com/images/logo.png" class="logo"></a>
	</div>
</div>
<?php if(session('?member_id')): ?><script>

	var a = 1;
	function fn(){
		if(a == 1){
			$('#message_tips').css({color:'white'});
			a = 0;
		}else{
			$('#message_tips').css({color:'#FF0000'});
			a = 1;
		}
	}
	var myInterval;

	function message_tips(){
		$.get("<?php echo U('member/tips');?>", function(data){
			if(data.data > 0){
				$("#message_tips").html('('+data.data+')');
				$('#message_tips').css({color:'white'});
				if(!myInterval)	myInterval = setInterval(fn,1000);
			} else {
				$("#message_tips").html('(0)');
				if(data.data == 0){
					$('#message_tips').css({color:'#1DB1AB'});
					clearInterval(myInterval);
				}
			}
		});
		setTimeout('message_tips()',5000);
	}
	$(function(){
		message_tips();
	});
</script><?php endif; ?>
    <div class="naver">
         <div class="w980">
            <a href="<?php echo U('index/index');?>" >首页</a> &gt;
            <a href="<?php echo U('member/home');?>" >商家中心</a>
        </div>
    </div>
    <div class="w980 main_table">
		<div class="member_box">
			<div class="member_about">
	<div class="avatar">
		<div class="fr">
			<?php if($member['avatar']): ?><img src="<?php echo ($member["avatar"]); ?>"/><?php else: ?><img src="http://yhb360.qiniudn.com/images/avatar.png"/><?php endif; ?>
		</div>
	</div>
	<div class="about_info">
		<div class="user_about_info">
			<div class="fr"><span>说明书总数：</span><span class="count"><?php echo ($member["product_count"]); ?>份</span> <a href="<?php echo U('member/index');?>"><span>管理</span></a></div>
			<span class="user_nick"><?php echo ($member["email"]); ?>  &nbsp; </a></span>
		</div>
		<div class="user_count_info">
			<div class="fr">上次登录时间：<span><?php echo (date("Y-m-d H:i:s",$member["last_login_time"])); ?></span></div>
			
			<?php if($member['avatar']): ?><input name="check_logo" id="check_logo" type="checkbox" <?php if($member['check_logo']): ?>checked="checked"<?php endif; ?>vlaue="1"/>将此logo插入到二维码中<?php endif; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
	$(function(){
		$("#check_logo").click(function(){
			var checked = $(this).prop("checked");
			$.get('<?php echo U("member/setqrlogo","checked=");?>'+checked,function(data){
				if(data.status != '1'){
					layer.msg('设置失败了：网络异常，请稍后重试', 1);
					$("#check_logo").prop("checked","");
				}
			});
		});
	});
</script>
			<div class="member_info">
				<ul class="info_name">
					<li><a href="<?php echo U('member/home');?>">商家资料</a></li>
					<li><a href="<?php echo U('member/home','act=avatar');?>">设置logo</a></li>
					<li class="active">
						<a href="<?php echo U('member/home','act=message');?>">站内通知<?php if($message_alert_count > 0): ?><span style="color: red;">(<?php echo ($message_alert_count); ?>)</span><?php endif; ?></a>
					</li>
					<li><a href="<?php echo U('member/home','act=resetpassword');?>">修改密码</a></li>
				</ul>
				<div class="info_box">
					<?php if(is_array($message_list)): $i = 0; $__LIST__ = $message_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="message_box">
						<div rel="<?php echo ($vo["message_id"]); ?>"  <?php if($vo['read_time'] > $vo['create_time']): ?>class="message_title open"<?php else: ?>class="message_title"<?php endif; ?>>
							<span>2014-06-19</span>
							<a href="javascript:void(0);"><?php echo (msubstr($vo["content"], 0 ,30)); ?></a>
						</div>
						<div class="message_content">
							<?php echo ($vo["content"]); ?>
						</div>
						<div class="message_footer"><span>2014-06-19</span><a href="javascript:void(0);" rel="<?php echo ($vo["message_id"]); ?>" class="message_delete">删除</a></div>
						<a class="up_button" href="javascript:void(0);"></a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<script>
				$(function(){
					$('.message_title').click(function(){
						$.get('<?php echo U("member/openmessage","message_id=");?>' + $(this).attr('rel'),function(data){});
						$('.message_title').show().siblings().hide();
						$(this).addClass('open');
						$(this).hide().siblings().show();
					});
					$('.up_button').click(function(){
						$(this).hide().siblings().hide().siblings('.message_title').show();
					});
					$('.message_delete').click(function(){
						var obj = $(this);
						layer.confirm('您确定删除该条信息么？',function(){
							$.get('<?php echo U("member/deletemessage","message_id=");?>' + obj.attr('rel'),function(data){
								if(data.status == 1){
									obj.parent().parent().remove();
									layer.msg("删除成功",1,1);
								}else{
									layer.alert(data.info,-1);
								}
							})
						})
					});
				})
					
					
				</script>
			</div>
		</div>
    </div>
	<div class="feedback">
	<div class="feedback_content">
		<div class="feedback_title"><a id="feedback_close"></a>我的意见</div>
		<div class="feedback_content_box">
			<textarea id="feedback_content">在这里留下您的意见</textarea>
			<div class="feedback_email_box">
				<input type="submit" id="sub_feedback" value="提交反馈"/>
				<input type="text" id="feedback_email" value="请输入您的邮箱"/>
			</div>
		</div>
	</div>
	<div class="feedback_button"></div>
</div>
<script>
	$(function(){
		$('#feedback_email').focus(function(){
			if($(this).val() == '请输入您的邮箱')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('请输入您的邮箱');
		});
		$('#feedback_content').focus(function(){
			if($(this).val() == '在这里留下您的意见')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('在这里留下您的意见');
		});
		var menuYloc = $(".feedback").offset().top; 
		$(window).scroll(function (){ 
			var offsetTop = menuYloc + $(window).scrollTop() +"px"; 
			$(".feedback").animate({top : offsetTop },{ duration:600 , queue:false }); 
		}); 
		$(".feedback_button").mouseenter(function(){
			$(this).hide();
			$(".feedback").width(243);
			$(".feedback_content").show();
		});
		$('#feedback_close').click(function(){
			$(".feedback").width(46);
			$(".feedback_content").hide();
			$(".feedback_button").show();
		});
		$(".feedback").mouseleave(function(){
			if(($("#feedback_content").val() == '' || $("#feedback_content").val() == '在这里留下您的意见') && ($("#feedback_email").val() == '' || $("#feedback_email").val() == '请输入您的邮箱')){
				$(".feedback").width(46);
				$(".feedback_content").hide();
				$(".feedback_button").show();
			}
		});
		$('#sub_feedback').click(function(){
			var content = $('#feedback_content').val();
			var email = $('#feedback_email').val();
			if(content != '在这里留下您的意见'){
				$.post('<?php echo U("member/feedback");?>',{content : content, email : email},function(data){
					if(data.status == '1'){
						layer.alert(data.info,-1);
						$("#feedback_content").val('');
						$("#feedback_email").val('');
						$(".feedback").width(46);
						$(".feedback_content").hide();
						$(".feedback_button").show();
					}else{
						layer.alert(data.info,-1);
					}
				});
			} else {
				layer.alert('您忘记写反馈的内容了！',-1);
			}
		});
	});
	
	//百度统计
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
	
</script>
</body>
</html>