<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>">
<title>���˿ռ���� - Powered by Discuz!</title>
<link rel="stylesheet" type="text/css" id="stylecss" href="mspace/<?=$spacesettings['style']?>/style.css">
<link rel="stylesheet" type="text/css" href="images/spaces/memcp.css">
<script src="include/javascript/common.js" type="text/javascript"></script>
<script src="include/javascript/bbcode.js" type="text/javascript"></script>
<script src="include/javascript/menu.js" type="text/javascript"></script>
<script src="include/javascript/drag.js" type="text/javascript"></script>
<script src="include/javascript/drag_space.js" type="text/javascript"></script>
<script type="text/javascript">
	var layout = [<?=$layoutjs?>];
	var space_layout_nocenter = '�м�������Ҫ��һ��ģ��';
</script>
</head>
<body>

<form id="dragform" method="post" action="memcp.php?action=spacemodule">

<table id="panel" align="center"><tr><th>

<table class="menu"  cellpadding="0" cellspacing="0" border="0"><tr><td>
<span id="basemenu" onMouseOver="showMenu(this.id)"><a href="###">��������</a></span>
</td><td>
<span id="stylemenu" onMouseOver="showMenu(this.id)"><a href="###">���ѡ��</a></span>
</td><td>
<span id="layoutmenu" onMouseOver="showMenu(this.id)"><a href="###">����ѡ��</a></span>
</td><td>
<span id="modulemenu" onMouseOver="showMenu(this.id)"><a href="###">ģ��ѡ��</a></span>
</td></tr>
</table>

<th align="right" width="300">
<div class="save">
	<div>
	<a href="###" onClick="previewLayout(<?=$discuz_uid?>)"><img src="images/spaces/preview.gif" border="0" /> Ԥ��</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="###" onClick="saveLayout()"><img src="images/spaces/save.gif" border="0" /> ����</a>
	</div><b>�����ڴ��ڱ༭״̬�����еĲ���ֻ����<u>����</u>����Ч</b>
</div>
</td></tr></table>
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" id="spacelayout0" name='spacelayout[0]' />
<input type="hidden" id="spacelayout1" name='spacelayout[1]' />
<input type="hidden" id="spacelayout2" name='spacelayout[2]' />
<input type="hidden" name="spacesubmit" value="TRUE" />

<div class="cp_menu" id="basemenu_menu" style="display: none">
<div class="title">
<div style="float:right"><img onClick="hideMenu()" class="dragdel" src="images/spaces/close.gif" /></div>
��������
</div>
<table width="100%" style="table-layout: fixed">
<tr><td width="25%">�ռ�����</td><td width="75%"><input type="text" maxlength="40" onKeyUp="previewtext('pre_title', this.value)" name="spacename" style="width: 100%" value="<?=$spacesettings['name']?>" /></td></td></tr>
<tr><td width="25%">�ռ�����</td><td width="75%"><input type="text" maxlength="100" onKeyUp="previewtext('pre_desc', this.value)" name="spacedescription" style="width: 100%" value="<?=$spacesettings['description']?>" /></td></td></tr>
</table>
</div>

<div class="cp_menu" id="stylemenu_menu" style="display: none">
<div class="title">
<div style="float:right"><img onClick="hideMenu()" class="dragdel" src="images/spaces/close.gif" /></div>
���ѡ��
</div>
<table width="100%"><? if(is_array($spacestyles)) { foreach($spacestyles as $styledir => $stylevar) { if(!empty($stylevar['row'])) { ?></tr><tr><? } ?>
	<td align="center">
	<a href="###" onClick="setStyle('<?=$styledir?>')"><img src="mspace/<?=$styledir?>/demo.gif" width="100" height="100" border="0" /></a><br />
	<input onclick="setStyle('<?=$styledir?>')" class="radio" type="radio" name="spacestyle" id="style_<?=$styledir?>" value="<?=$styledir?>" <? if($spacesettings['style'] == $styledir) { ?>checked<? } ?> /> <?=$stylevar['0']?>
	<br />[<a href="space.php?uid=<?=$discuz_uid?>&amp;style=<?=$styledir?>" target="_blank">Ԥ��</a>]
	</td><? } } ?></tr>
