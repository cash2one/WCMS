<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div>
	<h2>��������</h2>
	<ul>
		<li<? if($action == 'shop') { ?> class="current"<? } ?>><a href="magic.php?action=shop">�����̵�</a></li>
		<? if($magicmarket) { ?>
		<li<? if($action == 'market') { ?> class="current"<? } ?>><a href="magic.php?action=market">�����г�</a></li>
		<? } ?>
		<li<? if($action == 'user') { ?> class="current"<? } ?>><a href="magic.php?action=user">�ҵĵ�����</a></li>
		<li><a href="memcp.php?action=credits&amp;operation=addfunds" target="_blank">���ֳ�ֵ</a></li>
	</ul>
	<h2>���߼�¼</h2>
	<ul>
		<li<? if($operation == 'uselog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=uselog">����ʹ�ü�¼</a></li>
		<li<? if($operation == 'buylog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=buylog">���߹����¼</a></li>
		<li<? if($operation == 'givelog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=givelog">�������ͼ�¼</a></li>
		<li<? if($operation == 'receivelog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=receivelog">���߻�����¼</a></li>
		<? if($magicmarket) { ?>
		<li<? if($operation == 'marketlog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=marketlog">�����г���¼</a></li>
		<? } ?>
	</ul>
	<? if($magicsdiscount || $maxmagicsweight) { ?>
		<h2>������Ϣ</h2>
		<ul>
		<? if($magicsdiscount) { ?>
			<li>�ۿ�: <?=$magicsdiscount?> ��</li>
		<? } ?>
		<? if($maxmagicsweight) { ?>
			<li>���߸�����: <?=$totalweight?>/<?=$maxmagicsweight?></li>
		<? } ?>
		</ul>
	<? } ?>
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