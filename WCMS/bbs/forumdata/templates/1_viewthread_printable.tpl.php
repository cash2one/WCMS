<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<html>
<head>
<title><?=$bbname?> - Powered by Discuz! Board</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<style type="text/css">
body 	   {margin: 10px 80px;}
body,table {font-size: <?=FONTSIZE?>; font-family: <?=FONT?>;}
</style>
<script src="include/javascript/common.js" type="text/javascript"></script>
<script src="include/javascript/menu.js" type="text/javascript"></script>
</head>

<body>
<img src="<?=BOARDIMG?>" alt="Board logo" border="0" /><br /><br />
<b>����: </b><?=$thread['subject']?> <b><a href="###" onclick="this.style.visibility='hidden';window.print();this.style.visibility='visible'">[��ӡ��ҳ]</a></b></span><br /><? if(is_array($postlist)) { foreach($postlist as $post) { ?>	<hr noshade size="2" width="100%" color="#808080">
	<b>����: </b><? if($post['author'] && !$post['anonymous']) { ?><?=$post['author']?><? } else { ?>����<? } ?>&nbsp; &nbsp; <b>ʱ��: </b><?=$post['dateline']?>
	<? if($post['subject']) { ?> &nbsp; &nbsp; <b>����: </b><?=$post['subject']?><? } ?>
	<br /><br />
	<? if($adminid != 1 && $bannedmessages && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
		��ʾ: <em>���߱���ֹ��ɾ�� �����Զ�����</em>
	<? } elseif($adminid != 1 && $post['status'] == 1) { ?>
		��ʾ: <em>����������Ա���������</em>
	<? } elseif($post['first'] && isset($threadpay)) { ?>
		��������������֧����Ӧ���ֲ������
	<? } else { ?>
		<?=$post['message']?><? if(is_array($post['attachments'])) { foreach($post['attachments'] as $attach) { ?>			<br /><br /><?=$attach['attachicon']?>
			<? if(!$attach['attachimg'] || !$allowgetattach) { ?>
				����: <? if($attach['description']) { ?>[<?=$attach['description']?>]<? } ?> <b><?=$attach['filename']?></b> (<?=$attach['dateline']?>, <?=$attach['attachsize']?>) / �ø��������ش��� <?=$attach['downloads']?><br /><?=$boardurl?>attachment.php?aid=<?=$attach['aid']?>
			<? } else { ?>
				ͼƬ����: <? if($attach['description']) { ?>[<?=$attach['description']?>]<? } ?> <b><?=$attach['filename']?></b> (<?=$attach['dateline']?>, <?=$attach['attachsize']?>) / �ø��������ش��� <?=$attach['downloads']?><br /><?=$boardurl?>attachment.php?aid=<?=$attach['aid']?>
				<? if(!$attach['price'] || $attach['payed']) { ?><br /><br /><img src="<?=$attach['url']?>/<?=$attach['attachment']?>" border="0" onload="if(this.width >screen.width*0.8) this.width=screen.width*0.8" alt="" /><? } ?>
			<? } ?>
		<? } } } } } ?><br /><br /><br /><br /><hr noshade size="2" width="100%" color="<?=BORDERCOLOR?>">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center" style="font-size: <?=SMFONTSIZE?>; font-family: <?=SMFONT?>">
<tr><td>��ӭ���� <?=$bbname?> (<?=$boardurl?>)</td>
<td align="right">
Powered by Discuz! <?=$version?></td></tr></table>

</body>
</html>