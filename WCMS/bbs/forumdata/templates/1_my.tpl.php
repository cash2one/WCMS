<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav">
	<a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <? if($srchfid) { ?><a href="my.php?item=<?=$item?><?=$extra?>"><? } if(empty($item)) { ?>�ҵ�...<? } elseif($item == 'threads') { ?>�ҵ�����<? } elseif($item == 'polls') { ?>�ҵ�ͶƱ<? } elseif($item == 'posts') { ?>�ҵĻظ�<? } elseif($item == 'favorites' && $type == 'thread') { ?>�ղص�����<? } elseif($item == 'favorites' && $type == 'forum') { ?>�ղصİ��<? } elseif($item == 'subscriptions') { ?>���ĵ�����<? } elseif(in_array($item, array('tradestats', 'selltrades', 'buytrades', 'tradethreads'))) { ?>�ҵ���Ʒ<? } elseif($item == 'reward') { ?>�ҵ�����<? } elseif($item == 'activities') { ?>�ҵĻ<? } elseif($item == 'debate') { ?>�ҵı���<? } elseif($item == 'video') { ?>�ҵ���Ƶ<? } elseif($item == 'promotion' && ($creditspolicy['promotion_visit'] || $creditspolicy['promotion_register'])) { ?>�ҵ��ƹ�<? } if($srchfid) { ?></a> &raquo; <?=$forumname?><? } ?>
</div>
<div class="container">
	<div class="content">
		<div class="mainbox">

