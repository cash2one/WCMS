<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<form method="post" onSubmit="if(this.srchtype[0].value=='qihoo' && this.srchtype[0].checked) this.target='_blank'; else this.target=''; return true;">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="mainbox formbox">
		<h1>��������Ϣ</h1>
		<ul class="tabs headertabs">
			<li class="sendpm"><a href="pm.php?action=send">���Ͷ���Ϣ</a></li>
			<li><a href="pm.php?folder=inbox">�ռ���[<span id="pm_unread"><?=$pm_inbox_newpm?></span>]</a></li>
			<li><a href="pm.php?folder=outbox">�ݸ���</a></li>
			<li><a href="pm.php?folder=track">�ѷ���</a></li>
			<li class="current"><a href="pm.php?action=search">��������Ϣ</a></li>
			<li><a href="pm.php?action=archive">��������Ϣ</a></li>
			<li><a href="pm.php?action=ignore">�����б�</a></li>
		</ul>
		<table summary="��������Ϣ" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>����</th>
					<td>&nbsp;</td>
				</tr>
			</thead>
			<tr>
				<th><label for="srchtxt">�ؼ���</label></th>
				<td colspan="2">
					<input type="text" id="srchtxt" name="srchtxt" size="25" maxlength="40" />
					<div class="tips">�ؼ����п�ʹ��ͨ��� "<strong>*</strong>"<br />ƥ�����ؼ���ȫ��������<strong>�ո�</strong>�� "<strong>AND</strong>" ���ӡ��� win32 <strong>AND</strong> unix<br />ƥ�����ؼ������в��֣����� "<strong>|</strong>" �� "<strong>OR</strong>" ���ӡ��� win32 <strong>OR</strong> unix</div>
				</td>
			</tr>
			
			<tr>
				<th><label for="srchname">�����˻�������</label></th>
				<td colspan="2">
					<input type="text" id="srchname" name="srchuname" size="25" maxlength="40" />
					<div class="tips">�����˻��������û����п�ʹ��ͨ��� "*"���� *user*</div>
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td><button type="submit" class="submit" name="searchsubmit" value="true">����</button></td>
			</tr>
			
			<thead>
				<tr>
					<th>����ѡ��</th>
					<td>&nbsp;</td>
				</tr>
			</thead>
			
			<tr>
				<th><label for="srchfolder">������Χ</label></th>
				<td>
					<select id="srchfolder" name="srchfolder">
						<option value="inbox">�ռ���</option>
						<option value="outbox">�ݸ���</option>
						<option value="track">�ѷ���</option>
					</select>
					<label><input type="radio" name="srchtype" value="title" checked="checked" /> ��������</label>
					<label><input type="radio" name="srchtype" value="fulltext" <?=$ftdisabled?> /> ȫ������</label>
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td>
					<label><input type="checkbox" name="srchread" value="1" checked="checked" /> �Ѷ�����Ϣ</label>
					<label><input type="checkbox" name="srchunread" value="1" checked="checked" /> δ������Ϣ</label>
				</td>
			</tr>
			
			<tr>
				<th><label for="srchfrom">����ʱ��</label></th>
				<td>
					<select id="srchfrom" name="srchfrom">
						<option value="0">ȫ��ʱ��</option>
						<option value="86400">1 ��</option>
						<option value="172800">2 ��</option>
						<option value="432000">1 ��</option>
						<option value="1296000">1 ����</option>
						<option value="5184000">3 ����</option>
						<option value="8640000">6 ����</option>
						<option value="31536000">1 ��</option>
					</select>
					<label><input type="radio" name="before" value="" checked="checked" /> ����</label>
					<label><input type="radio" name="before" value="1" /> ��ǰ</label>
				</td>
			</tr>
			
			
			<tr>
				<th><label for="orderby">��������</label></th>
				<td>
					<select id="orderby" name="orderby">
						<option value="dateline"> ���շ�ʱ��</option>
						<option value="msgfrom"> ���շ�������</option>
					</select>
					<label><input type="radio" name="ascdesc" value="asc" /> ����������</label>
					<label><input type="radio" name="ascdesc" value="desc" checked /> ����������</label>
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td><button type="submit" class="submit" name="searchsubmit" value="true">����</button></td>
			</tr>
		</table>
	</div>
</form>