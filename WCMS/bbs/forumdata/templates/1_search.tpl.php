<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ����</div>

<form method="post" action="search.php" <? if($qihoo['status']) { ?>onSubmit="if(this.srchtype[0].value=='qihoo' && this.srchtype[0].checked) this.target='_blank'; else this.target=''; return true;"<? } ?>>
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<div class="mainbox formbox">
	<span class="headactions"><a href="member.php?action=credits&amp;view=search" target="_blank">�鿴���ֲ���˵��</a></span>
	<h1><? if($srchtype == 'threadtype') { ?>�������������Ϣ<? } else { ?>����<? } ?></h1>
	<table summary="����" cellspacing="0" cellpadding="0">
		<? if($srchtype == 'threadtype') { ?>
			<tr>
				<th style="border-bottom: 0px"><label for="typeid">������Ϣ</label></th>
				<td style="border-bottom: 0px">
					<select name="typeid" onchange="ajaxget('post.php?action=threadtypes&typeid='+this.options[this.selectedIndex].value+'&operate=1&sid=<?=$sid?>', 'threadtypes', 'threadtypeswait')">
						<option value="0">��</option><?=$threadtypes?>
					</select>
					<span id="threadtypeswait"></span>
				</td>
			</tr>
			<tbody id="threadtypes"></tbody>
		<? } else { ?>
		<tr>
			<th><label for="srchtxt">�ؼ���</label></th>
			<td><input type="text" id="srchtxt" name="srchtxt" size="45" maxlength="40" />
			<? if($tagstatus) { ?><p><?=$hottaglist?></p><? } ?>
			</td>
			<td>�ؼ����п�ʹ��ͨ��� "<strong>*</strong>"<br />ƥ�����ؼ���ȫ��������<strong>�ո�</strong>�� "<strong>AND</strong>" ���ӡ��� win32 <strong>AND</strong> unix<br />ƥ�����ؼ������в��֣����� "<strong>|</strong>" �� "<strong>OR</strong>" ���ӡ��� win32 <strong>OR</strong> unix</td>
		</tr>
		<tr>
			<th><label for="srchname">�û���</label></th>
			<td><input type="text" id="srchname" name="srchuname" size="45" maxlength="40" /></td>
			<td>�û����п�ʹ��ͨ��� "<strong>*</strong>"���� <strong>*user*</strong></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td><button class="submit" type="submit" name="searchsubmit" value="true">����</button></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	<table summary="����ѡ��" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>����ѡ��</th>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tr>
			<th>������ʽ</th>
			<td>
				<label><input type="radio" name="srchtype" onclick="orderbyselect(1)" value="title" <?=$checktype['title']?> <?=$disabled['title']?> /> ��������</label>
				<label><input type="radio" name="srchtype" onclick="orderbyselect(1)" value="blog" <?=$disabled['blog']?> /> �����ļ�</label>
				<label><input type="radio" name="srchtype" onclick="orderbyselect(2)" value="trade" /> ������Ʒ</label>
				<label><input type="radio" name="srchtype" onclick="window.location=('search.php?srchtype=threadtype')" value="trade" /> ����������Ϣ</label>
				<label><input type="radio" name="srchtype" onclick="orderbyselect(1)" value="fulltext" <?=$disabled['fulltext']?> /> ȫ������</label>
				<? if($qihoo['status']) { ?><label><input type="radio" name="srchtype" onclick="orderbyselect(1)" value="qihoo" <?=$checktype['qihoo']?> /> �滢ȫ��</label><? } ?>
			</td>
		</tr>
		<tr>
			<td>���ⷶΧ</td>
			<td>
				<label><input type="radio" name="srchfilter" value="all" checked="checked" /> ȫ������</label>
				<label><input type="radio" name="srchfilter" value="digest" /> ��������</label>
				<label><input type="radio" name="srchfilter" value="top" /> �ö�����</label>
			</td>
		</tr>
		<tbody id="specialtr1">
		<tr>
			<td>��������</td>
			<td>
				<label><input type="checkbox" name="special[]" value="1" /> ͶƱ����</label>
				<label><input type="checkbox" name="special[]" value="2" /> ��Ʒ����</label>
				<label><input type="checkbox" name="special[]" value="3" /> ��������</label>
				<label><input type="checkbox" name="special[]" value="4" /> �����</label>
				<label><input type="checkbox" name="special[]" value="5" /> ��������</label>
				<label><input type="checkbox" name="special[]" value="6" /> ��Ƶ����</label>
			</td>
		</tr>
		</tbody>
		<tbody id="specialtr2" style="display: none">
		<tr>
			<td>��Ʒ���</td>
			<td>
				<select name="srchtypeid"><option value="">ȫ��</option><? if(is_array($tradetypes)) { foreach($tradetypes as $typeid => $typename) { ?><option value="<?=$typeid?>"><?=$typename?></option><? } } ?></select>
			</td>
		</tr>
		</tbody>
		<tr>
			<th><label for="srchfrom">����ʱ��</label></th>
			<td>
				<select id="srchfrom" name="srchfrom">
					<option value="0">ȫ��ʱ��</option>
					<option value="86400">1 ��</option>
					<option value="172800">2 ��</option>
					<option value="432000">1 ��</option>
					<option value="1296000">1 ����</option>
					<option value="5184000">3 ����</option>
					<option value="8640000">6 ����</option>
					<option value="31536000">1 ��</option>
				</select>
				<label><input type="radio" name="before" value="" checked="checked" /> ����</label>
				<label><input type="radio" name="before" value="1" /> ��ǰ</label>
			</td>
		</tr>
		<tr>
			<td><label for="orderby">��������</label></td>
			<td>
				<select id="orderby1" name="orderby">
					<option value="lastpost" selected="selected">�ظ�ʱ��</option>
					<option value="dateline">����ʱ��</option>
					<option value="replies">�ظ�����</option>
					<option value="views">�������</option>
				</select>
				<select id="orderby2" name="orderby" style="position: absolute; display: none" disabled>
					<option value="dateline" selected="selected">����ʱ��</option>
					<option value="price">��Ʒ�ּ�</option>
					<option value="expiration">ʣ��ʱ��</option>
				</select>
				<label><input type="radio" name="ascdesc" value="asc" /> ����������</label>
				<label><input type="radio" name="ascdesc" value="desc" checked="checked" /> ����������</label>
			</td>
		</tr>
		<? } ?>
		<tr>
			<td valign="top"><label for="srchfid">������Χ</label></td>
			<td>
				<select id="srchfid" name="srchfid[]" multiple="multiple" size="10" style="width: 26em;">
					<option value="all"<? if(!$srchfid) { ?> selected="selected"<? } ?>>�������п��ŵİ��</option>
					<option value="">&nbsp;</option>
					<?=$forumselect?>
				</select>
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td><button class="submit" type="submit" name="searchsubmit" value="true">����</button></td>
		</tr>
	</table>
</div>
</form>

<script type="text/javascript">
function orderbyselect(ordertype) {
	$('orderby1').style.display = 'none';
	$('orderby1').style.position = 'absolute';
	$('orderby1').disabled = true;
	$('specialtr1').style.display = 'none';
	$('orderby2').style.display = 'none';
	$('orderby2').style.position = 'absolute';
	$('orderby2').disabled = true;
	$('specialtr2').style.display = 'none';
	$('orderby' + ordertype).style.display = '';
	$('orderby' + ordertype).style.position = 'static';
	$('orderby' + ordertype).disabled = false;
	$('specialtr' + ordertype).style.display = '';
}
<? if($typeid) { ?>
	ajaxget('post.php?action=threadtypes&typeid=<?=$typeid?>&operate=1&inajax=1', 'threadtypes');
<? } ?>
</script>
<? include template('footer'); ?>
