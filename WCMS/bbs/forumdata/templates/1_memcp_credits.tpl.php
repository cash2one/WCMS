<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div class="container">
	<div id="foruminfo">
		<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo;
		<? if($action == 'credits') { ?>
			���ֽ���
		<? } elseif($action == 'creditslog') { ?>
			���ּ�¼
		<? } ?>
		</div>
	</div>
	<div class="content">
		<div class="mainbox formbox">

<? if($action == 'credits') { ?>
	<h1>���ֽ���</h1>
	<ul class="tabs">
	<? if($exchangestatus) { ?>
		<li <? if($operation == 'exchange') { ?> class="current"<? } ?>><a href="memcp.php?action=credits&amp;operation=exchange">���ֶһ�</a></li>
	<? } ?>
	<? if($transferstatus) { ?>
		<li <? if($operation == 'transfer') { ?> class="current"<? } ?>><a href="memcp.php?action=credits&amp;operation=transfer">����ת��</a></li>
	<? } ?>
	<? if($ec_ratio) { ?>
		<li <? if($operation == 'addfunds') { ?> class="current"<? } ?>><a href="memcp.php?action=credits&amp;operation=addfunds">���ֳ�ֵ</a></li>
	<? } ?>
	</ul>
<? } elseif($action == 'creditslog') { ?>
	<h1>���ּ�¼</h1>
	<ul class="tabs headertabs">
	<li <? if($operation == 'creditslog') { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog&amp;operation=creditslog">ת����һ���¼</a></li>
	<li <? if($operation == 'paymentlog') { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog&amp;operation=paymentlog">���⸶�Ѽ�¼</a></li>
	<li <? if($operation == 'incomelog') { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog&amp;operation=incomelog">���������¼</a></li>
	<li <? if($operation == 'rewardpaylog') { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog&amp;operation=rewardpaylog">���͸��Ѽ�¼</a></li>
	<li <? if($operation == 'rewardincomelog') { ?> class="current"<? } ?>><a href="memcp.php?action=creditslog&amp;operation=rewardincomelog">���������¼</a></li>
	</ul>
<? } if($operation == 'transfer') { ?>
	<form id="creditsform" method="post" action="memcp.php?action=credits">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<input type="hidden" name="operation" value="transfer" />

	<table summary="����ת��" cellspacing="0" cellpadding="0" width="100%">
	<tbody>

	<tr>
	<th><label for="password">����</label></th>
	<td><input type="password" size="15" name="password" id="password" /></td>
	</tr>

	<tr>
	<th><label for="to">���͵�</label></th>
	<td><input type="text" size="15" name="to" id="to" /></td>
	</tr>

	<tr>
	<th><label for="amount"><?=$extcredits[$creditstrans]['title']?></label></th>
	<td><input type="text" size="15" id="amount" name="amount" value="0" onkeyup="calcredit()" /> <?=$extcredits[$creditstrans]['unit']?></td>
	</tr>

	<tr>
	<th>ת��������</th>
	<td><?=$transfermincredits?> <?=$extcredits[$creditstrans]['unit']?></td>
	</tr>

	<tr>
	<th>���ֽ���˰</span></th>
	<td><?=$taxpercent?></td>
	</tr>

	<tr>
	<th>����������</span></th>
	<td><span id="desamount">0</span> <?=$extcredits[$creditstrans]['unit']?></td>
	</tr>

	<tr>
		<th valign="top"><label for="transfermessage">����</label></th>
		<td>
			<textarea name="transfermessage" id="transfermessage" rows="6" style="width: 85%;"></textarea>
			<div class="tips">������븽�ԣ�ϵͳ���Զ�������߷��Ͷ���Ϣ֪ͨ</div>
		</td>
	</tr>
	</tbody>

	<tr>
		<th>&nbsp;</th><td><ul><li>����ת�˿��Ը�����̳����Ա���õĽ��׻��֣������Ļ���ת�ø������û���<li>�������յ����ֵ�ʵ����ֵ���Ǳ��۳�����˰���������ģ���ֻҪ���л��ֽ��ף��Ϳ��ܻ����������ʧ��<li>���ֽ���һ���ύ���ɻָ�����ȷ��������ٽ��в�����</td>
	</tr>

	<tr class="btns">
		<th>&nbsp;</th><td><button class="submit" type="submit" name="creditssubmit" id="creditssubmit" value="true" onclick="return confirm('���ֲ������ָܻ�����ȷ����?');" tabindex="1">�ύ</button></td>
	</tr>

	</table>

	</form>
	<script type="text/javascript">
	function calcredit() {
		var amount = parseInt($('amount').value);
		$('desamount').innerHTML = !isNaN(amount) ? Math.floor(amount * (1 - <?=$creditstax?>)) : 0;
	}
	</script>
<? } elseif($operation == 'exchange') { ?>
	<form id="creditsform" method="post" action="memcp.php?action=credits">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>">
	<input type="hidden" name="operation" value="exchange">

	<script type="text/javascript">
	var ratioarray = new Array();<? if(is_array($exchcredits)) { foreach($exchcredits as $id => $ecredits) { ?>ratioarray[<?=$id?>] = <?=$ecredits['ratio']?>;<? } } ?></script>

	<table summary="���ֶһ�"  cellspacing="0" cellpadding="0" width="100%">
	<tbody>

	<tr>
	<th><label for="password">����</label></th>
	<td><input type="password" size="15" name="password" /></td>
	</tr>

	<tr>
	<th><label for="amount">֧��</label></th>
	<td>
	<input type="text" size="15" name="amount" id="amount" value="0" onkeyup="calcredit();" />&nbsp;&nbsp;<select name="fromcredits" onChange="calcredit();"><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { if($credit['allowexchangeout'] && $credit['ratio']) { ?>
			<option value="<?=$id?>" unit="<?=$credit['unit']?>" title="<?=$credit['title']?>" ratio="<?=$credit['ratio']?>"><?=$credit['title']?></option>
		<? } } } ?></select>
	</td>
	</tr>
	<tr>
	<th><label for="desamount">����</label></th>
	<td>
	<input type="text" size="15" id="desamount" value="0" disabled />&nbsp;&nbsp;<select name="tocredits" onChange="calcredit();"><? if(is_array($extcredits)) { foreach($extcredits as $id => $ecredits) { if($ecredits['allowexchangein'] && $ecredits['ratio']) { ?>
			<option value="<?=$id?>" unit="<?=$ecredits['unit']?>" title="<?=$ecredits['title']?>" ratio="<?=$ecredits['ratio']?>"><?=$ecredits['title']?></option>
		<? } } } ?></select>
	</td>
	</tr>

	<tr>
	<th>�һ�����</th>
	<td><span class="bold">1</span><span id="orgcreditunit"></span><span id="orgcredittitle"></span>��<span class="bold" id="descreditamount"></span><span id="descreditunit"></span><span id="descredittitle"></span></td>
	</tr>

	<tr>
	<th>�һ�������</th>
	<td><?=$exchangemincredits?></td>
	</tr>

	<tr>
	<th>���ֽ���˰</th>
	<td><?=$taxpercent?></td>
	</tr>

	<tr>
	<th>&nbsp;</th><td><ul><li>���ֶһ��Ǹ�����̳����Ա���õĿɶһ����֣������Լ���ĳ�ֻ��֣��һ�������һ�ֻ��֡�<li>�һ�����Ϊ������ֶ�Ӧһ����λ��׼���ֵ�ֵ������һ�����Ϊ 2 �Ļ��� 1 �֣��൱�ڶһ�����Ϊ 1 �Ļ��� 2 �֣����һ�����Խ�󣬸������Խ�м�ֵ��<li>�һ���Ŀ����ֵ�ʵ����ֵ���ǰ��նһ����������Ŀ����֣����۳�����˰���������ģ���ֻҪ���л��ֽ��ף��Ϳ��ܻ����������ʧ��<li>���ֽ���һ���ύ���ɻָ�����ȷ��������ٽ��в�����</td>
	</tr>
	</tbody>
	<tr class="btns">
		<th>&nbsp;</th><td><button class="submit" type="submit" name="creditssubmit" id="creditssubmit" value="true" onclick="return confirm('���ֲ������ָܻ�����ȷ����?');" tabindex="2">�ύ</button></td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function calcredit() {
		with($('creditsform')) {
			fromcredit = fromcredits[fromcredits.selectedIndex];
			tocredit = tocredits[tocredits.selectedIndex];
			var ratio = Math.round(((fromcredit.getAttribute('ratio') / tocredit.getAttribute('ratio')) * 100)) / 100;
			$('orgcreditunit').innerHTML = fromcredit.getAttribute('unit');
			$('orgcredittitle').innerHTML = fromcredit.getAttribute('title');
			$('descreditunit').innerHTML = tocredit.getAttribute('unit');
			$('descredittitle').innerHTML = tocredit.getAttribute('title');
			$('descreditamount').innerHTML = ratio;
			$('amount').value = $('amount').value.toInt();
			if(fromcredit.getAttribute('title') != tocredit.getAttribute('title') && $('amount').value != 0) {
				$('desamount').value = Math.floor(fromcredit.getAttribute('ratio') / tocredit.getAttribute('ratio') * $('amount').value * (1 - <?=$creditstax?>));
			} else {
				$('desamount').value = $('amount').value;
			}
		}
	}
	String.prototype.toInt = function() {
		var s = parseInt(this);
		return isNaN(s) ? 0 : s;
	}
	calcredit();
	</script>
<? } elseif($operation == 'addfunds') { ?>
	<form id="creditsform" method="post" action="memcp.php?action=credits" target="_blank">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<input type="hidden" name="operation" value="addfunds" />
	<table summary="���ֳ�ֵ" cellspacing="0" cellpadding="0" width="100%">
	<tbody>

	<tr>
	<th>��ֵ����</th>
	<td>
	������ֽ� <strong>1</strong> Ԫ = <?=$extcredits[$creditstrans]['title']?> <b><?=$ec_ratio?></b> <?=$extcredits[$creditstrans]['unit']?>
	<? if($ec_mincredits) { ?><br />������ͳ�ֵ <?=$extcredits[$creditstrans]['title']?> <b><?=$ec_mincredits?></b> <?=$extcredits[$creditstrans]['unit']?><? } ?>
	<? if($ec_maxcredits) { ?><br />������߳�ֵ <?=$extcredits[$creditstrans]['title']?> <b><?=$ec_maxcredits?></b> <?=$extcredits[$creditstrans]['unit']?><? } ?>
	<? if($ec_maxcreditspermonth) { ?><br />��� 30 ����߳�ֵ <?=$extcredits[$creditstrans]['title']?> <b><?=$ec_maxcreditspermonth?></b> <?=$extcredits[$creditstrans]['unit']?><? } ?>
	</td>
	</tr>

	<tr>
	<th><?=$extcredits[$creditstrans]['title']?> �˻���ֵ����</th>
	<td><input type="text" size="15" id="amount" name="amount" value="0" onkeyup="calcredit()" /> <?=$extcredits[$creditstrans]['unit']?></td>
	</tr>

	<tr>
	<th>����Ҫ����֧���Ľ��Ϊ</th>
	<td>�����<span id="desamount">0</span>Ԫ</td>
	</tr>

	<tr>
	<th>&nbsp;</th><td>��������������ֽ�����֧������ʽ��Ϊ���Ľ��׻����˻���ֵ���ڹ������ӡ��û���Ȩ�޻������������ѻ��<br />���ֳ�ֵ���ܳ������˿��������ڳ�ֵǰȷ���Ƿ���Ҫ������ϸ�˶Գ�ֵ�Ľ�<br /><strong>���ɹ�֧������ϵͳ������Ҫ�����ӵ�ʱ��ȴ�֧���������˿����޷�˲�����ˣ���ע�����ϵͳ���͵Ķ���Ϣ��������� 48 Сʱ��δ�յ�֪ͨ����Ϣ��������̳����Ա��ϵ��</strong></td>
	</tr>
	</tbody>
	<tr class="btns">
		<th>&nbsp;</th><td><button class="submit" type="submit" name="creditssubmit" id="creditssubmit" value="true" tabindex="3">�ύ</button></td>
	</tr>
	</table>

	</form>
	<script type="text/javascript">
	function calcredit() {
		var amount = parseInt($('amount').value);
		$('desamount').innerHTML = !isNaN(amount) ? Math.round(((amount / <?=$ec_ratio?>) * 10)) / 10 : 0;
	}
	</script>
<? } elseif($operation == 'paymentlog') { ?>

	<table summary="���⸶�Ѽ�¼" cellspacing="0" cellpadding="0" width="100%" align="center">

	<thead>
	<tr>
	<td>����</td>
	<td class="user">����</td>
	<td class="time">����ʱ��</td>
	<td>���</td>
	<td>����ʱ��</td>
	<td>�ۼ�</td>
	<td>��������</td>
	</tr>
	</thead>
	<tbody>
	<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>			<tr>
			<td><a href="viewthread.php?tid=<?=$log['tid']?>"><?=$log['subject']?></a></td>
			<td><a href="space.php?uid=<?=$log['authorid']?>"><?=$log['author']?></a></td>
			<td><?=$log['tdateline']?></td>
			<td><a href="forumdisplay.php?fid=<?=$log['fid']?>"><?=$log['name']?></a></td>
			<td><?=$log['dateline']?></td>
			<? if(!$log['amount'] && !$log['netamount']) { ?>
				<td colspan="2">���˿�</td>
			<? } else { ?>
				<td><?=$extcredits[$creditstrans]['title']?> <?=$log['amount']?> <?=$extcredits[$creditstrans]['unit']?></td>
				<td><?=$extcredits[$creditstrans]['title']?> <?=$log['netamount']?> <?=$extcredits[$creditstrans]['unit']?></td>
			<? } ?>
			</tr>
		<? } } } else { ?>
		<td colspan="7">Ŀǰû�л��ֽ��׼�¼��</td></tr>
	<? } ?>
	</tbody>
	</table>
	<div class="subtable"><?=$multipage?></div>
<? } elseif($operation == 'incomelog') { ?>


	<table summary="���������¼" cellspacing="0" cellpadding="0" width="100%" align="center">
	<thead>
	<tr>
	<td align="left">����</td>
	<td>����ʱ��</td>
	<td>���</td>
	<td>������</td>
	<td>����ʱ��</td>
	<td>�ۼ�</td>
	<td>��������</td>
	</tr>
	</thead>
	<tbody>
	<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>			<tr>
			<td><a href="viewthread.php?tid=<?=$log['tid']?>"><?=$log['subject']?></a></td>
			<td><?=$log['tdateline']?></td>
			<td><a href="forumdisplay.php?fid=<?=$log['fid']?>"><?=$log['name']?></a></td>
			<td><a href="space.php?uid=<?=$log['uid']?>"><?=$log['username']?></a></td>
			<td><?=$log['dateline']?></td>
			<? if(!$log['amount'] && !$log['netamount']) { ?>
				<td colspan="2">���˿�</td>
			<? } else { ?>
				<td><?=$extcredits[$creditstrans]['title']?> <?=$log['amount']?> <?=$extcredits[$creditstrans]['unit']?></td>
				<td><?=$extcredits[$creditstrans]['title']?> <?=$log['netamount']?> <?=$extcredits[$creditstrans]['unit']?></td>
			<? } ?>
			</tr>
		<? } } } else { ?>
		<td colspan="7">Ŀǰû�л��ֽ��׼�¼��</td></tr>
	<? } ?>
	</tbody>
	</table>
	<div class="subtable"><?=$multipage?></div>
