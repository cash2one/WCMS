<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="foruminfo">
	<div id="userinfo">
		<div id="nav">
			<? if($supe['status']) { ?><a href="<?=$supe['siteurl']?>" target="_blank"><?=$supe['sitename']?></a> - <? } ?>
			<? if($gid || !$discuz_uid) { ?><a href="<?=$indexname?>"><?=$bbname?></a> <? } else { ?><a href="space.php?action=viewpro&amp;uid=<?=$discuz_uid?>" class="dropmenu" id="creditlist" onmouseover="showMenu(this.id)"><?=$discuz_user?></a> <? } ?>
			<? if($discuz_uid) { ?>
				<? if($supe['status'] && $xspacestatus) { ?>
					- <a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">���˿ռ�</a>
				<? } elseif($spacestatus) { ?>
					- <a href="space.php?uid=<?=$discuz_uid?>" target="_blank">���˿ռ�</a>
				<? } ?>
				<? if($supe['status'] && !$xspacestatus) { ?>
					- <a href="<?=$supe['siteurl']?>/?uid/<?=$discuz_uid?>" target="_blank">�������˿ռ�</a>
				<? } ?>
			<? } ?>
		</div>
		<p>
		<? if($discuz_uid) { ?>
			<? if($allowinvisible) { ?>״̬:
			<span id="loginstatus"><? if(!empty($invisible)) { ?><a href="member.php?action=switchstatus" onclick="ajaxget(this.href, 'loginstatus');doane(event);">����ģʽ</a><? } else { ?><a href="member.php?action=switchstatus" title="�л�������ģʽ" onclick="ajaxget(this.href, 'loginstatus');doane(event);">����ģʽ</a><? } ?></span>,
			<? } ?>
			���ϴη�������: <em><?=$lastvisittime?></em>
			<? if(!empty($google) && ($google & 1)) { ?><br /><? } else { ?> &nbsp;<? } ?>
			<a href="search.php?srchfrom=<?=$newthreads?>&amp;searchsubmit=yes">�鿴����</a>
			<a href="member.php?action=markread" id="ajax_markread" onclick="ajaxmenu(event, this.id)">����Ѷ�</a>
		<? } elseif(!$passport_status) { ?>
			<form id="loginform" method="post" name="login" action="logging.php?action=login&amp;loginsubmit=true">
				<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
				<input type="hidden" name="cookietime" value="2592000" />
				<input type="hidden" name="loginfield" value="username" />
				<input type="text" id="username" name="username" size="15" maxlength="40" tabindex="1" value="�û���" onclick="this.value = ''" />
				<input type="password" id="password" name="password" size="10" tabindex="2" onkeypress="if((event.keyCode ? event.keyCode : event.charCode) == 13) $('loginform').submit()" />
				<button name="userlogin" type="submit" value="true">��¼</button>
			</form>
		<? } ?>
		</p>
	</div>

	<div id="forumstats">
		<p>
			����: <em><?=$todayposts?></em>, ����: <em><?=$postdata['0']?></em>, �����: <em><?=$postdata['1']?></em> &nbsp; <a href="digest.php">������</a>
			<? if($rssstatus) { ?><a href="rss.php?auth=<?=$rssauth?>" title="RSS ����ȫ�����" target="_blank"><img src="images/common/xml.gif" alt="RSS ����ȫ�����" /></a><? } ?>
		</p>
		<p>����: <em><?=$threads?></em>, ����: <em><?=$posts?></em>, ��Ա: <em><?=$totalmembers?></em>, ��ӭ�»�Ա <cite><a href="space.php?username=<?=$memberenc?>"><?=$lastmember?></a></cite></p>
	</div>
	<? if(!empty($google) && ($google & 1)) { ?>
		<div id="headsearch" style="clear: both">
		<script src="forumdata/cache/google_var.js" type="text/javascript"></script>
		<script src="include/javascript/google.js" type="text/javascript"></script>
		</div>
	<? } ?>
</div>

