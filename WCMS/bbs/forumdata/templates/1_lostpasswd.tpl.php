<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ��������</div>

<form method="post" action="member.php?action=lostpasswd">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="mainbox formbox">
		<h1>��������</h1>
		<table summary="��������" cellspacing="0" cellpadding="0">
			<tr>
				<th><label for="username">�û���</label></th>
				<td><input type="text" id="username" name="username" size="25" /></td>
			</tr>
			<tr>
				<th><label for="email">Email</label></th>
				<td ><input type="text" id="email" name="email" size="25" />
			</tr>
			<tr>
				<th><label for="questionid">��ȫ����</label></th>
				<td>
					<select id="questionid" name="questionid">
						<option value="0">&nbsp;</option>
						<option value="1">ĸ�׵�����</option>
						<option value="2">үү������</option>
						<option value="3">���׳����ĳ���</option>
						<option value="4">������һλ��ʦ������</option>
						<option value="5">�����˼�������ͺ�</option>
						<option value="6">����ϲ���Ĳ͹�����</option>
						<option value="7">��ʻִ�յ������λ����</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="answer">�ش�</label></th>
				<td><input type="text" name="answer" size="25" /></td>
			</tr>
			<tr class="btns">
				<th>&nbsp;</th>
				<td><button type="submit" class="submit" name="lostpwsubmit" value="true">�ύ</button></td>
			</tr>
		</table>
	</div>
</form>
<? include template('footer'); ?>
