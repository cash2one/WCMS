<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="foruminfo">
	<div id="headsearch">
		<? if(!empty($google) && ($google & 2)) { ?>
			<script src="forumdata/cache/google_var.js" type="text/javascript"></script>
			<script src="include/javascript/google.js" type="text/javascript"></script>
		<? } ?>
	<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 2)) { ?>
		<form method="post" action="search.php?srchtype=qihoo" onSubmit="this.target='_blank';">
		<input type="hidden" name="searchsubmit" value="yes" />
		<input type="text" name="srchtxt" size="27" value="<?=$qihoo_searchboxtxt?>" />
		&nbsp;<button type="submit">����</button>
		</form>
	<? } ?>
	<p>
		<? if($forum['rules']) { ?><span id="rules_link" style="<?=$collapse['rules_link']?>"><a href="###" onclick="$('rules_link').style.display = 'none';toggle_collapse('rules', 1);<? if($forum['recommendlist']) { ?>$('recommendlist').className = 'rules';<? } ?>">�������</a> |</span><? } ?>
		<? if($forum['recommendlist']) { ?><span id="recommendlist_link" style="<?=$collapse['recommendlist_link']?>"><a href="###" onclick="$('recommendlist_link').style.display = 'none';toggle_collapse('recommendlist', 1)">�����Ƽ�</a> |</span><? } ?>
		<? if($supe['status'] && $discuz_uid) { ?>
			<? if(!$xspacestatus) { ?>
				<a href="<?=$supe['siteurl']?>/index.php?action/register" target="_blank">��ͨ���˿ռ�</a> |
			<? } else { ?>
				<a href="<?=$supe['siteurl']?>/index.php?action/space/uid/<?=$discuz_uid?>" target="_blank">���˿ռ�</a> |
			<? } ?>
		<? } ?>
		<a href="my.php?item=favorites&amp;fid=<?=$fid?>" id="ajax_favorite" onclick="ajaxmenu(event, this.id)">�ղر���</a> |
		<a href="my.php?item=threads&amp;srchfid=<?=$fid?>">�ҵĻ���</a>
	<? if($allowmodpost && $forum['modnewposts']) { ?>
		| <a href="admincp.php?action=modthreads&amp;frames=yes" target="_blank">���������</a>
		<? if($forum['modnewposts'] == 2) { ?>| <a href="admincp.php?action=modreplies&amp;frames=yes" target="_blank">����»ظ�</a><? } ?>
	<? } ?>
	<? if($adminid == 1 && $forum['recyclebin']) { ?>
		| <a href="admincp.php?action=recyclebin&amp;frames=yes" target="_blank">����վ</a>
	<? } ?>
	<? if($rssstatus) { ?><a href="rss.php?fid=<?=$fid?>&amp;auth=<?=$rssauth?>" target="_blank"><img src="images/common/xml.gif" border="0" class="absmiddle" alt="RSS ����ȫ�����" /></a><? } ?>
	</p>
	</div>
	<div id="nav">
		<p><a id="forumlist" href="<?=$indexname?>"<? if($forumjump && $jsmenu['1']) { ?> class="dropmenu" onmouseover="showMenu(this.id)"<? } ?>><?=$bbname?></a> <?=$navigation?></p>
		<p>����: <? if($moderatedby) { ?><?=$moderatedby?><? } else { ?>*��ȱ��*<? } ?></p>
	</div>
</div>

