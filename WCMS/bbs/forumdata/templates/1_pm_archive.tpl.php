<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<form method="post" action="pm.php?action=archive" target="_blank">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="mainbox formbox">
		<h1>��������Ϣ</h1>
		<ul class="tabs">
			<li class="sendpm"><a href="pm.php?action=send">���Ͷ���Ϣ</a></li>
			<li><a href="pm.php?folder=inbox">�ռ���[<span id="pm_unread"><?=$pm_inbox_newpm?></span>]</a></li>
			<li><a href="pm.php?folder=outbox">�ݸ���</a></li>
			<li><a href="pm.php?folder=track">�ѷ���</a></li>
			<li><a href="pm.php?action=search">��������Ϣ</a></li>
			<li class="current"><a href="pm.php?action=archive">��������Ϣ</a></li>
			<li><a href="pm.php?action=ignore">�����б�</a></li>
		</ul>
		<table summary="��������Ϣ" cellspacing="0" cellpadding="0">
			<tr>
				<th>�ļ���</th>
				<td>
					<label><input type="radio" name="folder" value="inbox" checked="checked" /> �ռ���</label>
					<label><input type="radio" name="folder" value="outbox" /> �ݸ���</label>
				</td>
			</tr>
			
			<tr>
				<th>ʱ�䷶Χ</th>
				<td>
					<select name="days">
						<option value="1">1 ��</option>
						<option value="2">2 ��</option>
						<option value="7">1 ��</option>
						<option value="30">1 ����</option>
						<option value="90">3 ����</option>
						<option value="180">6 ����</option>
						<option value="365">1 ��</option>
						<option value="0">ȫ��</option>
					</select>
					<label><input type="radio" name="newerolder" value="newer" checked="checked" /> ����</label>
					<label><input type="radio" name="newerolder" value="older" /> ��ǰ</label>
				</td>
			</tr>
			
			<tr>
				<th><label for="amount">��������Ϣ����</label></th>
				<td>
					<select id="amount" name="amount">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
						<option value="50">50</option>
						<option value="0">ȫ��</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td><label><input class="checkbox" type="checkbox" name="delete" value="1" /> ������ɾ������Ϣ</label></td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td><button type="submit" class="submit" name="archivesubmit" value="true">��������Ϣ</button></td>
			</tr>
			
		</table>
	</div>
</form>