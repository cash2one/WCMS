<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!$iscircle || !empty($frombbs)) { include template('header'); } else { include template('supesite_header'); } ?>

<script src="include/javascript/viewthread.js" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = parseInt(<?=$zoomstatus?>);</script>

<div id="foruminfo">
	<div id="nav">
		<? if($forumjump && $jsmenu['1']) { ?><a href="<?=$indexname?>" id="forumlist" onmouseover="showMenu(this.id)" class="dropmenu"><?=$bbname?></a><? } else { ?><a href="<?=$indexname?>"><?=$bbname?></a><? } ?> <?=$navigation?>
	</div>
	<div id="headsearch">
	<? if(!empty($google) && ($google & 4)) { ?>
		<script src="forumdata/cache/google_var.js" type="text/javascript"></script>
		<script src="include/javascript/google.js" type="text/javascript"></script>
	<? } ?>
	<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 4)) { ?>
		<form method="post" action="search.php?srchtype=qihoo" onSubmit="this.target='_blank';">
		<input type="hidden" name="searchsubmit" value="yes" />
		<input type="text" name="srchtxt" value="<?=$qihoo_searchboxtxt?>" size="27" class="input" style="<?=BGCODE?>" onmouseover="this.focus();this.value='';this.onmouseover=null;" onfocus="this.select()" />
		&nbsp;<button type="submit">����</button>
		</form>
	<? } ?>
	</div>
</div>

<? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['text'])) { ?><div class="ad_text" id="ad_text"><table summary="Text Ad" cellpadding="0" cellspacing="1"><?=$advlist['text']?></table></div><? } else { ?><div id="ad_text"></div><? } if(!empty($newpmexists) || $announcepm) { ?>
	<div class="maintable" id="pmprompt">
<? include template('pmprompt'); ?>
</div>
<? } ?>

<div class="pages_btns">
	<div class="threadflow"><a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextoldset"> &lsaquo;&lsaquo; ��һ����</a> | <a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextnewset">��һ���� &rsaquo;&rsaquo;</a></div>
	<?=$multipage?>
	<? if($allowpost || !$discuz_uid) { ?>
		<span class="postbtn" id="newspecial" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu(this.id)"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0" alt="���»���" title="���»���" /></a></span>
	<? } ?>
	<? if($allowpostreply || !$discuz_uid) { ?><span class="replybtn"><a href="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/reply.gif" border="0" alt="" /></a></span><? } ?>
</div>

