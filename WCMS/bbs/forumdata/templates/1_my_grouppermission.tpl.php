<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav">
<a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �û���Ȩ�޲�ѯ
</div>
<div class="container">
<div class="content">
<div class="mainbox">
<h1>�û���Ȩ�޲�ѯ</h1>
<ul class="tabs headertabs">
<li <? if(empty($type)) { ?> class="current"<? } ?>><a href="my.php?item=grouppermission">�ҵ�Ȩ��</a></li>
<li class="dropmenu<? if($type == 'member') { ?> current"<? } ?>"><a href="###" id="membergroup" onmouseover="showMenu(this.id)">��Ա�û���</a></li>
<li class="dropmenu<? if($type == 'system') { ?> current"<? } ?>"><a href="###" id="systemgroup" onmouseover="showMenu(this.id)">ϵͳ�û���</a></li>
<? if(!empty($grouplist['special'])) { ?>
	<li class="dropmenu<? if($type == 'special') { ?> current"<? } ?>"><a href="###" id="specialgroup" onmouseover="showMenu(this.id)">�����û���</a></li>
<? } ?>
</ul>

<ul class="popupmenu_popup headermenu_popup" id="membergroup_menu" style="display: none">
<?=$grouplist['member']?>
</ul>
<ul class="popupmenu_popup headermenu_popup" id="systemgroup_menu" style="display: none">
<?=$grouplist['system']?>
</ul>
<? if(!empty($grouplist['special'])) { ?>
	<ul class="popupmenu_popup headermenu_popup" id="specialgroup_menu" style="display: none">
	<?=$grouplist['special']?>
	</ul>
<? } ?>
<table cellspacing="0" cellpadding="0" width="100%">
<thead><tr><td colspan="2">�û���</td></tr></thead>
<tr>
<th>�û���ͷ��:</th>
<td><?=$group['grouptitle']?></td>
</tr>

