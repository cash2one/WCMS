<? if(!defined('IN_DISCUZ')) exit('Access Denied'); function userinfo($member) {
global $spacelanguage, $spacesettings, $uid;
 ?><table class="module" cellpadding="0" cellspacing="0" border="0"><tr><td class="header"><div class="title"><?=$spacelanguage['userinfo']?></div></td></tr>
	<tr><td>
	<div id="module_userinfo">
		<div class="status">״̬: <span><? if($member['online']) { ?>��ǰ����<? } else { ?>��ǰ����<? } ?></span></div>
		<div class="info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed; overflow: hidden">
		<tr><td align="center">
		<? if($member['avatar']) { ?>
			<img src="<?=$member['avatar']?>" width="<?=$member['avatarwidth']?>" height="<?=$member['avatarheight']?>" border="0" alt="" />
		<? } else { ?>
			<img src="images/avatars/noavatar.gif" alt="" />
		<? } ?>
		</td></tr></table></div>
		<div class="username"><?=$member['username']?><? if($member['nickname']) { ?><br /><?=$member['nickname']?><? } ?></div>
		<div class="operation">
		<img src="mspace/<?=$spacesettings['style']?>/sendmail.gif" alt="" /><a target="_blank" href="pm.php?action=send&amp;uid=<?=$member['uid']?>">������Ϣ</a>
		<img src="mspace/<?=$spacesettings['style']?>/buddy.gif" alt="" /><a target="_blank" href="my.php?item=buddylist&amp;newbuddyid=<?=$member['uid']?>&amp;buddysubmit=yes" id="ajax_buddy" onclick="ajaxmenu(event, this.id)">��Ϊ����</a>
		</div>
		<? if($member['bio']) { ?>
		<div class="more">
		<br /><?=$member['bio']?>
		</div>
		<? } ?>
	</div>
	</td></tr></table><? }
 if($spacesettings['side'] != 2) { ?>
	<td id="main_layout0"><? userinfo($member) ?></td>
<? } ?>

<td id="main_layout1">
<div id="module_userdetails">

<table class="module" cellpadding="0" cellspacing="0" border="0"><tr><td class="header">
<div class="title">��ϸ��Ϣ</div>
<div class="more">
<? if($member['uid'] == $discuz_uid) { ?>
	<a href="memcp.php?action=profile" target="_blank">�༭��������</a>
<? } ?>
<a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank">��������</a>
<? if($allowmagics && $magicstatus) { ?>
	<a href="magic.php?action=user&amp;username=<?=$member['usernameenc']?>" target="_blank">ʹ�õ���</a>
<? } ?>
<a href="search.php?srchuid=<?=$member['uid']?>&amp;srchfid=all&amp;srchfrom=0&amp;searchsubmit=yes">��������</a>
<? if($allowedituser || $allowbanuser) { ?>
	<? if($adminid == 1) { ?>
		<a href="admincp.php?action=members&amp;username=<?=$member['usernameenc']?>&amp;searchsubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a>
	<? } else { ?>
		<a href="admincp.php?action=editmember&amp;uid=<?=$member['uid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a>
	<? } ?>
	<a href="admincp.php?action=banmember&amp;uid=<?=$member['uid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">��ֹ�û�</a>
<? } if($member['adminid'] > 0 && $modworkstatus) { ?>
	<a href="stats.php?type=modworks&amp;uid=<?=$member['uid']?>">����ͳ��</a>
<? } ?>
</div>
</td></tr>
</table>

