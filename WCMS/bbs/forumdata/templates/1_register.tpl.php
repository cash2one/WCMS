<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<script src="include/javascript/calendar.js" type="text/javascript"></script>

<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ע��</div>

<? if($bbrules && !$rulesubmit) { ?>
	<form name="bbrules" method="post" action="<?=$link_register?>">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<input type="hidden" name="referer" value="<?=$referer?>" />
	<? if($invitecode) { ?>
		<input type="hidden" name="invitecode" value="<?=$invitecode?>" />
	<? } ?>
	<div class="mainbox formbox">
	<h1>ע��</h1>
	<table cellspacing="0" cellpadding="0" width="100%" align="center" class="register">
	<tbody>
	<tr>
	<td><?=$bbrulestxt?></td>
	</tr>
	</tbody>
	<tr class="btns" style="height: 40px">
		<td align="center" id="rulebutton">����ϸ�Ķ����ϵ�ע������Э��</td>
	</tr>

	</table>
	</div>
	</form>

	<script type="text/javascript">
	var secs = 9;
	var wait = secs * 1000;
	$('rulebutton').innerHTML = "����ϸ�Ķ����ϵ�ע������Э�� (" + secs + ")";
	for(i = 1; i <= secs; i++) {
		window.setTimeout("update(" + i + ")", i * 1000);
	}
	window.setTimeout("timer()", wait);
	function update(num, value) {
		if(num == (wait/1000)) {
			$('rulebutton').innerHTML = "����ϸ�Ķ����ϵ�ע������Э��";
		} else {
			printnr = (wait / 1000) - num;
			$('rulebutton').innerHTML = "����ϸ�Ķ����ϵ�ע������Э�� (" + printnr + ")";
		}
	}
	function timer() {
		$('rulebutton').innerHTML = '<button type="submit" id="rulesubmit" name="rulesubmit" value="true">ͬ ��</button> &nbsp; <button type="button" onclick="location.href=\'<?=$boardurl?>\'">��ͬ��</button>';
	}
	</script>
<? } else { ?>
	<script type="text/javascript">
	function showadv() {
		if(document.register.advshow.checked == true) {
			$("adv").style.display = "";
		} else {
			$("adv").style.display = "none";
		}
	}
	</script>
	<script src="include/javascript/msn.js" type="text/javascript"></script>
	<form method="post" name="register" action="<?=$link_register?>?regsubmit=yes" <?=$enctype?> onSubmit="this.regsubmit.disabled=true;">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<input type="hidden" name="referer" value="<?=$referer?>" />
	<div class="mainbox formbox">
		<span class="headactions"><a href="member.php?action=credits&amp;view=promotion_register" target="_blank">�鿴���ֲ���˵��</a></span>
		<h1>ע��</h1>
		<table summary="ע��" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>������Ϣ ( * Ϊ������)</th>
					<td>&nbsp;</td>
				</tr>
			</thead>
		<? if($seccodecheck) { ?>
			<tr>
				<th><label for="seccodeverify">��֤��  *</label></th>
				<td>
					<div id="seccodeimage"></div>
					<input type="text" onfocus="updateseccode();this.onfocus = null" id="seccodeverify" name="seccodeverify" size="8" maxlength="4" onBlur="checkseccode()" tabindex="1" />
					<em class="tips" id="checkseccodeverify"><strong>����������ʾ��֤��</strong> <? if($seccodedata['type'] == 2) { ?>��ȷ�����������֧�� Flash ����ʾ�������������֤�룬���<a href="###" onclick="updateseccode()">����</a>ˢ��<? } elseif($seccodedata['animator'] == 1) { ?>��ȷ�����������֧�ֶ�������ʾ�������������֤�룬���ͼƬˢ��<? } else { ?>�����������֤�룬���ͼƬˢ��<? } ?></em></td>
					<script type="text/javascript">
						var seccodedata = [<?=$seccodedata['width']?>, <?=$seccodedata['height']?>, <?=$seccodedata['type']?>];
					</script>
			</tr>
		<? } ?>

		<? if($secqaa['status']['1']) { ?>
			<tr>
				<th><label for="secanswer">��֤�ʴ�  *</label></th>
				<td>
					<p id="secquestion">Loading question</p>
					<input type="text" name="secanswer" size="25" maxlength="50" id="secanswer" onBlur="checksecanswer()" tabindex="2" />
					<span id="checksecanswer">&nbsp;</span>
					<script type="text/javascript">
					<? if(($attackevasive & 1) && $seccodecheck) { ?>
						setTimeout("ajaxget('ajax.php?action=updatesecqaa&inajax=1', 'secquestion')", 2001);
					<? } else { ?>
						ajaxget('ajax.php?action=updatesecqaa&inajax=1', 'secquestion');
					<? } ?>
					</script>
				</td>
			</tr>
		<? } ?>

		<tr>
			<th><label for="username">�û��� *</label></th>
			<td>
				<input type="text" id="username" name="username" size="25" maxlength="15" onBlur="checkusername()" tabindex="3" />
				<span id="checkusername">&nbsp;</span>
			</td>
		</tr>

		<tr>
			<th><label for="password">����  *</label></td>
			<td>
				<input type="password" name="password" size="25" id="password" onBlur="checkpassword()" tabindex="4" />
				<span id="checkpassword">&nbsp;</span>
			</td>
		</tr>

		<tr>
			<th><label for="password2">ȷ������ *</label></th>
			<td>
				<input type="password" name="password2" size="25" id="password2" onBlur="checkpassword2()" tabindex="5" />
				<span id="checkpassword2">&nbsp;</span>
			</td>
		</tr>

		<tr>
			<th><label for="email">Email *</label></td>
			<td>
				<input type="text" name="email" size="25" id="email" onBlur="checkemail()" tabindex="6" />
				<span id="checkemail"><a href="#" onclick="msnoperate('reghotmail')">���ע��5G����Hotmail����</a><? if($regverify == 1) { ?>&nbsp; ��ȷ��������Ч�����ǽ����ͼ���˵���������ַ<? } ?>
				<? if($accessemail) { ?>&nbsp; ��ֻ��ʹ���� <?=$accessemail?> ��β������<? } elseif($censoremail) { ?>&nbsp; �벻Ҫʹ���� <?=$censoremail?> ��β������<? } ?></span>
			</td>
		</tr>

		<? if($regstatus > 1) { ?>
			<tr>
				<th><label for="invitecode">������<? if($regstatus == 2) { ?> *<? } ?></label></th>
				<td><input type="text" name="invitecode" size="25" maxlength="16" value="<?=$invitecode?>" id="invitecode" onBlur="checkinvitecode()" tabindex="7" />
				<span id="checkinvitecode"></span>
			</td>
			</tr>
		<? } ?>		

		<? if(!empty($fromuser)) { ?>
			<tr>
				<th>�Ƽ���</th>
				<td><input type="text" name="fromuser" size="25" value="<?=$fromuser?>" disabled="disabled" tabindex="9" /></td>
			</tr>
		<? } if(is_array($_DCACHE['fields_required'])) { foreach($_DCACHE['fields_required'] as $field) { ?>			<tr>
			<th><?=$field['title']?>  *<? if($field['description']) { ?><br /><?=$field['description']?><? } ?></th>
			<td>
			<? if($field['selective']) { ?>
				<select name="field_<?=$field['fieldid']?>new" tabindex="10">
				<option value="">- ��ѡ�� -</option><? if(is_array($field['choices'])) { foreach($field['choices'] as $index => $choice) { ?><option value="<?=$index?>" <? if($index == $member['field_'.$field['fieldid']]) { ?>selected="selected"<? } ?>><?=$choice?></option>
				<? } } ?></select>
			<? } else { ?>
				<input type="text" name="field_<?=$field['fieldid']?>new" size="25" value="<?=$member['field_'.$field['fieldid']]?>" tabindex="10" />
			<? } ?>
			<? if($field['unchangeable']) { ?>&nbsp;��������д����Ŀ��һ��ȷ���������޸�<? } ?>
			</td></tr><? } } if($regverify == 2) { ?>
			<tr>
			<th>ע��ԭ�� *</th>
			<td><textarea rows="4" cols="30" name="regmessage" tabindex="11"></textarea></td>
			</tr>
		<? } ?>
		<tr>
			<th><label for="advshow">�߼�ѡ��</label></th>
			<td><label><input id="advshow" name="advshow" class="checkbox" type="checkbox" <?=$advcheck?> value="1" onclick="showadv()" tabindex="12" />��ʾ�߼��û�����ѡ��</label></td>
		</tr>
	</table>

	<table summary="ע�� �߼�ѡ��" cellspacing="0" cellpadding="0" id="adv" style="display: <?=$advdisplay?>;">
		<thead>
			<tr>
				<th>��չ��Ϣ</th>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tr>
			<th><label for="questionid">��ȫ����</label></th>
			<td>
				<select id="questionid" name="questionid" tabindex="13">
					<option value="0">�ް�ȫ����</option>
					<option value="1">ĸ�׵�����</option>
					<option value="2">үү������</option>
					<option value="3">���׳����ĳ���</option>
					<option value="4">������һλ��ʦ������</option>
					<option value="5">�����˼�������ͺ�</option>
					<option value="6">����ϲ���Ĳ͹�����</option>
					<option value="7">��ʻִ�յ������λ����</option>
				</select> ��������ð�ȫ���ʣ���¼ʱ��������Ӧ����Ŀ���ܵ�¼
			</td>
		</tr>

		<tr>
			<th><label for="answer">�ش�</label></th>
			<td><input type="text" id="answer" name="answer" size="25" tabindex="14" /></td>
		</tr><? if(is_array($_DCACHE['fields_optional'])) { foreach($_DCACHE['fields_optional'] as $field) { ?>			<tr>
				<th><?=$field['title']?><? if($field['description']) { ?><br /><?=$field['description']?><? } ?></th>
				<td>
				<? if($field['selective']) { ?>
					<select name="field_<?=$field['fieldid']?>new" tabindex="15">
					<option value="">- ��ѡ�� -</option><? if(is_array($field['choices'])) { foreach($field['choices'] as $index => $choice) { ?><option value="<?=$index?>"><?=$choice?></option>
					<? } } ?></select>
				<? } else { ?>
					<input type="text" name="field_<?=$field['fieldid']?>new" size="25" tabindex="15" />
				<? } ?>
				<? if($field['unchangeable']) { ?>&nbsp;��������д����Ŀ��һ��ȷ���������޸�<? } ?>
				</td>
			</tr><? } } if($groupinfo['allownickname']) { ?>
			<tr>
				<th>�ǳ�</th>
				<td><input type="text" name="nickname" size="25" tabindex="16" />
			</tr>
		<? } ?>

		<tr>
			<th>�Ա�</th>
			<td>
				<label><input type="radio" name="gendernew" value="1" tabindex="17" /> ��</label>
				<label><input type="radio" name="gendernew" value="2" tabindex="18" /> Ů</label>
				<label><input type="radio" name="gendernew" value="0" tabindex="19" checked="checked"> ����</label>
			</td>
		</tr>

		<tr>
			<th><label for="bday">����</label></th>
			<td><input type="text" id="bday" name="bday" size="25" onclick="showcalendar(event, this)" onfocus="showcalendar(event, this);if(this.value=='0000-00-00')this.value=''" value="0000-00-00" tabindex="20" /></td>
		</tr>

		<tr>
			<th><label for="loactionnew">����</label></th>
			<td><input type="text" id="loactionnew" name="locationnew" size="25" tabindex="21" /></td>
		</tr>

		<tr>
			<th><label for="site">������վ</label></th>
			<td><input type="text" id="site" name="site" size="25" tabindex="22" /></td>
		</tr>

		<tr>
			<th><label for="qq">QQ</label></th>
			<td><input type="text" id="qq" name="qq" size="25" tabindex="23" /></td>
		</tr>
		
		<tr>
			<th><label for="msn">MSN</label></th>
			<td>
				<input type="text" name="msn" size="25" tabindex="8" />
				<span id="checkmsn"><a href="#" onclick="msnoperate('download')">�������°�MSN Messenger</a></span>
			</td>
		</tr>

		<tr>
			<th><label for="icq">ICQ</label></th>
			<td><input type="text" id="icq" name="icq" size="25" tabindex="24" /></td>
		</tr>

		<tr>
			<th><label for="yahoo">Yahoo</label></td>
			<td><input type="text" id="yahoo" name="yahoo" size="25" tabindex="25" /></td>
		</tr>

		<tr>
			<th><label for="taobao">��������</label></th>
			<td><input type="text" id="taobao" name="taobao" size="25" tabindex="26" /></td>
		</tr>

		<tr>
			<th><label for="alipay">֧�����˺�</label></td>
			<td><input type="text" id="alipay" name="alipay" size="25" tabindex="27" /></td>
		</tr>

		<tr>
			<th valign="top"><label for="bio">���ҽ���</label></td>
			<td><textarea rows="5" cols="30" id="bio" name="bio" tabindex="28"></textarea></td>
		</tr>

		<thead>
			<tr>
				<th>��̳���Ի�����</th>
				<td>&nbsp;</td>
			</tr>
		</thead>

		<tr>
			<th><label for="styleidnew">������</label></th>
			<td>
				<select id="styleidnew" name="styleidnew" tabindex="29">
					<option value="">- ʹ��Ĭ�� -</option>
					<?=$styleselect?>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for="tppnew">ÿҳ������</label></th>
			<td>
				<select id="tppnew" name="tppnew" tabindex="30">
					<option value="0">- ʹ��Ĭ�� -</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for="pppnew">ÿҳ����</label></th>
			<td>
				<select id="pppnew" name="pppnew" tabindex="31">
					<option value="0">- ʹ��Ĭ�� -</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for="timeoffsetnew">ʱ���趨</label></td>
			<td>
				<select id="timeoffsetnew" name="timeoffsetnew" tabindex="32">
					<option value="9999" selected="selected">- ʹ��Ĭ�� -</option>
					<option value="-12">(GMT -12:00) Eniwetok, Kwajalein</option>
					<option value="-11">(GMT -11:00) Midway Island, Samoa</option>
					<option value="-10">(GMT -10:00) Hawaii</option>
					<option value="-9">(GMT -09:00) Alaska</option>
					<option value="-8">(GMT -08:00) Pacific Time (US &amp; Canada), Tijuana</option>
					<option value="-7">(GMT -07:00) Mountain Time (US &amp; Canada), Arizona</option>
					<option value="-6">(GMT -06:00) Central Time (US &amp; Canada), Mexico City</option>
					<option value="-5">(GMT -05:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>
					<option value="-4">(GMT -04:00) Atlantic Time (Canada), Caracas, La Paz</option>
					<option value="-3.5">(GMT -03:30) Newfoundland</option>
					<option value="-3">(GMT -03:00) Brassila, Buenos Aires, Georgetown, Falkland Is</option>
					<option value="-2">(GMT -02:00) Mid-Atlantic, Ascension Is., St. Helena</option>
					<option value="-1">(GMT -01:00) Azores, Cape Verde Islands</option>
					<option value="0">(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>
					<option value="1">(GMT +01:00) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome</option>
					<option value="2">(GMT +02:00) Cairo, Helsinki, Kaliningrad, South Africa</option>
					<option value="3">(GMT +03:00) Baghdad, Riyadh, Moscow, Nairobi</option>
					<option value="3.5">(GMT +03:30) Tehran</option>
					<option value="4">(GMT +04:00) Abu Dhabi, Baku, Muscat, Tbilisi</option>
					<option value="4.5">(GMT +04:30) Kabul</option>
					<option value="5">(GMT +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5">(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>
					<option value="5.75">(GMT +05:45) Katmandu</option>
					<option value="6">(GMT +06:00) Almaty, Colombo, Dhaka, Novosibirsk</option>
					<option value="6.5">(GMT +06:30) Rangoon</option>
					<option value="7">(GMT +07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8">(GMT +08:00) &#x5317;&#x4eac;(Beijing), Hong Kong, Perth, Singapore, Taipei</option>
					<option value="9">(GMT +09:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>
					<option value="9.5">(GMT +09:30) Adelaide, Darwin</option>
					<option value="10">(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok</option>
					<option value="11">(GMT +11:00) Magadan, New Caledonia, Solomon Islands</option>
					<option value="12">(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island</option>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for="">ʱ���ʽ</label></th>
			<td>
				<label><input type="radio" value="0" name="timeformatnew" tabindex="33" checked="checked" />Ĭ��</label>
				<label><input type="radio" value="1" name="timeformatnew" tabindex="34" />12 Сʱ</label>
				<label><input type="radio" value="2" name="timeformatnew" tabindex="35" />24 Сʱ</label>
			</td>
		</tr>

		<tr>
			<th><label for="dateformatnew">���ڸ�ʽ</label></th>
			<td>
				<select id="dateformatnew" name="dateformatnew" tabindex="36">
					<option value="0">Ĭ��</option><? if(is_array($dateformatlist)) { foreach($dateformatlist as $key => $value) { ?><option value="<?=$key?>"><?=$value?></option><? } } ?></select>
			</td>
		</tr>

		<tr>
			<th>����Ϣ��ʾ��</th>
			<td>
				<label><input type="radio" value="0" name="pmsoundnew" />��</label>
				<input type="radio" value="1" name="pmsoundnew" tabindex="37" checked><a href="images/sound/pm_1.wav" />#1</a>
				<input type="radio" value="2" name="pmsoundnew" tabindex="38"><a href="images/sound/pm_2.wav" />#2</a>
				<input type="radio" value="3" name="pmsoundnew" tabindex="39"><a href="images/sound/pm_3.wav" />#3</a>
			</td>
		</tr>

		<? if($groupinfo['allowcstatus']) { ?>
			<tr>
			<th>�Զ���ͷ��</th>
			<td>
			<input type="text" name="cstatus" size="25" tabindex="40" /></td>
			</tr>
		<? } ?>

		<tr>
		<th>����ѡ��</th>
		<td>
		<? if($groupinfo['allowinvisible']) { ?>
			<input type="checkbox" name="invisiblenew" value="1" tabindex="41" /> �����б�������<br />
		<? } ?>
		<input type="checkbox" name="showemailnew" value="1" tabindex="42" checked="checked" /> Email ��ַ�ɼ�<br />
		<input type="checkbox" name="newsletter" value="1" tabindex="43" checked="checked" /> ͬ�������̳֪ͨ (Email �����Ϣ)<br />
		</tr>

		<? if($groupinfo['allowavatar'] == 1) { ?>
			<tr>
			<th>ͷ��</th>
			<td><input type="text" name="urlavatar" id="urlavatar" size="25" tabindex="44" /><a href="member.php?action=viewavatars&amp;page=1" onclick="ajaxget(this.href, 'avatardiv');doane(event);">��̳ͷ���б�</a>
			<div id="avatardiv" style="display: none; margin-top: 10px;"></div>
			</td>
			</tr>
		<? } elseif($groupinfo['allowavatar'] == 2) { ?>
			<tr>
			<th>ͷ��</th>
			<td><input type="text" name="urlavatar" id="urlavatar" size="25" tabindex="44" /> <a href="member.php?action=viewavatars&amp;page=1" onclick="ajaxget(this.href, 'avatardiv');doane(event);">��̳ͷ���б�</a>
			<div id="avatardiv" style="display: none; margin-top: 10px;"></div>
			<br />��: <input type="text" name="avatarwidth" size="1" value="*" /> &nbsp; ��: <input type="text" name="avatarheight" size="1" value="*" /></td>
			</tr>
		<? } ?>

		<? if($groupinfo['maxsigsize']) { ?>
			<tr>
			<th>����ǩ��<? if($maxsigsize) { ?> (<?=$maxsigsize?> �ֽ�����)<? } ?><br /><br />
			<a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a> <? if($groupinfo['allowsigbbcode']) { ?>����<? } else { ?>����<? } ?><br />
			[img] ���� <? if($groupinfo['allowsigimgcode']) { ?>����<? } else { ?>����<? } ?>
			</th>
			<td><textarea rows="4" cols="30" name="signature" tabindex="45"></textarea></td>
			</tr>
		<? } ?>
		</tbody>
	</table>
	<table summary="Submit Button" cellpadding="0" cellspacing="0">
		<tr>
			<th>&nbsp;</th>
			<td><button class="submit" type="submit" name="regsubmit" value="true" tabindex="100">�ύ</button></td>
		</tr>
		</table>
	</div>
	</form>

	<script type="text/javascript">
	var profile_seccode_invalid = '��֤�����������������д��';
	var profile_secanswer_invalid = '��֤�ʴ�ش������������д��';
	var profile_username_toolong = '�Բ��������û������� 15 ���ַ���������һ���϶̵��û�����';
	var profile_username_tooshort = '�Բ�����������û���С��3���ַ�, ������һ���ϳ����û�����';
	var profile_username_illegal = '�û������������ַ���ϵͳ���Σ���������д��';
	var profile_passwd_illegal = '����ջ�����Ƿ��ַ�����������д��';
	var profile_passwd_notmatch = '������������벻һ�£���������ԡ�';
	var profile_email_illegal = 'Email ��ַ��Ч����������д��';
	var profile_email_invalid = '��ֻ��ʹ���� <?=$accessemail?> ��β�����䣬��������д��';
	var profile_email_censor = '�벻Ҫʹ���� <?=$censoremail?> ��β�����䣬��������д��';
	var profile_email_msn = '<a href="#" onclick="msnoperate(\'regliveid\')">����������ע��ΪMSN�ʺ�</a>';
	var doublee = parseInt('<?=$doublee?>');
	var lastseccode = lastsecanswer = lastusername = lastpassword = lastemail = lastinvitecode = '';
	var xml_http_building_link = '��ȴ������ڽ�������...';
	var xml_http_sending = '��ȴ������ڷ�������...';
	var xml_http_loading = '��ȴ������ڽ�������...';
	var xml_http_load_failed = 'ͨ��ʧ�ܣ���ˢ�����³��ԣ�';
	var xml_http_data_in_processed = 'ͨ�ųɹ����������ڴ�����...';

	$('username').focus();
	function showAvatar(page) {
		var x = new Ajax('XML', 'statusid');
		x.get('member.php?action=viewavatars&page='+page, function(s){
			$("avatardiv").innerHTML = s;
			if($('multipage')) {
				var multiChildNodes = $('multipage').firstChild.childNodes;
				for(k in multiChildNodes) {
					if(multiChildNodes[k].href) {
						var r = multiChildNodes[k].href.match(/page=(\d*)/);
						var currpage = parseInt(r[1]);
		 				if(multiChildNodes) {
							multiChildNodes[k].href = isNaN(currpage) ? '' : 'javascript:showAvatar("'+currpage+'")';
						}
					}
				}
			}
		});
	}

	function checkseccode() {
		var seccodeverify = $('seccodeverify').value;
		if(seccodeverify == lastseccode) {
			return;
		} else {
			lastseccode = seccodeverify;
		}
		var cs = $('checkseccodeverify');
		<? if($seccodedata['type'] != 1) { ?>
			if(!(/[0-9A-Za-z]{4}/.test(seccodeverify))) {
				warning(cs, profile_seccode_invalid);
				return;
			}
		<? } else { ?>
			if(seccodeverify.length != 2) {
				warning(cs, profile_seccode_invalid);
				return;
			}
		<? } ?>
		ajaxresponse('checkseccodeverify', 'action=checkseccode&seccodeverify=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(seccodeverify) : seccodeverify));
	}
	function checksecanswer() {
	        var secanswer = $('secanswer').value;
		if(secanswer == lastsecanswer) {
			return;
		} else {
			lastsecanswer = secanswer;
		}
		ajaxresponse('checksecanswer', 'action=checksecanswer&secanswer=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(secanswer) : secanswer));
	}
	function checkusername() {
		var username = trim($('username').value);
		if(username == lastusername) {
			return;
		} else {
			lastusername = username;
		}
		var cu = $('checkusername');
		var unlen = username.replace(/[^\x00-\xff]/g, "**").length;

		if(unlen < 3 || unlen > 15) {
			warning(cu, unlen < 3 ? profile_username_tooshort : profile_username_toolong);
			return;
		}
                ajaxresponse('checkusername', 'action=checkusername&username=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username));
	}
	function checkpassword(confirm) {
		var password = $('password').value;
		if(!confirm && password == lastpassword) {
			return;
		} else {
			lastpassword = password;
		}
		var cp = $('checkpassword');
		if(password == '' || /[\'\"\\]/.test(password)) {
			warning(cp, profile_passwd_illegal);
			return false;
		} else {
			cp.style.display = 'none';
			if(!confirm) {
				checkpassword2(true);
			}
			return true;
		}
	}
	function checkpassword2(confirm) {
		var password = $('password').value;
		var password2 = $('password2').value;
		var cp2 = $('checkpassword2');
		if(password2 != '') {
			checkpassword(true);
		}
		if(password == '' || (confirm && password2 == '')) {
			cp2.style.display = 'none';
			return;
		}
		if(password != password2) {
			warning(cp2, profile_passwd_notmatch);
		} else {
			cp2.style.display = 'none';
		}
	}
	function checkemail() {
		var email = trim($('email').value);
		if(email == lastemail) {
			return;
		} else {
			lastemail = email;
		}
		var ce = $('checkemail');
		var accessemail = '<?=$accessemail?>';
		var censoremail = '<?=$censoremail?>';
		var accessexp = accessemail != '' ? <?=$accessexp?> : null;
		var censorexp = censoremail != '' ? <?=$censorexp?> : null;

		illegalemail = !(/^[\-\.\w]+@[\.\-\w]+(\.\w+)+$/.test(email));
		invalidemail = accessemail != '' ? !accessexp.test(email) : censoremail != '' && censorexp.test(email);
		if(illegalemail || invalidemail) {
			warning(ce, illegalemail ? profile_email_illegal : (accessemail != '' ? profile_email_invalid : profile_email_censor));
			return;
		}

		if(!(/@(msn|hotmail|live)\.com$/.test(email))) {
			$('checkemail').style.display = '';
			$('checkemail').innerHTML = ' &nbsp; ' + profile_email_msn;
			return;
		}

		if(!doublee) {
			ajaxresponse('checkemail', 'action=checkemail&email=' + email);
		} else {
			ce.innerHTML = '<img src="<?=IMGDIR?>/check_right.gif" width="13" height="13">';
		}

	}
	function checkinvitecode() {
		var invitecode = trim($('invitecode').value);
		if(invitecode == lastinvitecode) {
			return;
		} else {
			lastinvitecode = invitecode;
		}
                ajaxresponse('checkinvitecode', 'action=checkinvitecode&invitecode=' + invitecode);
	}
	function trim(str) {
		return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
	}
        function ajaxresponse(objname, data) {
        	var x = new Ajax('XML', objname);
        	x.get('ajax.php?inajax=1&' + data, function(s){
        	        var obj = $(objname);
        	        if(s == 'succeed') {
        	        	obj.style.display = '';
        	                obj.innerHTML = '<img src="<?=IMGDIR?>/check_right.gif" width="13" height="13">';
        			obj.className = "warning";
        		} else {
        			warning(obj, s);
        		}
        	});
        }
	function warning(obj, msg) {
		if((ton = obj.id.substr(5, obj.id.length)) != 'password2') {
			$(ton).select();
		}
		obj.style.display = '';
		obj.innerHTML = '<img src="<?=IMGDIR?>/check_error.gif" width="13" height="13"> &nbsp; ' + msg;
		obj.className = "warning";
	}
	</script>

<? } include template('footer'); ?>