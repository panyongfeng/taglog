<?php if (!defined('THINK_PATH')) exit();?><table class="table">
	<thead>
		<tr>
			<th colspan="4">基本信息</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="tdleft">注册邮箱</td>
			<td><?php echo ($member["email"]); ?> &nbsp; <a target="_blank" href="<?php echo U('member/helplogin','member_id='.$member['member_id']);?>">模拟登录</a></td>
			<td class="tdleft">公司简称</td>
			<td><?php echo ($member["short_name"]); ?></td>
		</tr>
		<tr>
			<td width="15%" class="tdleft">姓名</td>
			<td width="35%">
				<?php echo ($member["true_name"]); ?>
			</td>
			<td width="15%" class="tdleft">qq</td>
			<td width="35%"><?php echo ($member["qq"]); ?></td>
		</tr>
		<tr>
			<td width="15%" class="tdleft">电话/手机</td>
			<td width="35%"><?php echo ($member["phone_number"]); ?></td>
			<td width="15%" class="tdleft">公司名</td>
			<td width="35%"><?php echo ($member["company_name"]); ?></td>
		</tr>
		<?php if($_GET['act'] == 'edit'): ?><tr>
			<th colspan="4">修改登录信息</th>
		</tr>
		<tr>
			<td colspan="4"><form action="<?php echo U('member/edit');?>" method="post"><input type="hidden" name="id" value="<?php echo ($member["member_id"]); ?>"/><input type="hidden" name="HTTP_REFERER" value="<?php echo ($HTTP_REFERER); ?>"/>邮箱:<input style="width:auto;" type="text"  name="email" value="<?php echo ($member["email"]); ?>"/> 密码:<input style="width:auto;" type="text" placeholder="修改密码请输入……" name="password"/> <input class="btn btn-primary" type="submit" value="提交修改"/></form></td>
		</tr><?php endif; ?>
		<tr>
			<th colspan="4">站内信</th>
		</tr>
		<tr>
			<td class="tdleft">内容</td>
			<td colspan="3">
				<textarea rows="5" class="span4" id="content" name="content"></textarea>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3">
				<input class="btn btn-primary" id="send" name="send" type="button" value="发送"/>&nbsp; &nbsp;<input class="btn btn-primary" id="close" name="close" type="button" value="取消"/>&nbsp; &nbsp;<span id="result"></span>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$('#close').click(
		function(){
			$('#dialog-role-info').dialog('close');
		}
	);
	$('#send').click(
		function(){			
			var to_member_id = "<?php echo ($member["member_id"]); ?>";
			var content = $('#content').val();
			if(content!=''){
				$("#result").html('<span style="color:red">正在发送...</span>');
				$("#send").attr('disabled', "disabled");
				$.post('<?php echo U("member/sendmessage");?>',
					{
						to_member_id:to_member_id,
						content:content
					},
					function(data){
						if(data.status == 1){
							$("#result").html('<span style="color:green">发送成功!</span>');
							$("#send").attr('disabled', false);
							$("#content").val("");
						} else if(data.status == 0) {
							$("#result").html('<span style="color:red">发送失败!</span>');
						}
					},
				'json');
			} else {
				$("#result").html('<span style="color:red">请填写内容！</span>');
			}
		}
	);
</script>