<? } elseif($operation == 'rewardpaylog') { ?>

	<table summary="���͸��Ѽ�¼" cellspacing="0" cellpadding="0" width="100%" align="center">
	<thead>
	<tr>
	<td>����</td>
	<td>����ʱ��</td>
	<td>���</td>
	<td>�ش���</td>
	<td>�����ܶ�</td>
	<td>ʵ�ʸ���</td>
	</tr></thead>
	<tbody>
	<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>			<tr>
			<td><a href="viewthread.php?tid=<?=$log['tid']?>"><?=$log['subject']?></a></td>
			<td><?=$log['dateline']?></td>
			<td><a href="forumdisplay.php?fid=<?=$log['fid']?>"><?=$log['name']?></a></td>
			<td><a href="space.php?uid=<?=$log['uid']?>"><?=$log['username']?></a></td>
			<td><?=$extcredits[$creditstrans]['title']?> <?=$log['price']?><? if($extcredits[$creditstrans]['unit'] != '') { ?> <?=$extcredits[$creditstrans]['unit']?><? } ?></td>
			<td><?=$extcredits[$creditstrans]['title']?> <?=$log['netamount']?><? if($extcredits[$creditstrans]['unit'] != '') { ?> <?=$extcredits[$creditstrans]['unit']?><? } ?></td>
			</tr>
		<? } } } else { ?>
		<td colspan="7">Ŀǰû�л��ֽ��׼�¼��</td></tr>
	<? } ?>
	</tbody>
	</table>
	<table cellspacing="0" cellpadding="0" border="0" align="center"><tr><td><?=$multipage?></td></tr></table>
