<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">��̳ͳ��</a> &raquo; �����ſ�</div>
	<div class="container">
		<div class="side">
<? include template('stats_navbar'); ?>
</div>
		<div class="content">
			<div class="mainbox">
				<h3>��Աͳ��</h3>
				<table summary="��Աͳ��" cellspacing="0" cellpadding="0">
					<tr>
						<th>ע���Ա</th><td><?=$members?></td>
						<th>������Ա</th><td><?=$mempost?></td>
					</tr>
					
					<tr>
						<th>�����Ա</th><td><?=$admins?></td>
						<th>δ������Ա</th><td><?=$memnonpost?></td>
					</tr>
					
					<tr>
						<th>�»�Ա</th><td><?=$lastmember?></td>
						<th>������Առ����</th><td><?=$mempostpercent?>%</td>
					</tr>
					
					<tr>
						<th>������̳֮��</th><td><?=$bestmem?> <em title="������">(<?=$bestmemposts?>)</em></td>
						<th>ƽ��ÿ�˷�����</th><td><?=$mempostavg?></td>
					</tr>
			
				</table>
			</div>
			<div class="mainbox">
				<h3>��̳ͳ��</h3>
				<table summary="��̳ͳ��" cellspacing="0" cellpadding="0">
					<tr>
						<th>�����</th><td><?=$forums?></td>
						<th>ƽ��ÿ������������</th><td><?=$postsaddavg?></td>
						<th>�����ŵİ��</th><td><a href="forumdisplay.php?fid=<?=$hotforum['fid']?>" target="_blank"><?=$hotforum['name']?></a></td>
					</tr>
					
					<tr>
						<th>������</th><td><?=$threads?></td>
						<th>ƽ��ÿ��ע���Ա��</th><td><?=$membersaddavg?></td>
						<th>������</th><td><?=$hotforum['threads']?></td>
					</tr>
					
					<tr>
						<th>������</th><td><?=$posts?></td>
						<th>��� 24 Сʱ����������</th><td><?=$postsaddtoday?></td>
						<th>������</th><td><?=$hotforum['posts']?></td>
					</tr>
					
					<tr>
						<th>ƽ��ÿ�����ⱻ�ظ�����</th><td><?=$threadreplyavg?></td>
						<th>��� 24 Сʱ������Ա��</th><td><?=$membersaddtoday?></td>
						<th>��̳��Ծָ��</th><td><?=$activeindex?></td>
					</tr>
				</table>
			</div>
			<? if($statstatus) { ?>
				<div class="mainbox">
					<h3>�����ſ�</h3>
					<table summary="�����ſ�" cellspacing="0" cellpadding="0">
						<tr>
							<th>��ҳ������</th><td><?=$stats_total['hits']?></td>
							<th>�����������·�</th><td><?=$maxmonth_year?> �� <?=$maxmonth_month?> ��</td>
						</tr>
					
						<tr>
							<th>��������</th><td><?=$stats_total['visitors']?> �˴�</td>
							<th>�·���ҳ������</th><td><?=$maxmonth?></td>
						</tr>
					
						<tr>
							<th>��Ա</th><td><?=$stats_total['members']?></td>
							<th>ʱ��</th><td><?=$maxhourfrom?> - <?=$maxhourto?></td>
						</tr>
					
						<tr>
							<th>�ο�</th><td><?=$stats_total['guests']?></td>
							<th>ʱ����ҳ������</th><td><?=$maxhour?></td>
						</tr>
					
						<tr>
							<th>ƽ��ÿ�����</th><td><?=$pageviewavg?></td>
							<th>&nbsp;</th><td>&nbsp;</td>
						</tr>
					
					</table>
				</div>
			<? } ?>
			<div class="mainbox">
				<h3>�·�����</h3>
				<table summary="�·�����" cellpadding="0" cellspacing="0">
				<? if($statstatus) { ?>
					<?=$statsbar_month?>
				<? } else { ?>
					<thead>
						<td colspan="2">ÿ���������Ӽ�¼</td>
					</thead>
					<?=$statsbar_monthposts?>
					<thead>
						<td colspan="2">ÿ���������Ӽ�¼</td>
					</thead>
					<?=$statsbar_dayposts?>
				<? } ?>
				</table>
			</div>
			<div class="notice">ͳ�������ѱ����棬�ϴ��� <?=$lastupdate?> �����£��´ν��� <?=$nextupdate?> ���и���</div>
		</div>
	</div>
<? include template('footer'); ?>
