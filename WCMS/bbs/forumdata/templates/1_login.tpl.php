<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ��Ա��¼</div>

<form method="post" name="login" action="logging.php?action=login&amp;">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="referer" value="<?=$referer?>" />
<div class="mainbox formbox">
	<span class="headactions"><a href="faq.php?action=message&amp;id=3" target="_blank">��¼����</a></span>
	<h1>��Ա��¼</h1>
	<table summary="��Ա��¼" cellspacing="0" cellpadding="0">
		<? if($seccodecheck) { ?>
			<tr>
				<th><label for="seccodeverify">��֤��</label></th>
				<td>
					<div id="seccodeimage"></div>
					<input type="text" onfocus="updateseccode();this.onfocus = null" id="seccodeverify" name="seccodeverify" size="8" maxlength="4" tabindex="1" />
					<em class="tips"><strong>����������ʾ��֤��</strong> <? if($seccodedata['type'] == 2) { ?>��ȷ�����������֧�� Flash ����ʾ�������������֤�룬���<a href="###" onclick="updateseccode()">����</a>ˢ��<? } elseif($seccodedata['animator'] == 1) { ?>��ȷ�����������֧�ֶ�������ʾ�������������֤�룬���ͼƬˢ��<? } else { ?>�����������֤�룬���ͼƬˢ��<? } ?></em></td>
					<script type="text/javascript">
						var seccodedata = [<?=$seccodedata['width']?>, <?=$seccodedata['height']?>, <?=$seccodedata['type']?>];
					</script>
			</tr>
		<? } ?>
		<tr>
			<th onclick="document.login.username.focus();">
				<label><input class="radio" type="radio" name="loginfield" value="username" tabindex="2" checked="checked" />�û���</label>
				<label><input class="radio" type="radio" name="loginfield" value="uid" tabindex="3" />UID</label>
			</th>
			<td>
				<input type="text" id="username" name="username" size="25" maxlength="40" tabindex="4" />
				<a href="<?=$regname?>">����ע��</a>
			</td>
		</tr>
		<tr>
			<th><label for="password">����</label></th>
			<td>
				<input type="password" id="password" name="password" size="25" tabindex="5" />
				<a href="member.php?action=lostpasswd">��������</a>
			</td>
		</tr>
		<tr>
			<th><label for="questionid">��ȫ����</label></th>
			<td>
				<select id="questionid" name="questionid" tabindex="6">
					<option value="0">�ް�ȫ����</option>
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
			<td><input type="text" id="answer" name="answer" size="25" tabindex="7" /> ����������˰�ȫ���ʣ���ش���ȷ�Ĵ�</td>
		</tr>
		<tr>
			<th>��¼��Ч��</th>
			<td>
				<label><input class="radio" type="radio" name="cookietime" value="315360000" tabindex="8" <?=$cookietimecheck['315360000']?> /> ����</label>
				<label><input class="radio" type="radio" name="cookietime" value="2592000" tabindex="9" <?=$cookietimecheck['2592000']?> /> һ����</label>
				<label><input class="radio" type="radio" name="cookietime" value="86400" tabindex="10" <?=$cookietimecheck['86400']?> /> һ��</label>
				<label><input class="radio" type="radio" name="cookietime" value="3600" tabindex="11" <?=$cookietimecheck['3600']?> /> һСʱ</label>
				<label><input class="radio" type="radio" name="cookietime" value="0" tabindex="12" <?=$cookietimecheck['0']?> /> ���������</label>
			</td>
		</tr>
		<tr>
			<th><label for="loginmode">�����¼</label></th>
			<td>
				<select id="loginmode" name="loginmode" tabindex="13">
					<option value="">- ʹ��Ĭ�� -</option>
					<option value="normal"> ����ģʽ</option>
					<option value="invisible"> ����ģʽ</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="styleid">������</label></th>
			<td>
				<select id="styleid" name="styleid" tabindex="14">
					<option value="">- ʹ��Ĭ�� -</option>
					<?=$styleselect?>
				</select>
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td><button class="submit" type="submit" name="loginsubmit" value="true" tabindex="100">�ύ</button></td>
		</tr>
	</table>
</div>
</form>

<script type="text/javascript">
document.login.username.focus();

var mydate = new Date();
var mytimestamp = parseInt(mydate.valueOf() / 1000);
if(Math.abs(mytimestamp - <?=$timestamp?>) > 86400) {
	window.alert('ע��:\n\n�����ؼ������ʱ���趨����̳ʱ������ 24 ��Сʱ��\n����ܻ�Ӱ������������¼����������ؼ�������á�\n\n��ǰ��̳ʱ����: <?=$thetimenow?>\n�������Ϊ��̳ʱ�䲻׼ȷ��������̳����Ա��ϵ��');
}
</script>
<? include template('footer'); ?>
