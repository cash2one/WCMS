<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<form method="post" id="postform" action="pm.php?action=send&amp;pmsubmit=yes" onSubmit="return validate(this)">
	<? if($folder == 'outbox') { ?><input type="hidden" name="pmid" value="<?=$pmid?>" /><? } ?>
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="mainbox formbox">
	<h1>���Ͷ���Ϣ</h1>
	<ul class="tabs">
		<li class="current sendpm"><a href="pm.php?action=send">���Ͷ���Ϣ</a></li>
		<li><a href="pm.php?folder=inbox">�ռ���[<span id="pm_unread"><?=$pm_inbox_newpm?></span>]</a></li>
		<li><a href="pm.php?folder=outbox">�ݸ���</a></li>
		<li><a href="pm.php?folder=track">�ѷ���</a></li>
		<li><a href="pm.php?action=search">��������Ϣ</a></li>
		<li><a href="pm.php?action=archive">��������Ϣ</a></li>
		<li><a href="pm.php?action=ignore">�����б�</a></li>
	</ul>
	<table summary="���Ͷ���Ϣ" cellspacing="0" cellpadding="0" id="pmlist">
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
		<? } ?>

		<? if($secqaacheck) { ?>
			<tr>
			<th>��֤�ʴ�</th>
			<td><div id="secquestion"></div><input type="text" name="secanswer" size="25" maxlength="50" tabindex="1" /></td>
			</tr>
			<script type="text/javascript">
			<? if(($attackevasive & 1) && $seccodecheck) { ?>
				setTimeout("updatesecqaa()", 2001);
			<? } else { ?>
				updatesecqaa();
			<? } ?>
			</script>
		<? } ?>

		<tr>
			<th><label for="msgto">���͵�</label></th>
			<td><input type="text" id="msgto" name="msgto" size="65" value="<?=$touser?>" tabindex="2" /></td>
		</tr>

		<? if($buddylist) { ?>
		<tr>
			<th id="buddy"><label><input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form, 'msgtobuddys')" tabindex="3" />����Ⱥ��</label></th>
			<td>
				<ul class="userlist"><? if(is_array($buddylist)) { foreach($buddylist as $key => $buddy) { ?><li><label><input class="checkbox" type="checkbox" name="msgtobuddys[]" value="<?=$buddy['buddyid']?>" /> <?=$buddy['buddyname']?></label></li><? } } ?></ul>
			</td>
		</tr>
		<? } ?>

		<tr>
			<th><label for="subject">����</th>
			<td><input type="text" id="subject" name="subject" size="65" value="<?=$subject?>" tabindex="4" /></td>
		</tr>

		<tr>
			<th valign="top"><label for="pm_textarea">����</label>
				<? if($smileyinsert) { ?>
					<div id="smilieslist"></div>
					<script type="text/javascript">ajaxget('post.php?action=smilies', 'smilieslist');</script>
				<? } ?>
			</th>
			<td><textarea id="pm_textarea" class="autosave" rows="15" cols="10" name="message" style="width: 95%;" onKeyDown="ctlent(event);" tabindex="5">
<? if($do == 'reply') { ?>[b]ԭʼ����Ϣ:[/b] [url=<?=$boardurl?>pm.php?action=view&folder=inbox&pmid=<?=$pm['pmid']?>]<?=$pm['subject']?>[/url]<?="\n"?>
<? } elseif($do == 'forward') { ?>
[b]ԭʼ����Ϣ[/b] [url=<?=$boardurl?>pm.php?action=send&pmid=<?=$pm['pmid']?>&do=reply](�ظ�)[/url]
[b]����:[/b] [url=<?=$boardurl?>space.php?uid=<?=$pm['msgfromid']?>]<?=$pm['msgfrom']?>[/url]
[b]���͵�:[/b] [url=<?=$boardurl?>space.php?uid=<?=$discuz_uid?>]<?=$discuz_user?>[/url]
[b]ʱ��:[/b] <?=$pm['dateline']?><?="\n"?><?="\n"?>
<? } ?><?=$message?></textarea>
					<br /><label><input type="checkbox" name="saveoutbox" value="1"<? if($folder == 'outbox') { ?> checked=checked""<? } ?> tabindex="6" />�����ͣ�ֻ���浽�ݸ�����</label>
			</td>
		</tr>

		<tr class="btns">
			<th>&nbsp;</th>
			<td>
				<button type="submit" class="submit" name="pmsubmit" id="postsubmit" value="true" tabindex="7">�ύ</button>
				<em>[��ɺ�ɰ� Ctrl+Enter ����]</em>
				&nbsp;<a href="###" id="restoredata" onclick="loadData()" title="�ָ��ϴ��Զ����������">�ָ�����</a>
			</td>
		</tr>
</table>
</div>
</form>
<script src="include/javascript/post.js" type="text/javascript"></script>
<script type="text/javascript">
	var wysiwyg = bbinsert = 0;
	lang['post_autosave_none'] = "û�п��Իָ������ݣ�";
	lang['post_autosave_confirm'] = "�˲��������ǵ�ǰ�������ݣ�ȷ��Ҫ�ָ�������";
	function validate(theform) {
		if (theform.subject.value == '' || theform.message.value == '') {
			alert("����ɱ������������");
			theform.subject.focus();
			return false;
		} else if (theform.subject.value.length > 75) {
			alert("���ı��ⳬ�� 80 ���ַ������ơ�");
			theform.subject.focus();
			return false;
		}
		theform.message.value = parseurl(theform.message.value, 'bbcode');
		theform.pmsubmit.disabled = true;
		return true;
	}
	checkFocus();
	setCaretAtEnd();
	var textobj = $('pm_textarea');
	if(!(is_ie >= 5 || is_moz >= 2)) {
		$('restoredata').style.display = 'none';
	}
</script>