<? } elseif($operation == 'rewardincomelog') { ?>

	<table summary="���������¼" cellspacing="0" cellpadding="0" width="100%" align="center">
	<thead>
	<tr>
	<td>����</td>
	<td>����ʱ��</td>
	<td>���</td>
	<td>������</td>
	<td>�����ܶ�</td>
	</tr>
	</thead>
	<tbody>
	<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>			<tr>
			<td><a href="viewthread.php?tid=<?=$log['tid']?>"><?=$log['subject']?></a></td>
			<td><?=$log['dateline']?></td>
			<td><a href="forumdisplay.php?fid=<?=$log['fid']?>"><?=$log['name']?></a></td>
			<td><a href="space.php?uid=<?=$log['uid']?>"><?=$log['username']?></a></td>
			<td><?=$extcredits[$creditstrans]['title']?> <?=$log['price']?><? if($extcredits[$creditstrans]['unit'] != '') { ?> <?=$extcredits[$creditstrans]['unit']?><? } ?></td>
			</tr>
		<? } } } else { ?>
		<td colspan="7">Ŀǰû�л��ֽ��׼�¼��</td></tr>
	<? } ?>
	</tbody>
	</table>

	<table cellspacing="0" cellpadding="0" border="0" align="center"><tr><td><?=$multipage?></td></tr></table>
