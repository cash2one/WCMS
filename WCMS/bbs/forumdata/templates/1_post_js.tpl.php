<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script type="text/javascript">
	if(!(is_ie >= 5 || is_moz >= 2)) {
		$('restoredata').style.display = 'none';
	}
	var editorid = '<?=$editorid?>';
	var textobj = $(editorid + '_textarea');
	var wysiwyg = (is_ie || is_moz || (is_opera >= 9)) && parseInt('<?=$editormode?>') && bbinsert == 1 ? 1 : 0;
	var allowswitcheditor = parseInt('<?=$allowswitcheditor?>');
	var allowhtml = parseInt('<?=$allowhtml?>');
	var forumallowhtml = parseInt('<?=$forum['allowhtml']?>');
	var allowsmilies = parseInt('<?=$forum['allowsmilies']?>');
	var allowbbcode = parseInt('<?=$forum['allowbbcode']?>');
	var allowimgcode = parseInt('<?=$forum['allowimgcode']?>');
	var special = parseInt('<?=$special?>');
	var BORDERCOLOR = "<?=BORDERCOLOR?>";
	var ALTBG2 = "<?=ALTBG2?>";
	var charset = '<?=$charset?>';
	var smilies = new Array();
	<? if(!empty($GLOBALS['_DCACHE']['smilies']) && is_array($GLOBALS['_DCACHE']['smilies'])) { if(is_array($_DCACHE['smilies_display'])) { foreach($_DCACHE['smilies_display'] as $typeid => $smilies) { if(is_array($smilies)) { foreach($smilies as $key => $smiley) { $smiley['code']=addcslashes($smiley['code'], '\\\''); ?>smilies[<?=$key?>] = {'code' : '<?=$smiley['code']?>', 'url' : '<?=$_DCACHE['smileytypes'][$typeid]['directory']?>/<?=$smiley['url']?>'};<? } } } } } ?>
	lang['post_autosave_none']		= "û�п��Իָ������ݣ�";
	lang['post_autosave_confirm']		= "�˲��������ǵ�ǰ�������ݣ�ȷ��Ҫ�ָ�������";
	lang['post_video_uploading']		= "����û���ϴ���Ƶ��������Ƶ�����ϴ��У����Ժ����ԡ�";
	lang['post_video_vclass_required']	= "����ѡ����Ƶ�������ࡣ";
</script>

<? if($allowpostattach) { ?>
	<script type="text/javascript">
		var thumbwidth = parseInt(<?=$thumbwidth?>);
		var thumbheight = parseInt(<?=$thumbheight?>);
		var extensions = '<?=$attachextensions?>';
		lang['post_attachment_ext_notallowed']	= '�Բ��𣬲�֧���ϴ�������չ���ĸ�����';
		lang['post_attachment_img_invalid']	= '��Ч��ͼƬ�ļ���';
		lang['post_attachment_deletelink']	= 'ɾ��';
		lang['post_attachment_insert']		= '������ｫ�������������������е�ǰ����λ��';
		lang['post_attachment_insertlink']	= '����';
	</script>
	<script src="include/javascript/post_attach.js" type="text/javascript"></script>
<? } ?>

<script src="include/javascript/post.js" type="text/javascript"></script>

<? if($bbinsert) { ?>
	<script type="text/javascript">
		var fontoptions = new Array("����_GB2312", "����", "����_GB2312", "����", "������", "΢���ź�", "Trebuchet MS", "Tahoma", "Arial", "Impact", "Verdana", "Times New Roman");
		var custombbcodes = new Array();
		<? if($forum['allowbbcode'] && $allowcusbbcode) { if(is_array($_DCACHE['bbcodes_display'])) { foreach($_DCACHE['bbcodes_display'] as $tag => $bbcode) { ?>custombbcodes["<?=$tag?>"] = {'prompt' : '<?=$bbcode['prompt']?>'};<? } } } ?>
		lang['enter_list_item']			= "����һ���б���Ŀ.\r\n���ջ��ߵ��ȡ����ɴ��б�.";
		lang['enter_link_url']			= "���������ӵĵ�ַ:";
		lang['enter_image_url']			= "������ͼƬ���ӵ�ַ:";
		lang['enter_email_link']		= "����������ӵ������ַ:";
		lang['fontname']			= "����";
		lang['fontsize']			= "��С";
		lang['post_advanceeditor']		= "ȫ������";
		lang['post_simpleeditor']		= "�򵥹���";
		lang['submit']				= "�ύ";
		lang['cancel']				= "ȡ��";
	</script>
	<script src="include/javascript/editor.js" type="text/javascript"></script>
<? } ?>

<script src="include/javascript/bbcode.js" type="text/javascript"></script>

<? if($action == 'edit' || $action == 'reply' && $repquote) { ?>
	<script type="text/javascript">
		if(wysiwyg) {
			initialized = false;
			newEditor(1, bbcode2html(textobj.value));
		}
	</script>
<? } ?>

<script src="include/javascript/post_editor.js" type="text/javascript"></script>

<script type="text/javascript">
	$(editorid + '_contract').onclick = function() {resizeEditor(-100)};
	$(editorid + '_expand').onclick = function() {resizeEditor(100)};
	$('checklength').onclick = function() {checklength($('postform'))};
	$('previewbutton').onclick = function() {previewpost()};
	$('clearcontent').onclick = function() {clearcontent()};
	$('postform').onsubmit = function() {return validate(this);};
	<? if($action == 'newthread') { ?>
		$('subject').focus();
	<? } else { ?>
		checkFocus();
		setCaretAtEnd();
	<? } ?>
</script>

<? if($smileyinsert) { ?><script type="text/javascript">ajaxget('post.php?action=smilies', 'smilieslist');</script><? } ?>