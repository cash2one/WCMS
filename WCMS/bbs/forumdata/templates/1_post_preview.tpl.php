<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(empty($showpreview)) { ?>
<div class="mainbox viewthread" id="previewtable" style="display: <?=$previewdisplay?>">
	<h1>Ԥ������</h1>
	<table summary="Ԥ������" cellspacing="0" cellpadding="0">
		<tr>
			<td class="postauthor">
				<? if($action == 'edit') { ?>
					<? if($postinfo['authorid']) { ?><a href="space.php?uid=<?=$postinfo['authorid']?>"><?=$postinfo['author']?></a><? } else { ?>�ο�<? } ?>
				<? } else { ?>
					<? if($discuz_uid) { ?><?=$discuz_userss?><? } else { ?>�ο�<? } ?>
				<? } ?>
			</td>
			<td class="postcontent">
				<div class="postmessage" id="previewmessage">
					<h2><?=$subject?></h2>
					<?=$message_preview?>
				</div>
			</td>
		</tr>
	</table>
	</div>
<br />
<? } ?>