<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ����</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
<div class="mainbox threadlist">
	<h1>����</h1>
	<table summary="����" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td class="icon">&nbsp;</td>
				<th>����</th>
				<td class="forum">���</td>
				<td class="author">����</td>
				<td class="nums">�ظ�/�鿴</td>
				<td class="lastpost">��󷢱�</td>
			</tr>
		</thead>
<? if($threadlist) { if(is_array($threadlist)) { foreach($threadlist as $thread) { ?>		<tbody>
		<tr>
			<td class="icon">
				<? if($thread['special'] == 1) { ?>
					<img src="<?=IMGDIR?>/pollsmall.gif" alt="ͶƱ" />
				<? } elseif($thread['special'] == 2) { ?>
					<img src="<?=IMGDIR?>/tradesmall.gif" alt="��Ʒ" />
				<? } elseif($thread['special'] == 3) { ?>
					<? if($thread['price'] > 0) { ?>
						<img src="<?=IMGDIR?>/rewardsmall.gif" alt="����" />
					<? } elseif($thread['price'] < 0) { ?>
						<img src="<?=IMGDIR?>/rewardsmallend.gif" alt="�����ѽ��" />
					<? } ?>
				<? } elseif($thread['special'] == 4) { ?>
					<img src="<?=IMGDIR?>/activitysmall.gif" alt="�" />
				<? } elseif($thread['special'] == 5) { ?>
					<img src="<?=IMGDIR?>/debatesmall.gif" alt="����" />
				<? } elseif($thread['special'] == 6) { ?>
					<img src="<?=IMGDIR?>/videosmall.gif" alt="��Ƶ" />
				<? } else { ?>
					<?=$thread['icon']?>
				<? } ?>
			</td>
			<th>
				<label>
				<? if($thread['displayorder']) { ?>
					<img src="<?=IMGDIR?>/pin_<?=$thread['displayorder']?>.gif" alt="�ö�<? if($thread['displayorder'] == 3) { ?><?=$threadsticky['0']?><? } elseif($thread['displayorder'] == 2) { ?><?=$threadsticky['1']?><? } elseif($thread['displayorder'] == 1) { ?><?=$threadsticky['2']?><? } ?>" />
				<? } ?>
				<? if($thread['digest']) { ?>
					<img src="<?=IMGDIR?>/digest_<?=$thread['digest']?>.gif" alt="���� <?=$thread['digest']?>" />
				<? } ?>
				</label>
				<a href="viewthread.php?tid=<?=$thread['tid']?>&amp;highlight=<?=$index['keywords']?>" target="_blank" <?=$thread['highlight']?>><?=$thread['subject']?></a>
				<? if($thread['attachment']) { ?>
					<img src="images/attachicons/common.gif" alt="����" />
				<? } ?>
				<? if($thread['multipage']) { ?><span class="threadpages"><?=$thread['multipage']?></span><? } ?>
			</th>
			<td class="forum"><a href="forumdisplay.php?fid=<?=$thread['fid']?>"><?=$thread['forumname']?></a></td>
			<td class="author">
				<cite>
				<? if($thread['authorid'] && $thread['author']) { ?>
					<a href="space.php?uid=<?=$thread['authorid']?>"><?=$thread['author']?></a>
				<? } else { ?>
					<? if($forum['ismoderator']) { ?><a href="space.php?uid=<?=$thread['authorid']?>">����</a><? } else { ?>����<? } ?>
				<? } ?>
				</cite>
				<em><?=$thread['dateline']?></em>
			</td>
			<td class="nums"><strong><?=$thread['replies']?></strong> / <em><?=$thread['views']?></em></td>
			<td class="lastpost">
				<em><a href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=lastpost<?=$highlight?>#lastpost"><?=$thread['lastpost']?></a></em>
				<cite>by <? if($thread['lastposter']) { ?><a href="space.php?username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a><? } else { ?>����<? } ?></cite>
			</td>
		</tr>
		</tbody>
	<? } } } else { ?>
	<tbody><tr><th colspan="6">�Բ���û���ҵ�ƥ������</th></tr></tbody>
<? } ?>
</table>
</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } include template('footer'); ?>