<? if($allowposttrade || $allowpostpoll || $allowpostreward || $allowpostactivity || $allowpostdebate || $allowpostvideo || $forum['threadtypes'] || !$discuz_uid) { ?>
	<ul class="popupmenu_popup newspecialmenu" id="newspecial_menu" style="display: none">
		<li><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>">���»���</a></li>
		<? if($allowpostpoll || !$discuz_uid) { ?><li class="poll"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=1">����ͶƱ</a></li><? } ?>
		<? if($allowposttrade || !$discuz_uid) { ?><li class="trade"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=2">������Ʒ</a></li><? } ?>
		<? if($allowpostreward || !$discuz_uid) { ?><li class="reward"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=3">��������</a></li><? } ?>
		<? if($allowpostactivity || !$discuz_uid) { ?><li class="activity"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=4">�����</a></li><? } ?>
		<? if($allowpostdebate || !$discuz_uid) { ?><li class="debate"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=5">��������</a></li><? } ?>
		<? if($allowpostvideo || !$discuz_uid) { ?><li class="video"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=6">������Ƶ</a></li><? } ?>
		<? if($forum['threadtypes'] && !$forum['allowspecialonly']) { if(is_array($forum['threadtypes']['types'])) { foreach($forum['threadtypes']['types'] as $typeid => $threadtypes) { if($forum['threadtypes']['special'][$typeid] && $forum['threadtypes']['show'][$typeid]) { ?>
					<li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;typeid=<?=$typeid?>"><?=$threadtypes?></a></li>
				<? } } } if(is_array($forum['typemodels'])) { foreach($forum['typemodels'] as $id => $model) { ?><li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;modelid=<?=$id?>"><?=$model['name']?></a></li><? } } } ?>
	</ul>
<? } ?>

<form method="post" name="modactions">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="mainbox viewthread">
		<span class="headactions">
		<? if($discuz_uid) { ?>
			<? if($supe['status']) { ?>
				<? if($xspacestatus && $thread['authorid'] == $discuz_uid) { ?>
					<? if(!$thread['itemid']) { ?>
						<a href="<?=$supe['siteurl']?>/spacecp.php?action=spaceblogs&amp;op=add&amp;tid=<?=$tid?>" target="_blank">������˿ռ�</a>
					<? } else { ?>
						<a href="<?=$supe['siteurl']?>/?action-viewspace-itemid-<?=$thread['itemid']?>-fromdiscuz-<?=$supe_fromdiscuz?>" target="_blank">�ڸ��˿ռ�鿴</a>
					<? } ?>
				<? } ?>
				<? if($discuz_uid) { ?>
					<a href="<?=$supe['siteurl']?>/spacecp.php?action=spacenews&op=add&tid=<?=$tid?>" target="_blank">������Ѷ</a>
				<? } ?>
			<? } ?>
			<? if(!($supe['status'] && $xspacestatus && $thread['authorid'] == $discuz_uid) && $spacestatus && $thread['authorid'] && ($thread['authorid'] == $discuz_uid || $forum['ismoderator'])) { ?>
				<? if($thread['blog']) { ?>
					<a href="misc.php?action=blog&amp;tid=<?=$tid?>" id="ajax_blog" onclick="ajaxmenu(event, this.id, 2000, 'changestatus', 0)">���ļ��Ƴ�</a>
				<? } elseif($allowuseblog && $forum['allowshare'] && $thread['authorid'] == $discuz_uid) { ?>
					<a href="misc.php?action=blog&amp;tid=<?=$tid?>" id="ajax_blog" onclick="ajaxmenu(event, this.id, 2000, 'changestatus', 0)">�����ļ�</a>
				<? } ?>
				<script type="text/javascript">
					function changestatus(obj) {
						obj.innerHTML = obj.innerHTML == '���ļ��Ƴ�' ? '�����ļ�' : '���ļ��Ƴ�';
					}
				</script>
			<? } ?>
			<a href="my.php?item=favorites&amp;tid=<?=$tid?>" id="ajax_favorite" onclick="ajaxmenu(event, this.id, 3000, 0)">�ղ�</a>
			<a href="my.php?item=subscriptions&amp;subadd=<?=$tid?>" id="ajax_subscription" onclick="ajaxmenu(event, this.id, 3000, null, 0)">����</a>
			<a href="misc.php?action=emailfriend&amp;tid=<?=$tid?>" id="emailfriend" onclick="ajaxmenu(event, this.id, 9000000, null, 0)">�Ƽ�</a>
		<? } ?>
		<a href="viewthread.php?action=printable&amp;tid=<?=$tid?>" target="_blank" <? if(!$forum['ismoderator']) { ?>class="notabs"<? } ?>>��ӡ</a>
		<? if($forum['ismoderator']) { ?>
			<script type="text/javascript">
				function modaction(action) {
					if(!action) {
						return;
					}
					if(!in_array(action, ['delpost', 'banpost'])) {
						window.location=('topicadmin.php?tid=<?=$tid?>&fid=<?=$fid?>&action='+ action +'&sid=<?=$sid?>');
					} else {
						document.modactions.action = 'topicadmin.php?action='+ action +'&fid=<?=$fid?>&tid=<?=$tid?>&page=<?=$page?>';
						document.modactions.submit();
					}
				}
			</script>
			<span id="modoption" onmouseover="showMenu(this.id)" class="dropmenu">����ѡ��</span>
			<ul class="popupmenu_popup headermenu_popup" id="modoption_menu" style="display: none">
			<? if($allowdelpost) { ?>
				<li><a href="###" onclick="modaction('delpost')">ɾ������</a></li>
				<? if($thread['digest'] >= 0) { ?><li><a href="###" onclick="modaction('delete')">ɾ������</a></li><? } ?>
			<? } ?>
			<? if($allowbanpost) { ?>
				<li><a href="###" onclick="modaction('banpost')">��������</a></li>
			<? } ?>
			<? if($thread['digest'] >= 0) { ?>
				<li><a href="###" onclick="modaction('close')">�ر�����</a></li>
				<li><a href="###" onclick="modaction('move')">�ƶ�����</a></li>
				<li><a href="###" onclick="modaction('copy')">��������</a></li>
				<li><a href="###" onclick="modaction('highlight')">������ʾ</a></li>
				<li><a href="###" onclick="modaction('type')">�������</a></li>
				<li><a href="###" onclick="modaction('digest')">���þ���</a></li>
				<? if($allowstickthread) { ?>
					<li><a href="###" onclick="modaction('stick')">�����ö�</a></li>
				<? } ?>
				<? if($thread['price'] > 0 && $allowrefund) { ?>
					<li><a href="###" onclick="modaction('refund')">ǿ���˿�</a></li>
				<? } ?>
				<li><a href="###" onclick="modaction('split')">�ָ�����</a></li>
				<li><a href="###" onclick="modaction('merge')">�ϲ�����</a></li>
				<li><a href="###" onclick="modaction('bump')">��������</a></li>
				<li><a href="###" onclick="modaction('repair')">�޸�����</a></li>
				<? if($forum['modrecommend']['open'] && $forum['modrecommend']['sort'] != 1) { ?>
					<li><a href="###" onclick="modaction('recommend')">�Ƽ�����</a></li>
				<? } ?>
				<? if($supe['status'] && $allowpushthread && $forum['supe_pushsetting']['status'] == 2 && $thread['supe_pushstatus'] == 0) { ?>
					<li><a href="###" onclick="modaction('supe_push')">����/���</a></li>
				<? } ?>
			<? } ?>
			</ul>
		<? } ?>
		</span>
		<h1><?=$thread['subject']?>
		</h1>
		<? if($lastmod['modaction'] || $thread['blog'] || $thread['readperm'] || $thread['price'] != 0 || $thread['itemid'] || $lastmod['magicname']) { ?>
		<ins>
			<? if($thread['itemid']) { ?>
				<a href="<?=$supe['siteurl']?>/?action-viewspace-itemid-<?=$thread['itemid']?>" target="_blank">�����Ѿ������߼�����˿ռ�</a>
			<? } ?>
			<? if($thread['price'] > 0) { ?>
				<a href="misc.php?action=viewpayments&amp;tid=<?=$tid?>">�����֧�� <?=$extcredits[$creditstrans]['title']?> <strong><?=$thread['price']?></strong> <?=$extcredits[$creditstrans]['unit']?></a>
			<? } ?>
			<? if($lastmod['modaction']) { ?><a href="misc.php?action=viewthreadmod&amp;tid=<?=$tid?>" title="���������¼" target="_blank">�������� <?=$lastmod['modusername']?> �� <?=$lastmod['moddateline']?> <?=$lastmod['modaction']?></a><? } ?>
			<? if($spacestatus && $thread['blog']) { ?><a href="space.php?<?=$thread['authorid']?>/myblogs" target="_blank">�����ⱻ���߼��뵽�����ļ���</a><? } ?>
			<? if($thread['readperm']) { ?>�����Ķ�Ȩ�� <?=$thread['readperm']?><? } ?>
			<? if($lastmod['magicname']) { ?><a href="misc.php?action=viewthreadmod&amp;tid=<?=$tid?>" title="���������¼" target="_blank">�������� <?=$lastmod['modusername']?> �� <?=$lastmod['moddateline']?> ʹ�� <?=$lastmod['magicname']?> ����</a><? } ?>
		</ins>
		<? } ?>
		<? if($highlightstatus) { ?><ins><a href="viewthread.php?tid=<?=$tid?>&amp;page=<?=$page?>" style="font-weight: normal">ȡ������</a></ins><? } $postcount = 0; if(is_array($postlist)) { foreach($postlist as $post) { ?>	<? if($postcount++) { ?>
	</div>
	<div class="mainbox viewthread">
	<? } ?>
		<table id="pid<?=$post['pid']?>" summary="pid<?=$post['pid']?>" cellspacing="0" cellpadding="0">
			<tr>
				<td class="postauthor">
					<?=$post['newpostanchor']?> <?=$post['lastpostanchor']?>
					<cite><? if($forum['ismoderator']) { ?>
						<? if($allowviewip && ($thread['digest'] >= 0 || !$post['first'])) { ?><label><a href="topicadmin.php?action=getip&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>" id="ajax_getip_<?=$post['count']?>" onclick="ajaxmenu(event, this.id, 10000, null, 0)" title="�鿴 IP">IP</a></label><? } ?>
					<? } ?>
					<? if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
						<a href="space.php?uid=<?=$post['authorid']?>" target="_blank" id="userinfo<?=$post['pid']?>" class="dropmenu" onmouseover="showMenu(this.id)"><?=$post['author']?></a></cite>
						<? if($post['nickname']) { ?><p><?=$post['nickname']?></p><? } ?>
						<? if($post['avatar'] && $showavatars) { ?>
							<?=$post['avatar']?>
						<? } ?>
						<p><em><?=$post['authortitle']?></em></p>
						<p><? showstars($post['stars']); ?></p>
						<? if($post['customstatus']) { ?><p class="customstatus"><?=$post['customstatus']?></p><? } ?>
						<? if($customauthorinfo['1']) { ?><dl class="profile"><? @eval('echo "'.$customauthorinfo['1'].'";'); ?></dl><? } ?>
						<? if($post['medals']) { ?><p><? if(is_array($post['medals'])) { foreach($post['medals'] as $medal) { ?>							<img src="images/common/<?=$medal['image']?>" alt="<?=$medal['name']?>" />
							<? } } ?></p>
						<? } ?>

						<ul>
						<? if($spacestatus) { ?>
							<li class="space">
							<? if(!empty($post['spacename'])) { ?>
								<a href="space.php?uid=<?=$post['authorid']?>" target="_blank" title="<?=$post['spacename']?>">
							<? } else { ?>
								<a href="space.php?uid=<?=$post['authorid']?>" target="_blank" title="<?=$post['username']?>�ĸ��˿ռ�">
							<? } ?>
							���˿ռ�</a></li>
						<? } elseif($supe['status']) { ?>
							<li class="space"><a href="<?=$supe['siteurl']?>/?uid-<?=$post['authorid']?>" target="_blank">���˿ռ�</a></li>
						<? } ?>
						<li class="pm"><a href="pm.php?action=send&amp;uid=<?=$post['authorid']?>" target="_blank" id="ajax_uid_<?=$post['pid']?>" onclick="ajaxmenu(event, this.id, 9000000, null, 0)">������Ϣ</a></li>
						<li class="buddy"><a href="my.php?item=buddylist&amp;newbuddyid=<?=$post['authorid']?>&amp;buddysubmit=yes" target="_blank" id="ajax_buddy_<?=$post['count']?>" onclick="ajaxmenu(event, this.id, null, 0)">��Ϊ����</a></li>

						<? if($vtonlinestatus && $post['authorid']) { ?>
							<? if(($vtonlinestatus == 2 && $onlineauthors[$post['authorid']]) || ($vtonlinestatus == 1 && ($timestamp - $post['lastactivity'] <= 10800) && !$post['invisible'])) { ?>
								<li class="online">��ǰ����
							<? } else { ?>
								<li class="offline">��ǰ����
							<? } ?>
							</li>
						<? } ?>

						</ul>
					<? } else { ?>
						<? if(!$post['authorid']) { ?>
							<a href="javascript:;">�ο� <em><?=$post['useip']?></em></a></cite>
							δע��
						<? } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { ?>
							<? if($forum['ismoderator']) { ?><a href="space.php?uid=<?=$post['authorid']?>" target="_blank">����</a><? } else { ?>����<? } ?></cite>
							���û���������
						<? } else { ?>
							<?=$post['author']?></cite>
							���û��ѱ�ɾ��
						<? } ?>
					<? } ?>
				</td>
				<td class="postcontent" <? if($forum['ismoderator'] && ($thread['digest'] >= 0 || !$post['first'])) { ?> ondblclick="ajaxget('modcp.php?action=editmessage&pid=<?=$post['pid']?>&tid=<?=$post['tid']?>', 'postmessage_<?=$post['pid']?>')"<? } ?>>
					<div class="postinfo">
						<strong title="�����������ӵ�������" id="postnum<?=$post['pid']?>" onclick="setcopy('<?=$boardurl?>viewthread.php?tid=<?=$tid?>&amp;page=<?=$page?><?=$fromuid?>#pid<?=$post['pid']?>', '���������Ѿ����Ƶ�������')"><? if(!empty($postno[$post['number']])) { ?><?=$postno[$post['number']]?><? } else { ?><?=$post['number']?><?=$postno['0']?><? } ?></strong>
						<? if(MSGBIGSIZE || MSGSMALLSIZE) { ?>
							<? if(MSGBIGSIZE) { ?><em onclick="$('postmessage_<?=$post['pid']?>').className='t_bigfont'">��</em><? } ?>
							<em onclick="$('postmessage_<?=$post['pid']?>').className='t_msgfont'">��</em>
							<? if(MSGSMALLSIZE) { ?><em onclick="$('postmessage_<?=$post['pid']?>').className='t_smallfont'">С</em><? } ?>
						<? } ?>
						<? if($thread['price'] >= 0 || $post['first']) { ?>������ <?=$post['dateline']?>&nbsp;<? } ?>
						<? if($post['authorid'] && !$post['anonymous']) { ?>
							<? if(!$authorid) { ?>
								<a href="viewthread.php?tid=<?=$post['tid']?>&amp;page=<?=$page?>&amp;authorid=<?=$post['authorid']?>" rel="nofollow">ֻ��������</a>
							<? } else { ?>
								<a href="viewthread.php?tid=<?=$post['tid']?>&amp;page=<?=$page?>" rel="nofollow">��ʾȫ������</a>
							<? } ?>
						<? } ?>
					</div>
					<? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['thread2'][$post['count']])) { ?><div class="ad_textlink2" id="ad_thread2_<?=$post['count']?>"><?=$advlist['thread2'][$post['count']]?></div><? } else { ?><div id="ad_thread2_<?=$post['count']?>"></div><? } ?>
					<div class="postmessage defaultpost">
						<? if(!empty($post['ratings'])) { ?>
							<span class="postratings"><a href="misc.php?action=viewratings&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>" title="���� <?=$post['rate']?>"><?=$post['ratings']?></a></span>
						<? } ?>
						<? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['thread3'][$post['count']])) { ?><div class="ad_pip" id="ad_thread3_<?=$post['count']?>"><?=$advlist['thread3'][$post['count']]?></div><? } else { ?><div id="ad_thread3_<?=$post['count']?>"></div><? } ?><div id="ad_thread4_<?=$post['count']?>"></div>
						<? if($post['subject']) { ?>
							<h2><?=$post['subject']?></h2>
						<? } ?>

						<? if(!$typetemplate && $optionlist && $post['first'] && !$post['status']) { ?>
							<div class="box typeoption">
								<h4>������Ϣ - <?=$forum['threadtypes']['types'][$thread['typeid']]?></h4>
								<table summary="������Ϣ" cellpadding="0" cellspacing="0"><? if(is_array($optionlist)) { foreach($optionlist as $option) { ?>									<tr>
										<th><?=$option['title']?></th>
										<td><? if($option['value']) { ?><?=$option['value']?><? } else { ?>-<? } ?></td>
									</tr>
								<? } } ?></table>
							</div>
						<? } ?>

						<? if($adminid != 1 && $bannedmessages && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
							<div class="notice" style="width: 500px">��ʾ: <em>���߱���ֹ��ɾ�� �����Զ�����</em></div></div>
						<? } elseif($adminid != 1 && $post['status'] == 1) { ?>
							<div class="notice" style="width: 500px">��ʾ: <em>����������Ա���������</em></div></div>
						<? } elseif($post['first'] && isset($threadpay)) { include template('viewthread_pay'); } else { ?>
							<? if($bannedmessages && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
								<div class="notice" style="width: 500px">��ʾ: <em>���߱���ֹ��ɾ�� �����Զ����Σ�ֻ�й���Ա�ɼ�</em></div>
							<? } elseif($post['status'] == 1) { ?>
								<div class="notice" style="width: 500px">��ʾ: <em>����������Ա��������Σ�ֻ�й���Ա�ɼ�</em></div>
							<? } ?>
							<? if($post['number'] == 1 && $typetemplate) { ?><?=$typetemplate?><? } ?>
							<div id="postmessage_<?=$post['pid']?>" class="t_msgfont"><?=$post['message']?></div>

							<? if($post['attachment']) { ?>
								<div class="notice" style="width: 500px">����: <em>�����ڵ��û����޷����ػ�鿴����</em></div>
							<? } elseif($hideattach[$post['pid']] && $post['attachments']) { ?>
								<div class="notice" style="width: 500px">����: <em>����������Ҫ�ظ��ſ����ػ�鿴</em></div>
							<? } elseif($post['attachlist']) { ?>
								<div class="box postattachlist">
									<h4>����</h4>
									<?=$post['attachlist']?>
								</div>
							<? } ?>

							<? if($post['number'] == 1 && ($thread['tags'] || $relatedkeywords)) { ?>
								<p class="posttags">��������������������:
								<? if($thread['tags']) { ?><?=$thread['tags']?><? } ?>
								<? if($relatedkeywords) { ?><span class="postkeywords"><?=$relatedkeywords?></span><? } ?>
								</p>
							<? } ?>

							<? if($relatedthreadlist && !$qihoo['relate']['position'] && $post['number'] == 1) { ?>
								<fieldset>
									<legend>�������</legend>
									<ul><? if(is_array($relatedthreadlist)) { foreach($relatedthreadlist as $key => $threads) { if($threads['tid'] != $tid) { ?>
										<li style="padding: 3px">
											<? if(!$threads['insite']) { ?>
											[վ��] <a href="topic.php?url=<? echo urlencode($threads['tid']); ?>&amp;md5=<? echo md5($threads['tid']); ?>&amp;statsdata=<?=$fid?>||<?=$tid?>" target="_blank"><?=$threads['title']?></a>&nbsp;&nbsp;&nbsp;
											[ <a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;url=<? echo urlencode($threads['tid']); ?>&amp;md5=<? echo md5($threads['tid']); ?>&amp;from=direct" style="color: #090" target="_blank">ת��</a> ]
											<? } else { ?>
											<a href="viewthread.php?tid=<?=$threads['tid']?>&amp;statsdata=<?=$fid?>||<?=$tid?>" target="_blank"><?=$threads['title']?></a>
											<? } ?>
										</li>
										<? } } } ?><li style="text-align:right"><a style="color: #333; background: none; line-height: 22px;" href="http://search.qihoo.com/sint/qusearch.html?kw=<?=$searchkeywords?>&amp;sort=rdate&amp;ics=<?=$charset?>&amp;domain=<?=$site?>&amp;tshow=1" target="_blank">�����������</a></li>
									</ul>
								</fieldset>
							<? } ?>

							<? if(!empty($post['ratelog'])) { ?>
								<fieldset>
									<legend><a href="misc.php?action=viewratings&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>" title="�鿴���ּ�¼">����������ּ�¼</a></legend>

									<ul>
									<div id="post_rate_<?=$post['pid']?>"></div><? if(is_array($post['ratelog'])) { foreach($post['ratelog'] as $ratelog) { ?>										<li>
											<cite><a href="space.php?uid=<?=$ratelog['uid']?>" target="_blank"><?=$ratelog['username']?></a></cite>
											<?=$extcredits[$ratelog['extcredits']]['title']?>
											<strong><?=$ratelog['score']?></strong>
											<em><?=$ratelog['reason']?></em>
											<?=$ratelog['dateline']?>
										</li>
									<? } } ?></ul>
								</fieldset>
							<? } else { ?>
								<div id="post_rate_div_<?=$post['pid']?>"></div>
							<? } ?>

						</div>
						<? if($post['signature'] && !$post['anonymous'] && $showsignatures) { ?>
							<div class="signatures" style="maxHeightIE: <?=MAXSIGROWS?>px;">
								<?=$post['signature']?>
							</div>
						<? } ?>
					<? } ?>
				</div>
			</td>
		</tr>
		<tr>
			<td class="postauthor">
				<? if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
				<div class="popupmenu_popup userinfopanel" id="userinfo<?=$post['pid']?>_menu" style="display: none;">
					<? if($post['msn'] || $post['qq'] || $post['icq'] || $post['yahoo'] || $post['taobao']) { ?>
					<div class="imicons">
						<? if($post['msn']) { ?><a href="javascript:;" onclick="msnoperate('add', '<?=$post['msn']?>')" title="��� <?=$post['username']?> ΪMSN����"><img src="<?=IMGDIR?>/msnadd.gif" alt="��� <?=$post['username']?> ΪMSN����" /></a>
							<a href="javascript:;" onclick="msnoperate('chat', '<?=$post['msn']?>')" title="ͨ��MSN�� <?=$post['username']?> ��̸"><img src="<?=IMGDIR?>/msnchat.gif" alt="ͨ��MSN�� <?=$post['username']?> ��̸" /></a><? } ?>
						<? if($post['qq']) { ?><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?=$post['qq']?>&amp;Site=<?=$bbname?>&amp;Menu=yes" target="_blank"><img src="<?=IMGDIR?>/qq.gif" alt="QQ" /></a><? } ?>
						<? if($post['icq']) { ?><a href="http://wwp.icq.com/scripts/search.dll?to=<?=$post['icq']?>" target="_blank"><img src="<?=IMGDIR?>/icq.gif" alt="ICQ" /></a><? } ?>
						<? if($post['yahoo']) { ?><a href="http://edit.yahoo.com/config/send_webmesg?.target=<?=$post['yahoo']?>&amp;.src=pg" target="_blank"><img src="<?=IMGDIR?>/yahoo.gif" alt="Yahoo!"  /></a><? } ?>
						<? if($post['taobao']) { ?><script type="text/javascript">document.write('<a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&amp;uid='+encodeURIComponent('<?=$post['taobaoas']?>')+'&amp;s=2"><img src="<?=IMGDIR?>/taobao.gif" alt="��������" /></a>');</script><? } ?>
					</div>
					<? } ?>
					<dl><? @eval('echo "'.$customauthorinfo['2'].'";'); ?></dl>
					<? if($post['site']) { ?>
						<p><a href="<?=$post['site']?>" target="_blank">�鿴������վ</a></p>
					<? } ?>
					<p><a href="space.php?action=viewpro&amp;uid=<?=$post['authorid']?>" target="_blank">�鿴��ϸ����</a></p>
					<? if($allowedituser || $allowbanuser) { ?>
						<? if($adminid == 1) { ?>
							<p><a href="admincp.php?action=members&amp;username=<?=$post['usernameenc']?>&amp;searchsubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a></p>
						<? } else { ?>
							<p><a href="admincp.php?action=editmember&amp;uid=<?=$post['authorid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">�༭�û�</a></p>
							<? } ?>
						<p><a href="admincp.php?action=banmember&amp;uid=<?=$post['authorid']?>&amp;membersubmit=yes&amp;frames=yes" target="_blank">��ֹ�û�</a></p>
					<? } ?>
				</div>
				<? } ?>
			</td>
			<td class="postcontent">
				<div class="postactions">
					<? if($forum['ismoderator'] && $allowdelpost) { ?>
						<? if($post['first'] && $thread['digest'] == -1) { ?>
							<input type="checkbox" disabled="disabled" />
						<? } else { ?>
							<input type="checkbox" name="topiclist[]" value="<?=$post['pid']?>" />
						<? } ?>
					<? } ?>
					<p>
						<? if((($forum['ismoderator'] && $alloweditpost && !(in_array($post['adminid'], array(1, 2, 3)) && $adminid > $post['adminid'])) || ($forum['alloweditpost'] && $discuz_uid && $post['authorid'] == $discuz_uid)) && ($thread['digest'] >= 0 || !$post['first'])) { ?>
							<a href="post.php?action=edit&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>&amp;extra=<?=$extra?>">�༭</a>
						<? } ?>
						<? if($allowpostreply) { ?>
							<a href="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;repquote=<?=$post['pid']?>&amp;extra=<?=$extra?>&amp;page=<?=$page?>">����</a>
						<? } ?>
						<? if($discuz_uid && $magicstatus) { ?>
							<a href="magic.php?action=user&amp;pid=<?=$post['pid']?>" target="_blank">ʹ�õ���</a>
						<? } ?>
						<? if($discuz_uid && $reportpost) { ?>
							<a href="misc.php?action=report&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>" id="ajax_report_<?=$post['pid']?>" onclick="ajaxmenu(event, this.id, 9000000, null, 0)">����</a>
						<? } ?>
						<? if($raterange && $post['authorid']) { ?>
							<a href="misc.php?action=rate&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>" id="ajax_rate_<?=$post['pid']?>" onclick="ajaxmenu(event, this.id, 9000000, null, 0)">����</a>
						<? } ?>
						<? if($post['rate'] && $forum['ismoderator']) { ?>
							<a href="misc.php?action=removerate&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>">��������</a>
						<? } ?>
						<? if($fastpost && $allowpostreply) { ?>
							<a href="###" onclick="fastreply('�ظ� # ������', <?=$post['pid']?>)">�ظ�</a>
						<? } ?>
						<? if($forum['ismoderator']) { ?>
							<a href="topicadmin.php?action=delpost&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;topiclist[]=<?=$post['pid']?>&amp;page=<?=$page?>">ɾ��</a>
							<a href="topicadmin.php?action=banpost&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;topiclist[]=<?=$post['pid']?>&amp;page=<?=$page?>">����</a>
						<? } ?>
						<strong onclick="scroll(0,0)" title="����">TOP</strong>
					</p>
					<? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['thread1'][$post['count']])) { ?><div class="ad_textlink1" id="ad_thread1_<?=$post['count']?>"><?=$advlist['thread1'][$post['count']]?></div><? } else { ?><div id="ad_thread1_<?=$post['count']?>"></div><? } ?>
				</div>
			</td>
		</tr>
		</table>
		<? if($post['first'] && $thread['replies']) { ?></div><? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['interthread'])) { ?><div class="ad_column" id="ad_interthread"><?=$advlist['interthread']?><? } else { ?><div id="ad_interthread"><? } } } } ?></div>
</form>

<div class="pages_btns">
	<div class="threadflow"><a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextoldset"> &lsaquo;&lsaquo; ��һ����</a> | <a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextnewset">��һ���� &rsaquo;&rsaquo;</a></div>
	<?=$multipage?>
	<? if($allowpost || !$discuz_uid) { ?>
		<span class="postbtn" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu(this.id)"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0" alt="���»���" title="���»���" /></a></span>
	<? } ?>
	<? if($allowpostreply || !$discuz_uid) { ?><span class="replybtn"><a href="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/reply.gif" border="0" alt="" /></a></span><? } ?>
</div>

<? if($relatedthreadlist && $qihoo['relate']['position']) { include template('viewthread_relatedthread'); } if($fastpost && $allowpostreply) { ?>
	<script src="include/javascript/post.js" type="text/javascript"></script>
	<script type="text/javascript">
	var postminchars = parseInt('<?=$minpostsize?>');
	var postmaxchars = parseInt('<?=$maxpostsize?>');
	var disablepostctrl = parseInt('<?=$disablepostctrl?>');
	function validate(theform) {
		if (theform.message.value == "" && theform.subject.value == "") {
			alert("����ɱ������������");
			theform.message.focus();
			return false;
		} else if (theform.subject.value.length > 80) {
			alert("���ı��ⳬ�� 80 ���ַ������ơ�");
			theform.subject.focus();
			return false;
		}
		if (!disablepostctrl && ((postminchars != 0 && theform.message.value.length < postminchars) || (postmaxchars != 0 && theform.message.value.length > postmaxchars))) {
			alert("�������ӳ��Ȳ�����Ҫ��\n\n��ǰ����: "+theform.message.value.length+" �ֽ�\nϵͳ����: "+postminchars+" ���͵� "+postmaxchars+" �ֽ�");
			return false;
		}
		if(!fetchCheckbox('parseurloff')) {
			theform.message.value = parseurl(theform.message.value, 'bbcode');
		}
		theform.replysubmit.disabled = true;
		return true;
	}
	</script>
	<form method="post" id="postform" action="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>&amp;replysubmit=yes" onSubmit="return validate(this)">
		<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<div id="quickpost" class="box">
			<span class="headactions"><a href="member.php?action=credits&amp;view=forum_reply&amp;fid=<?=$fid?>" target="_blank">�鿴���ֲ���˵��</a></span>
			<h4>���ٻظ�����</h4>
			<div class="postoptions">
				<h5>ѡ��</h5>
				<p><label><input class="checkbox" type="checkbox" name="parseurloff" id="parseurloff" value="1"> ���� URL ʶ��</label></p>
				<p><label><input class="checkbox" type="checkbox" name="smileyoff" id="smileyoff" value="1"> ���� <a href="faq.php?action=message&amp;id=32" target="_blank">����</a></label></p>
				<p><label><input class="checkbox" type="checkbox" name="bbcodeoff" id="bbcodeoff" value="1"> ���� <a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!����</a></label></p>
				<? if($allowanonymous || $forum['allowanonymous']) { ?><p><label><input class="checkbox" type="checkbox" name="isanonymous" value="1"> ʹ����������</label></p><? } ?>
				<p><label><input class="checkbox" type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> ʹ�ø���ǩ��</label></p>
				<p><label><input class="checkbox" type="checkbox" name="emailnotify" value="1"> �����»ظ��ʼ�֪ͨ</label></p>
			</div>
			<div class="postform">
				<h5><label>����
				<input type="text" name="subject" value="" tabindex="1"></label></h5>
				<p><label>����</label>
				<textarea rows="7" cols="80" class="autosave" name="message" id="message" onKeyDown="ctlent(event);" tabindex="2"></textarea>
				</p>
				<p class="btns">
					<button type="submit" name="replysubmit" id="postsubmit" value="replysubmit" tabindex="3">��������</button>[��ɺ�ɰ� Ctrl+Enter ����]&nbsp;
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
<? } if($forumjump && !$jsmenu['1'] || $visitedforums) { ?>
	<div id="footfilter" class="box">
	<? if($forumjump && !$jsmenu['1']) { ?>
		<span id="forumjump" onmouseover="showMenu(this.id, false, 2)" class="dropmenu">�����ת ...</span>&nbsp;
		<ul class="popupmenu_popup" id="forumjump_menu" style="display: none">
		<?=$forumselect?>
		</ul>
	<? } ?>
	<? if($visitedforums) { ?>
		<span id="visited_forums" onmouseover="showMenu(this.id, false, 2)" class="dropmenu">������ʵİ��</span>
		<ul class="popupmenu_popup" id="visited_forums_menu" style="display: none">
		<?=$visitedforums?>
		</ul>
	<? } ?>
	</div>
<? } if($forumjump && $jsmenu['1']) { ?>
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
			window.location = 'viewthread.php?tid=<?=$tid?>&page=<? echo $page+1;; ?>';
		}
		<? } ?>
		<? if($page > 1) { ?>
		if(actualCode == 37) {
			window.location = 'viewthread.php?tid=<?=$tid?>&page=<? echo $page-1;; ?>';
		}
		<? } ?>
	}
}
</script>
<? if(!$iscircle || !empty($frombbs)) { include template('footer'); } else { include template('supesite_footer'); } ?>
<script src="include/javascript/msn.js" type="text/javascript"></script>
<? if($relatedthreadupdate) { ?>
<script src="relatethread.php?tid=<?=$tid?>&subjectenc=<?=$thread['subjectenc']?>&tagsenc=<?=$thread['tagsenc']?>&verifykey=<?=$verifykey?>&up=<?=$qihoo_up?>" type="text/javascript"></script>
<? } if($qihoo['relate']['bbsnum'] && $statsdata) { ?>
	<img style="display:none;" src="http://pvstat.qihoo.com/dimana.gif?_pdt=discuz&amp;_pg=s100812&amp;_r=<?=$randnum?>&amp;_dim_k=orgthread&amp;_dim_v=<? echo urlencode($boardurl);; ?>||<?=$statsdata?>||0" width="1" height="1" alt="" />
	<img style="display:none;" src="http://pvstat.qihoo.com/dimana.gif?_pdt=discuz&amp;_pg=s100812&amp;_r=<?=$randnum?>&amp;_dim_k=relthread&amp;_dim_v=<?=$statskeywords?>||<?=$statsurl?>" width="1" height="1" alt="" />
<? } ?>