<table class="info" border="0" cellspacing="0" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><th>UID:</th><td><?=$member['uid']?></td></tr>
<tr><th>ע������:</th><td><?=$member['regdate']?></td></tr>
<? if($allowviewip) { ?>
	<tr><th>ע�� IP:</th><td><?=$member['regip']?> <?=$member['regiplocation']?></td></tr>
	<tr><th>�ϴη��� IP:</th><td><?=$member['lastip']?> <?=$member['lastiplocation']?></td></tr>
<? } ?>
<tr><th>�ϴη���:</th><td><? if($member['invisible'] && $adminid != 1) { ?>����ģʽ<? } else { ?><?=$member['lastvisit']?><? } ?></td></tr>
<tr><th>��󷢱�:</th><td><?=$member['lastpost']?></td></tr>
<? if($pvfrequence) { ?>
	<tr><th>ҳ�������:</th><td><?=$member['pageviews']?></td></tr>
<? } if($oltimespan) { ?>
	<tr><th valign="top">����ʱ��:</th><td>�ܼ����� <span class="bold"><?=$member['totalol']?></span> Сʱ, �������� <span class="bold"><?=$member['thismonthol']?></span> Сʱ <? showstars(ceil(($member['totalol'] + 1) / 50)); ?><br />����ʣ��ʱ�� <span class="bold"><?=$member['olupgrade']?></span> Сʱ</td></tr>
<? } if($modforums) { ?>
	<tr><th>����:</th><td><?=$modforums?></td></tr>
<? } ?>
<tr><td colspan="2"><hr class="line" size="0"></td></tr>
<? if($member['medals']) { ?>
	<tr><th>ѫ��:</th><td><? if(is_array($member['medals'])) { foreach($member['medals'] as $medal) { ?>		<img src="images/common/<?=$medal['image']?>" border="0" alt="<?=$medal['name']?>" /> &nbsp;
	<? } } ?></td></tr>
<? } ?>
<tr><th valign="top">�û���:</th><td><?=$member['grouptitle']?> <? showstars($member['groupstars']); if($member['maingroupexpiry']) { ?><br /><span class="smalltxt">��Ч���� <?=$member['maingroupexpiry']?></span><? } ?></td></tr>
<? if($extgrouplist) { ?>
	<tr><th valign="top">��չ�û���:</th><td><? if(is_array($extgrouplist)) { foreach($extgrouplist as $extgroup) { ?>		<?=$extgroup['title']?><? if($extgroup['expiry']) { ?>&nbsp;(��Ч���� <?=$extgroup['expiry']?>)<? } ?><br />
	<? } } ?></td></tr>
<? } ?>
<tr><th>����������:</th><td><?=$member['ranktitle']?> <? showstars($member['rankstars']); ?></td></tr>
<tr><th>�Ķ�Ȩ��:</th><td><?=$member['readaccess']?></td></tr>
<tr><th>����:</th><td><?=$member['credits']?></td></tr><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><tr><th><?=$credit['title']?>:</th><td><?=$member[extcredits.$id]?> <?=$credit['unit']?></td></tr><? } } ?><tr><th>����:</th><td><?=$member['posts']?> (ռȫ�����ӵ� <?=$percent?>%)</td></tr>
<tr><th>ƽ��ÿ�շ���:</th><td><?=$postperday?> ����</td></tr>
<tr><th>����:</th><td><?=$member['digestposts']?> ����</td></tr>
<tr><td colspan="2"><hr class="line" size="0"></td></tr>
<tr><th>�Ա�:</th><td><? if($member['gender'] == 1) { ?>��<? } elseif($member['gender'] == 2) { ?>Ů<? } else { ?>����<? } ?></td></tr>
<? if($member['location']) { ?><tr><th>����:</th><td><?=$member['location']?>&nbsp;</td></tr><? } ?>
<tr><th>����:</th><td><?=$member['bday']?></td></tr>
<? if($member['site']) { ?><tr><th>������վ: </th><td><a href="<?=$member['site']?>" target="_blank"><?=$member['site']?></a></td></tr><? } if($member['showemail']) { ?><tr><th>Email: </th><td><?=$member['email']?></td></tr><? } if($member['qq']) { ?><tr><th>QQ: </th><td><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?=$member['qq']?>&amp;Site=<?=$bbname?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?=$member['qq']?>:4"  border="0" alt="QQ" /><?=$member['qq']?></a></td></tr><? } if($member['icq']) { ?><tr><th>ICQ: </th><td><?=$member['icq']?></td></tr><? } if($member['yahoo']) { ?><tr><th>Yahoo: </th><td><?=$member['yahoo']?></td></tr><? } if($member['msn']) { ?><tr><th>MSN: </th><td><?=$member['msn']?></td></tr><? } if($member['taobao']) { ?><tr><th>��������: </th><td><script type="text/javascript">document.write('<a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&amp;uid='+encodeURIComponent('<?=$member['taobaoas']?>')+'&amp;s=2"><img src="http://amos1.taobao.com/online.ww?v=2&amp;uid='+encodeURIComponent('<?=$member['taobaoas']?>')+'&amp;s=1" alt="��������" border="0" /></a>');</script></td></tr><? } if($member['alipay']) { ?><tr><th>֧�����˺�: </th><td><a href="https://www.alipay.com/payto:<?=$member['alipay']?>?partner=20880020258585430156" target="_blank"><?=$member['alipay']?></a></td></tr><? } ?>
<tr><th>�����������:</th><td><?=$member['sellercredit']?> <a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank"><img src="images/rank/seller/<?=$member['sellerrank']?>.gif" border="0" class="absmiddle"></a></td></tr>
<tr><th>������������:</th><td><?=$member['buyercredit']?> <a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank"><img src="images/rank/buyer/<?=$member['buyerrank']?>.gif" border="0" class="absmiddle"></a></td></tr><? if(is_array($_DCACHE['fields'])) { foreach($_DCACHE['fields'] as $field) { ?>	<tr><th><?=$field['title']?>:</th><td>
	<? if($field['selective']) { ?>
		<?=$field['choices'][$member['field_'.$field['fieldid']]]?>
	<? } else { ?>
		<?=$member['field_'.$field['fieldid']]?>
	<? } ?>
	&nbsp;</td></tr><? } } ?></table>
</div>
</td>

<? if($spacesettings['side'] != 0 && $spacesettings['side'] != 1) { ?>
	<td id="main_layout2"><? userinfo($member) ?></td>
<? } ?>