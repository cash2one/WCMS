<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!$iscircle || !$sgid) { include template('header'); } else { include template('supesite_header'); } ?>

<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?> &raquo; ����ظ�</div>

<script type="text/javascript">
var postminchars = parseInt('<?=$minpostsize?>');
var postmaxchars = parseInt('<?=$maxpostsize?>');
var disablepostctrl = parseInt('<?=$disablepostctrl?>');
var bbinsert = parseInt('<?=$bbinsert?>');
var seccodecheck = parseInt('<?=$seccodecheck?>');
var secqaacheck = parseInt('<?=$secqaacheck?>');
lang['board_allowed'] = 'ϵͳ����';
lang['lento'] = '��';
lang['bytes'] = '�ֽ�';
lang['post_curlength'] = '��ǰ����';
lang['post_subject_and_message_isnull'] = '����ɱ������������';
lang['post_subject_toolong'] = '���ı��ⳬ�� 80 ���ַ������ơ�';
lang['post_message_length_invalid'] = '�������ӳ��Ȳ�����Ҫ��';
</script>
<? include template('post_preview'); ?>
<form method="post" id="postform" action="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>&amp;replysubmit=yes" <?=$enctype?>>
<input type="hidden" name="formhash" id="formhash" value="<?=FORMHASH?>" />

<div class="mainbox formbox">
	<h1>����ظ�</h1>
	<table summary="����ظ�" cellspacing="0" cellpadding="0">

		<thead>
			<tr>
				<th>�û���</th>
				<td>
					<? if($discuz_uid) { ?>
						<?=$discuz_userss?> [<a href="<?=$link_logout?>">�˳���¼</a>]
					<? } else { ?>
						�ο� [<a href="<?=$link_login?>">��Ա��¼</a>]
					<? } ?>
				</td>
			</tr>
		</thead>

<? if($seccodecheck) { ?>
	<tr>
		<th><label for="seccodeverify">��֤��</label></th>
		<td>
			<div id="seccodeimage"></div>
			<input type="text" onfocus="updateseccode();this.onfocus = null" id="seccodeverify" name="seccodeverify" size="8" maxlength="4" tabindex="0" />
			<em class="tips"><strong>����������ʾ��֤��</strong> <? if($seccodedata['type'] == 2) { ?>��ȷ�����������֧�� Flash ����ʾ�������������֤�룬���<a href="###" onclick="updateseccode()">����</a>ˢ��<? } elseif($seccodedata['animator'] == 1) { ?>��ȷ�����������֧�ֶ�������ʾ�������������֤�룬���ͼƬˢ��<? } else { ?>�����������֤�룬���ͼƬˢ��<? } ?></em></td>
			<script type="text/javascript">
				var seccodedata = [<?=$seccodedata['width']?>, <?=$seccodedata['height']?>, <?=$seccodedata['type']?>];
			</script>
	</tr>
<? } if($secqaacheck) { ?>
	<tr><th><label for="secanswer">��֤�ʴ�</label></th>
	<td><div id="secquestion"></div><input type="text" name="secanswer" id="secanswer" size="25" maxlength="50" tabindex="1" />
	<script type="text/javascript">
	<? if(($attackevasive & 1) && $seccodecheck) { ?>
		setTimeout("ajaxget('ajax.php?action=updatesecqaa&inajax=1', 'secquestion')", 2001);
	<? } else { ?>
		ajaxget('ajax.php?action=updatesecqaa&inajax=1', 'secquestion');
	<? } ?>
	</script></td>
	</tr>
<? } if($special == 5) { ?>
	<tr>
	<th>����</th>
	<td>
	<? if(empty($firststand)) { ?>
		<select name="stand" tabindex="2"><option value="0" selected>����</option><option  value="1">����</option><option  value="2">����</option></select></td>
	<? } elseif($firststand == 1) { ?>
		����
	<? } elseif($firststand == 2) { ?>
		����
	<? } ?>

	</tr>
<? } ?>

<tr>
<th><label for="subject">����</label></th>
<td><input type="text" name="subject" id="subject" size="45" value="<?=$subject?>" tabindex="3" />&nbsp; <em class="tips">(��ѡ)</em></td>
</tr>

<tr class="bottom">
<? include template('post_editor'); ?>
</tr>
		<tr class="btns">
			<th>&nbsp;</th>
			<td>
				<input type="hidden" name="wysiwyg" id="<?=$editorid?>_mode" value="<?=$editormode?>" />
				<input type="hidden" name="fid" id="fid" value="<?=$fid?>" />
				<button type="submit" name="replysubmit" id="postsubmit" value="true" tabindex="300">����ظ�</button>
				<em>[��ɺ�ɰ� Ctrl+Enter ����]</em>&nbsp;&nbsp;
				&nbsp;<a href="###" id="restoredata" onclick="loadData()" title="�ָ��ϴ��Զ����������">�ָ�����</a>
			</td>
		</tr>

</table></div>

</form>

<div class="box">
	<h4>����ع�</h4>

	<? if($thread['replies'] > $ppp) { ?>
		<div class="specialpost">
			<div class="postmessage">������ظ��϶࣬�� <a href="viewthread.php?fid=<?=$fid?>&amp;tid=<?=$tid?>">�������</a> �鿴��</div>
		</div>
	<? } else { if(is_array($postlist)) { foreach($postlist as $post) { ?>			<div class="specialpost">
				<p class="postinfo"><? if($post['author'] && !$post['anonymous']) { ?><?=$post['author']?><? } else { ?>����<? } ?> ������ <?=$post['dateline']?></p>
				<div class="postmessage"><?=$post['message']?></div>
			</div>
		<? } } } ?>

	</table>
</div>
<? include template('post_js'); if(!$iscircle || !$sgid) { include template('footer'); } else { include template('supesite_footer'); } ?>