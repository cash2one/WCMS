<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav">
<a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">��̳ͳ��</a> &raquo; ��������
</div>


<div class="container">
	<div class="side">
<? include template('stats_navbar'); ?>
</div>
	<div class="content">
	<div class="mainbox">
		<h3>��������</h3>
<div class="msgtabs"><strong>���׶�����</strong></div>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
<thead>
<tr>
<td>��Ʒ����</td>
<td>����</td>
<td>�ܽ��(Ԫ)</td>
</tr>
</thead>
<tbody><? if(is_array($tradesums)) { foreach($tradesums as $tradesum) { ?>	<tr>
	<td><a target="_blank" href="viewthread.php?do=tradeinfo&amp;tid=<?=$tradesum['tid']?>&amp;pid=<?=$tradesum['pid']?>"><?=$tradesum['subject']?></a></td>
	<td><a target="_blank" href="space.php?uid=<?=$tradesum['sellerid']?>"><?=$tradesum['seller']?></a></td>
	<td><?=$tradesum['tradesum']?></td>
	</tr><? } } ?></tbody>

</table>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
<div class="msgtabs"><strong>����������</strong></div>

<thead>
<tr>
<td>��Ʒ����</td>
<td>����</td>
<td>�۳�����</td>
</tr>
</thead>
<tbody><? if(is_array($totalitems)) { foreach($totalitems as $totalitem) { ?>	<tr>
	<td><a target="_blank" href="viewthread.php?do=tradeinfo&amp;tid=<?=$tradesum['tid']?>&amp;pid=<?=$tradesum['pid']?>"><?=$totalitem['subject']?></a></td>
	<td><a target="_blank" href="space.php?uid=<?=$totalitem['sellerid']?>"><?=$totalitem['seller']?></a></td>
	<td><?=$totalitem['totalitems']?></td>
	</tr><? } } ?></tbody>
</table></div>


<div class="notice">ͳ�������ѱ����棬�ϴ��� <?=$lastupdate?> �����£��´ν��� <?=$nextupdate?> ���и���</div>
</div>
</div>
<? include template('footer'); ?>
