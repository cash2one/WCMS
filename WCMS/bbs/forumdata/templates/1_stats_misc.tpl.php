<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">��̳ͳ��</a>
&raquo;
<? if($type == 'views') { ?>
	����ͳ��
<? } elseif($type == 'agent') { ?>
	�ͻ����
<? } elseif($type == 'posts') { ?>
	��������¼
<? } elseif($type == 'forumsrank') { ?>
	�������
<? } elseif($type == 'threadsrank') { ?>
	��������
<? } elseif($type == 'postsrank') { ?>
	��������
<? } elseif($type == 'creditsrank') { ?>
	��������
<? } elseif($type == 'modworks') { ?>
	����ͳ��
<? } ?>
</div>
<div class="container">
<div class="side">
<? include template('stats_navbar'); ?>
</div>
<div class="content">
<div class="mainbox">
<? if($type == 'views') { ?>
	<h1>����ͳ��</h1>
	<table summary="��������" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td colspan="2">��������</td>
			</tr>
		</thead>
		<?=$statsbar_week?>
		<thead>
			<tr>
				<td colspan="2">ʱ������</td>
			</tr>
		</thead>
		<?=$statsbar_hour?>
	</table>

<? } elseif($type == 'agent') { ?>
	<h1>�ͻ����</h1>
	<table summary="�ͻ����" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td colspan="2">����ϵͳ</td>
			</tr>
		</thead>
		<?=$statsbar_os?>
		<thead>
			<tr>
				<td colspan="2">�����</td>
			</tr>
		</thead>
		<?=$statsbar_browser?>
	</table>

<? } elseif($type == 'posts') { ?>
	<h1>��������¼</h1>
	<table summary="��������¼" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td colspan="2">ÿ���������Ӽ�¼</td>
			</tr>
		</thead>
		<?=$statsbar_monthposts?>
		<thead>
			<tr>
				<td colspan="2">ÿ���������Ӽ�¼</td>
			</tr>
		</thead>
		<?=$statsbar_dayposts?>
	</table>

<? } elseif($type == 'forumsrank') { ?>
	<h1>�������</h1>
	<table summary="�������" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2">���� ���а�</td>
				<td colspan="2">�ظ� ���а�</td>
				<td colspan="2">��� 30 �췢�� ���а�</td>
				<td colspan="2">��� 24 Сʱ���� ���а�</td>
			</tr>
		</thead>
		<?=$forumsrank?>
	</table>

<? } elseif($type == 'threadsrank') { ?>
	<h1>��������</h1>
	<table summary="��������" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2">�������������</td>
				<td colspan="2">���ظ���������</td>
			</tr>
		</thead>
		<?=$threadsrank?>
	</table>

<? } elseif($type == 'postsrank') { ?>
	<h1>��������</h1>
	<table summary="��������" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2">���� ���а�</td>
				<td colspan="2">������ ���а�</td>
				<td colspan="2">��� 30 �췢�� ���а�</td>
				<td colspan="2">��� 24 Сʱ���� ���а�</td>
			</tr>
		</thead>
		<?=$postsrank?>
		</table>

<? } elseif($type == 'creditsrank') { ?>
	<h1>��������</h1>
	<table summary="��������" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2">���� ���а�</td><? if(is_array($arrextcredits['0'])) { foreach($arrextcredits['0'] as $id => $credit) { ?><td colspan="2"><?=$credit['title']?> ���а�</td><? } } ?></tr>
		</thead>

	<?=$creditsrank['0']?>
	</td></table>
	<br />
	<? if(!empty($arrextcredits['1'])) { ?>
		<table summary="��������" cellpadding="0" cellspacing="0">
			<thead>
				<tr><? if(is_array($arrextcredits['1'])) { foreach($arrextcredits['1'] as $id => $credit) { ?><td colspan="2"><?=$credit['title']?> ���а�</td><? } } ?></tr>
			</thead>

		<?=$creditsrank['1']?>
		</td></table>
	<? } ?>
	</div>

<? } elseif($type == 'modworks' && $uid) { ?>

	<h1>����ͳ�� - <?=$member['username']?></h1>
	<table width="100%" cellpadding="0" cellspacing="0">
	<thead>
	<tr align=center><td width="8%">ʱ��</td><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td width="<?=$tdwidth?>"><?=$val?></td><? } } ?></tr>
	</thead>
	<tbody><? if(is_array($modactions)) { foreach($modactions as $day => $modaction) { ?><tr align="center">
		<td><em class="tips"><?=$day?></em></td><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { if($modaction[$key]['posts']) { ?><td title="����: <?=$modaction[$key]['posts']?>"><?=$modaction[$key]['count']?><? } else { ?><td>&nbsp;<? } ?></td><? } } ?></tr><? } } ?></tbody>
	<tr ><td colspan="<?=$tdcols?>"></td></tr>
	<tr align="center">
	<td>���¹���</td><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td class="<?=$bgarray[$key]?>" <? if($totalactions[$key]['posts']) { ?>title="����: <?=$totalactions[$key]['posts']?>"<? } ?>><?=$totalactions[$key]['count']?></td><? } } ?></tr>
	</table>


	<table cellspacing="0" cellpadding="4" border="0" width="100%%" align="center" class="tips">
	<tr><td align="right">�·�: <? if(is_array($monthlinks)) { foreach($monthlinks as $link) { ?> &nbsp;<?=$link?>&nbsp; <? } } ?></td></tr></table><br />


<? } elseif($type == 'modworks') { ?>

	<h1>����ͳ�� - ȫ�������Ա</h1>
	<table width="100%" cellpadding="0" cellspacing="0">
	<thead>
	<tr align=center><td width="8%">�û���</td><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td width="<?=$tdwidth?>"><?=$val?></td><? } } ?></tr>
	</thead>
	<tbody><? if(is_array($members)) { foreach($members as $uid => $member) { ?><tr align="center">
		<td><a href="stats.php?type=modworks&amp;before=<?=$before?>&amp;uid=<?=$uid?>" title="�鿴��ϸ����ͳ��"><?=$member['username']?></a></td><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { if($member[$key]['posts']) { ?><td title="����: <?=$member[$key]['posts']?>"><em class="tips"><?=$member[$key]['count']?></em><? } else { ?><td>&nbsp;<? } ?></td><? } } ?></tr><? } } ?></tbody>
	</table>

	<table cellspacing="0" cellpadding="4" border="0" width="95%" align="center" class="tips">
	<tr><td align="right">�·�: <? if(is_array($monthlinks)) { foreach($monthlinks as $link) { ?> &nbsp;<?=$link?>&nbsp; <? } } ?></td></tr></table><br />
<? } ?>

			</div>
			<? if($type == 'forumsrank') { ?><div class="notice">ͳ�������ѱ����棬�ϴ��� <?=$lastupdate?> �����£��´ν��� <?=$nextupdate?> ���и���</div><? } ?>
		</div>
	</div>
<? include template('footer'); ?>