<? } elseif($operation == 'creditslog') { ?>

	<table summary="ת����һ���¼" cellspacing="0" cellpadding="0" width="100%" align="center">
	<thead>
	<tr>
		<td>����/��</td>
		<td>ʱ��</td><td width="15%">֧��</td>
		<td>����</td>
		<td>����</td>
	</tr>
	</thead>
	<tbody>
	<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>			<tr>
			<td><? if($log['fromto'] == 'BANK ACCOUNT') { ?>�����ֽ�ת��<? } else { ?><a href="space.php?username=<?=$log['fromtoenc']?>"><?=$log['fromto']?></a><? } ?></td>
			<td><?=$log['dateline']?></td>
			<td><? if($log['send']) { ?><?=$extcredits[$log['sendcredits']]['title']?> <?=$log['send']?> <?=$extcredits[$log['sendcredits']]['unit']?><? } ?></td>
			<td><? if($log['receive']) { ?><?=$extcredits[$log['receivecredits']]['title']?> <?=$log['receive']?> <?=$extcredits[$log['receivecredits']]['unit']?><? } ?></td>
			<td>
			<? if($log['operation'] == 'TFR') { ?>
				����ת��
			<? } elseif($log['operation'] == 'RCV') { ?>
				����ת��
			<? } elseif($log['operation'] == 'EXC') { ?>
				���ֶһ�
			<? } elseif($log['operation'] == 'UGP') { ?>
				�����û����շ�
			<? } elseif($log['operation'] == 'AFD') { ?>
				�����ֽ�ת��
			<? } ?>
			</td>
			</tr>
		<? } } } else { ?>
		<tr><td colspan="5">Ŀǰû�л��ֽ��׼�¼��</td></tr>
	<? } ?>
	</tbody>
	</table>
	<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } ?>

	</div>
	</div>
	<div class="side">
<? include template('personal_navbar'); ?>
</div>
</div>
<? include template('footer'); ?>
