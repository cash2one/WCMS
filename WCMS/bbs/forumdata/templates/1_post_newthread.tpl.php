<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!$iscircle || !$sgid) { include template('header'); } else { include template('supesite_header'); } ?>

<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?> &raquo; <? if($special == 1) { ?>����ͶƱ<? } elseif($special == 3) { ?>��������<? } elseif($special == 5) { ?>�������<? } else { ?>���»���<? } ?></div>

<? if($special == 4 || $special == 5) { ?>
	<script src="include/javascript/calendar.js" type="text/javascript"></script>
<? } ?>
<script type="text/javascript">
var postminchars = parseInt('<?=$minpostsize?>');
var postmaxchars = parseInt('<?=$maxpostsize?>');
var disablepostctrl = parseInt('<?=$disablepostctrl?>');
var typerequired = parseInt('<?=$forum['threadtypes']['required']?>');
var bbinsert = parseInt('<?=$bbinsert?>');
var seccodecheck = parseInt('<?=$seccodecheck?>');
var secqaacheck = parseInt('<?=$secqaacheck?>');
var special = parseInt('<?=$special?>');
var isfirstpost = 1;
var allowposttrade = parseInt('<?=$allowposttrade?>');
var allowpostreward = parseInt('<?=$allowpostreward?>');
var allowpostactivity = parseInt('<?=$allowpostactivity?>');
lang['board_allowed'] = 'ϵͳ����';
lang['lento'] = '��';
lang['bytes'] = '�ֽ�';
lang['post_curlength'] = '��ǰ����';
lang['post_subject_and_message_isnull'] = '����ɱ������������';
lang['post_subject_toolong'] = '���ı��ⳬ�� 80 ���ַ������ơ�';
lang['post_message_length_invalid'] = '�������ӳ��Ȳ�����Ҫ��';
lang['post_type_isnull'] = '��ѡ�������Ӧ�ķ��ࡣ';
lang['post_reward_credits_null'] = '�Բ������������ͻ��֡�';
</script>
<? include template('post_preview'); ?>
<form method="post" id="postform" action="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;topicsubmit=yes" <?=$enctype?>>
	<input type="hidden" name="formhash" id="formhash" value="<?=FORMHASH?>" />
	<input type="hidden" name="isblog" value="<?=$isblog?>" />
	<input type="hidden" name="frombbs" value="1" />
	<? if($special) { ?>
		<input type="hidden" name="special" value="<?=$special?>" />
	<? } ?>

	<div class="mainbox formbox">
		<span class="headactions"><a class="notabs" href="member.php?action=credits&amp;view=forum_post&amp;fid=<?=$fid?>" target="_blank">�鿴���ֲ���˵��</a></span>
		<h1><? if($special == 1) { ?>����ͶƱ<? } elseif($special == 3) { ?>��������<? } elseif($special == 5) { ?>�������<? } else { ?>���»���<? } ?></h1>
		<table summary="post" cellspacing="0" cellpadding="0" id="newpost">
			<thead>
				<tr>
					<th>�û���</th>
					<td>
						<? if($discuz_uid) { ?>
							<?=$discuz_userss?> [<a href="<?=$link_logout?>">�˳���¼</a>]
						<? } else { ?>
							�ο� [<a href="<?=$link_login?>">��Ա��¼</a>]
						<? } ?>
					</td>
				</tr>
			</thead>

		<? if($seccodecheck) { ?>
			<tr>
				<th><label for="seccodeverify">��֤��</label></th>
				<td>
					<div id="seccodeimage"></div>
					<input type="text" onfocus="updateseccode();this.onfocus = null" id="seccodeverify" name="seccodeverify" size="8" maxlength="4" tabindex="0" />
					<em class="tips"><strong>����������ʾ��֤��</strong> <? if($seccodedata['type'] == 2) { ?>��ȷ�����������֧�� Flash ����ʾ�������������֤�룬���<a href="###" onclick="updateseccode()">����</a>ˢ��<? } elseif($seccodedata['animator'] == 1) { ?>��ȷ�����������֧�ֶ�������ʾ�������������֤�룬���ͼƬˢ��<? } else { ?>�����������֤�룬���ͼƬˢ��<? } ?></em></td>
					<script type="text/javascript">
						var seccodedata = [<?=$seccodedata['width']?>, <?=$seccodedata['height']?>, <?=$seccodedata['type']?>];
					</script>
			</tr>
		<? } ?>

		<? if($secqaacheck) { ?>
			<tr><th><label for="secanswer">��֤�ʴ�</label></th>
			<td><div id="secquestion"></div><input type="text" name="secanswer" id="secanswer" size="25" maxlength="50" tabindex="1" />
			<script type="text/javascript">ajaxget('ajax.php?action=updatesecqaa', 'secquestion');</script></td>
			</tr>
		<? } ?>

		<? if($special == 3 && $allowpostreward) { ?>
			<tr>
				<th>���ͼ۸�<? if(!empty($extcredits[$creditstrans]['title'])) { ?>(<?=$extcredits[$creditstrans]['title']?>)<? } ?></th>
				<td><input onkeyup="getrealprice(this.value)" type="text" name="rewardprice" size="6" value="<?=$minrewardprice?>" tabindex="2" /> <em class="tips">
			˰��֧��: <span id="realprice">0</span>  <?=$extcredits[$creditstrans]['unit']?> (��� <?=$minrewardprice?> <?=$extcredits[$creditstrans]['unit']?><? if($maxrewardprice > 0) { ?> - <?=$maxrewardprice?> <?=$extcredits[$creditstrans]['unit']?><? } ?></em>)
			</td>
			</tr>
			<script type="text/javascript">
				$('realprice').innerHTML = parseInt($('postform').rewardprice.value) + parseInt(Math.ceil( $('postform').rewardprice.value * <?=$creditstax?> ));
				function getrealprice(price){
					if(!price.search(/^\d+$/) ) {
						n = Math.ceil(parseInt(price) + price * <?=$creditstax?>);
						if(price > 32767) {
							$('realprice').innerHTML = '<b>�ۼ۲��ܸ��� 32767</b>';
						} else if(price < <?=$minrewardprice?> || (<?=$maxrewardprice?> > 0 && price > <?=$maxrewardprice?>)) {
							$('realprice').innerHTML = '<b>�ۼ۳�����Χ</b>';
						} else {
							$('realprice').innerHTML = n;
						}
					}else{
						$('realprice').innerHTML = '<b>��д��Ч</b>';
					}
				}
			</script>
		<? } ?>

		<tr>
			<th style="border-bottom: 0"><label for="subject">����</label></th>
			<td style="border-bottom: 0">
				<? if($iscircle && $mycircles) { ?>
					<select name='sgid'>
						<option value="0">��ѡ��Ȧ��</option><? if(is_array($mycircles)) { foreach($mycircles as $id => $name) { ?><option value="<?=$id?>"><?=$name?></option><? } } ?></select>
				<? } else { ?>
					<?=$typeselect?>
				<? } ?>
				<input type="text" name="subject" id="subject" size="45" value="<?=$subject?>" tabindex="3" />

			</td>
		</tr>

		<tbody id="threadtypes"></tbody>

		<? if($special == 6 && $allowpostvideo) { ?>
			<tr>
				<th style="border-bottom: 0" valign="top">
					<label for="uploaddiv"><input type="radio" name="visup" value="1" checked="checked" onclick="$('uploaddiv').innerHTML = getVideoPlayer(0)">������Ƶ</label><br />
					<label for="recorddiv"><input type="radio" name="visup" value="0" onclick="$('uploaddiv').innerHTML = getVideoPlayer(1)">¼����Ƶ</label>
					</th>
				<td style="border-bottom: 0">
					<div id="uploaddiv"></div>
					<input type="checkbox" name="vautoplay" value="1">�Զ�����
					<input type="checkbox" name="vshare" value="1" checked>�������
					 <br /><em>�������: 100M</em>
					 <br /><em>֧�ָ�ʽ: .flv .mpg .m4v .mpeg .mpe .vod .wmv .wm .rm .rmvb .avi .asx .ra .ram .asf .3gp .mov .mp4</em>
					<input type="hidden" name="vid" id="vid" />
					<input type="hidden" name="subjectu8" id="subjectu8">
					<input type="hidden" name="tagsu8" id="tagsu8"><? $vcode = urlencode(authcode('siteurl='.$boardurl.'&uid='.$discuz_uid, 'ENCODE', "$vkey")); ?><script type="text/javascript">
					function setVideoInfo(vid) {
						$('vid').value = vid;
					}
					function getVideoPlayer(isup) {
						if(!isup) {
							var s = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="351" height="30" title="aa" id="vidPlayer">';
							s += '<param name="movie" value=\'http://union.bokecc.com/flash/discuz2/VideoDuke.swf?siteid=<?=$vsiteid?>&code=<?=$vcode?>\'/>';
							s += '<param name="quality" value="high" />';
							s += '<param name="allowScriptAccess" value="always" />';
							s += '<param name="allownetworking" value="all" />';
							s += '<embed src=\'http://union.bokecc.com/flash/discuz2/VideoDuke.swf?siteid=<?=$vsiteid?>&code=<?=$vcode?>\' quality="high" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="351" height="30"></embed>';
							s += '</object>';
						} else {
							var s = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="351" height="237" title="aa" id="vidPlayer">';
							s += '<param name="movie" value=\'http://union.bokecc.com/flash/discuz2/VideoRecord.swf?siteid=<?=$vsiteid?>&code=<?=$vcode?>\'/>';
							s += '<param name="quality" value="high" />';
							s += '<param name="allowScriptAccess" value="always" />';
							s += '<param name="allownetworking" value="all" />';
							s += '<embed src=\'http://union.bokecc.com/flash/discuz2/VideoRecord.swf?siteid=<?=$vsiteid?>&code=<?=$vcode?>\' quality="high" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="351" height="237"></embed>';
							s += '</object>';
						}
						return s;
					}
					$('uploaddiv').innerHTML = getVideoPlayer(0);
					</script>
				</td>
			</tr>
			<tr>
				<th style="border-bottom: 0" valign="top">��Ƶ����</th>
				<td style="border-bottom: 0" valign="top"><?=$vclassesselect?></td>
			</tr>
		<? } ?>

		<? if($special == 1 && $allowpostpoll) { ?>
			<tr>
				<th><label for="expiration">��Ч��Ʊ����</label></th>
				<td><input type="text" name="expiration" id="expiration" value="0" size="6" tabindex="4" /><em class="tips">(0���Ϊ������)</em></td>
			</tr>
			<tr>
			<th valign="top">ͶƱѡ��<br />
			ÿ����д 1 ��ѡ��<br />������д <?=$maxpolloptions?> ��ѡ��<br /><br />
			<input type="checkbox" name="visiblepoll" value="1" /> �ύͶƱ�����ſɼ�<br />
			<input type="checkbox" name="multiplepoll" value="1" onclick="this.checked?$('maxchoicescontrol').style.display='':$('maxchoicescontrol').style.display='none';" /> ��ѡͶƱ<br />
			<span id="maxchoicescontrol" style="display: none">����ѡ����: <input type="text" name="maxchoices" value="<?=$maxpolloptions?>" size="5"><br /></span>
			</th><td>
			<textarea rows="8" name="polloptions" style="width: 600px; word-break: break-all" tabindex="5"><?=$polloptions?></textarea></td>
			</tr>
		<? } ?>

		<tr>
