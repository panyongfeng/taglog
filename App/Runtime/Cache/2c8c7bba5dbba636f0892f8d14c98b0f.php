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
<link rel="stylesheet" type="text/css" href="http://yhb360.qiniudn.com/css/uploadify.css">
<link rel="stylesheet" type="text/css" href="http://yhb360.qiniudn.com/css/jquery.Jcrop.min.css" media="all">
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
<script src="http://yhb360.qiniudn.com/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<script type="text/javascript" src="http://yhb360.qiniudn.com/js/jquery.Jcrop.min.js"></script>

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
					<li class="active"><a href="<?php echo U('member/home','act=avatar');?>">设置logo</a></li>
					<li><a href="<?php echo U('member/home','act=message');?>">站内通知<?php if($message_alert_count > 0): ?><span style="color: red;">(<?php echo ($message_alert_count); ?>)</span><?php endif; ?></a></li>
					<li><a href="<?php echo U('member/home','act=resetpassword');?>">修改密码</a></li>
				</ul>
				<div class="info_box">
					<!-- 修改头像 -->
					<form action="<?php echo U('member/saveavatar');?>" method="post" id="pic" class="update-pic cf">
						<div style="padding-bottom: 20px;color: #BE3641;">
						*强烈建议您上传公司logo，这样可以自动将logo插入二维码中</div>
						<div class="upload-area">
							<input type="file" id="user-pic">
							<div class="file-tips">支持JPG,PNG，图片小于<span style="font-style: italic;color: #BE3641;">1MB</span>，尺寸不小于<span style="font-style: italic;  color: #BE3641;">100*100 px</span>！</div>
							<div class="preview hidden" id="preview-hidden"></div>
						</div>
						<div class="preview-area">
							<input type="hidden" id="x" name="x" />
							<input type="hidden" id="y" name="y" />
							<input type="hidden" id="w" name="w" />
							<input type="hidden" id="h" name="h" />
							<input type="hidden" id='img_src' name='src'/>
							<div class="tcrop">logo预览</div>
							<div class="crop crop100"><img id="crop-preview-100" src="" alt=""></div>
							<div class="crop crop60"><img id="crop-preview-60" src="" alt=""></div>
							<a class="uppic-btn save-pic" href="javascript:void(0);">保存</a>
							<a class="uppic-btn reupload-img" href="javascript:$('#user-pic').uploadify('cancel','*');">重新上传</a>
						</div>
					</form>
					<!-- /修改头像 -->
				</div>
			</div>
		</div>
    </div>
	<div class="feedback">
	<div class="feedback_content" style="padding:10px;height:auto">
		<div class="feedback_title"><a id="feedback_close"></a>在线客服</div>
		<div class="feedback_content_box" style="display:none">
			<textarea id="feedback_content">在这里留下您的意见</textarea>
			<div class="feedback_email_box">
				<input type="submit" id="sub_feedback" value="提交反馈"/>
				<input type="text" id="feedback_email" value="请输入您的邮箱"/>
			</div>
		</div>
		<a href="http://float2006.tq.cn/static.jsp?version=vip&admiuin=9622142&ltype=0&iscallback=1&page_templete_id=77446&is_message_sms=0&is_send_mail=0&uin=9623224" target=_blank><img src="http://float2006.tq.cn/staticimg.jsp?version=vip&admiuin=9622142&ltype=0&uin=9623224&onlinepic=http://userfiles.tq.cn/userfiles/upload_126/9622142/1405694893.jpg&offlinepic=http://userfiles.tq.cn/userfiles/upload_126/9622142/1405694893.jpg" border='0' /></a>
