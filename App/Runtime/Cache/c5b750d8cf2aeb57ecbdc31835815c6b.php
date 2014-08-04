<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="http://www.yhb360.com/">
<title>用户宝</title>
<meta name="keywords" content="视频说明书，电子说明书，二维码，二维码说明书，二维码链接，专业说明书平台，说明书，说明书引擎，免费视频">
<meta name="description" content="不只是电子化的产品说明书，而是动态的、全方位的产品描述平台。让消费者为您传播品牌，让口碑“转”起来。扫描即可浏览，让用户更直观地理解你的产品与品牌文化">
<link rel="shortcut icon" href="./favicon.png"/>
<link href="http://yhb360.qiniudn.com/css/bootstrap.min.css" rel="stylesheet">
<link href="http://yhb360.qiniudn.com/css/style.css" rel="stylesheet">
<script src="http://yhb360.qiniudn.com/js/jquery-1.9.0.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/jquery-ui-1.10.0.custom.min.js"></script>
</head>
<body class="no_index">
    <div class="w980">
		<div class="product_view_box">
			<div class="product_view_page_box">
				<div class="product_view_page_box_big">
					<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><div class="product_view_page">
						<div class="product_view_page_content">
							<p class="product_view_name"><?php echo ($product["name"]); ?></p>
							<p class="product_view_content_name"><?php echo ($page["subject"]); ?></p>
							<?php if(is_array($page["content"])): $i = 0; $__LIST__ = $page["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><div style="margin-bottom:20px;">
								<div class="product_view_description"><?php echo ($content["description"]); ?></div>
								<?php if(is_array($content["file"])): $i = 0; $__LIST__ = $content["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><div class="product_view_file">
									<div class="product_view_file_box">
										<?php if($file['type'] == 'image'): ?><img class="uploadify_img" width="100%" src="<?php echo ($file["path"]); ?>">
										<?php elseif($file['type'] == 'video'): ?>
										<?php if($file['status'] == 1): $file['height'] = $file['height']?$file['height']:490 ?>
										<?php $file['width'] = $file['width'] ? $file['width']:600 ?>
										<?php $swf_height = 348 * $file['height'] /$file['width'] ?>
										<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'chrome')): ?><video width="100%" class="polyvplayer<?php echo ($file["vid"]); ?> video" preload="metadata" controls="controls">
											<source src="<?php echo ($file["mp4"]); ?>" type="video/mp4" />
										</video>
										<script>
											var swf_width = $('.product_view_file_box').width();
											var swf_height = swf_width * <?php echo ($file["height"]); ?>/<?php echo ($file["width"]); ?>;
											$('.polyvplayer<?php echo ($file["vid"]); ?>').attr('height',swf_height);
										</script>
										<?php else: ?>
										<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="<?php echo ($swf_height); ?>" width="348" id="polyvplayer<?php echo ($file["vid"]); ?>">
										<param name="movie" value="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf">
										<param name="allowscriptaccess" value="always">
										<param name="wmode" value="opaque">   
										<param name="allowFullScreen" value="true" />
										<embed src="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf" width="348" height="<?php echo ($swf_height); ?>" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="opaque" name="polyvplayer<?php echo ($file["vid"]); ?>" allowFullScreen="true" /></embed>
										</object><?php endif; ?>
										<?php elseif($file['status'] == 0): ?>
										<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
										<div rel="<?php echo ($file["vid"]); ?>" class="uploadify_img_status"><span>根据国家政策规定，您的视频正在被审核。建议您先进行其他编辑。20分钟左右后再查看结果将会自动生效。</span></div>
										<?php elseif($file['status'] == 2): ?>
										<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
										<div rel="<?php echo ($file["vid"]); ?>" class="uploadify_img_status"><span>根据国家政策规定，您的视频审核失败。</span></div>
										<?php elseif($file['status'] == 3): ?>
										<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
										<div rel="<?php echo ($file["vid"]); ?>" class="uploadify_img_status"><span>根据国家政策规定，您的视频存在违法信息，已被删除。</span></div><?php endif; endif; ?>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="product_view_botton_left"></div>
			<div class="product_view_botton_right"></div>
		</div>
		<div class="product_count_pages">
			<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><span <?php if($pages_k == 1): ?>class="active"<?php endif; ?>></span><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<script>
		$(function(){
			$('table').attr('width','99%');
			$('table').attr('border','1');
			$('table').attr('cellspacing','0');
			$(".product_view_page_content").draggable({
				appendTo:'product_view_page',
				cursor: 'move',
				axis:"y",
				containment: 'parent'
			});
			var page_num = 0 - (<?php echo count($pages);?> - 1) * 370 + 14;
			var i = 1;
			$('.product_view_page_box_big').width(<?php echo count($pages);?> * 370);
			$('.product_view_botton_right').click(function(){
				$(".product_view_page").stop(true,true);
				if(i < <?php echo count($pages);?>){
					++i;
					$('.product_view_page').animate({left:'-=370px'});
					$('.product_count_pages span.active').removeClass('active').next().addClass('active');
				}
			});
			$('.product_view_botton_left').click(function(){
				$(".product_view_page").stop(true,true);
				if(i > 1){
					--  i;
					$('.product_view_page').animate({left:'+=370px'});
					$('.product_count_pages span.active').removeClass('active').prev().addClass('active');
				}
			});
			$(document).on("click","object",function (e){
				e.preventDefault();
			});
			$(document).on("click","embed",function (e){
				e.preventDefault();
			});
		});
		//百度统计
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
	</script>
    </div>
</body>
</html>