<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo ($product["name"]); ?></title>
		<meta name="description" content="<?php echo ($product["description"]); ?>"/>
		<meta name="Keywords" content="<?php echo ($product["description"]); ?>"/>
        <meta name="viewport" content="width=device-width,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <meta http-equiv="Cache-Control" CONTENT="no-cache">
		<style>
		*{margin:0px; padding:0px;}
		body{font-family: 微软雅黑; color:#000000;padding-bottom:24px;}
		.clear{
			clear:both;
		}
		.swipe {
		  overflow: hidden;
		  visibility: hidden;
		  position: relative;
		}
		.swipe-wrap {
		  overflow: hidden;
		  position: relative;
		}
		.swipe-wrap > div {
		  float:left;
		  width:100%;
		  position: relative;
		}
		.product_count_pages{
			position:fixed;
			width:100%;
			text-align:center;
			line-height:20px;
			bottom:0px;
		}
		.product_count_pages span{
			display:inline-block;
			height:20px;
			width:20px;
			background:url(../images/pages.png) no-repeat center;
		}
		.product_count_pages span.active{
			background:url(../images/pages_active.png) no-repeat center;
		}
		.product_view_name{
			background:url(../images/product_view_name.png) no-repeat;
			background-size: 100% 100%;
			color:#FFFFFF;
			padding:0 20px;
			font-size:25px;
			height:128px;
			line-height:128px;
		}
		.product_view_content_name{
			height:35px;
			line-height:35px;
			background:url(../images/product_view_content_name.png) repeat-x;
			text-align:center;
			padding:0 10px;
			color:#FFFFFF;
		}
		.product_view_description{
			margin:10px 0;
			padding:5px;
		}
		.product_view_file{
			margin:5px;
			padding:5px;
			border:1px solid #EFEFEF;
			border-radius: 4px;
		}
		</style>
		<script src="../js/jquery-1.9.0.min.js"></script>
		<script src="../js/swipe.js"></script>
    </head>
    <body>
		<div class="swipe" id="mobile_view_page_box_big">
			<div class='swipe-wrap'>
			<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><div class="">
				<?php if($pages_k == 1): ?><p class="product_view_name"><?php echo ($product["name"]); ?></p><?php endif; ?>
				<p class="product_view_content_name"><?php echo ($page["subject"]); ?></p>
				<?php if(is_array($page["content"])): $i = 0; $__LIST__ = $page["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><div style="background:#FFFFFF">
					<div class="product_view_description"><?php echo ($content["description"]); ?></div>
					<?php if(is_array($content["file"])): $i = 0; $__LIST__ = $content["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><div class="product_view_file">
						<div class="product_view_file_box">
							<?php if($file['type'] == 'image'): ?><img width="100%" class="uploadify_img" src="<?php echo ($file["path"]); ?>">
							<?php elseif($file['type'] == 'video'): ?>
							
							<video width="100%" class="polyvplayer<?php echo ($file["vid"]); ?> video" controls="controls">
								<source src="<?php echo ($file["mp4"]); ?>" type="video/mp4" />
							</video>
							
							<script>
								var swf_width = $('.product_view_file_box').width();
								var swf_height = swf_width * <?php echo ($file["height"]); ?>/<?php echo ($file["width"]); ?>;
								$('.polyvplayer<?php echo ($file["vid"]); ?>').height(swf_height);
							</script><?php endif; ?>
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
		<script>
		$(function(){
			var window_height = $(window).height() - 24;
			var div_height;
			if($('.swipe-wrap').children().eq(0).height() > window_height){
				div_height = $('.swipe-wrap').children().eq(0).height();
			}else{
				div_height = window_height;
			}
			window.mySwipe = $('#mobile_view_page_box_big').Swipe({
				callback: function(index, element) {
					var swipe_height = $(element).height() > window_height?$(element).height():window_height;
					$('#mobile_view_page_box_big').height(swipe_height);
					if(index < <?php echo count($pages);?>){
						$('.product_count_pages span').removeClass('active').eq(index).addClass('active');
					}else{
						var active_num = index - <?php echo count($pages);?>;
						$('.product_count_pages span').removeClass('active').eq(active_num).addClass('active');
					}
				},
				transitionEnd:function(index, element){
					$('.video').hide();
					$(element).find('.video').show();
				},
				continuous:true,
			}).data('Swipe');
		})
		</script>
    </body>
</html>