<? if($forum['rules'] || $forum['recommendlist']) { ?>
<table summary="Rules and Recommend" class="portalbox" cellpadding="0" cellspacing="1">
	<tr>
		<? if($forum['rules']) { ?>
		<td id="rules" style="<?=$collapse['rules']?>">
			<span class="headactions recommendrules"><img id="rules_img" src="<?=IMGDIR?>/collapsed_no.gif" title="����/չ��" alt="����/չ��" onclick="$('rules_link').style.display = '';toggle_collapse('rules', 1);<? if($forum['recommendlist']) { ?>$('recommendlist').className = '';<? } ?>" /></span>
			<h3>�������</h3>
			<?=$forum['rules']?>
		</td>
		<? } ?>
		<? if($forum['recommendlist']) { ?>
		<td id="recommendlist" <? if($forum['rules']) { if(!$collapse['rules']) { ?>class="rules" <? } ?>style="width: 50%;"<? } ?> style="<?=$collapse['recommendlist']?>">
			<span class="headactions recommendrules"><img id="recommendlist_img" src="<?=IMGDIR?>/collapsed_no.gif" title="����/չ��" alt="����/չ��" onclick="$('recommendlist_link').style.display = '';toggle_collapse('recommendlist', 1);" /></span>
			<h3>�����Ƽ� <? if($forum['ismoderator'] && $forum['modrecommend']['sort'] != 1) { ?><em>[<a href="admincp.php?action=forumrecommend&amp;fid=<?=$fid?>&amp;frames=yes" target="_blank">����</a>]</em><? } ?></h3>
			<ul><? if(is_array($forum['recommendlist'])) { foreach($forum['recommendlist'] as $tid => $thread) { ?><li><cite><a href="space.php?uid=<?=$thread['authorid']?>" target="_blank"><?=$thread['author']?></a>: </cite><a href="viewthread.php?tid=<?=$tid?>" <?=$thread['subjectstyles']?> target="_blank"><?=$thread['subject']?></a></li><? } } ?></ul>
		</td>
		<? } ?>
	</tr>
</table>
<? } if(!empty($newpmexists) || $announcepm) { ?>
	<div class="maintable" id="pmprompt">
<? include template('pmprompt'); ?>
</div>
<? } if($subexists) { ?>
<div class="mainbox forumlist">
<? include template('forumdisplay_subforum'); ?>
</div>
<? } if($admode && empty($insenz['hardadstatus']) && !empty($advlist['text'])) { ?><div class="ad_text" id="ad_text"><table summary="Text Ad" cellpadding="0" cellspacing="1"><?=$advlist['text']?></table></div><? } else { ?><div id="ad_text"></div><? } if($_DCACHE['supe_updatecircles']) { ?>
<div class="mainbox forumlist">
	<h3>������µ�Ȧ��</h3>
	<table id="updatecircles" summary="������µ�Ȧ��" cellspacing="0" cellpadding="0">
		<tr><? if(is_array($_DCACHE['supe_updatecircles'])) { foreach($_DCACHE['supe_updatecircles'] as $k => $v) { ?><th>
				<img class="circlelogo" src="<?=$v['logo']?>" alt="" />
				<h2><a href="<?=$supe['siteurl']?>/?action_mygroup_gid_<?=$v['gid']?>" target="_blank"><?=$v['groupname']?></a></h2>
				<p>
					Ȧ��: <a href="space.php?action=viewpro&amp;uid=<?=$v['uid']?>"><?=$v['username']?></a> ,
					��Ա: <?=$v['usernum']?>
				</p>
				<p>
					������: <?=$v['lastpost']?>
				</p>
			</th>
		<? if($k == 3) { ?></tr><tr><? } } } ?></tr>
	</table>
</div>
<? } ?>

<div class="pages_btns">
	<?=$multipage?>
	<? if($allowpost || !$discuz_uid) { ?>
		<span class="postbtn" id="newspecial" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu(this.id)"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>" title="���»���"><img src="<?=IMGDIR?>/newtopic.gif" alt="���»���" /></a></span>
	<? } ?>
</div>