<? if(empty($gid) && $announcements) { ?>
	<div id="announcement" onmouseover="if(!anncount) {clearTimeout(annst);annst = 0}" onmouseout="if(!annst) annst = setTimeout('announcementScroll()', anndelay);">
		<div id="announcementbody"><ul><?=$announcements?></ul></div>
	</div>
	<script type="text/javascript">
		var anndelay = 3000;
		var anncount = 0;var annheight = 36;var annst = 0;
		function announcementScroll() {
			if(!annst) {
				$('announcementbody').innerHTML += '<br style="clear: both" />' + $('announcementbody').innerHTML;$('announcementbody').scrollTop = 0;
				if($('announcementbody').scrollHeight > annheight * 3) {
					annst = setTimeout('announcementScroll()', anndelay);
				} else {
					$('announcement').onmouseover = $('announcement').onmouseout = null;
				}
				return;
			}
			if(anncount == annheight) {
				if($('announcementbody').scrollHeight - annheight <= $('announcementbody').scrollTop) {
					$('announcementbody').scrollTop = $('announcementbody').scrollHeight / 2 - annheight;
				}
				anncount = 0;annst = setTimeout('announcementScroll()', anndelay);
			} else {
				$('announcementbody').scrollTop++;anncount++;annst = setTimeout('announcementScroll()', 10);
			}
		}

	</script>
<? } if(!empty($newpmexists) || $announcepm) { ?>
	<div style="clear: both; margin-top: 5px" id="pmprompt">
<? include template('pmprompt'); ?>
</div>
<? } if($admode && empty($insenz['hardadstatus']) && !empty($advlist['text'])) { ?><div class="ad_text" id="ad_text"><table summary="Text Ad" cellpadding="0" cellspacing="1"><?=$advlist['text']?></table></div><? } else { ?><div id="ad_text"></div><? } ?>

<table summary="HeadBox" class="portalbox" cellpadding="0" cellspacing="1">
	<tr>
	<? if($supeitemsstatus || $hottagstatus) { ?>
		<td>
			<? if($supeitemsstatus) { ?>
				<div id="supeitems"><h3><a href="<?=$supe['siteurl']?>" target="_blank">X-Space���˿ռ��ȵ㵼��</a></h3>
				<ul>
					<?=$_DCACHE['supe_updateitems']?>
				</ul>
				</div>
			<? } ?>
			<? if($hottagstatus) { ?>
				<div id="hottags"><h3><a href="tag.php" target="_blank">���ű�ǩ</a></h3>
				<?=$_DCACHE['tags']?>
				</div>
			<? } ?>
		</td>
	<? } ?>
	<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 1)) { ?>
		<td id="qihoosearch"<? if($supeitemsstatus || $hottagstatus) { ?> style="width: 242px;"<? } ?>>
		<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 1)) { ?>
			<form method="post" action="search.php?srchtype=qihoo" onSubmit="this.target='_blank';">
				<input type="hidden" name="searchsubmit" value="yes" />
				<input type="text" name="srchtxt" value="<?=$qihoo_searchboxtxt?>" size="20" />
				<select name="stype">
					<option value="" selected="selected">ȫ��</option>
					<option value="1">����</option>
					<option value="2">����</option>
				</select>
				&nbsp;<button name="searchsubmit" type="submit" value="true">����</button>
			</form>

			<? if(!empty($qihoo['links']['keywords'])) { ?>
				<strong>��������</strong><? if(is_array($qihoo['links']['keywords'])) { foreach($qihoo['links']['keywords'] as $link) { ?>					<?=$link?>&nbsp;
				<? } } } ?>

			<? if($customtopics) { ?>
				<strong>�û�ר��</strong>&nbsp;&nbsp;<?=$customtopics?> [<a href="###" onclick="window.open('misc.php?action=customtopics', '', 'width=320,height=450,resizable=yes,scrollbars=yes');">�༭</a>]<br />
			<? } ?>

			<? if(!empty($qihoo['links']['topics'])) { ?>
				<strong>��̳ר��</strong>&nbsp;<? if(is_array($qihoo['links']['topics'])) { foreach($qihoo['links']['topics'] as $url) { ?>					<?=$url?> &nbsp;
				<? } } } ?>
		<? } ?>
		</td>
	<? } ?>
	</tr>
