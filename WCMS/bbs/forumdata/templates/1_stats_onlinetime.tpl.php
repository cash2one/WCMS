<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">��̳ͳ��</a> &raquo; ����ʱ��</div>
	<div class="container">
		<div class="side">
<? include template('stats_navbar'); ?>
</div>
		<div class="content">
			<div class="mainbox">
				<h1>����ʱ��</h1>
				<table summary="����ʱ��" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td colspan="2">������ʱ������(Сʱ)</td>
							<td colspan="2">��������ʱ������(Сʱ)</td>
						</tr>
					</thead>
					<?=$onlines?>
				</table>
			</div>
			<div class="notice">ͳ�������ѱ����棬�ϴ��� <?=$lastupdate?> �����£��´ν��� <?=$nextupdate?> ���и���</div>
		</div>
	</div>
<? include template('footer'); ?>