<? if($allowposttrade || $allowpostpoll || $allowpostreward || $allowpostactivity || $allowpostdebate  || $allowpostvideo || $forum['threadtypes'] || !$discuz_uid) { ?>
	<ul class="popupmenu_popup newspecialmenu" id="newspecial_menu" style="display: none">
		<? if(!$forum['allowspecialonly']) { ?><li><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>">���»���</a></li><? } ?>
		<? if($allowpostpoll || !$discuz_uid) { ?><li class="poll"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=1">����ͶƱ</a></li><? } ?>
		<? if($allowposttrade || !$discuz_uid) { ?><li class="trade"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=2">������Ʒ</a></li><? } ?>
		<? if($allowpostreward || !$discuz_uid) { ?><li class="reward"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=3">��������</a></li><? } ?>
		<? if($allowpostactivity || !$discuz_uid) { ?><li class="activity"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=4">�����</a></li><? } ?>
		<? if($allowpostdebate || !$discuz_uid) { ?><li class="debate"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=5">��������</a></li><? } ?>
		<? if($allowpostvideo || !$discuz_uid) { ?><li class="video"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=6">������Ƶ</a></li><? } ?>
		<? if($forum['threadtypes'] && !$forum['allowspecialonly']) { if(is_array($forum['threadtypes']['types'])) { foreach($forum['threadtypes']['types'] as $id => $threadtypes) { if($forum['threadtypes']['special'][$id] && $forum['threadtypes']['show'][$id]) { ?>
					<li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;typeid=<?=$id?>"><?=$threadtypes?></a></li>
				<? } } } if(is_array($forum['typemodels'])) { foreach($forum['typemodels'] as $id => $model) { ?><li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;modelid=<?=$id?>"><?=$model['name']?></a></li><? } } } ?>
	</ul>
<? } ?>

<div id="headfilter">
	<ul class="tabs">
		<li <? if(empty($filter)) { ?> class="current"<? } ?> ><a href="forumdisplay.php?fid=<?=$fid?>">ȫ��</a></li>
		<li <? if($filter == 'digest') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=digest">����</a></li>
		<? if($showpoll) { ?><li <? if($filter == 'poll') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=poll">ͶƱ</a></li><? } ?>
		<? if($showtrade) { ?><li <? if($filter == 'trade') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=trade">��Ʒ</a></li><? } ?>
		<? if($showreward) { ?><li <? if($filter == 'reward') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=reward">����</a></li><? } ?>
		<? if($showactivity) { ?><li <? if($filter == 'activity') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=activity">�</a></li><? } ?>
		<? if($showdebate) { ?><li <? if($filter == 'debate') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=debate">����</a></li><? } ?>
		<? if($showvideo) { ?><li <? if($filter == 'video') { ?> class="current"<? } ?>><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=video">��Ƶ</a></li><? } ?>
	</ul>
</div>

<? if($forum['threadtypes']['special'][$typeid]) { ?>
	<div style="float: right; margin-top: -24px; margin-right: 10px;">
		<a href="search.php?srchtype=threadtype&amp;typeid=<?=$typeid?>&amp;srchfid=<?=$fid?>" target="_blank">��������<?=$forum['threadtypes']['types'][$typeid]?>������Ϣ</a>
	</div>
<? } ?>

<div class="mainbox threadlist">
	<? if($forum['threadtypes'] && $forum['threadtypes']['listable']) { ?>
	<div class="headactions"><? if(is_array($forum['threadtypes']['flat'])) { foreach($forum['threadtypes']['flat'] as $id => $name) { if($typeid != $id) { ?><a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=type&amp;typeid=<?=$id?>"><?=$name?></a><? } else { ?><strong><?=$name?></strong><? } ?> <? } } if($forum['threadtypes']['selectbox']) { ?>
			<span id="threadtypesmenu" class="dropmenu" onmouseover="showMenu(this.id)">�������</span>
			<div class="popupmenu_popup" id="threadtypesmenu_menu" style="display: none">
			<ul><? if(is_array($forum['threadtypes']['selectbox'])) { foreach($forum['threadtypes']['selectbox'] as $id => $name) { ?><li>
				<? if($typeid != $id) { ?>
					<a href="forumdisplay.php?fid=<?=$fid?>&amp;filter=type&amp;typeid=<?=$id?>&amp;sid=<?=$sid?>"><?=$name?></a>
				<? } else { ?>
					<strong><?=$name?></strong>
				<? } ?>
				</li><? } } ?></ul>
			</div>
		<? } ?>
	</div>
	<? } ?>
	<h1>
		<a href="forumdisplay.php?fid=<?=$fid?>" class="bold"><?=$forum['name']?></a>
	</h1>
	<form method="post" name="moderate" action="topicadmin.php?action=moderate&amp;fid=<?=$fid?>">
		<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<table summary="forum_<?=$fid?>" <? if(!$separatepos) { ?>id="forum_<?=$fid?>"<? } ?> cellspacing="0" cellpadding="0">
			<thead class="category">
				<tr>
					<td class="folder">&nbsp;</td>
					<td class="icon">&nbsp;</td>
					<th>����</th>
					<td class="author">����</td>
					<td class="nums">�ظ�/�鿴</td>
					<td class="lastpost">��󷢱�</td>
				</tr>
			</thead>

			<? if($page == 1 && !empty($announcement)) { ?>
			<tbody>
				<tr>
					<td class="folder"><img src="<?=IMGDIR?>/folder_common.gif" alt="announcement" /></td>
					<td class="icon">&nbsp;</td>
					<th>��̳����: <? if(empty($announcement['type'])) { ?><a href="announcement.php?id=<?=$announcement['id']?>#<?=$announcement['id']?>" target="_blank"><?=$announcement['subject']?></a><? } else { ?><a href="<?=$announcement['message']?>" target="_blank"><?=$announcement['subject']?></a><? } ?></th>
					<td class="author">
						<cite><a href="space.php?action=viewpro&amp;uid=<?=$announcement['authorid']?>"><?=$announcement['author']?></a></cite>
						<em><?=$announcement['starttime']?></em>
					</td>
					<td class="nums">-</td>
					<td class="lastpost">-</td>
				</tr>
			</tbody>
			<? } if($threadcount) { if(is_array($threadlist)) { foreach($threadlist as $key => $thread) { if($separatepos == $key + 1) { ?>
		</table>
		<table summary="forum_<?=$fid?>" id="forum_<?=$fid?>" cellspacing="0" cellpadding="0">
		<thead class="separation">
			<tr><td>&nbsp;</td><td>&nbsp;</td><td colspan="4">�������</td></tr>
		</thead>
		<? } ?>
		<tbody id="<?=$thread['id']?>" <? if(in_array($thread['displayorder'], array(4, 5))) { ?>style="display: none"<? } ?>>
			<tr>
				<td class="folder"><a href="viewthread.php?tid=<?=$thread['tid']?>&amp;extra=<?=$extra?>" title="�´��ڴ�" target="_blank"><img src="<?=IMGDIR?>/folder_<?=$thread['folder']?>.gif" /></a></td>
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
				<th class="<?=$thread['folder']?>" <? if($forum['ismoderator']) { ?> ondblclick="ajaxget('modcp.php?action=editsubject&tid=<?=$thread['tid']?>', 'thread_<?=$thread['tid']?>', 'specialposts');doane(event);"<? } ?>>
					<label>
					<? if($thread['rate'] > 0) { ?>
						<img src="<?=IMGDIR?>/agree.gif" alt="" />
					<? } elseif($thread['rate'] < 0) { ?>
						<img src="<?=IMGDIR?>/disagree.gif" alt="" />
					<? } ?>
					<? if(in_array($thread['displayorder'], array(1, 2, 3))) { ?>
						<img src="<?=IMGDIR?>/pin_<?=$thread['displayorder']?>.gif" alt="<?=$threadsticky[3-$thread['displayorder']]?>" />
					<? } ?>
					<? if($thread['digest'] > 0) { ?>
						<img src="<?=IMGDIR?>/digest_<?=$thread['digest']?>.gif" alt="���� <?=$thread['digest']?>" />
					<? } ?>
					&nbsp;</label>
					<? if($forum['ismoderator']) { ?>
						<? if($thread['fid'] == $fid && $thread['digest'] >= 0) { ?>
							<input class="checkbox" type="checkbox" name="moderate[]" value="<?=$thread['tid']?>" />
						<? } else { ?>
							<input class="checkbox" type="checkbox" disabled="disabled" />
						<? } ?>
					<? } ?>
					<? if($thread['moved']) { ?>
						<? if($forum['ismoderator']) { ?>
							<a href="topicadmin.php?action=delete&amp;tid=<?=$thread['moved']?>">�ƶ�:</a>
						<? } else { ?>
							�ƶ�:
						<? } ?>
					<? } ?>
					<?=$thread['typeid']?>
					<? if(isset($circle[$thread['sgid']])) { ?>
						<em>[<a href="<?=$supe['siteurl']?>/?action_mygroup_gid_<?=$thread['sgid']?>" target="_blank"><span class="lighttxt"><?=$circle[$thread['sgid']]?></span></a>]</em>
					<? } ?>
					<span id="thread_<?=$thread['tid']?>"><a href="viewthread.php?tid=<?=$thread['tid']?>&amp;extra=<?=$extra?>"<?=$thread['highlight']?>><?=$thread['subject']?></a></span>
					<? if($thread['readperm']) { ?> - [�Ķ�Ȩ�� <span class="bold"><?=$thread['readperm']?></span>]<? } ?>
					<? if($thread['price'] > 0) { ?>
						<? if($thread['special'] == '3') { ?>
						- [����
						<? } else { ?>
						- [�ۼ�
						<? } ?>
						<?=$extcredits[$creditstrans]['title']?> <span class="bold"><?=$thread['price']?></span> <?=$extcredits[$creditstrans]['unit']?>]
					<? } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
						- [�ѽ��]
					<? } ?>
					<? if($thread['attachment']) { ?>
						<img src="images/attachicons/common.gif" alt="����" class="attach" />
					<? } ?>
					<? if($thread['multipage']) { ?>
						<span class="threadpages"><?=$thread['multipage']?></span>
					<? } ?>
					<? if($thread['new']) { ?>
						<a href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=newpost<?=$highlight?>#newpost" class="new">New</a>
					<? } ?>
				</th>
				<td class="author">
					<cite>
					<? if($thread['authorid'] && $thread['author']) { ?>
						<a href="space.php?action=viewpro&amp;uid=<?=$thread['authorid']?>"><?=$thread['author']?></a>
					<? } else { ?>
						<? if($forum['ismoderator']) { ?>
							<a href="space.php?action=viewpro&amp;uid=<?=$thread['authorid']?>">����</a>
						<? } else { ?>
							����
						<? } ?>
					<? } ?>
					</cite>
					<em><?=$thread['dateline']?></em>
				</td>
				<td class="nums"><strong><?=$thread['replies']?></strong> / <em><?=$thread['views']?></em></td>
				<td class="lastpost">
					<em><a href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=lastpost<?=$highlight?>#lastpost"><?=$thread['lastpost']?></a></em>
					<cite>by <? if($thread['lastposter']) { ?><a href="space.php?action=viewpro&amp;username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a><? } else { ?>����<? } ?></cite>
				</td>
			</tr>
		</tbody><? } } } else { ?>
	<tbody><tr><th colspan="6">������ָ���ķ�Χ���������⡣</th></tr></tbody>
<? } ?>
</table>

<? if($forum['ismoderator'] && $threadcount) { ?>
<div class="footoperation">
	<input type="hidden" name="operation" />
	<label><input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form, 'moderate')" /> ȫѡ</label>
	<? if($allowdelpost) { ?><button onclick="modthreads('delete')">ɾ������</button><? } ?>
	<button onclick="modthreads('move')">�ƶ�����</button>
	<button onclick="modthreads('highlight')">������ʾ</button>
	<? if(empty($form['threadtypes'])) { ?><button onclick="modthreads('type')">�������</button> <? } ?>
	<button onclick="modthreads('close')">�ر�/������</button>
	<button onclick="modthreads('bump')">����/�³�����</button>
	<? if($allowstickthread) { ?><button onclick="modthreads('stick')">�ö�/����ö�</button><? } ?>
	<button onclick="modthreads('digest')">����/�������</button>
	<? if($supe['status'] && $forum['supe_pushsetting']['status'] == 2) { ?><button onclick="modthreads('supe_push')">����/�������</button><? } ?>
	<? if($forum['modrecommend']['open'] && $forum['modrecommend']['sort'] != 1) { ?><button type="button" onclick="modthreads('recommend')">�Ƽ�����</button><? } ?>
	<script type="text/javascript">
		function modthreads(operation) {
			document.moderate.operation.value = operation;
			document.moderate.submit();
		}
	</script>
</div>
<? } ?>
</form>
</div>

<div class="pages_btns">
	<?=$multipage?>
	<? if($allowpost || !$discuz_uid) { ?>
		<span class="postbtn" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu(this.id)"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>" title="���»���"><img src="<?=IMGDIR?>/newtopic.gif" alt="���»���" /></a></span>
	<? } ?>
</div>

<? if($fastpost && $allowpost) { ?>
	<script src="include/javascript/post.js" type="text/javascript"></script>
	<script type="text/javascript">
	var postminchars = parseInt('<?=$minpostsize?>');
	var postmaxchars = parseInt('<?=$maxpostsize?>');
	var disablepostctrl = parseInt('<?=$disablepostctrl?>');
	var typerequired = parseInt('<?=$forum['threadtypes']['required']?>');
	function validate(theform) {
		if (theform.typeid && theform.typeid.options[theform.typeid.selectedIndex].value == 0 && typerequired) {
			alert("��ѡ�������Ӧ�ķ��ࡣ");
			theform.typeid.focus();
			return false;
		} else if (theform.subject.value == "" || theform.message.value == "") {
			alert("����ɱ������������");
			theform.subject.focus();
			return false;
		} else if (theform.subject.value.length > 80) {
			alert("���ı��ⳬ�� 80 ���ַ������ơ�");
			theform.subject.focus();
			return false;
		}
		if (!disablepostctrl && ((postminchars != 0 && theform.message.value.length < postminchars) || (postmaxchars != 0 && theform.message.value.length > postmaxchars))) {
			alert("�������ӳ��Ȳ�����Ҫ��\n\n��ǰ����: "+theform.message.value.length+" �ֽ�\nϵͳ����: "+postminchars+" �� "+postmaxchars+" �ֽ�");
			return false;
		}
		if(!fetchCheckbox('parseurloff')) {
			theform.message.value = parseurl(theform.message.value, 'bbcode');
		}
		theform.topicsubmit.disabled = true;
		return true;
	}
	</script>
	<form method="post" id="postform" action="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;topicsubmit=yes" onSubmit="return validate(this)">
		<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<div id="quickpost" class="box">
			<span class="headactions"><a href="member.php?action=credits&amp;view=forum_post&amp;fid=<?=$fid?>" target="_blank">�鿴���ֲ���˵��</a></span>
			<h4>���ٷ��»���</h4>
			<div class="postoptions">
				<h5>ѡ��</h5>
				<p><label><input class="checkbox" type="checkbox" name="parseurloff" id="parseurloff" value="1" /> ���� URL ʶ��</label></p>
				<p><label><input class="checkbox" type="checkbox" name="smileyoff" id="smileyoff" value="1" /> ���� </label><a href="faq.php?action=message&amp;id=32" target="_blank">����</a></p>
				<p><label><input class="checkbox" type="checkbox" name="bbcodeoff" id="bbcodeoff" value="1" /> ���� </label><a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a></p>
				<? if($allowanonymous || $forum['allowanonymous']) { ?><p><label><input class="checkbox" type="checkbox" name="isanonymous" value="1" /> ʹ����������</label></p><? } ?>
				<p><label><input class="checkbox" type="checkbox" name="usesig" value="1" <?=$usesigcheck?> /> ʹ�ø���ǩ��</label></p>
				<p><label><input class="checkbox" type="checkbox" name="emailnotify" value="1" /> �����»ظ��ʼ�֪ͨ</label></p>
				<? if($allowuseblog && $forum['allowshare']) { ?><p><label><input class="checkbox" type="checkbox" name="addtoblog" value="1" /> �����ļ�</label></p><? } ?>
			</div>
			<div class="postform">
				<h5><label for="subject">����</label>
				<? if($iscircle && $mycircles) { ?><select name='sgid'><option value="0">��ѡ��Ȧ��</option><? if(is_array($mycircles)) { foreach($mycircles as $id => $name) { ?><option value="<?=$id?>"><?=$name?></option><? } } ?></select><? } else { ?><?=$typeselect?><? } ?> <input type="text" id="subject" name="subject" tabindex="1" /></label></h5>
				<div id="threadtypes"></div>
				<p><label>����</label>
				<textarea rows="7" cols="80" class="autosave" name="message" id="message" onKeyDown="ctlent(event);" tabindex="2"></textarea>
				</p>
				<p class="btns">
					<button type="submit" name="topicsubmit" id="postsubmit" tabindex="3">��������</button>[��ɺ�ɰ� Ctrl+Enter ����]&nbsp;
					<a href="###" id="previewpost" onclick="$('postform').action=$('postform').action + '&previewpost=yes';$('postform').submit();">Ԥ������</a>&nbsp;
					<a href="###" id="restoredata" title="�ָ��ϴ��Զ����������" onclick="loadData()">�ָ�����</a>&nbsp;
					<a href="###" onclick="$('postform').reset()">�������</a>
				</p>
			</div>
			<? if($smileyinsert) { ?>
				<div class="smilies">
					<div id="smilieslist"></div>
					<script type="text/javascript">ajaxget('post.php?action=smilies', 'smilieslist');</script>
				</div>
			<? } ?>
			<script type="text/javascript">
				var textobj = $('message');
				window.onbeforeunload = function () {saveData(textobj.value)};
				if(is_ie >= 5 || is_moz >= 2) {
					lang['post_autosave_none'] = "û�п��Իָ������ݣ�";
					lang['post_autosave_confirm'] = "�˲��������ǵ�ǰ�������ݣ�ȷ��Ҫ�ָ�������";
				} else {
					$('restoredata').style.display = 'none';
				}
			</script>
		</div>
	</form>
<? } if($whosonlinestatus) { ?>
	<div class="box">
	<? if($detailstatus) { ?>
		<span class="headactions"><a href="forumdisplay.php?fid=<?=$fid?>&amp;page=<?=$page?>&amp;showoldetails=no#online"><img src="<?=IMGDIR?>/collapsed_no.gif" alt="" /></a></span>
		<h4>��������˰��Ļ�Ա</h4>
		<ul class="userlist"><? if(is_array($whosonline)) { foreach($whosonline as $key => $online) { ?><li title="ʱ��: <?=$online['lastactivity']?><?="\n"?> ����: <?=$online['action']?><?="\n"?> ���: <?=$forumname?>">
			<img src="images/common/<?=$online['icon']?>"  alt="" />
			<? if($online['uid']) { ?>
				<a href="space.php?uid=<?=$online['uid']?>"><?=$online['username']?></a>
			<? } else { ?>
				<?=$online['username']?>
			<? } ?>
			</li><? } } ?></ul>
	<? } else { ?>
		<span class="headactions"><a href="forumdisplay.php?fid=<?=$fid?>&amp;page=<?=$page?>&amp;showoldetails=yes#online" class="nobdr"><img src="<?=IMGDIR?>/collapsed_yes.gif" alt="" /></a></span>
		<h4>��������˰��Ļ�Ա</h4>
	<? } ?>
</div>
<? } ?>

<div id="footfilter" class="box">
	<form method="get" action="forumdisplay.php">
		<input type="hidden" name="fid" value="<?=$fid?>" />
		<? if($filter == 'digest' || $filter == 'type') { ?>
			<input type="hidden" name="filter" value="<?=$filter?>" />
			<input type="hidden" name="typeid" value="<?=$typeid?>" />
		<? } else { ?>
			�鿴 <select name="filter">
				<option value="0" <?=$check['0']?>>ȫ������</option>
				<option value="86400" <?=$check['86400']?>>1 ����������</option>
				<option value="172800" <?=$check['172800']?>>2 ����������</option>
				<option value="604800" <?=$check['604800']?>>1 ����������</option>
				<option value="2592000" <?=$check['2592000']?>>1 ������������</option>
				<option value="7948800" <?=$check['7948800']?>>3 ������������</option>
				<option value="15897600" <?=$check['15897600']?>>6 ������������</option>
				<option value="31536000" <?=$check['31536000']?>>1 ����������</option>
			</select>
		<? } ?>
		����ʽ
		<select name="orderby">
			<option value="lastpost" <?=$check['lastpost']?>>�ظ�ʱ��</option>
			<option value="dateline" <?=$check['dateline']?>>����ʱ��</option>
			<option value="replies" <?=$check['replies']?>>�ظ�����</option>
			<option value="views" <?=$check['views']?>>�������</option>
		</select>
		<select name="ascdesc">
			<option value="DESC" <?=$check['DESC']?>>����������</option>
			<option value="ASC" <?=$check['ASC']?>>����������</option>
		</select>
		&nbsp;<button type="submit">�ύ</button>
	</form>
<? if($forumjump && !$jsmenu['1']) { ?>
	<span id="forumjump" onmouseover="showMenu(this.id, false, 2)" class="dropmenu">�����ת ...</span>&nbsp;
	<ul class="popupmenu_popup" id="forumjump_menu" style="display: none">
	<?=$forumselect?>
	</ul>
<? } if($visitedforums) { ?>
	<span id="visited_forums" onmouseover="showMenu(this.id, false, 2)" class="dropmenu">������ʵİ��</span>
	<ul class="popupmenu_popup" id="visited_forums_menu" style="display: none">
	<?=$visitedforums?>
	</ul>
<? } ?>
</div>


<div class="legend">
	<label><img src="<?=IMGDIR?>/folder_new.gif" alt="���»ظ�" />���»ظ�</label>
	<label><img src="<?=IMGDIR?>/folder_common.gif" alt="���»ظ�" />���»ظ�</label>
	<label><img src="<?=IMGDIR?>/folder_hot.gif" alt="��������" />��������</label>
	<label><img src="<?=IMGDIR?>/folder_lock.gif" alt="�ر�����" />�ر�����</label>
</div>

<? if($forumjump && $jsmenu['1']) { ?>
	<div class="popupmenu_popup" id="forumlist_menu" style="display: none">
		<?=$forummenu?>
	</div>
<? } ?>
<script type="text/javascript">
var maxpage = <? if($maxpage) { ?><?=$maxpage?><? } else { ?>1<? } ?>;
if(maxpage > 1) {
	document.onkeyup = function(e){
		e = e ? e : window.event;
		var tagname = is_ie ? e.srcElement.tagName : e.target.tagName;
		if(tagname == 'INPUT' || tagname == 'TEXTAREA') return;
		actualCode = e.keyCode ? e.keyCode : e.charCode;
		<? if($page < $maxpage) { ?>
		if(actualCode == 39) {
			window.location = 'forumdisplay.php?fid=<?=$fid?><?=$forumdisplayadd?>&page=<? echo $page+1;; ?>';
		}
		<? } ?>
		<? if($page > 1) { ?>
		if(actualCode == 37) {
			window.location = 'forumdisplay.php?fid=<?=$fid?><?=$forumdisplayadd?>&page=<? echo $page-1;; ?>';
		}
		<? } ?>
	}
}
</script>
<? include template('footer'); ?>