<br />
<br />
<a href="http://float2006.tq.cn/static.jsp?version=vip&admiuin=9622142&ltype=0&iscallback=1&page_templete_id=77446&is_message_sms=0&is_send_mail=0&uin=9623225" target=_blank><img src="http://float2006.tq.cn/staticimg.jsp?version=vip&admiuin=9622142&ltype=0&uin=9623225&onlinepic=http://userfiles.tq.cn/userfiles/upload_126/9622142/1405694898.jpg&offlinepic=http://userfiles.tq.cn/userfiles/upload_126/9622142/1405694898.jpg" border='0' /></a>
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
			$(".feedback").width(120);
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
	<script type="text/javascript">
		$(function(){
			//上传头像(uploadify插件)
			$("#user-pic").uploadify({
				'queueSizeLimit' : 1,
				'removeTimeout' : 0.5,
				'preventCaching' : true,
				'fileSizeLimit' : '1MB',
				'multi'    : false,
				'swf' 			: './js/uploadify.swf',
				'uploader' 		: '<?php echo U("member/uploadimg");?>',
				'buttonText' 	: '<i class="userup-icon"></i>上传logo',
				'overrideEvents': ["onSelectError","onDialogClose","onUploadError","onCancel"],
				'width' 		: '200',
				'height' 		: '200',
				'fileTypeExts'	: '*.jpg; *.png; *.gif;',
				'onSelect': function(file){
					if(file.size > 1024000){
						layer.alert('选择图片超过1M，请重新选择小于1M的图片！',-1);
						$('#user-pic').uploadify('cancel','*');
					}
				},
				'onSelectError': function(file){
					if(file.size > 1024000){
						layer.alert('选择图片超过1M，请重新选择小于1M的图片！',-1);
						$('#user-pic').uploadify('cancel','*');
					}
				},
				'onUploadSuccess' : function(file, data, response){
					var data = $.parseJSON(data);
					if(data['status'] == 0){
						layer.alert(data['info'], -1);
						return;
					}
					layer.load('正在努力加载', 0);
					var preview = $('.upload-area').children('#preview-hidden');
					preview.show().removeClass('hidden');
					//两个预览窗口赋值
					$('.crop').children('img').attr('src',data['data']+'?random='+Math.random());
					//隐藏表单赋值
					$('#img_src').val(data['data']);
					//绑定需要裁剪的图片
					var img = $('<img />');
					preview.append(img);
					preview.children('img').attr('src',data['data']+'?random='+Math.random());
					var crop_img = preview.children('img');
					crop_img.attr('id',"cropbox").show();
					var img = new Image();
					img.src = data['data']+'?random='+Math.random();
					//根据图片大小在画布里居中
					img.onload = function(){
						var img_height = 0;
						var img_width = 0;
						var real_height = img.height;
						var real_width = img.width;
						if(real_height > real_width && real_height > 200){
							var persent = real_height / 200;
							real_height = 200;
							real_width = real_width / persent;
						}else if(real_width > real_height && real_width > 200){
							var persent = real_width / 200;
							real_width = 200;
							real_height = real_height / persent;
						}
						if(real_height < 200){
							img_height = (200 - real_height)/2;	
						}
						if(real_width < 200){
							img_width = (200 - real_width)/2;
						}
						preview.css({width:(200-img_width)+'px',height:(200-img_height)+'px'});
						preview.css({paddingTop:img_height+'px',paddingLeft:img_width+'px'});
						layer.closeAll();				
					}
					//裁剪插件
					$('#cropbox').Jcrop({
						bgColor:'#333',   //选区背景色
						bgFade:true,      //选区背景渐显
						fadeTime:1000,    //背景渐显时间
						allowSelect:false, //是否可以选区，
						allowResize:true, //是否可以调整选区大小
						aspectRatio: 1,     //约束比例
						minSize : [100,100],//可选最小大小
						boxWidth : 200,		//画布宽度
						boxHeight : 200,	//画布高度
						onChange: showPreview,//改变时重置预览图
						onSelect: showPreview,//选择时重置预览图
						setSelect:[ 0, 0, 100, 100],//初始化时位置
						onSelect: function (c){	//选择时动态赋值，该值是最终传给程序的参数！
							$('#x').val(c.x);//需裁剪的左上角X轴坐标
							$('#y').val(c.y);//需裁剪的左上角Y轴坐标
							$('#w').val(c.w);//需裁剪的宽度
							$('#h').val(c.h);//需裁剪的高度
					  }
					});
					//提交裁剪好的图片
					$('.save-pic').click(function(){
						if($('#preview-hidden').html() == ''){
							//layer.alert('请先上传图片:-)',-1);
							alert('请先上传图片:-)');
						}else{
							//alert('图片处理中，请稍候……');
							$('#pic').submit();
						}
					});
					//重新上传,清空裁剪参数
					var i = 0;
					$('.reupload-img').click(function(){
						$('#preview-hidden').find('*').remove();
						$('#preview-hidden').hide().addClass('hidden').css({'padding-top':0,'padding-left':0});
					});
				 }
			});
			//预览图
			function showPreview(coords){
				var img_width = $('#cropbox').width();
				var img_height = $('#cropbox').height();
				  //根据包裹的容器宽高,设置被除数
				  var rx = 100 / coords.w;
				  var ry = 100 / coords.h; 
				  $('#crop-preview-100').css({
					width: Math.round(rx * img_width) + 'px',
					height: Math.round(ry * img_height) + 'px',
					marginLeft: '-' + Math.round(rx * coords.x) + 'px',
					marginTop: '-' + Math.round(ry * coords.y) + 'px'
				  });
				  rx = 60 / coords.w;
				  ry = 60 / coords.h;
				  $('#crop-preview-60').css({
					width: Math.round(rx * img_width) + 'px',
					height: Math.round(ry * img_height) + 'px',
					marginLeft: '-' + Math.round(rx * coords.x) + 'px',
					marginTop: '-' + Math.round(ry * coords.y) + 'px'
				  });
			}
		})
		
	</script>
</body>

</html>