</table>
</div>

<div class="cp_menu" id="layoutmenu_menu" style="display: none">
<div class="title">
<div style="float:right"><img onClick="hideMenu()" class="dragdel" src="images/spaces/close.gif" /></div>
����ѡ��
</div>
<table width="100%"><tr><td align="center">
<a href="###" onClick="leftSide()"><img src="images/spaces/layout1.gif" border="0" /></a><br />
<input onClick="leftSide()" class="radio" type="radio" name="spaceside" id="side_1" value="1" />������
<a href="###" onClick="rightSide()"><img src="images/spaces/layout2.gif" border="0" /></a><br />
<input onClick="rightSide()" class="radio" type="radio" name="spaceside" id="side_2" value="2" />�Ҳ����
<a href="###" onClick="bothSide()"><img src="images/spaces/layout3.gif" border="0" /></a><br />
<input onClick="bothSide()" class="radio" type="radio" name="spaceside" id="side_0" value="0" />˫�����
</td></tr></table>
</div>

<div class="cp_menu" id="modulemenu_menu" style="display: none">
<div class="title">
<div style="float:right"><img onClick="hideMenu()" class="dragdel" src="images/spaces/close.gif" /></div>
ģ��ѡ��
</div><? if(is_array($modulesettings)) { foreach($modulesettings as $moduleid => $module) { ?><div>
	<input type='checkbox' class="checkbox" id="check_<?=$moduleid?>" onclick="Drag.handler.check(<?=$module['1']?>,'<?=$moduleid?>','<?=$spacelanguage[$moduleid]?>','<?=$module['0']?>')" value='' <? if(isset($module['2'])) { ?>disabled<? } ?> />
	<?=$spacelanguage[$moduleid]?>
	</div><? } } ?></div>

</form>

<div id="menu_top">
	<div class="bgleft"></div>
	<div class="bg">
	<span>��ӭ�� <?=$discuz_user?>&nbsp; &nbsp;<a href="pm.php" target="_blank">����Ϣ</a> | <a href="<?=$indexname?>" target="_blank">������̳</a>  </span>
	</div>
	<div class="bgright"></div>
</div>
<div id="header">
	<div id="headerbg" class="bg">
	<div id="pre_title_default" style="display: none"><?=$discuz_user?>�ĸ��˿ռ�</div>
	<div class="title" id="pre_title"><? if(!empty($spacename)) { ?><?=$spacename?><? } else { ?><?=$discuz_user?>�ĸ��˿ռ�<? } ?></div>
	<div class="desc" id="pre_desc" style="overflow: hidden"><?=$spacesettings['description']?></div>
	<div class="headerurl"><? if(in_array($rewritestatus, array(2, 3))) { ?><a href="space.php?uid=<?=$discuz_uid?>" class="spaceurl"><?=$boardurl?>space-uid-<?=$discuz_uid?>.html</a><? } else { ?><a href="space.php?uid=<?=$discuz_uid?>" class="spaceurl"><?=$boardurl?>space.php?uid=<?=$discuz_uid?></a><? } ?> <a href="###">��������</a> | <a href="###">�����ղ�</a></div></div>
</div>
<div id="menu">
	<div class="block">
	<div style="float: left"><a href="space.php?uid=<?=$discuz_uid?>">�ռ���ҳ</a>
	<? if($allowviewpro) { ?>&nbsp;<a href="space.php?action=viewpro&amp;uid=<?=$discuz_uid?>">������Ϣ</a><? } ?>
	</div><? if(is_array($menuarray)) { foreach($menuarray as $menu) { ?><div id="menuitem_<?=$menu?>" style="float: left; display: none;">&nbsp;&nbsp;&nbsp;<a href="space.php?<?=$discuz_uid?>/<?=$menu?>"><?=$spacelanguage[$menu]?></a></div><? } } ?><span id="menuitem_userinfo"></span><span id="menuitem_calendar"></span><span id="menuitem_myfriends"></span></div>
	<div class="control"><a href="###">���˿ռ����</a></div>
	<div class="icon"></div>
</div>

