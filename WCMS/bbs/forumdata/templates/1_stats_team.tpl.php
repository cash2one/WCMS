<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">��̳ͳ��</a> &raquo; �����Ŷ�</div>
	<div class="container">
		<div class="side">
<? include template('stats_navbar'); ?>
</div>
		<div class="content">
			<? if($team['admins']) { ?>
				<div class="mainbox">
					<h1>�����Ŷ� - ����Ա�ͳ�������</h1>
					<table summary="����Ա�ͳ�������" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<td>�û���</td>
								<td>����ͷ��</td>
								<td>�ϴη���</td>
								<td>�뿪����</td>
								<td>����</td>
								<td>����</td>
								<td>��� 30 �췢��</td>
								<? if($modworkstatus) { ?><td>���¹���</td><? } ?>
								<? if($oltimespan) { ?>
									<td>�ܼ�����</td>
									<td>��������</td>
								<? } ?>
							</tr>
						</thead><? if(is_array($team['admins'])) { foreach($team['admins'] as $uid) { ?>							<tr>
								<td><a href="space.php?uid=<?=$uid?>"><?=$team['members'][$uid]['username']?></a></td>
								<td><? if($team['members'][$uid]['adminid'] == 1) { ?>��̳����Ա<? } elseif($team['members'][$uid]['adminid'] == 2) { ?>��������<? } elseif($team['members'][$uid]['adminid'] == 3) { ?>����<? } ?></td>
								<td><?=$team['members'][$uid]['lastactivity']?></td>
								<td><?=$team['members'][$uid]['offdays']?></td>
								<td><?=$team['members'][$uid]['credits']?></td>
								<td><?=$team['members'][$uid]['posts']?></td>
								<td><?=$team['members'][$uid]['thismonthposts']?></td>
								<? if($modworkstatus) { ?>
									<td><a href="stats.php?type=modworks&amp;uid=<?=$uid?>"><?=$team['members'][$uid]['modactions']?></a></td>
								<? } ?>
								<? if($oltimespan) { ?>
									<td><?=$team['members'][$uid]['totalol']?> Сʱ</td>
									<td><?=$team['members'][$uid]['thismonthol']?> Сʱ</td>
								<? } ?>
							</tr>
						<? } } ?></table>
				</div>
			<? } if(is_array($team['categories'])) { foreach($team['categories'] as $category) { ?>				<div class="mainbox">
					<h3><a href="<?=$indexname?>?gid=<?=$category['fid']?>"><?=$category['name']?></a></h3>
					<table summary="<?=$category['fid']?>" cellspacing="0" cellpadding="0">
						<thead>
						<? if($oltimespan) { ?>
							<tr>
								<td>���</td>
								<td>�û���</td>
								<td>����ͷ��</td>
								<td>�ϴη���</td>
								<td>�뿪����</td>
								<td>����</td>
								<td>����</td>
								<td>��� 30 �췢��</td>
								<td>���¹���</td>
								<td>�ܼ�����</td>
								<td>��������</td>
							</tr>
						<? } else { ?>
							<tr>
								<td>���</td>
								<td>�û���</td>
								<td>����ͷ��</td>
								<td>�ϴη���</td>
								<td>�뿪����</td>
								<td>����</td>
								<td>����</td>
								<td>��� 30 �췢��</td>
								<td>���¹���</td>
							</tr>
						<? } ?>
						</thead><? if(is_array($team['forums'][$category['fid']])) { foreach($team['forums'][$category['fid']] as $fid => $forum) { if(is_array($team['moderators'][$fid])) { foreach($team['moderators'][$fid] as $key => $uid) { ?><tr>
								<? if($key == 0) { ?><td class="altbg1" rowspan="<?=$forum['moderators']?>"><? if($forum['type'] == 'group') { ?><a href="<?=$indexname?>?gid=<?=$fid?>"><? } else { ?><a href="forumdisplay.php?fid=<?=$fid?>"><? } ?><?=$forum['name']?></a></td><? } ?>
								<td><a href="space.php?uid=<?=$uid?>"><? if($forum['inheritedmod']) { ?><b><?=$team['members'][$uid]['username']?></b><? } else { ?><?=$team['members'][$uid]['username']?><? } ?></a></td>
								<td><? if($team['members'][$uid]['adminid'] == 1) { ?>��̳����Ա<? } elseif($team['members'][$uid]['adminid'] == 2) { ?>��������<? } elseif($team['members'][$uid]['adminid'] == 3) { ?>����<? } ?></td>
								<td><?=$team['members'][$uid]['lastactivity']?></td>
								<td><?=$team['members'][$uid]['offdays']?></td>
								<td><?=$team['members'][$uid]['credits']?></td>
								<td><?=$team['members'][$uid]['posts']?></td>
								<td><?=$team['members'][$uid]['thismonthposts']?></td>
								<td><? if($modworkstatus) { ?><a href="stats.php?type=modworks&amp;uid=<?=$uid?>"><?=$team['members'][$uid]['modactions']?></a><? } else { ?>N/A<? } ?></td>
								<? if($oltimespan) { ?>
									<td><?=$team['members'][$uid]['totalol']?> Сʱ</td>
									<td><?=$team['members'][$uid]['thismonthol']?> Сʱ</td>
								<? } ?>
								</tr>
							<? } } } } ?></table>
				</div><? } } ?><div class="notice">ͳ�������ѱ����棬�ϴ��� <?=$lastupdate?> �����£��´ν��� <?=$nextupdate?> ���и���</div>
		</div>
	</div>
<? include template('footer'); ?>