</table><? if(is_array($catlist)) { foreach($catlist as $key => $cat) { if($cat['forumscount']) { ?>
		<div class="mainbox forumlist">
			<span class="headactions">
				<? if($cat['moderators']) { ?>��������: <?=$cat['moderators']?><? } ?>
				<img id="category_<?=$cat['fid']?>_img" src="<?=IMGDIR?>/<?=$cat['collapseimg']?>" title="����/չ��" alt="����/չ��" onclick="toggle_collapse('category_<?=$cat['fid']?>');" />
			</span>
			<h3><a href="<?=$indexname?>?gid=<?=$cat['fid']?>"><?=$cat['name']?></a></h3>
			<table id="category_<?=$cat['fid']?>" summary="category<?=$cat['fid']?>" cellspacing="0" cellpadding="0" style="<?=$collapse['category_'.$cat['fid']]?>">
			<? if(!$cat['forumcolumns']) { ?>
				<thead class="category">
					<tr>
						<th>���</th>
						<td class="nums">����</td>
						<td class="nums">����</td>
						<td class="lastpost">��󷢱�</td>
					</tr>
				</thead><? if(is_array($cat['forums'])) { foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid]; ?><tbody id="forum<?=$forum['fid']?>">
						<tr>
							<th<?=$forum['folder']?>>
								<?=$forum['icon']?>
								<h2><a href="forumdisplay.php?fid=<?=$forum['fid']?>"><?=$forum['name']?></a><? if($forum['todayposts'] && !$forum['redirect']) { ?><em> (����: <?=$forum['todayposts']?>)</em><? } ?></h2>
								<? if($forum['description']) { ?><p><?=$forum['description']?></p><? } ?>
								<? if($forum['subforums']) { ?><p>�Ӱ��: <?=$forum['subforums']?></p><? } ?>
								<? if($forum['moderators']) { if($moddisplay == 'flat') { ?><p class="moderators">����: <?=$forum['moderators']?></p><? } else { ?><span class="dropmenu" id="mod<?=$forum['fid']?>" onmouseover="showMenu(this.id)">����</span><ul class="moderators popupmenu_popup" id="mod<?=$forum['fid']?>_menu" style="display: none"><?=$forum['moderators']?></ul><? } } ?>
							</th>
							<td class="nums"><? if($forum['redirect']) { ?>--<? } else { ?><?=$forum['threads']?><? } ?></td>
							<td class="nums"><? if($forum['redirect']) { ?>--<? } else { ?><?=$forum['posts']?><? } ?></td>
							<td class="lastpost">
							<? if($forum['permission'] == 1) { ?>
								˽�ܰ��
							<? } else { ?>
								<? if($forum['redirect']) { ?>
									--
								<? } elseif(is_array($forum['lastpost'])) { ?>
									<a href="redirect.php?tid=<?=$forum['lastpost']['tid']?>&amp;goto=lastpost#lastpost"><? echo cutstr($forum['lastpost']['subject'], 40); ?></a>
									<cite>by <? if($forum['lastpost']['author']) { ?><?=$forum['lastpost']['author']?><? } else { ?>����<? } ?> - <?=$forum['lastpost']['dateline']?></cite>
								<? } else { ?>
									��δ
								<? } ?>
							<? } ?>
							</td>
						</tr>
					</tbody>
				<? } } } else { ?>
					<tr><? if(is_array($cat['forums'])) { foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid]; if($forum['orderid'] && ($forum['orderid'] % $cat['forumcolumns'] == 0)) { ?>
							</tr></tbody>
							<? if($forum['orderid'] < $cat['forumscount']) { ?>
								<tbody><tr>
							<? } ?>
						<? } ?>
						<th width="<?=$cat['forumcolwidth']?>"<?=$forum['folder']?>>
							<h2><a href="forumdisplay.php?fid=<?=$forum['fid']?>"><?=$forum['name']?></a><? if($forum['todayposts']) { ?><em> (����: <?=$forum['todayposts']?>)</em><? } ?></h2>
							<p>����: <?=$forum['threads']?>, ����: <?=$forum['posts']?></p>
							<? if($forum['permission'] == 1) { ?>
								<p>˽�ܰ��
							<? } else { ?>
								<p>��󷢱�:
									<? if(is_array($forum['lastpost'])) { ?>
										<a href="redirect.php?tid=<?=$forum['lastpost']['tid']?>&amp;goto=lastpost#lastpost"><?=$forum['lastpost']['dateline']?></a>
										by <? if($forum['lastpost']['author']) { ?><?=$forum['lastpost']['author']?><? } else { ?>����<? } ?>
									<? } else { ?>
										��δ
									<? } ?>
								</p>
							<? } ?>
						</th>
					<? } } ?><?=$cat['endrows']?>
			<? } ?>
			</table>
		</div>
		<? if($admode && empty($insenz['hardadstatus']) && !empty($advlist['intercat']) && ($advlist['intercat'][$key] = array_merge(($advlist['intercat']['0'] ? $advlist['intercat']['0'] : array()), ($advlist['intercat'][$key] ? $advlist['intercat'][$key] : array())))) { ?><div class="ad_column" id="ad_intercat_<?=$key?>"><? echo $advitems[$advlist['intercat'][$key][array_rand($advlist['intercat'][$key])]]; ?></div><? } else { ?><div id="ad_intercat_<?=$key?>"></div><? } ?>
	<? } } } if($_DCACHE['forumlinks']) { ?>
<div class="box">
	<span class="headactions"><img id="forumlinks_img" src="<?=IMGDIR?>/<?=$collapseimg['forumlinks']?>" alt="" onclick="toggle_collapse('forumlinks');" /></span>
	<h4>������̳</h4>
	<table summary="������̳" id="forumlinks" cellpadding="0" cellspacing="0" style="<?=$collapse['forumlinks']?>"><? if(is_array($_DCACHE['forumlinks'])) { foreach($_DCACHE['forumlinks'] as $flink) { ?>			<tr>
				<td>
					<? if($flink['type'] == 1) { ?><img src="<?=$flink['logo']?>" alt="" class="forumlink_logo" /><? } ?>
					<?=$flink['content']?>
				</td>
			</tr>
		<? } } ?></table>
</div>
<? } if(empty($gid) && $supe['status'] && $supe['maxupdateusers'] && $_DCACHE['supe_updateusers']) { ?>
<div class="box" id="supe_maxupdateusers">
	<h4><a href="<?=$supe['siteurl']?>" target="_blank">������¸��˿ռ�</a></h4>
	<ul class="userlist"><? if(is_array($_DCACHE['supe_updateusers'])) { foreach($_DCACHE['supe_updateusers'] as $supe_updateuser) { ?>			<li><a href="<?=$supe['siteurl']?>/?uid/<?=$supe_updateuser['uid']?>" target="_blank"><?=$supe_updateuser['username']?></a></li>
		<? } } ?></ul>
</div>
<? } if(empty($gid) && ($whosonlinestatus || $maxbdays)) { ?>
	<div class="box" id="online">
	<? if($whosonlinestatus) { ?>
		<? if($detailstatus) { ?>
			<span class="headactions"><a href="<?=$indexname?>?showoldetails=no#online" title="�ر�"><img src="<?=IMGDIR?>/collapsed_no.gif" alt="�ر�" /></a></span>
			<h4>
				<strong><a href="member.php?action=online">���߻�Ա</a></strong>
				- <em><?=$onlinenum?></em> ������
				- <em><?=$membercount?></em> ��Ա(<em><?=$invisiblecount?></em> ����),
				<em><?=$guestcount?></em> λ�ο�
				- ��߼�¼�� <em><?=$onlineinfo['0']?></em> �� <em><?=$onlineinfo['1']?></em>.
			</h4>
		<? } else { ?>
			<span class="headactions"><a href="<?=$indexname?>?showoldetails=yes#online" class="nobdr"><img src="<?=IMGDIR?>/collapsed_yes.gif" alt="" /></a></span>
			<h4>
				<strong><a href="member.php?action=online">���߻�Ա</a></strong>
				- �� <em><?=$onlinenum?></em> ������
				- ��߼�¼�� <em><?=$onlineinfo['0']?></em> �� <em><?=$onlineinfo['1']?></em>.
			</h4>
		<? } ?>
	<? } else { ?>
		<h4><strong><a href="member.php?action=online">���߻�Ա</a></strong></h4>
	<? } ?>
	<? if($maxbdays) { ?>
		<div id="bdayslist">
			<? if($_DCACHE['birthdays_index']['todaysbdays']) { ?><a href="member.php?action=list&amp;type=birthdays">��������</a>: <?=$_DCACHE['birthdays_index']['todaysbdays']?><? } else { ?>����û�й����յ��û�<? } ?>
		</div>
	<? } ?>
	<? if($whosonlinestatus) { ?>
		<dl id="onlinelist">
		<dt><?=$_DCACHE['onlinelist']['legend']?></dt>
		<? if($detailstatus) { ?>
			<dd>
			<ul class="userlist">
			<? if($whosonline) { if(is_array($whosonline)) { foreach($whosonline as $key => $online) { ?><li title="ʱ��: <?=$online['lastactivity']?><?="\n"?> ����: <?=$online['action']?> <? if($online['fid']) { ?><?="\n"?>���: <?=$online['fid']?><? } ?>">
					<img src="images/common/<?=$online['icon']?>" alt="" />
					<? if($online['uid']) { ?>
						<a href="space.php?uid=<?=$online['uid']?>"><?=$online['username']?></a>
					<? } else { ?>
						<?=$online['username']?>
					<? } ?>
					</li><? } } } else { ?>
				<li style="width: auto">��ǰֻ���οͻ������Ա����</li>
			<? } ?>
			</ul>
			</dd>
		<? } ?>
		</dl>
	<? } ?>
	</div>
<? } ?>

<div class="legend">
	<label><img src="<?=IMGDIR?>/forum_new.gif" alt="�������İ��" />�������İ��</label>
	<label><img src="<?=IMGDIR?>/forum.gif" alt="�������İ��" />�������İ��</label>
</div>
<ul class="popupmenu_popup" id="creditlist_menu" style="display: none">
	<li>����: <?=$credits?></li><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><li><?=$credit['title']?>: <?=$GLOBALS['extcredits'.$id]?> <?=$credit['unit']?></li><? } } ?></ul>
<? if(empty($gid) && $announcements) { ?>
	<script type="text/javascript">announcementScroll();</script>
<? } include template('footer'); ?>
