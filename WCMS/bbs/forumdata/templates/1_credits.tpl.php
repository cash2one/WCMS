<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; ���ֲ���˵��</div>

<div class="mainbox">
	<h1>���ֲ���˵��</h1>
	<table summary="���ֲ���˵��" cellspacing="0" cellpadding="0">

		<thead>
			<tr>
				<th>&nbsp;</th><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><td><?=$credit['title']?></td><? } } ?></tr>
		</thead>
		<tbody><? if(is_array($policyarray)) { foreach($policyarray as $operation => $policy) { ?><tr>
				<th>
				<? if($operation == 'post') { ?>
					��������
				<? } elseif($operation == 'forum_post') { ?>
					���淢������
				<? } elseif($operation == 'reply') { ?>
					����ظ�
				<? } elseif($operation == 'forum_reply') { ?>
					���淢��ظ�
				<? } elseif($operation == 'digest') { ?>
					���뾫��
				<? } elseif($operation == 'forum_digest') { ?>
					������뾫��
				<? } elseif($operation == 'postattach') { ?>
					������
				<? } elseif($operation == 'forum_postattach') { ?>
					���淢����
				<? } elseif($operation == 'getattach') { ?>
					���ظ���
				<? } elseif($operation == 'forum_getattach') { ?>
					�������ظ���
				<? } elseif($operation == 'pm') { ?>
					������Ϣ
				<? } elseif($operation == 'search') { ?>
					����
				<? } elseif($operation == 'promotion_visit') { ?>
					�����ƹ�
				<? } elseif($operation == 'promotion_register') { ?>
					ע���ƹ�
				<? } elseif($operation == 'tradefinished') { ?>
					�ɹ�����
				<? } elseif($operation == 'votepoll') { ?>
					����ͶƱ
				<? } elseif($operation == 'lowerlimit') { ?>
					��������
				<? } ?>
				</th><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { if(isset($view) && $operation == $view) { ?>
						<td><?=$creditsarray[$operation][$id]?></td>
					<? } else { ?>
						<td><?=$creditsarray[$operation][$id]?></td>
					<? } } } ?></tr><? } } ?></tbody>
	</table>
</div>
<div class="notice">
	<p>��������: ����������ֵ��ڴ��������õ���ֵʱ�����޷�ִ�л��ֲ������漰�ۼ�������ֵĲ���</p>
	<p>�ܻ��ּ��㹫ʽ: <?=$creditsformulaexp?></p>
</div>
<? include template('footer'); ?>
