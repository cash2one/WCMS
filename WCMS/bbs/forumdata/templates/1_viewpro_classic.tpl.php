<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<script src="include/javascript/viewthread.js" type="text/javascript"></script>

<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ����</div>
<div class="mainbox viewthread specialthread">
	<h6>��������</h6>
	<table summary="Profile" cellspacing="0" cellpadding="0">
		<tr>
			<td class="postcontent">
				<h1><?=$member['username']?> �ĸ�������</h1>
				<table summary="Profile" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td colspan="2" align="center">
								<? if($supe['status'] && $xspacestatus) { ?>[ <a href="<?=$supe['siteurl']?>/?uid/<?=$member['uid']?>" target="_blank">���˿ռ�</a> ]&nbsp;<? } ?>
								[ <a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank">��������</a> ]&nbsp;
								<? if($discuz_uid && $magicstatus) { ?>
									[ <a href="magic.php?action=user&amp;username=<?=$member['usernameenc']?>" target="_blank">ʹ�õ���</a> ]&nbsp;
								<? } ?>
								[ <a href="search.php?srchuid=<?=$member['uid']?>&amp;srchfid=all&amp;srchfrom=0&amp;searchsubmit=yes">��������</a> ]&nbsp;
								<? if($allowedituser || $allowbanuser) { ?>
									<? if($adminid == 1) { ?>
										[ <a href="admincp.php?action=members&amp;username=<?=$member['usernameenc']?>&amp;searchsubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a> ]&nbsp;
									<? } else { ?>
										[ <a href="admincp.php?action=editmember&amp;uid=<?=$member['uid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a> ]&nbsp;
									<? } ?>
									[ <a href="admincp.php?action=banmember&amp;uid=<?=$member['uid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">��ֹ�û�</a> ]&nbsp;
								<? } ?>
								<? if($member['adminid'] > 0 && $modworkstatus) { ?>
									[ <a href="stats.php?type=modworks&amp;uid=<?=$member['uid']?>">����ͳ��</a> ]&nbsp;
								<? } ?>
							</td>
						</tr>
					</thead>
					<tr><th>UID:</th><td><?=$member['uid']?></td></tr>
					<tr><th>ע������:</th><td><?=$member['regdate']?></td></tr>
					<? if($allowviewip) { ?>
						<tr><th>ע�� IP:</th><td><?=$member['regip']?> - <?=$member['regiplocation']?></td></tr>
						<tr><th>�ϴη��� IP:</th><td><?=$member['lastip']?> - <?=$member['lastiplocation']?></td></tr>
					<? } ?>
					<tr><th>�ϴη���:</th><td><? if($member['invisible'] && $adminid != 1) { ?>����ģʽ<? } else { ?><?=$member['lastvisit']?><? } ?></td></tr>
					<tr><th>��󷢱�:</th><td><?=$member['lastpost']?></td></tr>
					<? if($pvfrequence) { ?>
						<tr><th>ҳ�������:</th><td><?=$member['pageviews']?></td></tr>
					<? } ?>
					<? if($oltimespan) { ?>
						<tr><th valign="top">����ʱ��:</th><td>�ܼ����� <em><?=$member['totalol']?></em> Сʱ, �������� <em><?=$member['thismonthol']?></em> Сʱ <? showstars(ceil(($member['totalol'] + 1) / 50)); ?><br />����ʣ��ʱ�� <span class="bold"><?=$member['olupgrade']?></span> Сʱ</td></tr>
					<? } ?>
					<? if($modforums) { ?>
						<tr><th>����:</th><td><?=$modforums?></td></tr>
					<? } ?>
					<thead><tr><td colspan="2" style="line-height: 3px; font-size: 3px;">&nbsp;</td></tr></thead>
					<? if($member['medals']) { ?>
						<tr><th>ѫ��:</th><td><? if(is_array($member['medals'])) { foreach($member['medals'] as $medal) { ?>							<img src="images/common/<?=$medal['image']?>" border="0" alt="<?=$medal['name']?>" /> &nbsp;
						<? } } ?></td></tr>
					<? } ?>
					<tr><th>�ǳ�:</th><td><? if($member['allownickname'] && $member['nickname']) { ?><?=$member['nickname']?><? } else { ?>��<? } ?></td></tr>
					<tr><th valign="top">�û���:</th><td><?=$member['grouptitle']?> <? showstars($member['groupstars']); if($member['maingroupexpiry']) { ?><br /><em>��Ч���� <?=$member['maingroupexpiry']?></em><? } ?></td></tr>
					<? if($extgrouplist) { ?>
						<th>��չ�û���:</th><td><? if(is_array($extgrouplist)) { foreach($extgrouplist as $extgroup) { ?>							<?=$extgroup['title']?><? if($extgroup['expiry']) { ?>&nbsp;(��Ч���� <?=$extgroup['expiry']?>)<? } ?><br />
						<? } } ?></td></tr>
					<? } ?>
					<th>����������:</th><td><?=$member['ranktitle']?> <? showstars($member['rankstars']); ?></td></tr>
					<th>�Ķ�Ȩ��:</th><td><?=$member['readaccess']?></td></tr>
					<th>����:</th><td><?=$member['credits']?></td></tr><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><tr><th><?=$credit['title']?>:</th><td><?=$member[extcredits.$id]?> <?=$credit['unit']?></td></tr><? } } ?><tr><th>����:</th><td><?=$member['posts']?> (ռȫ�����ӵ� <?=$percent?>%)</td></tr>
					<tr><th>ƽ��ÿ�շ���:</th><td><?=$postperday?> ����</td></tr>
					<tr><th>����:</th><td><?=$member['digestposts']?> ����</td></tr>
					<thead><tr><td colspan="2" style="line-height: 3px; font-size: 3px;">&nbsp;</td></tr></thead>
					<tr><th>�Ա�:</th><td><? if($member['gender'] == 1) { ?>��<? } elseif($member['gender'] == 2) { ?>Ů<? } else { ?>����<? } ?></td></tr>
					<tr><th>����:</th><td><?=$member['location']?>&nbsp;</td></tr>
					<tr><th>����:</th><td><?=$member['bday']?></td></tr><? if(is_array($_DCACHE['fields'])) { foreach($_DCACHE['fields'] as $field) { ?>						<tr><th><?=$field['title']?>:</th><td>
						<? if($field['selective']) { ?>
							<?=$field['choices'][$member['field_'.$field['fieldid']]]?>
						<? } else { ?>
							<?=$member['field_'.$field['fieldid']]?>
						<? } ?>
						&nbsp;</td></tr>
					<? } } ?></table>
		</td>
		<td class="postauthor">
			<div class="avatar">
				<? if($member['avatar']) { ?>
					<img src="<?=$member['avatar']?>" width="<?=$member['avatarwidth']?>" height="<?=$member['avatarheight']?>" alt="<?=$member['username']?>" />
				<? } else { ?>
					<img src="images/avatars/noavatar.gif" alt="<?=$member['username']?>" />
				<? } ?>
			</div>
			<ul>
				<li class="pm"><a href="pm.php?action=send&amp;uid=<?=$member['uid']?>" target="_blank">������Ϣ</a></li>
				<li class="buddy"><a href="my.php?item=buddylist&amp;newbuddyid=<?=$member['uid']?>&amp;buddysubmit=yes" id="ajax_buddy" onclick="ajaxmenu(event, this.id)">��Ϊ����</a></li>
			</ul>
			<? if($member['bio']) { ?><div class="bio"><?=$member['bio']?></div><? } ?>
			<dl class="profile">
				<? if($member['site']) { ?><dt>������վ:</dt><dd><a href="<?=$member['site']?>" target="_blank"><?=$member['site']?></a></dd><? } ?>
				<? if($member['showemail']) { ?><dt>Email:</dt><dd><?=$member['email']?></dd><? } ?>
				<? if($member['qq']) { ?><dt>QQ:</dt><dd><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?=$member['qq']?>&amp;Site=<?=$bbname?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?=$member['qq']?>:4"  border="0" alt="QQ" /><?=$member['qq']?></a></dd><? } ?>
				<? if($member['icq']) { ?><dt>ICQ:</dt><dd><?=$member['icq']?></dd><? } ?>
				<? if($member['yahoo']) { ?><dt>Yahoo:</dt><dd><?=$member['yahoo']?></dd><? } ?>
				<? if($member['msn']) { ?><dt>MSN:</dt><dd><?=$member['msn']?></dd><? } ?>
				<? if($member['taobao']) { ?><dt>��������:</dt><dd><script type="text/javascript">document.write('<a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&amp;uid='+encodeURIComponent('<?=$member['taobaoas']?>')+'&amp;s=2"><img src="http://amos1.taobao.com/online.ww?v=2&amp;uid='+encodeURIComponent('<?=$member['taobaoas']?>')+'&amp;s=1" alt="��������" border="0" /></a>&nbsp;');</script></dd><? } ?>
				<? if($member['alipay']) { ?><dt>֧�����˺�:</dt><dd><a href="https://www.alipay.com/payto:<?=$member['alipay']?>?partner=20880020258585430156" target="_blank"><?=$member['alipay']?></a></dd><? } ?>
				<dt>�����������:</dt><dd><?=$member['sellercredit']?> <a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank"><img src="images/rank/seller/<?=$member['sellerrank']?>.gif" border="0" class="absmiddle"></a></dd>
				<dt>������������:</dt><dd><?=$member['buyercredit']?> <a href="eccredit.php?uid=<?=$member['uid']?>" target="_blank"><img src="images/rank/buyer/<?=$member['buyerrank']?>.gif" border="0" class="absmiddle"></a></dd>
			</dl>
		</td>
		</tr>
	</table>
</div>
<? include template('footer'); ?>