<div id="outer" class="outer">
<table class="main" border="0" cellspacing="0" id="parentTable">
<tr>
<td id="main_layout0" <? if($spacesettings['side'] == 2) { ?>style="display:none"<? } ?>><? if(is_array($layout['0'])) { foreach($layout['0'] as $module) { ?>	<DIV id="<?=$module?>" class="dragdiv">
	<table class="module" width="100%" cellpadding="0" cellspacing="0" border="0"><tr onMouseDown="Drag.dragStart(event, '<?=$modulesettings[$module]['0']?>')"><td class="header">
	<div class="title"><?=$spacelanguage[$module]?></div>
	<? if(!isset($modulesettings[$module]['2'])) { ?><div class="more"><img onClick="Drag.handler.del(<?=$module?>)" class="dragdel" src="images/spaces/close.gif" /></div><? } ?>
	</td></tr>
	<tr><td class="dragtext">
	<div><?=$spacelanguage[$module]?></div>
	</td></tr>
	</table>
	<script type="text/javascript">checkinit('<?=$module?>');</script>
	</div><? } } ?></td>

<td id="main_layout1"><? if(is_array($layout['1'])) { foreach($layout['1'] as $module) { ?>	<div id="<?=$module?>" class="dragdiv">
	<table class="module" width="100%" cellpadding="0" cellspacing="0" border="0"><tr onMouseDown="Drag.dragStart(event, '<?=$modulesettings[$module]['0']?>')"><td class="header">
	<div class="title"><?=$spacelanguage[$module]?></div>
	<? if(!isset($modulesettings[$module]['2'])) { ?><div class="more"><img onClick="Drag.handler.del(<?=$module?>)" class="dragdel" src="images/spaces/close.gif" /></div><? } ?>
	</td></tr>
	<tr><td class="dragtext">
	<div><?=$spacelanguage[$module]?></div>
	</td></tr>
	</table>
	<script type="text/javascript">checkinit('<?=$module?>');</script>
	</div><? } } ?></td>

<td id="main_layout2" align="right" <? if($spacesettings['side'] == 1) { ?>style="display:none"<? } ?>><? if(is_array($layout['2'])) { foreach($layout['2'] as $module) { ?>	<div id="<?=$module?>" class="dragdiv">
	<table class="module" width="100%" cellpadding="0" cellspacing="0" border="0"><tr onMouseDown="Drag.dragStart(event, '<?=$modulesettings[$module]['0']?>')"><td class="header">
	<div class="title"><?=$spacelanguage[$module]?></div>
	<? if(!isset($modulesettings[$module]['2'])) { ?><div class="more"><img onClick="Drag.handler.del(<?=$module?>)" class="dragdel" src="images/spaces/close.gif"></div><? } ?>
	</td></tr>
	<tr><td class="dragtext">
	<div><?=$spacelanguage[$module]?></div>
	</td></tr>
	</table>
	<script type="text/javascript">checkinit('<?=$module?>');</script>
	</div><? } } ?></td>
</tr>
</table>
</div>

<div id="footer"><div>
Powered by <a href="http://www.discuz.net" target="_blank" style="color: blue"><b>Discuz!</b></a> <?=$version?> &nbsp;&copy; 2001-2007 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>
<? if(debuginfo()) { ?>
	<br />Processed in <?=$debuginfo['time']?> second(s), <?=$debuginfo['queries']?> queries<? if($gzipcompress) { ?>, Gzip enabled<? } } updatesession(); ?></div></div>

<div id="dragClone" style="display:none">
<DIV id="[id]" class="dragDIV">
<table class="module" width="100%" cellpadding="0" cellspacing="0" border="0"><tr onMouseDown="Drag.dragStart(event,'[disable]');"><td class="header">
<div class="title">[title]</div>
<div class="more"><img onClick="Drag.handler.del([id])" class="dragDel" src="images/spaces/close.gif"></div>
</td></tr>
<tr><td class="dragtext">
<div>[title]</div>
</td></tr></table>
</DIV>
</DIV>
<script type="text/javascript">
Drag.init(Space_Memcp);
$('side_<?=$spacesettings['side']?>').checked = true;
var tmp_spaceside = <?=$spacesettings['side']?>;
var tmp_styledir = '<?=$spacesettings['style']?>';
</script>

</body>
</html><? output(); ?>