<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; �ҵĵ�����</div>
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
					<h1>�ҵĵ�����</h1>
					<ul class="tabs">
						<li<? if(empty($typeid)) { ?> class="current"<? } ?>><a href="magic.php?action=user&amp;pid=<?=$pid?>">ȫ��</a></li>
						<li<? if($typeid==1) { ?> class="current"<? } ?>><a href="magic.php?action=<?=$action?>&amp;typeid=1&amp;pid=<?=$pid?>">������</a></li>
						<li<? if($typeid==2) { ?> class="current"<? } ?>><a href="magic.php?action=<?=$action?>&amp;typeid=2&amp;pid=<?=$pid?>">��Ա��</a></li>
						<li<? if($typeid==3) { ?> class="current"<? } ?>><a href="magic.php?action=<?=$action?>&amp;typeid=3&amp;pid=<?=$pid?>">������</a></li>
					</ul>
					<table summary="�ҵĵ�����" cellspacing="0" cellpadding="0">
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
										<dd>����: <b><?=$magic['num']?></b> ������: <b><?=$magic['weight']?></b></dd>
										<dd>
											<a href="magic.php?action=user&amp;operation=use&amp;magicid=<?=$magic['magicid']?>&amp;pid=<?=$pid?>&amp;username=<?=$username?>">ʹ��</a>&nbsp;|&nbsp;
											<? if($allowmagics > 1) { ?>
												<a href="magic.php?action=user&amp;operation=give&amp;magicid=<?=$magic['magicid']?>">����</a>&nbsp;|&nbsp;
											<? } ?>
											<a href="magic.php?action=user&amp;operation=drop&amp;magicid=<?=$magic['magicid']?>">����</a>&nbsp;|&nbsp;
											<? if($magicmarket && $allowmagics > 1) { ?>
												<a href="magic.php?action=user&amp;operation=sell&amp;magicid=<?=$magic['magicid']?>">����</a>&nbsp;
											<? } ?>
										</dd>
									</dl>
								</td><? } } ?><?=$magicendrows?>
						<? } else { ?>
							<td colspan="3">û�д�����ߣ������Ե�<a href="magic.php?action=shop">����</a>������Ӧ���ߡ�</td></tr>
						<? } ?>
					</table>
			<? } elseif($operation == 'give' || $operation == 'use' || $operation == 'sell' || $operation == 'drop') { ?>
			<form method="post" action="magic.php?action=user">
				<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
				<input type="hidden" name="operation" value="<?=$operation?>" />
				<input type="hidden" name="magicid" value="<?=$magicid?>" />
				<input type="hidden" name="<?=$operationsubmit?>" value="yes" />
				<div class="mainbox">
					<h1>
					<? if($operation == 'give') { ?>
						����
					<? } elseif($operation == 'drop') { ?>
						����
					<? } elseif($operation == 'sell') { ?>
						����
					<? } elseif($operation == 'use') { ?>
						ʹ��
					<? } ?>
					</h1>
					<table summary="" cellspacing="0" cellpadding="0">
						<tr>
							<td class="attriblist">
								<dl>
									<dt><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>"></dt>
									<dd><?=$magic['name']?></dd>
									<dd><?=$magic['description']?></dd>
									<dd>����: <?=$magic['num']?> ������: <?=$magic['weight']?></dd>
									<dd>�Ƿ�����ʹ��: <font color=red><? if($useperm) { ?> ���� <? } else { ?> ������ <? } ?></font></dd>
									<? if($magic['type'] == 1) { ?>
										<dd>����ʹ�ð��:
										<? if($forumperm) { ?><?=$forumperm?><? } else { ?> ���а�� <? } ?></dd>
									<? } ?>
									<? if($magic['type'] == 2) { ?>
										<dd>����ʹ�õ��û���:
										<? if($targetgroupperm) { ?><?=$targetgroupperm?><? } else { ?> �����û��� <? } ?></dd>
									<? } ?>
								</dl>
							</td>
						</tr>
						<? if($operation != 'use') { ?>
							<tr ><td width="10%">
								����:<input name="magicnum" type="text" size="5" value="1" />&nbsp;&nbsp;
							<? if($operation == 'sell') { ?>
								�ۼ�:<input name="price" type="text" size="5" />
							<? } ?>
							<? if($operation == 'give' && $allowmagics > 1 ) { ?>
								���Ͷ����û���:<input name="tousername" type="text" size="5" />
							<? } ?>
							</td></tr>
						<? } ?>
						<tr class="btns"><td colspan="2">
						<? if($operation == 'use') { showmagic(); } ?>
							<? if($operation == 'give') { ?>
								<button class="submit" type="submit" name="operatesubmit" id="operatesubmit" value="true"  onclick="return confirm('ȷ�ϸò���');">����</button>
							<? } elseif($operation == 'drop') { ?>
								<button class="submit" type="submit" name="operatesubmit" id="operatesubmit" value="true"  onclick="return confirm('ȷ�ϸò���');">����</button>
							<? } elseif($operation == 'sell') { ?>
								<button class="submit" type="submit" name="operatesubmit" id="operatesubmit" value="true"  onclick="return confirm('ȷ�ϸò���');">����</button>
							<? } elseif($operation == 'use') { ?>
								<button class="submit" type="submit" name="usesubmit" id="usesubmit" value="true">ʹ��</button>
							<? } ?>
						</td></tr>
	</table></div>



	</form>
<? } ?>
		</div>
	</div>



<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } include template('footer'); ?>
