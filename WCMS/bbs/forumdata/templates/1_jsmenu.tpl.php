<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!empty($jsmenu['2'])) { ?>
	<ul class="popupmenu_popup headermenu_popup" id="memcp_menu" style="display: none">
		<li><a href="memcp.php">���������ҳ</a></li>
		<li><a href="memcp.php?action=profile">�༭��������</a></li>
		<? if($exchangestatus || $transferstatus || $ec_ratio) { ?>
			<li><a href="memcp.php?action=credits">���ֽ���</a></li>
		<? } ?>
		<li><a href="memcp.php?action=creditslog">���ּ�¼</a></li>
		<li><a href="memcp.php?action=usergroups">�����û���</a></li>
	<? if($spacestatus) { ?>
		<li><a href="memcp.php?action=spacemodule" target="_blank">���˿ռ����</a></li>
	<? } ?>
	<? if($supe['status'] && !$xspacestatus) { ?>
		<li><a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">�������˿ռ�</a></li>
	<? } ?>
	</ul>
<? } if(!empty($plugins['jsmenu'])) { ?>
	<ul class="popupmenu_popup headermenu_popup" id="plugin_menu" style="display: none"><? if(is_array($plugins['jsmenu'])) { foreach($plugins['jsmenu'] as $module) { ?>	     <? if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?>
	     <li><?=$module['url']?></li>
	     <? } ?>
	<? } } ?></ul>
<? } if(!empty($jsmenu['3'])) { ?>
	<ul class="popupmenu_popup headermenu_popup" id="stats_menu" style="display: none">
		<li><a href="stats.php">�����ſ�</a></li>
		<? if($statstatus) { ?>
			<li><a href="stats.php?type=views">����ͳ��</a></li><li><a href="stats.php?type=agent">�ͻ����</a></li><li><a href="stats.php?type=posts">��������¼</a></li>
		<? } ?>
		<li><a href="stats.php?type=forumsrank">�������</a></li><li><a href="stats.php?type=threadsrank">��������</a></li><li><a href="stats.php?type=postsrank">��������</a></li><li><a href="stats.php?type=creditsrank">��������</a></li>
		<li><a href="stats.php?type=trade">��������</a></li>
		<? if($oltimespan) { ?><li><a href="stats.php?type=onlinetime">����ʱ��</a></li><? } ?>
		<li><a href="stats.php?type=team">�����Ŷ�</a></li>
		<? if($modworkstatus) { ?><li><a href="stats.php?type=modworks">����ͳ��</a></li><? } ?>
	</ul>
<? } if($discuz_uid && $jsmenu['4']) { ?>
	<ul class="popupmenu_popup headermenu_popup" id="my_menu" style="display: none">
		<li><a href="my.php?item=threads">�ҵĻ���</a></li>
		<li><a href="my.php?item=favorites&amp;type=thread">�ҵ��ղ�</a></li>
		<li><a href="my.php?item=subscriptions">�ҵĶ���</a></li>
		<li><a href="my.php?item=grouppermission">�ҵ�Ȩ��</a></li>
		<li><a href="my.php?item=polls&amp;type=poll">�ҵ�ͶƱ</a></li>
		<li><a href="my.php?item=tradestats">�ҵ���Ʒ</a></li>
		<li><a href="my.php?item=reward&amp;type=stats">�ҵ�����</a></li>
		<li><a href="my.php?item=activities&amp;type=orig&amp;ended=no">�ҵĻ</a></li>
		<li><a href="my.php?item=debate&amp;type=debate">�ҵı���</a></li>
		<? if($videoopen) { ?>
			<li><a href="my.php?item=video">�ҵ���Ƶ</a></li>
		<? } ?>
		<li><a href="my.php?item=buddylist">�ҵĺ���</a></li>
		<? if($creditspolicy['promotion_visit'] || $creditspolicy['promotion_register']) { ?>
			<li><a href="my.php?item=promotion">�ҵ��ƹ�</a></li>
		<? } ?>
		<? if($supe['status'] && $xspacestatus) { ?>
			<li><a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">���˿ռ�</a></li>
		<? } elseif($spacestatus) { ?>
			<li><a href="space.php?uid=<?=$discuz_uid?>" target="_blank">���˿ռ�</a></li>
		<? } ?>
	</ul>
<? } ?>