<? if(empty($item)) { include template('my_index'); } elseif(in_array($item, array('threads', 'posts'))) { ?>
	<h1>�ҵĻ���</h1>
	<ul class="tabs headertabs">
	<li <? if($item == 'threads') { ?> class="current"<? } ?>><a href="my.php?item=threads<?=$extrafid?>">�ҵ�����</a></li>
	<li <? if($item == 'posts') { ?> class="current"<? } ?>><a href="my.php?item=posts<?=$extrafid?>">�ҵĻظ�</a></li>
	</ul>
	<? if($item == 'threads') { include template('my_threads'); } elseif($item == 'posts') { include template('my_posts'); } } elseif($item == 'favorites') { ?>
	<h1>�ҵ��ղ�</h1>
	<ul class="tabs headertabs">
	<li <? if($type == 'thread') { ?> class="current"<? } ?>><a href="my.php?item=favorites&amp;type=thread<?=$extrafid?>">�ղص�����</a></li>
	<li <? if($type == 'forum') { ?> class="current"<? } ?>><a href="my.php?item=favorites&amp;type=forum<?=$extrafid?>">�ղصİ��</a></li>
	</ul>
<? include template('my_favorites'); } elseif($item == 'subscriptions') { ?>
	<h1>�ҵĶ���</h1>
	<ul class="tabs headertabs">
	<li class="current"><a href="my.php?item=subscriptions&amp;type=forum<?=$extrafid?>" class="current">���ĵ�����</a></li>
	</ul>
<? include template('my_subscriptions'); } elseif($item == 'polls') { ?>
	<h1>�ҵ�ͶƱ</h1>
	<ul class="tabs headertabs">
	<li <? if($item == 'polls' && $type == 'poll') { ?> class="current"<? } ?>><a href="my.php?item=polls&amp;type=poll<?=$extrafid?>">�ҷ����ͶƱ</a></li>
	<li <? if($item == 'polls' && $type == 'join') { ?> class="current"<? } ?>><a href="my.php?item=polls&amp;type=join<?=$extrafid?>">�Ҳ����ͶƱ</a></li>
	</ul>
<? include template('my_polls'); } elseif(in_array($item, array('tradestats', 'selltrades', 'buytrades', 'tradethreads'))) { ?>
	<h1>�ҵ���Ʒ</h1>
	<ul class="tabs <? if($item == 'tradestats') { ?>headertabs<? } ?>">
	<li <? if($item == 'tradestats') { ?> class="current"<? } ?>><a href="my.php?item=tradestats<?=$extrafid?>">����ͳ��</a></li>
	<li <? if($item == 'buytrades') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=buytrades<?=$extrafid?>" id="buytrades" onmouseover="showMenu(this.id)">�������</a></li>
	<li <? if($item == 'selltrades' || $item == 'tradethreads') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=tradethreads<?=$extrafid?>" id="tradethreads" onmouseover="showMenu(this.id)">��������</a></li>
	<li><a href="eccredit.php?uid=<?=$discuz_uid?>" target="_blank">��������</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="buytrades_menu" style="display: none">
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>">�����еĽ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=attention">��ע�Ľ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=eccredit">���۵Ľ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=success">�ɹ��Ľ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=refund">�˿�Ľ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=closed">ʧ�ܵĽ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=unstart">δ��Ч�Ľ���</a></li>
	<li><a href="my.php?item=buytrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=all">ȫ������</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="tradethreads_menu" style="display: none">
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>">�����еĽ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=attention">��ע�Ľ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=eccredit">���۵Ľ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=success">�ɹ��Ľ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=refund">�˿�Ľ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=closed">ʧ�ܵĽ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=unstart">δ��Ч�Ľ���</a></li>
	<li><a href="my.php?item=selltrades<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>&amp;filter=all">ȫ������</a></li>
	<li><a href="my.php?item=tradethreads<?=$extratid?><?=$extrafid?><?=$extrasrchkey?>">�����е���Ʒ</a></li>
	</ul>

	<? if($item == 'tradestats') { include template('my_tradestats'); } elseif($item == 'selltrades' || $item == 'buytrades') { include template('my_trades'); } elseif($item == 'tradethreads') { include template('my_tradethreads'); } } elseif($item == 'reward') { ?>
	<h1>�ҵ�����</h1>
	<ul class="tabs">
	<li <? if($type == 'stats') { ?> class="current"<? } ?>><a href="my.php?item=reward&amp;type=stats<?=$extrafid?>">����ͳ��</a></li>
	<li <? if($type == 'question') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=reward&amp;type=question<?=$extrafid?>" id="myquestion" onmouseover="showMenu(this.id)">�ҵ�����</a></li>
	<li <? if($type == 'answer') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=reward&amp;type=answer<?=$extrafid?>" id="myanswer" onmouseover="showMenu(this.id)">�ҵĻش�</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="myquestion_menu" style="display: none">
	<li><a href="my.php?item=reward&amp;type=question&amp;filter=<?=$extrafid?>">ȫ������</a></li>
	<li><a href="my.php?item=reward&amp;type=question&amp;filter=solved<?=$extrafid?>">�ѽ��������</a></li>
	<li><a href="my.php?item=reward&amp;type=question&amp;filter=unsolved<?=$extrafid?>">δ���������</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="myanswer_menu" style="display: none">
	<li><a href="my.php?item=reward&amp;type=answer&amp;filter=<?=$extrafid?>">ȫ���ش�</a></li>
	<li><a href="my.php?item=reward&amp;type=answer&amp;filter=adopted<?=$extrafid?>">�����ɵĻش�</a></li>
	<li><a href="my.php?item=reward&amp;type=answer&amp;filter=unadopted<?=$extrafid?>">δ���ɵĻش�</a></li>
	</ul>
<? include template('my_rewards'); } elseif($item == 'activities') { ?>
	<h1>�ҵĻ</h1>
	<ul class="tabs">
	<li <? if($type == 'orig') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=activities&amp;type=orig<?=$extrafid?>" id="myorig" onmouseover="showMenu(this.id)">����Ļ</a></li>
	<li <? if($type == 'apply') { ?> class="dropmenu hover current"<? } else { ?> class="dropmenu"<? } ?>><a href="my.php?item=activities&amp;type=apply<?=$extrafid?>" id="myapply" onmouseover="showMenu(this.id)">����Ļ</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="myorig_menu" style="display: none">
	<li><a href="my.php?item=activities&amp;type=orig&amp;filter=<?=$extrafid?>">ȫ���</a></li>
	<li><a href="my.php?item=activities&amp;type=orig&amp;ended=no<?=$extrafid?>">δ�����Ļ</a></li>
	<li><a href="my.php?item=activities&amp;type=orig&amp;ended=yes<?=$extrafid?>">�ѽ����Ļ</a></li>
	</ul>

	<ul class="popupmenu_popup headermenu_popup" id="myapply_menu" style="display: none">
	<li><a href="my.php?item=activities&amp;type=apply&amp;filter=<?=$extrafid?>">ȫ���</a></li>
	<li><a href="my.php?item=activities&amp;type=apply&amp;ended=no<?=$extrafid?>">δ�����Ļ</a></li>
	<li><a href="my.php?item=activities&amp;type=apply&amp;ended=yes<?=$extrafid?>">�ѽ����Ļ</a></li>
	</ul>
<? include template('my_activities'); } elseif($item == 'debate') { ?>
	<h1>�ҵı���</h1>
	<ul class="tabs headertabs">
	<li <? if($item == 'debate' && $type == 'orig') { ?> class="current"<? } ?>><a href="my.php?item=debate&amp;type=orig<?=$extrafid?>">�ҷ���ı���</a></li>
	<li <? if($item == 'debate' && $type == 'apply') { ?> class="current"<? } ?>><a href="my.php?item=debate&amp;type=apply<?=$extrafid?>">�Ҳ���ı���</a></li>
	</ul>
<? include template('my_debate'); } elseif($item == 'buddylist') { ?>
	<h1>�ҵĺ���</h1>
<? include template('my_buddylist'); } elseif($item == 'promotion' && ($creditspolicy['promotion_visit'] || $creditspolicy['promotion_register'])) { ?>
	<h1>�ҵ��ƹ�</h1>
<? include template('my_promotion'); } elseif($item == 'video') { ?>
	<h1>�ҵ���Ƶ</h1>
<? include template('my_video'); } ?>

</div>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
</div>
<div class="side">
<? include template('personal_navbar'); ?>
</div>
</div>
<? include template('footer'); ?>
