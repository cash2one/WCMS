<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �����̵�</div>
	<div class="container">
		<div class="side">
<? include template('magic_navbar'); ?>
</div>
		<div class="content">
			<? if(!$magicstatus && $adminid == 1) { ?>
				<div class="notice">����ϵͳ�ѹرգ�������Ա��������ʹ��</div>
			<? } ?>
			<? if($operation == '') { ?>
				<div class="mainbox">
					<h1>�����̵�</h1>
					<ul class="tabs">
						<li<? if(empty($typeid)) { ?> class="current"<? } ?>><a href="magic.php?action=shop">ȫ��</a></li>
						<li<? if($typeid==1) { ?> class="current"<? } ?>><a href="magic.php?action=shop&amp;typeid=1">������</a></li>
						<li<? if($typeid==2) { ?> class="current"<? } ?>><a href="magic.php?action=shop&amp;typeid=2">��Ա��</a></li>
						<li<? if($typeid==3) { ?> class="current"<? } ?>><a href="magic.php?action=shop&amp;typeid=3">������</a></li>
					</ul>
					<table summary="�����̵�" cellspacing="0" cellpadding="0">
					<? if($magiclist) { if(is_array($magiclist)) { foreach($magiclist as $key => $magic) { if($key && ($key % 2 == 0)) { ?>
								</tr>
								<? if($key < $magicnum) { ?>
									<tr>
								<? } ?>
							<? } ?>
							<td width="50%" class="attriblist">
								<dl>
									<dt><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>" /></dt>
									<dd class="name"><?=$magic['name']?></dd>
									<dd><?=$magic['description']?></dd>
									<dd>�ۼ�: <b><?=$magic['price']?></b> <?=$extcredits[$creditstrans]['title']?> ����: <b><?=$magic['weight']?></b> ���: <b><?=$magic['num']?></b> ����:<b><?=$magic['salevolume']?></b></dd>
									<dd><a href="magic.php?action=shop&amp;operation=buy&amp;magicid=<?=$magic['magicid']?>">����</a></dd>
								</dl>
							</td><? } } ?><?=$magicendrows?>
					<? } else { ?>
						<td colspan="3">û�д�����ߣ������Ե�<a href="magic.php?action=shop">����</a>������Ӧ���ߡ�</td></tr>
					<? } ?>
			<? } elseif($operation == 'buy') { ?>
				<form method="post" action="magic.php?action=shop">
				<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
				<input type="hidden" name="operation" value="buy" />
				<input type="hidden" name="magicid" value="<?=$magicid?>" />
				<input type="hidden" name="operatesubmit" value="yes" />
				<div class="mainbox">
				<h1>�����̵�</h1>
				<table cellspacing="0" cellpadding="0" width="100%" align="0">
				<tr><td rowspan="6"align="center" width="20%"><img src="images/magics/<?=$magic['pic']?>"><br /></td>
				<td width="80%"><b><?=$magic['name']?></b></td></tr>
				<tr><td><?=$magic['description']?></td></tr>
				<tr><td>�ۼ�: <?=$magic['price']?> <?=$extcredits[$creditstrans]['title']?> ���: <?=$magic['num']?> ����: <?=$magic['salevolume']?> ����: <?=$magic['weight']?></td></tr>
				<tr><td>�Ƿ�����ʹ��: <font color=red><? if($useperm) { ?> ���� <? } else { ?> ������ <? } ?></font>
				<? if($magic['type'] == 1) { ?>
						<br />����ʹ�ð��: <? if($forumperm) { ?><?=$forumperm?><? } else { ?> ���а�� <? } ?>
				<? } ?>
				<? if($magic['type'] == 2) { ?>
						<br />����ʹ�õ��û���: <? if($targetgroupperm) { ?><?=$targetgroupperm?><? } else { ?> �����û��� <? } ?>
				<? } ?>
				</td></tr>
				<tr><td width="10%">
					��������: <input name="magicnum" type="text" size="5" value="1" />&nbsp;
					<? if($allowmagics > 1 ) { ?>
						<input type="checkbox" name="checkgive" value="0" onclick="$('showgive').style.display = $('showgive').style.display == 'none' ? '' : 'none'; this.value = this.value == 0 ? 1 : 0; this.checked = this.value == 0 ? false : true" /> ���������û�
						<div id="showgive" style="display:none">
							���Ͷ����û���: <input name="tousername" type="text" size="5" />
						</div>
					<? } ?>
				</td></tr>
				<tr><td>
					<button class="submit" type="submit" name="operatesubmit" id="operatesubmit" value="true" tabindex="101">����</button>
				</td></tr>
				</table></div>
				</form>
			<? } ?>
			</tr></table></div>
			<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
		</div>
	</div>
<? include template('footer'); ?>