<? include template('post_editor'); ?>
</tr>

		<? if($tagstatus) { ?>
			<tr>
				<th><label for="tags">��ǩ(TAG)</label></th>
				<td>
					<input size="45" type="input" id="tags" name="tags" value="" tabindex="200" />&nbsp;
					<button onclick="relatekw();return false">���ñ�ǩ</button><span id="tagselect"></span>
					<em class="tips">(�ö��Ż�ո���������ǩ��������д <strong>5</strong> ��)</em>
				</td>
			</tr>
		<? } ?>

		<? if($special == 5) { ?>
			<tr>
			<th><label class="affirmpoint">�����۵�</label></th>
			<td><textarea name="affirmpoint" id="affirmpoint" rows="10" cols="20" style="width:99%; height:60px" tabindex="201" onkeydown="ctlent(event)"></textarea></td>
			</tr>
			<tr>
			<th><label class="negapoint">�����۵�</label></th>
			<td><textarea name="negapoint" id="negapoint" rows="10" cols="20" style="width:99%; height:60px" tabindex="202" onkeydown="ctlent(event)"></textarea></td>
			</tr>
		<? } ?>

		<thead>
			<tr>
				<th>&nbsp;</th>
				<td><label><input id="advshow" class="checkbox" type="checkbox" onclick="showadv()" tabindex="203" />������Ϣ</label></td>
			</tr>
		</thead>
		<tbody id="adv" style="display: none">

			<? if($special == 5) { ?>
				<tr>
				<th><label for="endtime">����ʱ��</label></th>
				<td><input onclick="showcalendar(event, this, true)" type="text" name="endtime" size="45" value="" tabindex="204" /></td>
				</tr>
				<tr>
				<th><label for="umpire">����</label></th>
				<td><input type="text" name="umpire" id="umpire" size="45" tabindex="205" onblur="checkuserexists(this.value, 'checkuserinfo')" value="<?=$discuz_user?>" /><span id="checkuserinfo"></span></td>
				</tr>
			<? } ?>

			<? if($allowsetreadperm) { ?>
				<tr>
					<th><label for="readperm">�����Ķ�Ȩ��</label></th>
					<td><input type="text" name="readperm" id="readperm" size="6" value="<?=$readperm?>" tabindex="206" /> <em class="tips">(0���Ϊ������)</em></td>
				</tr>
			<? } ?>

			<? if($maxprice && !$special) { ?>
				<tr>
					<th><label for="price">�ۼ�(<?=$extcredits[$creditstrans]['title']?>)</label></th>
					<td><input type="text" name="price" id="price" size="6" value="<?=$price?>" tabindex="207" /> <em class="tips"><?=$extcredits[$creditstrans]['unit']?> (��� <?=$maxprice?> <?=$extcredits[$creditstrans]['unit']?><? if($maxincperthread) { ?>����һ��������������� <?=$maxincperthread?> <?=$extcredits[$creditstrans]['unit']?><? } if($maxchargespan) { ?>����߳���ʱ�� <?=$maxchargespan?> Сʱ<? } ?>)
					������ʹ�� <code><strong>[free]</strong>message<strong>[/free]</strong></code> ���뷢�����踶��Ҳ�ܲ鿴�������Ϣ</em>
				</td>
				</tr>
			<? } ?>

			<? if(!$special) { ?>
				<tr>
					<th>ͼ��</th>
					<td><label><input class="radio" type="radio" name="iconid" value="0" checked="checked" tabindex="208" /> ��</label> <?=$icons?></td>
				</tr>
			<? } ?>

			</tbody>
			<tr class="btns">
				<th>&nbsp;</th>
				<td>
					<input type="hidden" name="wysiwyg" id="<?=$editorid?>_mode" value="<?=$editormode?>" />
					<button type="submit" name="topicsubmit" id="postsubmit" value="true" tabindex="300"><? if($special == 1) { ?>����ͶƱ<? } elseif($special == 3) { ?>��������<? } elseif($special == 5) { ?>�������<? } else { ?>���»���<? } ?></button>
					<em>[��ɺ�ɰ� Ctrl+Enter ����]</em>&nbsp;&nbsp;
					&nbsp;<a href="###" id="restoredata" onclick="loadData()" title="�ָ��ϴ��Զ����������">�ָ�����</a>
				</td>
			</tr>
		</table>
	</div>
<br />

</form>

<script type="text/javascript">
	function showadv() {
		if($("advshow").checked == true) {
			$("adv").style.display = "";
		} else {
			$("adv").style.display = "none";
		}
	}
	function checkuserexists(username, objname) {
		var x = new Ajax();
		username = is_ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username;
		x.get('ajax.php?inajax=1&action=checkuserexists&username=' + username, function(s){
			var obj = $(objname);
			obj.innerHTML = s;
		});
	}
	<? if($typeid) { ?>ajaxget('post.php?action=threadtypes&typeid=<?=$typeid?>&fid=<?=$fid?>&inajax=1', 'threadtypes', 'threadtypeswait');<? } ?>
</script>
<? include template('post_js'); if(!$iscircle || !$sgid) { include template('footer'); } else { include template('supesite_footer'); } ?>