<tr>
<th>�û�����:</th>
<td><? if($group['stars']) { showstars($group['stars']); } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>
<thead>
<tr><td colspan="2">����Ȩ��</td></tr>
</thead>
<tr>
<th width="50%">����Ȩ��:</th>
<td width="50%"><? if($group['radminid']==1 || $group['radminid']==2) { ?>ȫ��̳����<? } elseif($group['radminid']==3 ) { ?>���ְ�����<? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<? if($group['radminid']) { ?>
	<tr>
	<th>����༭����:</th>
	<td><? if($group['alloweditpost'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����༭ͶƱ:</th>
	<td><? if($group['alloweditpoll'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>�����ö�����:</th>
	<td><? if($group['allowstickthread']==1 ) { ?>�����ö� I<? } elseif($group['allowstickthread']==2 ) { ?>�����ö� I/II<? } elseif($group['allowstickthread']==3 ) { ?>�����ö� I/II/III<? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>�����������:</th>
	<td><? if($group['allowmodpost'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����ɾ������:</th>
	<td><? if($group['allowdelpost'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>��������ɾ��:</th>
	<td><? if($group['allowmassprune'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>������˴���:</th>
	<td><? if($group['allowcensorword'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����鿴 IP:</th>
	<td><? if($group['allowviewip'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>�����ֹ IP:</th>
	<td><? if($group['allowbanip'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����༭�û�:</th>
	<td><? if($group['allowedituser'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>�����ֹ�û�:</th>
	<td><? if($group['allowbanuser'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>��������û�:</th>
	<td><? if($group['allowmoduser'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����������:</th>
	<td><? if($group['allowpostannounce'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>����鿴��¼:</th>
	<td><? if($group['allowviewlog'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>������������:</th>
	<td><? if($group['disablepostctrl'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

	<tr>
	<th>������¼����:</th>
	<td><? if($group['supe_allowpushthread'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
	</tr>

<? } ?>
<thead>
<tr><td colspan="2">����Ȩ��</td></tr>
</thead>
<tr>
<th>���������̳:</th>
<td><? if($group['allowvisit'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>�Ķ�Ȩ��:</th>
<td><?=$group['readaccess']?></td>
</tr>

<tr>
<th>����鿴�û�����:</th>
<td><? if($group['allowviewpro'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>��������:</th>
<td><? if($group['allowinvisible'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����ʹ������:</th>
<td><? if($group['allowsearch']=='0') { ?>��������<? } elseif($group['allowsearch']=='1') { ?>ֻ������������<? } else { ?>����������������<? } ?></td>
</tr>

<tr>
<th>����ʹ��ͷ��:</th>
<td><? if($group['allowavatar'] =="0") { ?>����ͷ��<? } elseif($group['allowavatar'] =="1") { ?>����ʹ����̳ͷ��<? } else { ?>�����Զ���ͷ��<? } ?></td>
</tr>

<tr>
<th>����ʹ���ļ�:</th>
<td><? if($group['allowuseblog'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����ʹ���ǳ�:</th>
<td><? if($group['allownickname'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>�����Զ���ͷ��:</th>
<td><? if($group['allowcstatus'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����Ϣ�ռ�������:</th>
<td><?=$group['maxpmnum']?></td>
</tr>
<thead>
<tr><td colspan="2">�������</td></tr>
</thead>
<tr>
<th>�����»���:</th>
<td><? if($group['allowpost'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>������ظ�:</th>
<td><? if($group['allowreply'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>������ͶƱ:</th>
<td><? if($group['allowpostpoll'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>�������ͶƱ:</th>
<td><? if($group['allowvote'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����������:</th>
<td><? if($group['allowpostreward'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>������:</th>
<td><? if($group['allowpostactivity'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>���������:</th>
<td><? if($group['allowpostdebate'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>��������:</th>
<td><? if($group['allowposttrade'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>��������Ƶ:</th>
<td><? if($group['allowpostvideo'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>���ǩ������:</th>
<td><?=$group['maxsigsize']?> �ֽ�</td>
</tr>

<tr>
<th>����ǩ����ʹ�� Discuz! ����:</th>
<td><? if($group['allowsigbbcode'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����ǩ����ʹ�� [img] ����:</th>
<td><? if($group['allowsigimgcode'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>���ҽ�����󳤶�:</th>
<td><?=$group['maxbiosize']?> �ֽ�</td>
</tr>

<tr>
<th>�������ҽ�����ʹ�� Discuz! ����:</th>
<td><? if($group['allowbiobbcode'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>�������ҽ�����ʹ�� [img] ����:</th>
<td><? if($group['allowbioimgcode'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>
<thead>
<tr><td colspan="2">�������</td></tr>
</thead>
<tr>
<th>��������/�鿴����:</th>
<td><? if($group['allowgetattach'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>����������:</th>
<td><? if($group['allowpostattach'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>�������ø���Ȩ��:</th>
<td><? if($group['allowsetattachperm'] == 1) { ?><img src="<?=IMGDIR?>/check_right.gif" /><? } else { ?><img src="<?=IMGDIR?>/check_error.gif" /><? } ?></td>
</tr>

<tr>
<th>��󸽼��ߴ�:</th>
<td><? if($group['maxattachsize']) { ?><?=$group['maxattachsize']?> KB<? } else { ?>û������<? } ?></td>
</tr>

<tr>
<th>ÿ����󸽼��ܳߴ�:</th>
<td><? if($group['maxsizeperday']) { ?><?=$group['maxsizeperday']?> KB<? } else { ?>û������<? } ?></td>
</tr>

<tr>
<th>����������:</th>
<td>
<? if($group['allowpostattach'] == 1) { ?>
	<? if($group['attachextensions']) { ?>
		<?=$group['attachextensions']?>
	<? } else { ?>
		û������
	<? } } else { ?>
	<img src="<?=IMGDIR?>/check_error.gif" />
<? } ?>
</td></tr>
</tr>

</table>
</div>
</div>
<div class="side">
<? include template('personal_navbar'); ?>
</div>
</div>
<? include template('footer'); ?>
