<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �����û�</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
<div class="mainbox">
	<h1>�����û�</h1>
<? if($allowviewip) { ?>
	<table summary="" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td>�û���</td>
				<td class="time">ʱ��</td>
				<td>��ǰ����</td>
				<td>���ڰ��</td>
				<td>��������</td>
				<td class="time">IP ��ַ</td>
			</tr>
		</thead><? if(is_array($onlinelist)) { foreach($onlinelist as $online) { ?>		<tbody>
			<tr>
				<td><? if($online['uid']) { ?><a href="space.php?uid=<?=$online['uid']?>"><?=$online['username']?></a><? } else { ?>�ο�<? } ?>&nbsp;</td>
				<td class="time"><?=$online['lastactivity']?>&nbsp;</td>
				<td><?=$online['action']?>&nbsp;</td>
				<td><? if($online['fid']) { ?><a href="forumdisplay.php?fid=<?=$online['fid']?>"><?=$online['name']?></a><? } ?>&nbsp;</td>
				<td><? if($online['tid']) { ?><a href="viewthread.php?tid=<?=$online['tid']?>"><?=$online['subject']?></a><? } ?>&nbsp;</td>
				<td><?=$online['ip']?>&nbsp;</td>
			</tr>
		</tbody>
		<? } } ?></table>
<? } else { ?>
	<table summary="" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td>�û���</td>
				<td class="time">ʱ��</td>
				<td>��ǰ����</td>
				<td>���ڰ��</td>
				<td>��������</td>
			</tr>
		</thead><? if(is_array($onlinelist)) { foreach($onlinelist as $online) { ?>		<tbody>
			<tr>
				<td><? if($online['uid']) { ?><a href="space.php?uid=<?=$online['uid']?>"><?=$online['username']?></a><? } else { ?>�ο�<? } ?>&nbsp;</td>
				<td class="time"><?=$online['lastactivity']?>&nbsp;</td>
				<td><?=$online['action']?>&nbsp;</td>
				<td><? if($online['fid']) { ?><a href="forumdisplay.php?fid=<?=$online['fid']?>"><?=$online['name']?></a><? } ?>&nbsp;</td>
				<td><? if($online['tid']) { ?><a href="viewthread.php?tid=<?=$online['tid']?>"><?=$online['subject']?></a><? } ?>&nbsp;</td>
			</tr>
		</tbody>
		<? } } ?></table>
<? } ?>
</div>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } include template('footer'); ?>
