<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div>
	<h2>ͳ��ѡ��</h2>
	<ul>
		<li <?=$navstyle['home']?>><a href="stats.php">�����ſ�</a></li>
		<? if($statstatus) { ?><li <?=$navstyle['views']?>><a href="stats.php?type=views">����ͳ��</a></li><? } ?>
		<? if($statstatus) { ?><li <?=$navstyle['agent']?>><a href="stats.php?type=agent">�ͻ����</a></li><? } ?>
		<? if($statstatus) { ?><li <?=$navstyle['posts']?>><a href="stats.php?type=posts">��������¼</a></li><? } ?>
		<li <?=$navstyle['forumsrank']?>><a href="stats.php?type=forumsrank">�������</a></li>
		<li <?=$navstyle['threadsrank']?>><a href="stats.php?type=threadsrank">��������</a></li>
		<li <?=$navstyle['postsrank']?>><a href="stats.php?type=postsrank">��������</a></li>
		<li <?=$navstyle['creditsrank']?>><a href="stats.php?type=creditsrank">��������</a></li>
		<li <?=$navstyle['trade']?>><a href="stats.php?type=trade">��������</a></li>
		<? if($oltimespan) { ?><li <?=$navstyle['onlinetime']?>><a href="stats.php?type=onlinetime">����ʱ��</a></li><? } ?>
		<li <?=$navstyle['team']?>><a href="stats.php?type=team">�����Ŷ�</a></li>
		<? if($modworkstatus) { ?><li <?=$navstyle['modworks']?>><a href="stats.php?type=modworks">����ͳ��</a></li><? } ?>
	</ul>
</div>
