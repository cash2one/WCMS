<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div>
<h2>���˹���</h2>
<ul>
	<li class="<? if($BASESCRIPT == 'pm.php') { ?>side_on first<? } ?>"><h3><a href="pm.php">����Ϣ</a></h3></li>
	<? if($BASESCRIPT == 'my.php') { ?>
		<li class="side_on">
			<h3>�ҵ�</h3>
			<ul>
				<li<? if(in_array($item, array('threads', 'posts'))) { ?> class="current"<? } ?>><a href="my.php?item=threads<?=$extrafid?>">�ҵĻ���</a></li>
				<li<? if($item == 'favorites') { ?> class="current"<? } ?>><a href="my.php?item=favorites&amp;type=thread<?=$extrafid?>">�ҵ��ղ�</a></li>
				<li<? if($item == 'subscriptions') { ?> class="current"<? } ?>><a href="my.php?item=subscriptions&amp;type=forum<?=$extrafid?>">�ҵĶ���</a></li>
				<li<? if($item == 'grouppermission') { ?> class="current"<? } ?>><a href="my.php?item=grouppermission">�ҵ�Ȩ��</a></li>
				<li<? if($item == 'polls') { ?> class="current"<? } ?>><a href="my.php?item=polls&amp;type=poll<?=$extrafid?>">�ҵ�ͶƱ</a></li>
				<li<? if(in_array($item, array('tradestats', 'selltrades', 'buytrades', 'tradethreads'))) { ?> class="current"<? } ?>><a href="my.php?item=tradestats<?=$extrafid?>">�ҵ���Ʒ</a></li>
				<li<? if($item == 'reward') { ?> class="current"<? } ?>><a href="my.php?item=reward&amp;type=stats<?=$extrafid?>">�ҵ�����</a></li>
				<li<? if($item == 'activities') { ?> class="current"<? } ?>><a href="my.php?item=activities&amp;type=orig<?=$extrafid?>">�ҵĻ</a></li>
				<li<? if($item == 'debate') { ?> class="current"<? } ?>><a href="my.php?item=debate&amp;type=orig<?=$extrafid?>">�ҵı���</a></li>
				<? if($videoopen) { ?>
					<li<? if($item == 'video') { ?> class="current"<? } ?>><a href="my.php?item=video&amp;type=orig<?=$extrafid?>">�ҵ���Ƶ</a></li>
				<? } ?>
				<li<? if($item == 'buddylist') { ?> class="current"<? } ?>><a href="my.php?item=buddylist&amp;<?=$extrafid?>">�ҵĺ���</a></li>
				<? if($creditspolicy['promotion_visit'] || $creditspolicy['promotion_register']) { ?>
					<li<? if($item == 'promotion') { ?> class="current"<? } ?>><a href="my.php?item=promotion<?=$extrafid?>">�ҵ��ƹ�</a></li>
				<? } ?>
				<? if($supe['status'] && $xspacestatus) { ?>
					<li><a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">���˿ռ�</a></li>
				<? } elseif($spacestatus) { ?>
					<li><a href="space.php?uid=<?=$discuz_uid?>" target="_blank">���˿ռ�</a></li>
				<? } ?>
			</ul>
		</li>
	<? } else { ?>
		<li><h3><a href="my.php">�ҵ�</a></h3></li>
	<? } ?>
	<? if($BASESCRIPT == 'memcp.php') { ?>
		<li class="side_on">
			<h3>�������</h3>
			<ul>
			<li<? if(!$action) { ?> class="current"<? } ?>><a href="memcp.php">���������ҳ</a></li>
			<li<? if($action == 'profile') { ?> class="current"<? } ?>><a href="memcp.php?action=profile">�༭��������</a></li>
			<? if($exchangestatus || $transferstatus || $ec_ratio) { ?>
				<li<? if($action == 'credits' && in_array($operation, array('exchange', 'transfer', 'addfunds'))) { ?> class="current"<? } ?>><a href="memcp.php?action=credits">���ֽ���</a></li>
			<? } ?>
			<li<? if($action == 'creditslog' && in_array($operation, array('creditslog', 'paymentlog', 'incomelog', 'rewardpaylog', 'rewardincomelog'))) { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog">���ּ�¼</a></li>
			<? if($allowmultigroups) { ?>
				<li<? if($action == 'usergroups') { ?> class="current"<? } ?>><a href="memcp.php?action=usergroups">�����û���</a></li>
			<? } ?>
			<? if($spacestatus || $supe['status'] && $xspacestatus) { ?>
				<li><a href="memcp.php?action=spacemodule" target="_blank">���˿ռ����</a></li>
			<? } ?>
			<? if($supe['status'] && !$xspacestatus) { ?>
				<li><a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">�������˿ռ�</a></li>
			<? } ?>
			</ul>
		</li>
	<? } else { ?>
		<li><h3><a href="memcp.php">�������</a></h3></li>
	<? } ?>
	<? if($regstatus > 1) { ?>
		<? if($BASESCRIPT == 'invite.php') { ?>
			<li class="side_on last">
				<h3>����ע��</h3>
				<ul>
					<li<? if($action == 'buyinvite') { ?> class="current"<? } ?>><a href="invite.php?action=buyinvite">���������</a></li>
					<li<? if(in_array($action, array('availablelog', 'invalidlog', 'usedlog', 'sendlog'))) { ?> class="current"<? } ?>><a href="invite.php?action=availablelog">�����¼</a></li>
				</ul>
			</li>
		<? } else { ?>
			<li><h3><a href="invite.php">����ע��</a></h3></li>
		<? } ?>
	<? } ?>
	</ul>

</ul>

</div>

<div class="credits_info">
	<h2>���ָſ�</h2>
	<ul>
		<li>����: <?=$credits?></li><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><li>
			<? if($id == $creditstrans) { ?>
			<?=$credit['title']?>: <span style="font-weight: bold;"><?=$GLOBALS['extcredits'.$id]?></span> <?=$credit['unit']?>
			<? } else { ?>
			<?=$credit['title']?>: <?=$GLOBALS['extcredits'.$id]?> <?=$credit['unit']?>
			<? } ?>
		</li><? } } ?></ul>
</div>
