<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="foruminfo">
	<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <? if($type != 'birthdays') { ?>��Ա�б�<? } else { ?>�������ջ�Ա�б�<? } ?></div>
</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
<div class="mainbox">
	<h3><? if($type != 'birthdays') { ?>��Ա�б�<? } else { ?>�������ջ�Ա�б�<? } ?></h3>
	<table summary="<? if($type != 'birthdays') { ?>��Ա�б�<? } else { ?>�������ջ�Ա�б�<? } ?>" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
			<td><a href="member.php?action=list&amp;order=username">�û���</a></td>
			<td>UID</td>
			<td><a href="member.php?action=list&amp;order=gender">�Ա�</a></td>
			<td><a href="member.php?action=list&amp;order=regdate">ע������</a></td>
			<td>�ϴη���</td>
			<td>����</td>
			<? if($type != 'birthdays') { ?>
				<td><a href="member.php?action=list&amp;order=credits">����</a></td>
			<? } else { ?>
				<td><a href="member.php?action=list&amp;type=birthdays">��������</a></td>
			<? } ?>
			</tr>
		</thead>
		<tbody><? if(is_array($memberlist)) { foreach($memberlist as $member) { ?>			<tr>
				<td><a href="space.php?uid=<?=$member['uid']?>" class="bold"><?=$member['username']?></a></td>
				<td ><?=$member['uid']?></td>
				<td><? if($member['gender'] == '1') { ?>��<? } elseif($member['gender'] == 2) { ?>Ů<? } else { ?>&nbsp;<? } ?></td>
				<td><?=$member['regdate']?></td>
				<td><?=$member['lastvisit']?></td>
				<td><?=$member['posts']?></td>
				<? if($type != 'birthdays') { ?>
					<td><?=$member['credits']?></td>
				<? } else { ?>
					<td><?=$member['bday']?></td>
				<? } ?>
			</tr>
		<? } } ?></tbody>
	</table>
</div>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } if($type != 'birthdays') { ?>
<div id="footfilter" class="box">
	<form method="post" action="member.php?action=list">
		<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<input type="text" size="15" name="srchmem" />
		&nbsp;<button type="submit">����</button>
	</form>
	����ʽ:
	<a href="member.php?action=list&amp;order=regdate">ע������</a> -
	<a href="member.php?action=list&amp;order=username">�û���</a> -
	<a href="member.php?action=list&amp;order=credits">����</a> -
	<a href="member.php?action=list&amp;order=gender">�Ա�</a> -
	<a href="member.php?action=list&amp;type=admins">����ͷ��</a>
</div>
<? } include template('footer'); ?>
