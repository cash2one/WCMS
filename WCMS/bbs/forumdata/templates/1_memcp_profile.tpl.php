<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div class="container">
	<div id="foruminfo">
		<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �༭��������</div>
	</div>
	<div class="content">

<script src="include/javascript/calendar.js" type="text/javascript"></script>
<script src="include/javascript/bbcode.js" type="text/javascript"></script>
<script type="text/javascript">
var charset = '<?=$charset?>';
var maxsigsize = parseInt('<?=$maxsigsize?>');
var maxbiosize = parseInt('<?=$maxbiosize?>');
var maxbiotradesize = parseInt('<?=$maxbiotradesize?>');
var allowhtml = 0;
var forumallowhtml = 0;
var allowsmilies = 0;
var allowbbcode = 0;
var allowimgcode = 0;
var allowbiobbcode = parseInt('<?=$allowbiobbcode?>');
var allowbioimgcode = parseInt('<?=$allowbioimgcode?>');
var allowsigbbcode = parseInt('<?=$allowsigbbcode?>');
var allowsigimgcode = parseInt('<?=$allowsigimgcode?>');

function parseurl(str, mode) {
	str = str.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, mode == 'html' ? '$1<img src="$2" border="0">' : '$1[img]$2[/img]');
	str = str.replace(/([^>=\]"'\/@]|^)((((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|ed2k):\/\/)|www\.)([\w\-]+\.)*[:\.@\-\w\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!#]*)*)/ig, mode == 'html' ? '$1<a href="$2" target="_blank">$2</a>' : '$1[url]$2[/url]');
	str = str.replace(/([^\w>=\]:"'\.\/]|^)(([\-\.\w]+@[\.\-\w]+(\.\w+)+))/ig, mode == 'html' ? '$1<a href="mailto:$2">$2</a>' : '$1[email]$2[/email]');
	return str;
}

function validate(theform) {
	<? if($typeid == 4) { ?>
		<? if($maxsigsize) { ?>
		if(mb_strlen(theform.signaturenew.value) > maxsigsize) {
			alert('����ǩ�����ȳ��� <?=$maxsigsize?> �ַ������ƣ��뷵���޸ġ�');
			return false;
		}
		<? } ?>
		if(mb_strlen(theform.bionew.value) > maxbiosize) {
			alert('�������ҽ��ܳ��ȳ��� <?=$maxbiosize?> �ַ������ƣ��뷵���޸ġ�');
			return false;
		}
		if(mb_strlen(theform.biotradenew.value) > maxbiotradesize) {
			alert('���ĵ��̽��ܳ��ȳ��� <?=$maxbiotradesize?> �ַ������ƣ��뷵���޸ġ�');
			return false;
		}
	<? } ?>
	return true;
}

function previewavatar(url) {
	if(url) {
		$('avatarpreview').innerHTML = '<img id="previewimg" /><br />';
		$('previewimg').src = url;
		if($('avatarwidthnew')) {
			$('avatarwidthnew').value = $('previewimg').clientWidth;
			$('avatarheightnew').value = $('previewimg').clientHeight;
		}
	} else {
		$('avatarpreview').innerHTML = '';
	}
}

</script>
<form name="reg" method="post" action="memcp.php?action=profile&amp;typeid=<?=$typeid?>" <?=$enctype?> onSubmit="return validate(this)">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<div class="mainbox formbox">
			<h1>�༭��������</h1>
			<ul class="tabs <? if($typeid==3) { ?>headertabs<? } ?>">
				<? if(!$passport_status) { ?><li<? if($typeid==1) { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=1">��̳��¼</a></li><? } ?>
				<li<? if($typeid==2) { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=2">��������</a></li>
				<? if(!empty($_DCACHE['fields_required']) || !empty($_DCACHE['fields_optional'])) { ?>
					<li<? if($typeid==3) { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=3">��չ����</a></li>
				<? } ?>
				<li<? if($typeid==4) { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=4">���Ի�����</a></li>
				<li<? if($typeid==5) { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=5">��̳ѡ��</a></li>
			</ul>
<table summary="�༭��������" cellspacing="0" cellpadding="0">

<? if($seccodecheck) { ?>
	<tr>
		<th><label for="seccodeverify">��֤��</label></th>
		<td>
			<div id="seccodeimage"></div>
			<input type="text" onfocus="updateseccode();this.onfocus = null" id="seccodeverify" name="seccodeverify" size="8" maxlength="4" />
			<em class="tips"><strong>����������ʾ��֤��</strong> <? if($seccodedata['type'] == 2) { ?>��ȷ�����������֧�� Flash ����ʾ�������������֤�룬���<a href="###" onclick="updateseccode()">����</a>ˢ��<? } elseif($seccodedata['animator'] == 1) { ?>��ȷ�����������֧�ֶ�������ʾ�������������֤�룬���ͼƬˢ��<? } else { ?>�����������֤�룬���ͼƬˢ��<? } ?></em></td>
			<script type="text/javascript">
				var seccodedata = [<?=$seccodedata['width']?>, <?=$seccodedata['height']?>, <?=$seccodedata['type']?>];
			</script>
	</tr>
<? } if($typeid == 1 && !$passport_status) { ?>

	<tr>
		<th><label for="oldpassword">ԭ����</label></th>
		<td><input type="password" name="oldpassword" id="oldpassword" size="25" /></td>
	</tr>

	<tr>
		<th><label for="newpassword">������</label></th>
		<td><input type="password" name="newpassword" id="newpassword" size="25" /></td>
	</tr>

	<tr>
		<th><label for="newpassword2">ȷ��������</label></th>
		<td><input type="password" name="newpassword2" id="newpassword2" size="25" /></td>
	</tr>

	<tr>
		<th><label for="emailnew">Email</label></th>
		<td><input type="text" name="emailnew" id="emailnew" size="25" value="<?=$member['email']?>" />
		<? if($regverify == 1 && (($grouptype == 'member' && $adminid == 0) && $groupid == 8)) { ?> <em>!����ĵ�ַ��ϵͳ���޸��������벢������֤����Ч�ԣ�������</em><? } ?>
	</td>
	</tr>

	<tr>
		<th><label for="questionidnew">��ȫ����</label></th>
		<td><select name="questionidnew" id="questionidnew">
		<? if($discuz_secques) { ?><option value="-1">����ԭ�еİ�ȫ���ʺʹ�</option><? } ?>
		<option value="0">�ް�ȫ����</option>
		<option value="1">ĸ�׵�����</option>
		<option value="2">үү������</option>
		<option value="3">���׳����ĳ���</option>
		<option value="4">������һλ��ʦ������</option>
		<option value="5">�����˼�������ͺ�</option>
		<option value="6">����ϲ���Ĳ͹�����</option>
		<option value="7">��ʻִ�յ������λ����</option>
		</select> <em>��������ð�ȫ���ʣ���¼ʱ��������Ӧ����Ŀ���ܵ�¼</em>
		</td>
	</tr>

	<tr>
		<th><label for="answernew">�ش�</label></th>
		<td><input type="text" name="answernew" id="answernew" size="25" /> <em>���������µİ�ȫ���ʣ����ڴ������</em></td>
	</tr>

<? } elseif($typeid == 2) { ?>

	<? if($allownickname) { ?>
		<tr>
		<th><label for="nicknamenew">�ǳ�</label></th>
		<td><input type="text" name="nicknamenew" id="nicknamenew" size="25" value="<?=$member['nickname']?>" /></td>
		</tr>
	<? } ?>

	<? if($allowcstatus) { ?>
		<tr>
		<th><label for="cstatusnew">�Զ���ͷ��</label></th>
		<td>
		<input type="text" name="cstatusnew" id="cstatusnew" size="25" value="<?=$member['customstatus']?>" /></td>
		</tr>
	<? } ?>

	<tr>
	<th>�Ա�</th>
	<td>
	<label><input class="radio" type="radio" name="gendernew" value="1" <?=$gendercheck['1']?> /> �� &nbsp;<label>
	<label><input class="radio" type="radio" name="gendernew" value="2" <?=$gendercheck['2']?> /> Ů &nbsp;</label>
	<label><input class="radio" type="radio" name="gendernew" value="0" <?=$gendercheck['0']?> /> ����</label>
	</td></tr>

	<tr>
	<th><label for="bdaynew">����</label></th>
	<td><input type="text" name="bdaynew" id="bdaynew" size="25" onclick="showcalendar(event, this)" onfocus="showcalendar(event, this);if(this.value=='0000-00-00')this.value=''" value="<?=$member['bday']?>" /></td>
	</tr>

	<tr>
	<th><label for="locationnew">����</label></th>
	<td><input type="text" name="locationnew" id="locationnew" size="25" value="<?=$member['location']?>" /></td>
	</tr>

	<tr>
	<th><label for="sitenew">������վ</label></th>
	<td><input type="text" name="sitenew" id="sitenew" size="25" value="<?=$member['site']?>" /></td>
	</tr>

	<tr>
	<th><label for="qqnew">QQ</label></th>
	<td><input type="text" name="qqnew" id="qqnew" size="25" value="<?=$member['qq']?>" /></td>
	</tr>

	<tr>
	<th><label for="icqnew">ICQ</label></th>
	<td><input type="text" name="icqnew" id="icqnew" size="25" value="<?=$member['icq']?>" /></td>
	</tr>

	<tr>
	<th><label for="yahoonew">Yahoo</label></th>
	<td><input type="text" name="yahoonew" id="yahoonew" size="25" value="<?=$member['yahoo']?>" /></td>
	</tr>

	<tr>
	<th><label for="msnnew">MSN</label></th>
	<td><input type="text" name="msnnew" id="msnnew" size="25" value="<?=$member['msn']?>" /></td>
	</tr>

	<tr>
	<th><label for="taobaonew">��������</label></th>
	<td><input type="text" name="taobaonew" id="taobaonew" size="25" value="<?=$member['taobao']?>" /></td>
	</tr>

	<tr>
	<th><label for="alipaynew">֧�����˺�</label></th>
	<td><input type="text" name="alipaynew" id="alipaynew" size="25" value="<?=$member['alipay']?>" /></td>
	</tr>

<? } elseif($typeid == 3 && (!empty($_DCACHE['fields_required']) || !empty($_DCACHE['fields_optional']))) { ?>

	<? if($_DCACHE['fields_required']) { ?>
		<thead class="separation">
		<tr>
		<td colspan="2">������Ϣ ( * Ϊ������)</td>
		</tr>
		</thead><? if(is_array($_DCACHE['fields_required'])) { foreach($_DCACHE['fields_required'] as $field) { ?>			<tr>
			<th><?=$field['title']?><? if($field['description']) { ?><br /><em><?=$field['description']?></em><? } ?></th>
			<td>
			<? if($field['selective']) { ?>
				<select name="field_<?=$field['fieldid']?>new" <? if($member['field_'.$field['fieldid']] && $field['unchangeable']) { ?>disabled<? } ?>>
				<option value="">- ��ѡ�� -</option><? if(is_array($field['choices'])) { foreach($field['choices'] as $index => $choice) { ?><option value="<?=$index?>" <? if($index == $member['field_'.$field['fieldid']]) { ?>selected="selected"<? } ?>><?=$choice?></option>
				<? } } ?></select>
			<? } else { ?>
				<input type="text" name="field_<?=$field['fieldid']?>new" size="25" value="<?=$member['field_'.$field['fieldid']]?>" <? if($member['field_'.$field['fieldid']] && $field['unchangeable']) { ?>disabled<? } ?> />
			<? } ?>
			<? if($field['unchangeable']) { ?>&nbsp;<em>��������д����Ŀ��һ��ȷ���������޸�</em><? } ?>
			</td></tr><? } } } ?>

	<? if($_DCACHE['fields_optional']) { ?>
		<thead class="separation">
		<tr>
		<td colspan="2">��չ��Ϣ</td>
		</tr>
		</thead><? if(is_array($_DCACHE['fields_optional'])) { foreach($_DCACHE['fields_optional'] as $field) { ?>			<tr>
			<th><label for="field_<?=$field['fieldid']?>new"><?=$field['title']?><? if($field['description']) { ?><br /><em><?=$field['description']?></em><? } ?></label></th>
			<td>
			<? if($field['selective']) { ?>
				<select name="field_<?=$field['fieldid']?>new" id="field_<?=$field['fieldid']?>new" <? if($member['field_'.$field['fieldid']] && $field['unchangeable']) { ?>disabled<? } ?>>
				<option value="">- ��ѡ�� -</option><? if(is_array($field['choices'])) { foreach($field['choices'] as $index => $choice) { ?><option value="<?=$index?>" <? if($index == $member['field_'.$field['fieldid']]) { ?>selected="selected"<? } ?>><?=$choice?></option>
				<? } } ?></select>
			<? } else { ?>
				<input type="text" name="field_<?=$field['fieldid']?>new" size="25" value="<?=$member['field_'.$field['fieldid']]?>" <? if($member['field_'.$field['fieldid']] && $field['unchangeable']) { ?>disabled<? } ?> />
			<? } ?>
			<? if($field['unchangeable']) { ?>&nbsp;<em>��������д����Ŀ��һ��ȷ���������޸�</em><? } ?>
			</td></tr><? } } } } elseif($typeid == 4) { ?>

	<? if($allowavatar == 1) { ?>
		<tr>
		<th valign="top"><label for="urlavatar">ͷ��</label></td>
		<td>
		<span id="avatarpreview"><? if($member['avatar']) { ?><img src="<?=$member['avatar']?>" /><br /><? } ?></span>
		<input type="text" name="urlavatar" id="urlavatar" onchange="previewavatar(this.value)" size="25" value="<?=$member['avatar']?>" /> &nbsp; <a href="member.php?action=viewavatars&amp;page=1" onclick="ajaxget(this.href, 'avatardiv');doane(event);">��̳ͷ���б�</a>
		<span id="statusid"></span>
		<div id="avatardiv" style="display: none; margin-top: 10px;"></div></td>
		</tr>
	<? } elseif($allowavatar == 2) { ?>
		<tr>
		<th valign="top"><label for="urlavatar">ͷ��</label></th>
		<td>
		<span id="avatarpreview"><? if($member['avatar']) { ?><img src="<?=$member['avatar']?>" width="<?=$member['avatarwidth']?>" height="<?=$member['avatarheight']?>" /><br /><? } ?></span>
		<input type="text" name="urlavatar" id="urlavatar" onchange="previewavatar(this.value)" size="25" value="<?=$member['avatar']?>" /> &nbsp; <a href="member.php?action=viewavatars&amp;page=1" onclick="ajaxget(this.href, 'avatardiv');doane(event);">��̳ͷ���б�</a>
		<div id="avatardiv" style="display: none; margin-top: 10px;"></div>
		<br />��: <input type="text" name="avatarwidthnew" id="avatarwidthnew" size="1" value="<?=$member['avatarwidth']?>" /> &nbsp; ��: <input type="text" name="avatarheightnew" id="avatarheightnew" size="1" value="<?=$member['avatarheight']?>" /></td>
		</tr>
	<? } elseif($allowavatar == 3) { ?>
		<tr>
		<th valign="top"><label for="urlavatar">ͷ��</label></th>
		<td>
		<span id="avatarpreview"><? if($member['avatar']) { ?><img src="<?=$member['avatar']?>" width="<?=$member['avatarwidth']?>" height="<?=$member['avatarheight']?>" /><br /><? } ?></span>
		<input type="text" name="urlavatar" id="urlavatar" onchange="previewavatar(this.value)" size="25" value="<?=$member['avatar']?>" /> &nbsp; <a href="member.php?action=viewavatars&amp;page=1" onclick="ajaxget(this.href, 'avatardiv');doane(event);">��̳ͷ���б�</a>
		<div id="avatardiv" style="display: none; margin-top: 10px;"></div>
		<br /><input type="file" name="customavatar" onchange="$('avatarwidthnew').value = $('avatarheightnew').value = '*';$('urlavatar').value = '';if(this.value) previewavatar('');" size="25" />
		<br />��: <input type="text" name="avatarwidthnew" id="avatarwidthnew" size="1" value="<?=$member['avatarwidth']?>" /> &nbsp; ��: <input type="text" name="avatarheightnew" id="avatarheightnew" size="1" value="<?=$member['avatarheight']?>" /></td>
		</tr>
	<? } ?>

	<tr>
	<th valign="top"><label for="bionew">���ҽ��� (<?=$maxbiosize?> �ֽ�����)<br /><em>��֧���Զ��� Discuz! ����<br /><br />
	<a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a> <b><? if($allowbiobbcode) { ?>����<? } else { ?>����<? } ?></b><br />
	[img] ���� <b><? if($allowbioimgcode) { ?>����<? } else { ?>����<? } ?></b><br /><br />
	<a href="###" onclick="allowbbcode = allowbiobbcode;allowimgcode = allowbioimgcode;$('biopreview').innerHTML = bbcode2html($('bionew').value)">Ԥ��</a>
	</em></label></th>
	<td><div id="biopreview"></div><textarea rows="8" cols="30" style="width: 380px" id="bionew" name="bionew"><?=$member['bio']?></textarea>
	</td>
	</tr>

	<tr>
	<th valign="top"><label for="biotradenew">���̽��� (<?=$maxbiotradesize?> �ֽ�����)<br /><em>��֧���Զ��� Discuz! ����<br /><br />
	<a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a> <b>����</b><br />
	[img] ���� <b>����</b><br /><br />
	<a href="###" onclick="allowbbcode = 1;allowimgcode = 1;$('biotradepreview').innerHTML = bbcode2html($('biotradenew').value)">Ԥ��</a>
	</em></label></th>
	<td><div id="biotradepreview"></div><textarea rows="8" cols="30" style="width: 380px" id="biotradenew" name="biotradenew"><?=$member['biotrade']?></textarea>
	</td>
	</tr>

	<? if($maxsigsize) { ?>
		<tr>
		<th valign="top"><label for="signaturenew">����ǩ�� (<?=$maxsigsize?> �ֽ�����)<br /><em>��֧���Զ��� Discuz! ����</em><br /><br />
		<em>
		<a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a><b><? if($allowsigbbcode) { ?>����<? } else { ?>����<? } ?></b><br />
		[img] ���� <b><? if($allowsigimgcode) { ?>����<? } else { ?>����<? } ?></b><br /><br />
		<a href="###" onclick="allowbbcode = allowsigbbcode;allowimgcode = allowsigimgcode;$('signaturepreview').innerHTML = bbcode2html($('signaturenew').value)">Ԥ��</a>
		</em></label></th>
		<td><div id="signaturepreview"></div><textarea rows="8" cols="30" style="width: 380px" id="signaturenew" name="signaturenew"><?=$member['signature']?></textarea>
		</td>
		</tr>
	<? } } elseif($typeid == 5) { ?>

	<tr>
	<th>������</th>
	<td><select name="styleidnew">
	<option value="">- ʹ��Ĭ�� -</option>
	<?=$styleselect?></select></td>
	</tr>

	<tr>
	<th>ÿҳ������</th>
	<td><select name="tppnew">
	<option value="0" <?=$tppchecked['0']?>>- ʹ��Ĭ�� -</option>
	<option value="10" <?=$tppchecked['10']?>>10</option>
	<option value="20" <?=$tppchecked['20']?>>20</option>
	<option value="30" <?=$tppchecked['30']?>>30</option>
	</select></td>
	</tr>

	<tr>
	<th>ÿҳ����</th>
	<td><select name="pppnew">
	<option value="0" <?=$pppchecked['0']?>>- ʹ��Ĭ�� -</option>
	<option value="5" <?=$pppchecked['5']?>>5</option>
	<option value="10" <?=$pppchecked['10']?>>10</option>
	<option value="15" <?=$pppchecked['15']?>>15</option>
	</select></td>
	</tr>

	<tr>
	<th>ǩ����ʾ����</th>
	<td><select name="ssnew">
	<option value="2" <?=$sschecked['2']?>>- ʹ��Ĭ�� -</option>
	<option value="1" <?=$sschecked['1']?>>��ʾǩ��</option>
	<option value="0" <?=$sschecked['0']?>>����ʾǩ��</option>
	</select></td>
	</tr>
	<tr>
	<th>ͷ����ʾ����</th>
	<td><select name="sanew">
	<option value="2" <?=$sachecked['2']?>>- ʹ��Ĭ�� -</option>
	<option value="1" <?=$sachecked['1']?>>��ʾͷ��</option>
	<option value="0" <?=$sachecked['0']?>>����ʾͷ��</option>
	</select></td>
	</tr>
	<tr>
	<th>ͼƬ��ʾ����<br /><em>�����ϴ��ĸ���ͼƬ�� [img] ����ͼƬ</em></th>
	<td><select name="sinew">
	<option value="2" <?=$sichecked['2']?>>- ʹ��Ĭ�� -</option>
	<option value="1" <?=$sichecked['1']?>>��ʾͼƬ</option>
	<option value="0" <?=$sichecked['0']?>>����ʾͼƬ</option>
	</select></td>
	</tr>

	<tr>
	<th>�༭��ģʽ</th>
	<td><select name="editormodenew">
	<option value="2" <?=$emcheck['2']?>>- ʹ��Ĭ�� -</option>
	<option value="0" <?=$emcheck['0']?>>Discuz! ����ģʽ</option>
	<option value="1" <?=$emcheck['1']?>>����������ģʽ</option>
	</select></td>
	</tr>

	<tr>
	<th>ʱ���趨</th>
	<td>
	<select name="timeoffsetnew">
	<option value="9999" <?=$toselect['9999']?>>- ʹ��Ĭ�� -</option>
	<option value="-12" <?=$toselect['-12']?>>(GMT -12:00) Eniwetok, Kwajalein</option>
	<option value="-11" <?=$toselect['-11']?>>(GMT -11:00) Midway Island, Samoa</option>
	<option value="-10" <?=$toselect['-10']?>>(GMT -10:00) Hawaii</option>
	<option value="-9" <?=$toselect['-9']?>>(GMT -09:00) Alaska</option>
	<option value="-8" <?=$toselect['-8']?>>(GMT -08:00) Pacific Time (US &amp; Canada), Tijuana</option>
	<option value="-7" <?=$toselect['-7']?>>(GMT -07:00) Mountain Time (US &amp; Canada), Arizona</option>
	<option value="-6" <?=$toselect['-6']?>>(GMT -06:00) Central Time (US &amp; Canada), Mexico City</option>
	<option value="-5" <?=$toselect['-5']?>>(GMT -05:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>
	<option value="-4" <?=$toselect['-4']?>>(GMT -04:00) Atlantic Time (Canada), Caracas, La Paz</option>
	<option value="-3.5" <?=$toselect['-3.5']?>>(GMT -03:30) Newfoundland</option>
	<option value="-3" <?=$toselect['-3']?>>(GMT -03:00) Brassila, Buenos Aires, Georgetown, Falkland Is</option>
	<option value="-2" <?=$toselect['-2']?>>(GMT -02:00) Mid-Atlantic, Ascension Is., St. Helena</option>
	<option value="-1" <?=$toselect['-1']?>>(GMT -01:00) Azores, Cape Verde Islands</option>
	<option value="0"  <?=$toselect['0']?>>(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>
	<option value="1" <?=$toselect['1']?>>(GMT +01:00) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome</option>
	<option value="2" <?=$toselect['2']?>>(GMT +02:00) Cairo, Helsinki, Kaliningrad, South Africa</option>
	<option value="3" <?=$toselect['3']?>>(GMT +03:00) Baghdad, Riyadh, Moscow, Nairobi</option>
	<option value="3.5" <?=$toselect['3.5']?>>(GMT +03:30) Tehran</option>
	<option value="4" <?=$toselect['4']?>>(GMT +04:00) Abu Dhabi, Baku, Muscat, Tbilisi</option>
	<option value="4.5" <?=$toselect['4.5']?>>(GMT +04:30) Kabul</option>
	<option value="5" <?=$toselect['5']?>>(GMT +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
	<option value="5.5" <?=$toselect['5.5']?>>(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>
	<option value="5.75" <?=$toselect['5.75']?>>(GMT +05:45) Katmandu</option>
	<option value="6" <?=$toselect['6']?>>(GMT +06:00) Almaty, Colombo, Dhaka, Novosibirsk</option>
	<option value="6.5" <?=$toselect['6.5']?>>(GMT +06:30) Rangoon</option>
	<option value="7" <?=$toselect['7']?>>(GMT +07:00) Bangkok, Hanoi, Jakarta</option>
	<option value="8" <?=$toselect['8']?>>(GMT +08:00) Beijing, Hong Kong, Perth, Singapore, Taipei</option>
	<option value="9" <?=$toselect['9']?>>(GMT +09:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>
	<option value="9.5" <?=$toselect['9.5']?>>(GMT +09:30) Adelaide, Darwin</option>
	<option value="10" <?=$toselect['10']?>>(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok</option>
	<option value="11" <?=$toselect['11']?>>(GMT +11:00) Magadan, New Caledonia, Solomon Islands</option>
	<option value="12" <?=$toselect['12']?>>(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island</option>
	</select></td>
	</tr>

	<tr>
	<th>ʱ���ʽ</th>
	<td>
	<label><input type="radio" value="0" name="timeformatnew" <?=$tfcheck['0']?> />Ĭ�� &nbsp;</label>
	<label><input type="radio" value="1" name="timeformatnew" <?=$tfcheck['1']?> />12 Сʱ &nbsp;</label>
	<label><input type="radio" value="2" name="timeformatnew" <?=$tfcheck['2']?> />24 Сʱ</label></td>
	</tr>

	<tr>
	<th>���ڸ�ʽ</th>
	<td>
	<select name="dateformatnew">
	<option value="0" <?=$dfcheck['0']?>>Ĭ��</option><? if(is_array($dateformatlist)) { foreach($dateformatlist as $key => $value) { ?><option value="<?=$key?>" <?=$dfcheck[$key]?>><?=$value?></option><? } } ?></select>
	</td>
	</tr>

	<tr>
	<th>����Ϣ��ʾ��</th>
	<td><label><input type="radio" value="0" name="pmsoundnew" <?=$pscheck['0']?> />�� &nbsp;</label>
	<label><input type="radio" value="1" name="pmsoundnew" <?=$pscheck['1']?> /><a href="images/sound/pm_1.wav">#1</a> &nbsp;</label>
	<label><input type="radio" value="2" name="pmsoundnew" <?=$pscheck['2']?> /><a href="images/sound/pm_2.wav">#2</a> &nbsp;</label>
	<label><input type="radio" value="3" name="pmsoundnew" <?=$pscheck['3']?> /><a href="images/sound/pm_3.wav">#3</a></label></td>
	</tr>

	<tr>
	<th>����ѡ��</th>
	<td>
	<? if($allowinvisible) { ?>
		<label><input type="checkbox" name="invisiblenew" value="1" <?=$invisiblechecked?> /> �����б�������</label><br />
	<? } ?>
	<label><input type="checkbox" name="showemailnew" value="1" <?=$emailchecked?> /> Email ��ַ�ɼ�</label><br />
	<label><input type="checkbox" name="newsletternew" value="1" <?=$newschecked?> /> ͬ�������̳֪ͨ (Email �����Ϣ)</label><br />
	</td></tr>

<? } ?>
	<tr>
		<th>&nbsp;</th>
		<td><button type="submit" class="submit" name="editsubmit" id="editsubmit" value="true">�ύ</button></td>
	</tr>
</table>

</div>


</form>

</td></tr></table>

	</div>
	<div class="side">
<? include template('personal_navbar'); ?>
</div>
</div>
<? include template('footer'); ?>
