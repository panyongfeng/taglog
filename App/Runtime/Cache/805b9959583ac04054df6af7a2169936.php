<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo ($product["name"]); ?></title>
		<base href="http://www.yhb360.com/">
		<meta name="description" content="<?php echo ($product["description"]); ?>"/>
		<meta name="Keywords" content="<?php echo ($product["description"]); ?>"/>
        <meta name="viewport" content="width=device-width,mainital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <meta http-equiv="Cache-Control" CONTENT="no-cache">
		<link href="/css/mobilestyle.css" rel="stylesheet">
		<script src="http://yhb360.qiniudn.com/js/jquery-1.9.0.min.js"></script>
		<script src="http://yhb360.qiniudn.com/js/swipe.js"></script>
    </head>
    <body>
		<div id="big_img_bg" ontouchstart="hide_m(this);" ontouchmove="hide_m(this);" ontouchend="hide_m(this);" ontouchcancel="hide_m(this);" onmousedown="hide_m(this);" onclick="hide_m(this);" style="background:#333333;opacity:0.7; filter:alpha(opacity=70);position: fixed;width:100%;top:0;z-index:9999"></div>
		<div id="big_img" ontouchstart="hide_m(this);" ontouchmove="hide_m(this);" ontouchend="hide_m(this);" ontouchcancel="hide_m(this);" onmousedown="hide_m(this);"  onclick="hide_m(this);" style=" position: fixed;width:100%;top:0;z-index:99999"><img onclick="hide_m(this);" ontouchmove="hide_m(this);" ontouchend="hide_m(this);" ontouchcancel="hide_m(this);" onmousedown="hide_m(this);"  ontouchstart="hide_m(this);" src="/images/default_img.png" style="margin:auto;display:block;width:100%;z-index:99999"></div>
		<div class="swipe_box">
		<div class="swipe" id="mobile_view_page_box_big">
			<div class='swipe-wrap'>
			<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><div class="swipe__box" rel="<?php echo ($pages_k); ?>">
				<p class="product_view_name"><span style="display:inline-block;line-height:30px;margin-top: 30px;color:#000;"><?php echo ($product["name"]); ?></span></p>
				<p class="product_view_content_name"><?php echo ($page["subject"]); ?></p>
				<?php if(is_array($page["content"])): $i = 0; $__LIST__ = $page["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><div style="background:#FFFFFF;padding-bottom:15px;">
					<div class="product_view_description"><?php echo ($content["description"]); ?></div>
					<?php if(is_array($content["file"])): $i = 0; $__LIST__ = $content["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><div class="product_view_file">
						<div class="product_view_file_box">
							<?php if($file['type'] == 'image'): $file['height'] = $file['height']?$file['height']:490 ?>
							<?php $file['width'] = $file['width'] ? $file['width']:600 ?>
							<img class="uploadify_img" width="100%" src="<?php echo ($file["path"]); ?>">
							<?php elseif($file['type'] == 'video'): ?>
							<?php if($file['status'] == 1): $file['height'] = $file['height']?$file['height']:490 ?>
							<?php $file['width'] = $file['width'] ? $file['width']:600 ?>
							<img class="uploadify_img video_img" width="100%" onerror="$(this).attr('src','/images/processing1.png')" src="<?php echo ($file["first_image"]); ?>">
							<video width="100%" draggable="false" data_width="<?php echo ($file["width"]); ?>" data_height="<?php echo ($file["height"]); ?>" style="display:none;" class="polyvplayer<?php echo ($file["vid"]); ?> video" preload="metadata" controls="controls">
								<source src="<?php echo ($file["mp4"]); ?>" type="video/mp4" />
								您的浏览器不支持的MP4格式的视频。
							</video>
							<script>
								var swf_width = $('.product_view_file_box').width();
								var swf_height = swf_width * <?php echo ($file["height"]); ?>/<?php echo ($file["width"]); ?>;
								$('.polyvplayer<?php echo ($file["vid"]); ?>').attr('height',swf_height);
							</script>
							<img class="video_play_img" src="/images/video_play_img.png">
							<?php elseif($file['status'] == 0): ?>
							<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
							<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>您查看的视频正在转码审核中，请过几分钟再查看吧</span></div>
							<?php elseif($file['status'] == 2): ?>
							<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
							<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>您查看的视频已被删除</span></div>
							<?php elseif($file['status'] == 3): ?>
							<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
							<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>您查看的视频已被删除</span></div><?php endif; endif; ?>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="product_count_pages">
			<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><span <?php if($pages_k == 1): ?>class="active"<?php endif; ?>></span><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		</div>
		<script>
		var page_scrollTop = new Array('1');
		var now_page = 0;
		var div_height;
		$('#big_img_bg').css({height:$(window).height()}).show();
		$('#big_img').show();
		function hide_m(e){
			$('#big_img_bg').remove();
			$('#big_img').remove();
			if($(e).lenght > 0){
				e.preventDefault();
			}
		}
		$(function(){
			$('table').attr('width','99%');
			$('table').attr('border','1');
			if($('.swipe-wrap').children().eq(0).height() > ($(window).height() + 24)){
				div_height = $('.swipe-wrap').children().eq(0).height();
			}else{
				div_height = $(window).height() + 24;
			}
			$('#mobile_view_page_box_big .video_img').click(function(){
				$(this).css({display:'none'});
				$(this).siblings('.video_play_img').attr({src:'/images/video_pause_img.png'});
				$(this).siblings('.video_play_img').css({display:'none'});
				var video_obj = $(this).siblings('video');
				video_obj.css({display:'block'});
				video_obj[0].play();
				video_obj[0].addEventListener("pause", function(){
					$(this).css({display:'none'});
					$(this).siblings('.video_img').css({display:'block'});
					$(this).siblings('.video_play_img').css({display:'block'});
				}, false);
				video_obj[0].addEventListener("ended", function(){
					$(this).css({display:'none'});
					$(this).siblings('.video_img').css({display:'block'});
					$(this).siblings('.video_play_img').css({display:'block'});
				}, false);
			})
			$('#mobile_view_page_box_big .video_play_img').click(function(){
				$(this).attr({src:'/images/video_pause_img.png'}).css({display:'none'});
				$(this).siblings('.video_img').css({display:'none'});
				var video_obj = $(this).siblings('video');
				video_obj.css({display:'block'});
				video_obj[0].play();
				video_obj[0].addEventListener("pause", function(){
					$(this).css({display:'none'});
					$(this).siblings('.video_img').css({display:'block'});
					$(this).siblings('.video_play_img').css({display:'block'});
				}, false);
				video_obj[0].addEventListener("ended", function(){
					$(this).css({display:'none'});
					$(this).siblings('.video_img').css({display:'block'});
					$(this).siblings('.video_play_img').css({display:'block'});
				}, false);
			})
			$('#mobile_view_page_box_big').css({height:div_height});
			window.mySwipe = $('#mobile_view_page_box_big').Swipe({
				callback: function(index, element) {
					now_page = index;
					var e_scrollTop = $(element).attr('rel');
					if($.inArray(e_scrollTop,page_scrollTop) == -1){
						page_scrollTop.push(e_scrollTop);
						$(document).scrollTop(0);
					}
					var swipe_height = $(element).height() > ($(window).height() + 24)?$(element).height():($(window).height() + 24);
					$('#mobile_view_page_box_big').height(swipe_height);
					if(index < <?php echo count($pages);?>){
						$('.product_count_pages span').removeClass('active').eq(index).addClass('active');
					}else{
						var active_num = index - <?php echo count($pages);?>;
						$('.product_count_pages span').removeClass('active').eq(active_num).addClass('active');
					}
				},
				continuous:true,
			}).data('Swipe');
			$(document).on("click","object",function (e){
				e.preventDefault();
			});
			$(document).on("click","embed",function (e){
				e.preventDefault();
			});
		});
		var height_time = '';
		var h_time = 500;
		var height_time_stop = false;
		function set_height(){
			if(height_time_stop == false){
				if($('.swipe-wrap').children().eq(now_page).height() > ($(window).height() + 24)){
					div_height = $('.swipe-wrap').children().eq(now_page).height();
				}else{
					div_height = $(window).height() + 24;
				}
				$('#mobile_view_page_box_big').css({height:div_height});
				height_time = setTimeout('set_height()',h_time);
				h_time+=200;
			}
		}
		set_height();
		window.addEventListener("orientationchange",function(){
			$('video').each(function(index,element){
				$(element).attr('width',$('.product_view_file_box').width());
				$(element).attr('height',$('.product_view_file_box').width() * $(element).attr('data_height')/$(element).attr('data_width'));
			});
			$('.video_img').each(function(index,element){
				$(element).css({width:'100%',maxWidth:'100%'});
			});
			h_time = 500;
			set_height();
		});
		//百度统计
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
		</script>
    </body>
</html>