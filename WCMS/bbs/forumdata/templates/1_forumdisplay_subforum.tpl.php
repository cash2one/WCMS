<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<span class="headactions"><img id="subforum_<?=$forum['fid']?>_img" src="<?=IMGDIR?>/<?=$collapseimg['subforum']?>" title="����/չ��" alt="����/չ��" onclick="toggle_collapse('subforum_<?=$forum['fid']?>');" /></span>
<h3>�Ӱ��</h3>
<table id="subforum_<?=$forum['fid']?>" summary="subform" cellspacing="0" cellpadding="0" style="<?=$collapse['subforum']?>">
<? if(!$forum['forumcolumns']) { ?>
	<thead class="category">
		<tr>
			<th>���</th>
			<td class="nums">����</td>
			<td class="nums">����</td>
			<td class="lastpost">��󷢱�</td>
		</tr>
	</thead><? if(is_array($sublist)) { foreach($sublist as $sub) { ?>		<? if($sub['permission']) { ?>
			<tbody>
				<tr>
					<th<?=$sub['folder']?>>
						<?=$sub['icon']?>
						<h2><a href="forumdisplay.php?fid=<?=$sub['fid']?>"><?=$sub['name']?></a><? if($sub['todayposts']) { ?> <em>(����: <?=$sub['todayposts']?>)</em><? } ?></h2>
						<? if($sub['description']) { ?><p><?=$sub['description']?></p><? } ?>
						<? if($sub['moderators']) { if($moddisplay == 'flat') { ?><p class="moderators">����: <?=$sub['moderators']?></p><? } else { ?><span class="dropmenu" id="mod<?=$sub['fid']?>" onmouseover="showMenu(this.id)">����</span><ul class="moderators popupmenu_popup" id="mod<?=$sub['fid']?>_menu" style="display: none"><?=$sub['moderators']?></ul><? } } ?>
					</th>
					<td class="nums"><?=$sub['threads']?></td>
					<td class="nums"><?=$sub['posts']?></td>
					<td class="lastpost">
					<? if($sub['permission'] == 1) { ?>
						˽�ܰ��
					<? } else { ?>
						<? if(is_array($sub['lastpost'])) { ?>
							<a href="redirect.php?tid=<?=$sub['lastpost']['tid']?>&amp;goto=lastpost#lastpost"><?=$sub['lastpost']['subject']?></a>
							<cite>by <? if($sub['lastpost']['author']) { ?><?=$sub['lastpost']['author']?><? } else { ?>����<? } ?> - <?=$sub['lastpost']['dateline']?></cite>
						<? } else { ?>
							��δ
						<? } ?>
					<? } ?>
					</td>
				</tr>
			</tbody>
		<? } ?>
	<? } } } else { ?>
	<tr><? if(is_array($sublist)) { foreach($sublist as $sub) { ?>		<? if($sub['orderid'] && ($sub['orderid'] % $forum['forumcolumns'] == 0)) { ?>
			</tr></tbody>
			<? if($sub['orderid'] < $forum['subscount']) { ?>
				<tbody><tr>
			<? } ?>
		<? } ?>
		<th width="<?=$forum['forumcolwidth']?>"<?=$sub['folder']?>>
			<h2><a href="forumdisplay.php?fid=<?=$sub['fid']?>"><?=$sub['name']?></a><? if($sub['todayposts']) { ?><em> (����: <?=$sub['todayposts']?>)</em><? } ?></h2>
			<p>
				��󷢱�:
				<? if(is_array($sub['lastpost'])) { ?>
					<a href="redirect.php?tid=<?=$sub['lastpost']['tid']?>&amp;goto=lastpost#lastpost"><?=$sub['lastpost']['dateline']?></a>
					by <? if($sub['lastpost']['author']) { ?><?=$sub['lastpost']['author']?><? } else { ?>����<? } ?>
				<? } else { ?>
					��δ
				<? } ?>
			</p>
			<p>����:<?=$sub['threads']?>, ����: <?=$sub['posts']?></p>
		</th>
	<? } } ?><?=$forum['endrows']?>
<? } ?>
</table>