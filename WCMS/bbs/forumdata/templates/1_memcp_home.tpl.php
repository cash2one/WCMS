<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div class="container">
	<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �������</div>
	<div class="content">
		<table id="memberinfo" class="portalbox" cellpadding="0" cellspacing="1">
			<tr>
				<td class="memberinfo_avatar">
					<?=$avatar?>
					<p><a href="space.php?action=viewpro&amp;uid=<?=$discuz_uid?>"><?=$discuz_userss?></a></p>
				</td>
				<td class="memberinfo_forum">
					<ul>
						<li><label>UID:</label> <?=$member['uid']?></li>
						<li><label>�û���:</label> <?=$grouptitle?><? if($regverify == 1 && $groupid == 8) { ?>&nbsp; [ <a href="member.php?action=emailverify">������֤ Email ��Ч��</a> ]<? } ?></li>
						<li><label>ע������:</label><?=$member['regdate']?></li>
						<li><label>ע�� IP:</label><?=$member['regip']?> <?=$member['regiplocation']?></li>
						<li><label>�ϴη��� IP:</label><?=$member['lastip']?> <?=$member['lastiplocation']?></li>
						<li><label>�ϴη���:</label><?=$member['lastvisit']?></li>
						<li><label>��󷢱�:</label><?=$member['lastpost']?></li>

					</ul>
				</td>
				<td class="memberinfo_forum" style="width: 12em;">
					<ul>
						<li>����: <?=$credits?></li><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><li>
							<? if($id == $creditstrans) { ?>
							<?=$credit['title']?>: <span style="font-weight: bold;"><?=$GLOBALS['extcredits'.$id]?></span> <?=$credit['unit']?>
							<? } else { ?>
							<?=$credit['title']?>: <?=$GLOBALS['extcredits'.$id]?> <?=$credit['unit']?>
							<? } ?>
						</li><? } } ?><li>����: <?=$member['posts']?> </li>
						<li>����: <?=$member['digestposts']?></li>
					</ul>
				</td>
			</tr>
		</table>
		<? if($validating) { ?>
		<div class="mainbox formbox">
			<h1>�˻����</h1>
			<form method="post" action="member.php?action=regverify">
				<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
				<table summary="" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<td>����Ա��������ע���û���Ҫ�˹���֤�������ʺ����ύ�� <strong><?=$validating['submittimes']?></strong> ����֤����Ŀǰ��δͨ����֤��</td>
						</tr>
					</thead>
					<tr>
						<th>��ǰ״̬</th>
						<td><strong><? if($validating['status'] == 0) { ?>�ȴ�������Ա�������<? } elseif($validating['status'] == 1) { ?>��˱��ܾ����������޸�ע��ԭ����ٴ��ύ<? } ?></strong></td>
					</tr>
					<? if($validating['admin']) { ?>
					<tr>
						<th>��˹���Ա</th>
						<td><a href="space.php?username=<?=$validating['adminenc']?>"><?=$validating['admin']?></a></td>
					</tr>
					<? } ?>
					<? if($validating['moddate']) { ?>
					<tr>
						<th>���ʱ��</th>
						<td><?=$validating['moddate']?></td>
					</tr>
					<? } ?>
					<? if($validating['remark']) { ?>
					<tr>
						<th>����Ա����������</th>
						<td><?=$validating['remark']?></td>
					</tr>
					<? } ?>
					<tr>
						<th valign="top"><label for="regmessagenew">ע��ԭ��</label></th>
						<td><textarea rows="5" cols="50" id="regmessagenew" name="regmessagenew"><?=$validating['message']?></textarea></td>
					</tr>
					<? if($validating['status'] == 1) { ?>
					<tr class="btns">
						<th>&nbsp;</th>
						<td><button type="submit" class="submit" name="verifysubmit" id="verifysubmit" value="true">�ύ</button></td>
					</tr>
					<? } ?>
				</table>
			</form>
		</div>
		<? } ?>

		<div class="mainbox">
			<h3>�������������Ϣ</h3>
			<table summary="�������������Ϣ" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
					<th>����</th>
					<td class="user">����</td>
					<td class="time">ʱ��</td>
					</tr>
				</thead>
				<tbody>
				<? if($msgexists) { if(is_array($msglist)) { foreach($msglist as $message) { ?>					<tr>
					<th><a href="pm.php?action=view&amp;pmid=<?=$message['pmid']?>" target="_blank"><?=$message['subject']?></a></th>
					<td class="user"><a href="space.php?uid=<?=$message['msgfromid']?>"><?=$message['msgfrom']?></a></td>
					<td class="time"><?=$message['dateline']?></td>
					</tr>
					<? } } } else { ?>
					<tr><th colspan="3">Ŀǰ�ռ�����û����Ϣ��</th></tr>
				<? } ?>
				</tbody>
			</table>
		</div>
		<div class="mainbox">
			<h3>���������ת����һ���¼</h3>
			<table summary="���������ת����һ���¼" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<td class="user">����/��</td>
						<td class="time">ʱ��</td>
						<td class="nums">֧��</td>
						<td class="nums">����</td>
						<td>����</td>
					</tr>
				</thead>
				<tbody>
				<? if($loglist) { if(is_array($loglist)) { foreach($loglist as $log) { ?>					<tr>
						<td class="user"><? if($log['fromto'] == 'BANK ACCOUNT') { ?>�����ֽ�ת��<? } else { ?><a href="space.php?username=<?=$log['fromtoenc']?>"><?=$log['fromto']?></a><? } ?></td>
						<td class="time"><?=$log['dateline']?></td>
						<td class="nums"><? if($log['send']) { ?><?=$extcredits[$log['sendcredits']]['title']?> <?=$log['send']?> <?=$extcredits[$log['sendcredits']]['unit']?><? } ?></td>
						<td class="nums"><? if($log['receive']) { ?><?=$extcredits[$log['receivecredits']]['title']?> <?=$log['receive']?> <?=$extcredits[$log['receivecredits']]['unit']?><? } ?></td>
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
		</div>

	</div>
	<div class="side">
<? include template('personal_navbar'); ?>
</div>
</div>
<? include template('footer'); ?>
