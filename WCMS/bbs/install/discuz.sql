-- --------------------------------------------------
--
-- Discuz! SQL file for installation
-- $Id: discuz.sql 10517 2007-09-04 01:15:26Z monkey $
--
-- --------------------------------------------------

DROP TABLE IF EXISTS cdb_access;
CREATE TABLE cdb_access (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  allowview tinyint(1) NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowreply tinyint(1) NOT NULL DEFAULT '0',
  allowgetattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostattach tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_activities;
CREATE TABLE cdb_activities (
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  cost mediumint(8) unsigned NOT NULL DEFAULT '0',
  starttimefrom int(10) unsigned NOT NULL DEFAULT '0',
  starttimeto int(10) unsigned NOT NULL DEFAULT '0',
  place char(40) NOT NULL DEFAULT '',
  class char(20) NOT NULL DEFAULT '',
  gender tinyint(1) NOT NULL DEFAULT '0',
  number smallint(5) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid),
  KEY uid (uid,starttimefrom)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_activityapplies;
CREATE TABLE cdb_activityapplies (
  applyid int(10) unsigned NOT NULL AUTO_INCREMENT,
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message char(200) NOT NULL DEFAULT '',
  verified tinyint(1) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  payment mediumint(8) NOT NULL DEFAULT '0',
  contact char(200) NOT NULL,
  PRIMARY KEY (applyid),
  KEY uid (uid),
  KEY tid (tid),
  KEY dateline (tid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_adminactions;
CREATE TABLE cdb_adminactions (
  admingid smallint(6) unsigned NOT NULL DEFAULT '0',
  disabledactions text NOT NULL,
  PRIMARY KEY (admingid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_admingroups;
CREATE TABLE cdb_admingroups (
  admingid smallint(6) unsigned NOT NULL DEFAULT '0',
  alloweditpost tinyint(1) NOT NULL DEFAULT '0',
  alloweditpoll tinyint(1) NOT NULL DEFAULT '0',
  allowstickthread tinyint(1) NOT NULL DEFAULT '0',
  allowmodpost tinyint(1) NOT NULL DEFAULT '0',
  allowdelpost tinyint(1) NOT NULL DEFAULT '0',
  allowmassprune tinyint(1) NOT NULL DEFAULT '0',
  allowrefund tinyint(1) NOT NULL DEFAULT '0',
  allowcensorword tinyint(1) NOT NULL DEFAULT '0',
  allowviewip tinyint(1) NOT NULL DEFAULT '0',
  allowbanip tinyint(1) NOT NULL DEFAULT '0',
  allowedituser tinyint(1) NOT NULL DEFAULT '0',
  allowmoduser tinyint(1) NOT NULL DEFAULT '0',
  allowbanuser tinyint(1) NOT NULL DEFAULT '0',
  allowpostannounce tinyint(1) NOT NULL DEFAULT '0',
  allowviewlog tinyint(1) NOT NULL DEFAULT '0',
  allowbanpost tinyint(1) NOT NULL DEFAULT '0',
  disablepostctrl tinyint(1) NOT NULL DEFAULT '0',
  supe_allowpushthread tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (admingid)
) TYPE=MyISAM;

INSERT INTO cdb_admingroups VALUES ('1','1','1','3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO cdb_admingroups VALUES ('2','1','0','2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0');
INSERT INTO cdb_admingroups VALUES ('3','1','0','1','1','1','0','0','0','1','0','0','1','1','0','0','1','1','0');

DROP TABLE IF EXISTS cdb_adminnotes;
CREATE TABLE cdb_adminnotes (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  admin varchar(15) NOT NULL DEFAULT '',
  access tinyint(3) NOT NULL DEFAULT '0',
  adminid tinyint(3) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_adminsessions;
CREATE TABLE cdb_adminsessions (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  ip char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  errorcount tinyint(1) NOT NULL DEFAULT '0'
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_advertisements;
CREATE TABLE cdb_advertisements (
  advid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  title varchar(50) NOT NULL DEFAULT '',
  targets text NOT NULL,
  parameters text NOT NULL,
  `code` text NOT NULL,
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (advid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_announcements;
CREATE TABLE cdb_announcements (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  author varchar(15) NOT NULL DEFAULT '',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  groups text NOT NULL,
  PRIMARY KEY (id),
  KEY timespan (starttime,endtime)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_attachments;
CREATE TABLE cdb_attachments (
  aid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  pid int(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  readperm tinyint(3) unsigned NOT NULL DEFAULT '0',
  price smallint(6) unsigned NOT NULL DEFAULT '0',
  filename char(100) NOT NULL DEFAULT '',
  description char(100) NOT NULL DEFAULT '',
  filetype char(50) NOT NULL DEFAULT '',
  filesize int(10) unsigned NOT NULL DEFAULT '0',
  attachment char(100) NOT NULL DEFAULT '',
  downloads mediumint(8) NOT NULL DEFAULT '0',
  isimage tinyint(1) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  thumb tinyint(1) unsigned NOT NULL DEFAULT '0',
  remote tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (aid),
  KEY tid (tid),
  KEY pid (pid,aid),
  KEY uid (uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_attachpaymentlog;
CREATE TABLE cdb_attachpaymentlog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  aid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  amount int(10) unsigned NOT NULL DEFAULT '0',
  netamount int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (aid,uid),
  KEY uid (uid),
  KEY authorid (authorid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_attachtypes;
CREATE TABLE cdb_attachtypes (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  extension char(12) NOT NULL DEFAULT '',
  maxsize int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_banned;
CREATE TABLE cdb_banned (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  ip1 smallint(3) NOT NULL DEFAULT '0',
  ip2 smallint(3) NOT NULL DEFAULT '0',
  ip3 smallint(3) NOT NULL DEFAULT '0',
  ip4 smallint(3) NOT NULL DEFAULT '0',
  admin varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_bbcodes;
CREATE TABLE cdb_bbcodes (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  tag varchar(100) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL,
  replacement text NOT NULL,
  example varchar(255) NOT NULL DEFAULT '',
  explanation text NOT NULL,
  params tinyint(1) unsigned NOT NULL DEFAULT '1',
  prompt text NOT NULL,
  nest tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=4;

INSERT INTO cdb_bbcodes VALUES ('1','0','fly','bb_fly.gif','<marquee width=\"90%\" behavior=\"alternate\" scrollamount=\"3\">{1}</marquee>','[fly]This is sample text[/fly]','ʹ���ݺ�����������Ч������ HTML �� marquee ��ǩ��ע�⣺���Ч��ֻ�� Internet Explorer ���������Ч��','1','�����������ʾ������:','1');
INSERT INTO cdb_bbcodes VALUES ('2','0','flash','bb_flash.gif','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"550\" height=\"400\"><param name=\"allowScriptAccess\" value=\"sameDomain\"><param name=\"movie\" value=\"{1}\"><param name=\"quality\" value=\"high\"><param name=\"bgcolor\" value=\"#ffffff\"><embed src=\"{1}\" quality=\"high\" bgcolor=\"#ffffff\" width=\"550\" height=\"400\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" /></object>','Flash Movie','Ƕ�� Flash ����','1','������ Flash ������ URL:','1');
INSERT INTO cdb_bbcodes VALUES ('3','1','qq','bb_qq.gif','<a href=\"http://wpa.qq.com/msgrd?V=1&Uin={1}&amp;Site=[Discuz!]&amp;Menu=yes\" target=\"_blank\"><img src=\"http://wpa.qq.com/pa?p=1:{1}:1\" border=\"0\"></a>','[qq]688888[/qq]','��ʾ QQ ����״̬�������ͼ����Ժ�������������','1','��������ʾ����״̬ QQ ����:','1');
INSERT INTO cdb_bbcodes VALUES ('4', '0', 'sup', 'bb_sup.gif', '<sup>{1}</sup>', 'X[sup]2[/sup]', '�ϱ�', 1, '�������ϱ����֣�', '1');
INSERT INTO cdb_bbcodes VALUES ('5', '0', 'sub', 'bb_sub.gif', '<sub>{1}</sub>', 'X[sub]2[/sub]', '�±�', 1, '�������±����֣�', '1');


DROP TABLE IF EXISTS cdb_buddys;
CREATE TABLE cdb_buddys (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  buddyid mediumint(8) unsigned NOT NULL DEFAULT '0',
  grade tinyint(3) unsigned NOT NULL DEFAULT '1',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  description char(255) NOT NULL DEFAULT '',
  KEY uid (uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_caches;
CREATE TABLE cdb_caches (
  cachename varchar(32) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  dateline int(10) unsigned NOT NULL,
  expiration int(10) unsigned NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (cachename),
  KEY expiration (`type`,expiration)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_campaigns;
CREATE TABLE cdb_campaigns (
  id mediumint(8) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  fid smallint(6) unsigned NOT NULL,
  tid mediumint(8) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  begintime int(10) unsigned NOT NULL,
  starttime int(10) unsigned NOT NULL,
  endtime int(10) unsigned NOT NULL,
  expiration int(10) unsigned NOT NULL,
  nextrun int(10) unsigned NOT NULL,
  PRIMARY KEY (id,`type`),
  KEY tid (tid),
  KEY nextrun (nextrun)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_creditslog;
CREATE TABLE cdb_creditslog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fromto char(15) NOT NULL DEFAULT '',
  sendcredits tinyint(1) NOT NULL DEFAULT '0',
  receivecredits tinyint(1) NOT NULL DEFAULT '0',
  send int(10) unsigned NOT NULL DEFAULT '0',
  receive int(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  operation char(3) NOT NULL DEFAULT '',
  KEY uid (uid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_crons;
CREATE TABLE cdb_crons (
  cronid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  filename char(50) NOT NULL DEFAULT '',
  lastrun int(10) unsigned NOT NULL DEFAULT '0',
  nextrun int(10) unsigned NOT NULL DEFAULT '0',
  weekday tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (cronid),
  KEY nextrun (available,nextrun)
) TYPE=MyISAM AUTO_INCREMENT=15;

INSERT INTO cdb_crons VALUES ('1','1','system','��ս��շ�����','todayposts_daily.inc.php','1170601081','1170604800','-1','-1','0','0');
INSERT INTO cdb_crons VALUES ('2','1','system','��ձ�������ʱ��','onlinetime_monthly.inc.php','1170601081','1172678400','-1','1','0','0');
INSERT INTO cdb_crons VALUES ('3','1','system','ÿ����������','cleanup_daily.inc.php','1170601083','1170624600','-1','-1','5','30');
INSERT INTO cdb_crons VALUES ('4','1','system','����ͳ�����ʼ�ף��','birthdays_daily.inc.php','1170601084','1170604800','-1','-1','0','0');
INSERT INTO cdb_crons VALUES ('5','1','system','����ظ�֪ͨ','notify_daily.inc.php','1170601084','1170622800','-1','-1','5','00');
INSERT INTO cdb_crons VALUES ('6','1','system','ÿ�չ�������','announcements_daily.inc.php','1170601084','1170604800','-1','-1','0','0');
INSERT INTO cdb_crons VALUES ('7','1','system','��ʱ��������','threadexpiries_hourly.inc.php','1170601084','1170622800','-1','-1','5','0');
INSERT INTO cdb_crons VALUES ('8','1','system','��̳�ƹ�����','promotions_hourly.inc.php','1170601094','1170604800','-1','-1','0','00');
INSERT INTO cdb_crons VALUES ('9','1','system','ÿ����������','cleanup_monthly.inc.php','0','1170600452','-1','1','6','00');
INSERT INTO cdb_crons VALUES ('10','1','system','ÿ�� X-Space�����û�','supe_daily.inc.php','0','1170600452','-1','-1','0','0');
INSERT INTO cdb_crons VALUES ('12','1','system','�����Զ�����','magics_daily.inc.php','0','1170600452','-1','-1','0','0');
INSERT INTO cdb_crons VALUES ('13','1','system','ÿ����֤�ʴ����','secqaa_daily.inc.php','0','1170600452','-1','-1','6','0');
INSERT INTO cdb_crons VALUES ('14','1','system','ÿ�ձ�ǩ����','tags_daily.inc.php','0','1170600452','-1','-1','0','0');

DROP TABLE IF EXISTS cdb_debateposts;
CREATE TABLE cdb_debateposts (
  pid int(10) unsigned NOT NULL DEFAULT '0',
  stand tinyint(1) NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  voters mediumint(10) unsigned NOT NULL DEFAULT '0',
  voterids text NOT NULL,
  PRIMARY KEY (pid),
  KEY pid (pid,stand),
  KEY tid (tid,uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_debates;
CREATE TABLE cdb_debates (
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  affirmdebaters mediumint(8) unsigned NOT NULL DEFAULT '0',
  negadebaters mediumint(8) unsigned NOT NULL DEFAULT '0',
  affirmvotes mediumint(8) unsigned NOT NULL DEFAULT '0',
  negavotes mediumint(8) unsigned NOT NULL DEFAULT '0',
  umpire varchar(15) NOT NULL DEFAULT '',
  winner tinyint(1) NOT NULL DEFAULT '0',
  bestdebater varchar(50) NOT NULL DEFAULT '',
  affirmpoint text NOT NULL,
  negapoint text NOT NULL,
  umpirepoint text NOT NULL,
  affirmvoterids text NOT NULL,
  negavoterids text NOT NULL,
  affirmreplies mediumint(8) unsigned NOT NULL,
  negareplies mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (tid),
  KEY uid (uid,starttime)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_failedlogins;
CREATE TABLE cdb_failedlogins (
  ip char(15) NOT NULL DEFAULT '',
  count tinyint(1) unsigned NOT NULL DEFAULT '0',
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_faqs;
CREATE TABLE cdb_faqs (
  id smallint(6) NOT NULL AUTO_INCREMENT,
  fpid smallint(6) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  identifier varchar(20) NOT NULL,
  keyword varchar(50) NOT NULL,
  title varchar(50) NOT NULL,
  message text NOT NULL,
  PRIMARY KEY (id),
  KEY displayplay (displayorder)
) TYPE=MyISAM AUTO_INCREMENT=35;

INSERT INTO cdb_faqs VALUES ('1','0','1','','','�û���֪','');
INSERT INTO cdb_faqs VALUES ('2','1','1','','','�ұ���Ҫע����','��ȡ���ڹ���Ա������� Discuz! ��̳���û���Ȩ��ѡ��������п��ܱ�����ע�����ʽ�û�������������ӡ���Ȼ����ͨ������£�������Ӧ������ʽ�û����ܷ������ͻظ��������ӡ��� <a href="register.php" target="_blank">�������</a> ���ע���Ϊ���ǵ����û���\r\n<br /><br />ǿ�ҽ�����ע�ᣬ������õ��ܶ����ο������޷�ʵ�ֵĹ��ܡ�');
INSERT INTO cdb_faqs VALUES ('3','1','2','login','��¼����','����ε�¼��̳��','������Ѿ�ע���Ϊ����̳�Ļ�Ա����ô��ֻҪͨ������ҳ�����ϵ�<a href="logging.php?action=login" target="_blank">��¼</a>�������½������д��ȷ���û��������루��������а�ȫ���ʣ���ѡ����ȷ�İ�ȫ���ʲ������Ӧ�Ĵ𰸣���������ύ��������ɵ�½�������δע���������<br /><br />\r\n�����Ҫ���ֵ�¼����ѡ����Ӧ�� Cookie ʱ�䣬�ڴ�ʱ�䷶Χ�������Բ�����������������ϴεĵ�¼״̬��');
INSERT INTO cdb_faqs VALUES ('4','1','3','','','�����ҵĵ�¼���룬��ô�죿','�����������û���¼�����룬������ͨ��ע��ʱ��д�ĵ���������������һ���µ����롣�����¼ҳ���е� <a href="member.php?action=lostpasswd" target="_blank">ȡ������</a>������Ҫ����д���ĸ�����Ϣ��ϵͳ���Զ���������������ʼ�����ע��ʱ��д�� Email �����С�������� Email ��ʧЧ���޷��յ��ż���������̳����Ա��ϵ��');
INSERT INTO cdb_faqs VALUES ('5','0','2','','','������ز���','');
INSERT INTO cdb_faqs VALUES ('6','0','3','','','�������ܲ���','');
INSERT INTO cdb_faqs VALUES ('7','0','4','','','�����������','');
INSERT INTO cdb_faqs VALUES ('8','1','4','','','�����ʹ�ø��Ի�ͷ��','��<a href="memcp.php" target="_blank">�������</a>�еġ��༭�������ϡ�����һ����ͷ�񡱵�ѡ�����ʹ����̳�Դ���ͷ������Զ����ͷ��');
INSERT INTO cdb_faqs VALUES ('9','1','5','','','������޸ĵ�¼����','��<a href="memcp.php" target="_blank">�������</a>�еġ��༭�������ϡ�����д��ԭ���롱���������롱����ȷ�������롱��������ύ���������޸ġ�');
INSERT INTO cdb_faqs VALUES ('10','1','6','','','�����ʹ�ø��Ի�ǩ�����ǳ�','��<a href="memcp.php" target="_blank">�������</a>�еġ��༭�������ϡ�����һ�����ǳơ��͡�����ǩ������ѡ������ڴ����á�');
INSERT INTO cdb_faqs VALUES ('11','5','1','','','����η���������','����̳����У��㡰�������������Ȩ�ޣ������Կ����С�ͶƱ�����ͣ�������ס���������ɽ��빦����ȫ�ķ������档\r\n<br /><br />ע�⣺һ����̳������Ϊ�߼�����û�����ܷ����������������⡣�緢����ͨ���⣬ֱ�ӵ��������������Ȼ��Ҳ����ʹ�ð������ġ����ٷ�������������(�����ѡ���)��һ����̳������Ϊ��Ҫ��¼����ܷ�����');
INSERT INTO cdb_faqs VALUES ('12','5','2','','','����η����ظ�','�ظ��з����֣���һ���������·��Ŀ��ٻظ��� �ڶ���������ظ���¥�������·����ظ����� �����������ظ�ҳ�棬�����ҳ���������Աߵġ��ظ�����');
INSERT INTO cdb_faqs VALUES ('13','5','3','','','����α༭�Լ�������','�����ӵ����½ǣ��б༭���ظ��������ѡ�����༭���Ϳ��Զ����ӽ��б༭��');
INSERT INTO cdb_faqs VALUES ('14','5','4','','','����γ��۹�������','<li>�������⣺\r\n�������뷢���������������ڵ��û����з���������Ȩ�ޣ��ڡ��ۼ�(��Ǯ)��������д����ļ۸����������û��ڲ鿴������ӵ�ʱ�����Ҫ���뽻�ѵĹ��̲ſ��Բ鿴���ӡ�</li>\r\n<li>�������⣺\r\n�����׼����������ӣ������ӵ������Ϣ��������[�鿴�����¼] [��������] [������һҳ] \r\n�����ӣ�������������⡱���й���</li>');
INSERT INTO cdb_faqs VALUES ('15','5','5','','','����γ��۹��򸽼�','<li>�ϴ�����һ���и��ۼ۵������������ۼ۸񼴿�ʵ����Ҫ֧���ſ����ظ����Ĺ��ܡ�</li>\r\n<li>���������[���򸽼�]��ť�����������������ӻ���ת����������ҳ�棬ȷ�ϸ���������Ϣ����ύ��ť�����ɵõ�����������Ȩ�ޡ�ֻ�蹺��һ�Σ����иø�������Զ����Ȩ�ޡ�</li>');
INSERT INTO cdb_faqs VALUES ('16','5','6','','','������ϴ�����','<li>�����������ʱ���ϴ�����������Ϊ��д�����ӱ�������ݺ���ϴ������ҷ��������Ȼ���ڱ���ѡ��Ҫ�ϴ������ľ����ļ�����������������⡣</li>\r\n<li>�����ظ���ʱ���ϴ�����������Ϊ��д��ظ�¥�������ݣ�Ȼ����ϴ������ҷ���������ҵ���Ҫ�ϴ��ĸ�������������ظ���</li>');
INSERT INTO cdb_faqs VALUES ('17','5','7','','','�����ʵ�ַ���ʱͼ�Ļ���Ч��','<li>�����������ʱ�����ϴ��������ġ�[����]�����ӰѸ�����ǲ��뵽�������ʵ���λ�ü��ɡ�</li>');
INSERT INTO cdb_faqs VALUES ('18','5','8','discuzcode','Discuz!����','�����ʹ��Discuz!����','<table width="99%" cellpadding="2" cellspacing="2">\r\n  <tr>\r\n    <th width="50%">Discuz!����</th>\r\n    <th width="402">Ч��</th>\r\n  </tr>\r\n  <tr>\r\n    <td>[b]�������� Abc[/b]</td>\r\n    <td><strong>�������� Abc</strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[i]б������ Abc[/i]</td>\r\n    <td><em>б������ Abc</em></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[u]�»������� Abc[/u]</td>\r\n    <td><u>�»������� Abc</u></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[color=red]����ɫ[/color]</td>\r\n    <td><font color="red">����ɫ</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[size=3]���ִ�СΪ 3[/size] </td>\r\n    <td><font size="3">���ִ�СΪ 3</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[font=����]����Ϊ����[/font] </td>\r\n    <td><font face="����">����Ϊ����</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[align=Center]���ݾ���[/align] </td>\r\n    <td><div align="center">���ݾ���</div></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[url]http://www.comsenz.com[/url]</td>\r\n    <td><a href="http://www.comsenz.com" target="_blank">http://www.comsenz.com</a>���������ӣ�</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[url=http://www.Discuz.net]Discuz! ��̳[/url]</td>\r\n    <td><a href="http://www.Discuz.net" target="_blank">Discuz! ��̳</a>���������ӣ�</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[email]myname@mydomain.com[/email]</td>\r\n    <td><a href="mailto:myname@mydomain.com">myname@mydomain.com</a>��E-mail���ӣ�</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[email=support@discuz.net]Discuz! ����֧��[/email]</td>\r\n    <td><a href="mailto:support@discuz.net">Discuz! ����֧�֣�E-mail���ӣ�</a></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[quote]Discuz! Board ���ɿ�ʢ���루�������Ƽ����޹�˾��������̳����[/quote] </td>\r\n    <td><div style="font-size: 12px"><br /><br /><div class="quote"><h5>����:</h5><blockquote>ԭ���� <i>admin</i> �� 2006-12-26 08:45 ����<br />Discuz! Board ���ɿ�ʢ���루�������Ƽ����޹�˾��������̳����</blockquote></div></td>\r\n  </tr>\r\n   <tr>\r\n    <td>[code]Discuz! Board ���ɿ�ʢ���루�������Ƽ����޹�˾��������̳����[/code] </td>\r\n    <td><div style="font-size: 12px"><br /><br /><div class="blockcode"><h5>����:</h5><code id="code0">Discuz! Board ���ɿ�ʢ���루�������Ƽ����޹�˾��������̳����</code></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[hide]�������� Abc[/hide]</td>\r\n    <td>Ч��:ֻ�е�����߻ظ�����ʱ������ʾ���е����ݣ�������ʾΪ��<b>**** ������Ϣ �����������ʾ *****</b>��</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[hide=20]�������� Abc[/hide]</td>\r\n    <td>Ч��:ֻ�е�����߻��ָ��� 20 ��ʱ������ʾ���е����ݣ�������ʾΪ��<b>**** ������Ϣ ���ָ��� 20 �������ʾ ****</b>��</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[list][*]�б��� #1[*]�б��� #2[*]�б��� #3[/list]</td>\r\n    <td><ul>\r\n      <li>�б��� ��1</li>\r\n      <li>�б��� ��2</li>\r\n      <li>�б��� ��3 </li>\r\n    </ul></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[img]http://www.discuz.net/images/default/logo.gif[/img] </td>\r\n    <td>��������ʾΪ��<img src="http://www.discuz.net/images/default/logo.gif" /></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[img=88,31]http://www.discuz.net/images/logo.gif[/img] </td>\r\n    <td>��������ʾΪ��<img src="http://www.discuz.net/images/logo.gif" /></td>\r\n  </tr> <tr>\r\n    <td>[media=400,300,1]��ý�� URL[/media]</td>\r\n    <td>������Ƕ���ý�壬�� 400 �� 300 �Զ�����</td>\r\n  </tr>\r\n <tr>\r\n    <td>[fly]���е�Ч��[/fly]</td>\r\n    <td><marquee scrollamount="3" behavior="alternate" width="90%">���е�Ч��</marquee></td>\r\n  </tr>\r\n  <tr>\r\n    <td>[flash]Flash��ҳ��ַ [/flash] </td>\r\n    <td>������Ƕ�� Flash ����</td>\r\n  </tr>\r\n  <tr>\r\n    <td>[qq]123456789[/qq]</td>\r\n    <td>����������ʾ QQ ����״̬�������ͼ����Ժ�������������</td>\r\n  </tr>\r\n  <tr>\r\n    <td>X[sup]2[/sup]</td>\r\n    <td>X<sup>2</sup></td>\r\n  </tr>\r\n  <tr>\r\n    <td>X[sub]2[/sub]</td>\r\n    <td>X<sub>2</sub></td>\r\n  </tr>\r\n  \r\n</table>');
INSERT INTO cdb_faqs VALUES ('19','6','1','','','�����ʹ�ö���Ϣ����','����¼�󣬵���������ϵĶ���Ϣ��ť�����ɽ������Ϣ������\r\n���[���Ͷ���Ϣ]��ť����"���͵�"�����������˵��û�������д���������ݣ����ύ(�� Ctrl+Enter ����)���ɷ�������Ϣ��\r\n<br /><br />���Ҫ���浽�����䣬�����ύǰ��ѡ"���浽��������"ǰ�ĸ�ѡ��\r\n<ul>\r\n<li>����ռ���ɴ������ռ���鿴�յ��Ķ���Ϣ��</li>\r\n<li>���������ɲ鿴�����ڷ�������Ķ���Ϣ�� </li>\r\n<li>����ѷ������鿴�Է��Ƿ��Ѿ��Ķ����Ķ���Ϣ�� </li>\r\n<li>�����������Ϣ�Ϳ�ͨ���ؼ��֣������ˣ������ˣ�������Χ���������͵�һϵ�������趨���ҵ�����Ҫ���ҵĶ���Ϣ�� </li>\r\n<li>�����������Ϣ���Խ��Լ��Ķ���Ϣ����htm�ļ��������Լ��ĵ���� </li>\r\n<li>��������б������趨������Ա������Щ�����ӵĺ����û��������Ͷ���Ϣʱ��������ա�</li>\r\n</ul>');
INSERT INTO cdb_faqs VALUES ('20','6','2','','','����������Ⱥ������Ϣ','��¼��̳�󣬵������Ϣ��Ȼ��㷢�Ͷ���Ϣ������к��ѵĻ�������Ⱥ��������ȫѡ�����Ը����еĺ���Ⱥ������Ϣ��');
INSERT INTO cdb_faqs VALUES ('21','6','3','','','����β鿴��̳��Ա����','�������������Ļ�Ա��Ȼ����ʾ���Ǵ���̳�Ļ�Ա���ݡ�ע����Ҫ��̳����Ա����������鿴��Ա���ϲſɿ�����');
INSERT INTO cdb_faqs VALUES ('22','6','4','','','�����ʹ������','�����������������������������Ĺؼ��ֲ�ѡ��һ����Χ���Ϳ��Լ���������Ȩ�޷�����̳�е���ص����ӡ�');
INSERT INTO cdb_faqs VALUES ('23','6','5','','','�����ʹ�á��ҵġ�����','<li>��Ա��������<a href="logging.php?action=login" target="_blank">��¼</a>��û���û���������<a href="register.php" target="_blank">ע��</a>��</li>\r\n<li>��¼֮������̳�����Ϸ������һ�����ҵġ��ĳ������ӣ�����������֮��Ϳɽ��뵽�й���������Ϣ��</li>');
INSERT INTO cdb_faqs VALUES ('24','7','1','','','����������Ա��������','��һ�����ӣ������ӵ����½ǿ��Կ��������༭���������á��������桱�������֡������ظ����ȵȼ�����ť��������еġ����桱��ť���뱨��ҳ�棬��д�á��ҵ�����������������桱��ť������ɱ���ĳ�����ӵĲ�����');
INSERT INTO cdb_faqs VALUES ('25','7','2','','','����Ρ���ӡ�������Ƽ����������ġ������ղء�����','�������һ������ʱ�����������Ͻǿ��Կ���������ӡ�������Ƽ����������ġ������ղء���������Ӧ���������Ӽ��������صĲ�����');
INSERT INTO cdb_faqs VALUES ('26','7','3','','','�����������̳����','������̳������3�ּ򵥵ķ�����\r\n<ul>\r\n<li>����������ӵ�ʱ����Ե��������ʱ�䡱�Ҳ�ġ���Ϊ���ѡ�������̳���ѡ�</li>\r\n<li>�������ĳ�û��ĸ�������ʱ�����Ե��ͷ���·��ġ���Ϊ���ѡ�������̳���ѡ�</li>\r\n<li>��Ҳ�����ڿ�������еĺ����б�����������̳���ѡ�</li>\r\n<ul>');
INSERT INTO cdb_faqs VALUES ('27','7','4','','','�����ʹ��RSS����','����̳����ҳ�ͽ������ҳ������ϽǾͻ����һ��rss���ĵ�Сͼ��<img src="images/common/xml.gif" border="0">�������֮�󽫳��ֱ�վ���rss��ַ������Խ���rss��ַ���뵽���rss�Ķ����н��ж��ġ�');
INSERT INTO cdb_faqs VALUES ('28','7','5','','','��������Cookies','cookie���������������ϵͳ�ڵģ�����̳�����½��ṩ��"��� Cookies"�Ĺ��ܣ�����󼴿ɰ������ϵͳ�ڴ洢��Cookies�� <br /><br />\r\n���½���3�ֳ����������Cookies�������(ע���˷���Ϊ���ȫ����Cookies,�����ʹ��)\r\n<ul>\r\n<li>Internet Explorer: ���ߣ�ѡ��ڵ�Internetѡ�������ѡ��ڣ�IE6ֱ�ӿ��Կ���ɾ��Cookies�İ�ť������ɣ�IE7Ϊ��� ����ʷ��¼��ѡ���ڵ�ɾ������������Cookies������Maxthon,��ѶTT��IE���������һ�����á� </li>\r\n<li>FireFox:���ߡ�ѡ�����˽��Cookies����ʾCookie����Զ�Cookie���ж�Ӧ��ɾ�������� </li>\r\n<li>Opera:���ߡ���ѡ����߼���Cookies������Cookies���ɶ�Cookies����ɾ���Ĳ�����</li>\r\n</ul>');
INSERT INTO cdb_faqs VALUES ('29','7','6','','','�������ϵ����Ա','������ͨ����̳�ײ����½ǵġ���ϵ���ǡ����ӿ��ٵķ����ʼ���������ϵ��Ҳ����ͨ�������Ŷ��е��û����Ϸ��Ͷ���Ϣ�����ǡ�');
INSERT INTO cdb_faqs VALUES ('30','7','7','','','����ο�ͨ���˿ռ�','�������Ȩ�޿�ͨ���ҵĸ��˿ռ䡱�����û���¼��̳�Ժ�����̳��ҳ���û������ҷ������ͨ�ҵĸ��˿ռ䣬������˿ռ������ҳ�档');
INSERT INTO cdb_faqs VALUES ('31','7','8','','','����ν��Լ������������˿ռ�','�������Ȩ�޿�ͨ���ҵĸ��˿ռ䡱�����������������Ϸ������������˿ռ䡱���������������Լ��ظ�������뵽���ռ����־�');
INSERT INTO cdb_faqs VALUES ('32','5','9','smilies','����','�����ʹ�ñ������','������һЩ���ַ���ʾ�ı�����ţ�����򿪱��鹦�ܣ�Discuz! ���һЩ����ת����Сͼ����ʾ�������У������������ˡ�Ŀǰ֧��������Щ���飺<br /><br />\r\n<table cellspacing="0" cellpadding="4" width="30%" align="center">\r\n<tr><th width="25%" align="center">�������</td>\r\n<th width="75%" align="center">��Ӧͼ��</td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:)</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/smile.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:(</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/sad.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:D</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/biggrin.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:\\\'(</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/cry.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:@</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/huffy.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:o</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/shocked.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:P</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/tongue.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:$</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/shy.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">;P</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/titter.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:L</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/sweat.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:Q</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/mad.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:lol</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/lol.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:hug:</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/hug.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:victory:</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/victory.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:time:</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/time.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:kiss:</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/kiss.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:handshake</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/handshake.gif" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td width="25%" align="center">:call:</td>\r\n<td width="75%" align="center"><img src="images/smilies/default/call.gif" alt="" /></td>\r\n</tr>\r\n</table>\r\n</div></div>\r\n<br />');
INSERT INTO cdb_faqs VALUES ('33','0','5','','','��̳�߼�����ʹ��','');
INSERT INTO cdb_faqs VALUES ('34','33','0','forwardmessagelist','','��̳������ת�ؼ����б�','Discuz! ֧���Զ��������תҳ�棬��ĳЩ������ɺ󣬿��Բ���ʾ��ʾ��Ϣ��ֱ����ת���µ�ҳ�棬�Ӷ������û�������һ������������ȴ��� ��ʵ��ʹ�õ��У���������Ҫ���ѹؼ������ӵ�������ת��������(��̨ -- �������� --  ��������ʾ��ʽ -- [<a href="admincp.php?action=settings&do=styles&frames=yes" target="_blank">��ʾ��Ϣ��ת����</a> ])����ĳЩ��Ϣ����ʾ��ʵ�ֿ�����ת�������� Discuz! ���е�һЩ������Ϣ�Ĺؼ���:\r\n</br></br>\r\n\r\n<table width="99%" cellpadding="2" cellspacing="2">\r\n  <tr>\r\n    <td width="50%">�ؼ���</td>\r\n    <td width="50%">��ʾ��Ϣҳ���������</td>\r\n  </tr>\r\n  <tr>\r\n    <td>login_succeed</td>\r\n    <td>��¼�ɹ�</td>\r\n  </tr>\r\n  <tr>\r\n    <td>logout_succeed</td>\r\n    <td>�˳���¼�ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>thread_poll_succeed</td>\r\n    <td>ͶƱ�ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>thread_rate_succeed</td>\r\n    <td>���ֳɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>register_succeed</td>\r\n    <td>ע��ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>usergroups_join_succeed</td>\r\n    <td>������չ��ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td height="22">usergroups_exit_succeed</td>\r\n    <td>�˳���չ��ɹ�</td>\r\n  </tr>\r\n  <tr>\r\n    <td>usergroups_update_succeed</td>\r\n    <td>������չ��ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>buddy_update_succeed</td>\r\n    <td>���Ѹ��³ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_edit_succeed</td>\r\n    <td>�༭���ӳɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_edit_delete_succeed</td>\r\n    <td>ɾ�����ӳɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_reply_succeed</td>\r\n    <td>�ظ��ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_newthread_succeed</td>\r\n    <td>����������ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_reply_blog_succeed</td>\r\n    <td>�ļ����۷����ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>post_newthread_blog_succeed</td>\r\n    <td>blog �����ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>profile_avatar_succeed</td>\r\n    <td>ͷ�����óɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>profile_succeed</td>\r\n    <td>�������ϸ��³ɹ�</td>\r\n  </tr>\r\n    <tr>\r\n    <td>pm_send_succeed</td>\r\n    <td>����Ϣ���ͳɹ�</td>\r\n  </tr>\r\n  </tr>\r\n    <tr>\r\n    <td>pm_delete_succeed</td>\r\n    <td>����Ϣɾ���ɹ�</td>\r\n  </tr>\r\n  </tr>\r\n    <tr>\r\n    <td>pm_ignore_succeed</td>\r\n    <td>����Ϣ�����б�����</td>\r\n  </tr>\r\n    <tr>\r\n    <td>admin_succeed</td>\r\n    <td>���������ɹ���ע�⣺���ô˹ؼ��ֺ����й���������϶���ֱ����ת��</td>\r\n  </tr>\r\n    <tr>\r\n    <td>admin_succeed_next&nbsp;</td>\r\n    <td>�����ɹ�������ת����һ����������</td>\r\n  </tr> \r\n    <tr>\r\n    <td>search_redirect</td>\r\n    <td>������ɣ�������������б�</td>\r\n  </tr>\r\n</table>');

DROP TABLE IF EXISTS cdb_favorites;
CREATE TABLE cdb_favorites (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_forumfields;
CREATE TABLE cdb_forumfields (
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  description text NOT NULL,
  `password` varchar(12) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL DEFAULT '',
  postcredits varchar(255) NOT NULL DEFAULT '',
  replycredits varchar(255) NOT NULL DEFAULT '',
  getattachcredits varchar(255) NOT NULL DEFAULT '',
  postattachcredits varchar(255) NOT NULL DEFAULT '',
  digestcredits varchar(255) NOT NULL DEFAULT '',
  redirect varchar(255) NOT NULL DEFAULT '',
  attachextensions varchar(255) NOT NULL DEFAULT '',
  formulaperm text NOT NULL,
  moderators text NOT NULL,
  rules text NOT NULL,
  threadtypes text NOT NULL,
  viewperm text NOT NULL,
  postperm text NOT NULL,
  replyperm text NOT NULL,
  getattachperm text NOT NULL,
  postattachperm text NOT NULL,
  keywords text NOT NULL,
  supe_pushsetting text NOT NULL,
  modrecommend text NOT NULL,
  tradetypes text NOT NULL,
  typemodels mediumtext NOT NULL,
  PRIMARY KEY (fid)
) TYPE=MyISAM;

INSERT INTO cdb_forumfields VALUES ('1','','','','','','','','','','','','','','','','','','','','','','','','');
INSERT INTO cdb_forumfields VALUES ('2','','','','','','','','','','','','','','','','','','','','','','','','');

DROP TABLE IF EXISTS cdb_forumlinks;
CREATE TABLE cdb_forumlinks (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  url varchar(100) NOT NULL DEFAULT '',
  description mediumtext NOT NULL,
  logo varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=2;

INSERT INTO cdb_forumlinks VALUES ('1','0','Discuz! �ٷ���̳','http://www.discuz.com','�ṩ���� Discuz! ��Ʒ���š����������뼼������','images/logo.gif');

DROP TABLE IF EXISTS cdb_forumrecommend;
CREATE TABLE cdb_forumrecommend (
  fid smallint(6) unsigned NOT NULL,
  tid mediumint(8) unsigned NOT NULL,
  displayorder tinyint(1) NOT NULL,
  `subject` char(80) NOT NULL,
  author char(15) NOT NULL,
  authorid mediumint(8) NOT NULL,
  moderatorid mediumint(8) NOT NULL,
  expiration int(10) unsigned NOT NULL,
  PRIMARY KEY (tid),
  KEY displayorder (fid,displayorder)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_forums;
CREATE TABLE cdb_forums (
  fid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  fup smallint(6) unsigned NOT NULL DEFAULT '0',
  `type` enum('group','forum','sub') NOT NULL DEFAULT 'forum',
  `name` char(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  styleid smallint(6) unsigned NOT NULL DEFAULT '0',
  threads mediumint(8) unsigned NOT NULL DEFAULT '0',
  posts mediumint(8) unsigned NOT NULL DEFAULT '0',
  todayposts mediumint(8) unsigned NOT NULL DEFAULT '0',
  lastpost char(110) NOT NULL DEFAULT '',
  allowsmilies tinyint(1) NOT NULL DEFAULT '0',
  allowhtml tinyint(1) NOT NULL DEFAULT '0',
  allowbbcode tinyint(1) NOT NULL DEFAULT '0',
  allowimgcode tinyint(1) NOT NULL DEFAULT '0',
  allowmediacode tinyint(1) NOT NULL DEFAULT '0',
  allowanonymous tinyint(1) NOT NULL DEFAULT '0',
  allowshare tinyint(1) NOT NULL DEFAULT '0',
  allowpostspecial smallint(6) unsigned NOT NULL DEFAULT '0',
  allowspecialonly tinyint(1) unsigned NOT NULL DEFAULT '0',
  alloweditrules tinyint(1) NOT NULL DEFAULT '0',
  recyclebin tinyint(1) NOT NULL DEFAULT '0',
  modnewposts tinyint(1) NOT NULL DEFAULT '0',
  jammer tinyint(1) NOT NULL DEFAULT '0',
  disablewatermark tinyint(1) NOT NULL DEFAULT '0',
  inheritedmod tinyint(1) NOT NULL DEFAULT '0',
  autoclose smallint(6) NOT NULL DEFAULT '0',
  forumcolumns tinyint(3) unsigned NOT NULL DEFAULT '0',
  threadcaches tinyint(1) NOT NULL DEFAULT '0',
  allowpaytoauthor tinyint(1) unsigned NOT NULL DEFAULT '1',
  alloweditpost tinyint(1) unsigned NOT NULL DEFAULT '1',
  `simple` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (fid),
  KEY forum (`status`,`type`,displayorder),
  KEY fup (fup)
) TYPE=MyISAM AUTO_INCREMENT=3;

INSERT INTO cdb_forums VALUES ('1','0','group','Discuz!','1','0','0','0','0','0','','0','0','1','1','1','0','1','63','0','0','0','0','0','0','0','0','0','0','1','1','0');
INSERT INTO cdb_forums VALUES ('2','1','forum','Ĭ�ϰ��','1','0','0','0','0','0','','1','0','1','1','1','0','1','63','0','0','0','0','0','0','0','0','0','0','1','1','0');

DROP TABLE IF EXISTS cdb_imagetypes;
CREATE TABLE cdb_imagetypes (
  typeid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `type` enum('smiley','icon','avatar') NOT NULL DEFAULT 'smiley',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  `directory` char(100) NOT NULL,
  PRIMARY KEY (typeid)
) TYPE=MyISAM;

INSERT INTO cdb_imagetypes VALUES ('1','Ĭ�ϱ���','smiley','1','default');


DROP TABLE IF EXISTS cdb_invites;
CREATE TABLE cdb_invites (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  inviteip char(15) NOT NULL,
  invitecode char(16) NOT NULL,
  reguid mediumint(8) unsigned NOT NULL DEFAULT '0',
  regdateline int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  KEY uid (uid,`status`),
  KEY invitecode (invitecode)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_itempool;
CREATE TABLE cdb_itempool (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL,
  question text NOT NULL,
  answer varchar(50) NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_magiclog;
CREATE TABLE cdb_magiclog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  magicid smallint(6) unsigned NOT NULL DEFAULT '0',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  amount smallint(6) unsigned NOT NULL DEFAULT '0',
  price mediumint(8) unsigned NOT NULL DEFAULT '0',
  targettid mediumint(8) unsigned NOT NULL DEFAULT '0',
  targetpid int(10) unsigned NOT NULL DEFAULT '0',
  targetuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,dateline),
  KEY targetuid (targetuid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_magicmarket;
CREATE TABLE cdb_magicmarket (
  mid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  magicid smallint(6) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL,
  price mediumint(8) unsigned NOT NULL DEFAULT '0',
  num smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (mid),
  KEY num (magicid,num),
  KEY price (magicid,price),
  KEY uid (uid)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_magics;
CREATE TABLE cdb_magics (
  magicid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  identifier varchar(40) NOT NULL,
  description varchar(255) NOT NULL,
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  price mediumint(8) unsigned NOT NULL DEFAULT '0',
  num smallint(6) unsigned NOT NULL DEFAULT '0',
  salevolume smallint(6) unsigned NOT NULL DEFAULT '0',
  supplytype tinyint(1) NOT NULL DEFAULT '0',
  supplynum smallint(6) unsigned NOT NULL DEFAULT '0',
  weight tinyint(3) unsigned NOT NULL DEFAULT '1',
  filename varchar(50) NOT NULL,
  magicperm text NOT NULL,
  PRIMARY KEY (magicid),
  UNIQUE KEY identifier (identifier),
  KEY displayorder (available,displayorder)
) TYPE=MyISAM AUTO_INCREMENT=13;

INSERT INTO cdb_magics VALUES ('1','1','1','��ɫ��','CCK','���Ա任�������ɫ,������24Сʱ','0','10','999','0','0','0','20','magic_color.inc.php','');
INSERT INTO cdb_magics VALUES ('2','1','3','��Ǯ��','MOK','����������һЩ���','0','10','999','0','0','0','30','magic_money.inc.php','');
INSERT INTO cdb_magics VALUES ('3','1','1','IP��','SEK','���Բ鿴�������ߵ�IP','0','15','999','0','0','0','30','magic_see.inc.php','');
INSERT INTO cdb_magics VALUES ('4','1','1','������','UPK','��������ĳ������','0','10','999','0','0','0','30','magic_up.inc.php','');
INSERT INTO cdb_magics VALUES ('5','1','1','�ö���','TOK','���Խ������ö�24Сʱ','0','20','999','0','0','0','40','magic_top.inc.php','');
INSERT INTO cdb_magics VALUES ('6','1','1','����','REK','����ɾ���Լ�������','0','10','999','0','0','0','30','magic_del.inc.php','');
INSERT INTO cdb_magics VALUES ('7','1','2','���п�','RTK','�鿴ĳ���û��Ƿ�����','0','15','999','0','0','0','30','magic_reporter.inc.php','');
INSERT INTO cdb_magics VALUES ('8','1','1','��Ĭ��','CLK','24Сʱ�ڲ��ܻظ�','0','15','999','0','0','0','30','magic_close.inc.php','');
INSERT INTO cdb_magics VALUES ('9','1','1','������','OPK','ʹ���ӿ��Իظ�','0','15','999','0','0','0','30','magic_open.inc.php','');
INSERT INTO cdb_magics VALUES ('10','1','1','������','YSK','���Խ��Լ�����������','0','20','999','0','0','0','30','magic_hidden.inc.php','');
INSERT INTO cdb_magics VALUES ('11','1','1','�ָ���','CBK','�������ָ�Ϊ������ʾ���û���,�����ս���','0','15','999','0','0','0','20','magic_renew.inc.php','');
INSERT INTO cdb_magics VALUES ('12','1','1','�ƶ���','MVK','�ɽ����ѵ������ƶ����������棨�����������޶�������⣩','0','50','989','0','0','0','50','magic_move.inc.php','');

DROP TABLE IF EXISTS cdb_medals;
CREATE TABLE cdb_medals (
  medalid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  available tinyint(1) NOT NULL DEFAULT '0',
  image varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (medalid)
) TYPE=MyISAM AUTO_INCREMENT=11;

INSERT INTO cdb_medals VALUES ('1','Medal No.1','0','medal1.gif');
INSERT INTO cdb_medals VALUES ('2','Medal No.2','0','medal2.gif');
INSERT INTO cdb_medals VALUES ('3','Medal No.3','0','medal3.gif');
INSERT INTO cdb_medals VALUES ('4','Medal No.4','0','medal4.gif');
INSERT INTO cdb_medals VALUES ('5','Medal No.5','0','medal5.gif');
INSERT INTO cdb_medals VALUES ('6','Medal No.6','0','medal6.gif');
INSERT INTO cdb_medals VALUES ('7','Medal No.7','0','medal7.gif');
INSERT INTO cdb_medals VALUES ('8','Medal No.8','0','medal8.gif');
INSERT INTO cdb_medals VALUES ('9','Medal No.9','0','medal9.gif');
INSERT INTO cdb_medals VALUES ('10','Medal No.10','0','medal10.gif');

DROP TABLE IF EXISTS cdb_memberfields;
CREATE TABLE cdb_memberfields (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  nickname varchar(30) NOT NULL DEFAULT '',
  site varchar(75) NOT NULL DEFAULT '',
  alipay varchar(50) NOT NULL DEFAULT '',
  icq varchar(12) NOT NULL DEFAULT '',
  qq varchar(12) NOT NULL DEFAULT '',
  yahoo varchar(40) NOT NULL DEFAULT '',
  msn varchar(40) NOT NULL DEFAULT '',
  taobao varchar(40) NOT NULL DEFAULT '',
  location varchar(30) NOT NULL DEFAULT '',
  customstatus varchar(30) NOT NULL DEFAULT '',
  medals varchar(255) NOT NULL DEFAULT '',
  avatar varchar(255) NOT NULL DEFAULT '',
  avatarwidth tinyint(3) unsigned NOT NULL DEFAULT '0',
  avatarheight tinyint(3) unsigned NOT NULL DEFAULT '0',
  bio text NOT NULL,
  sightml text NOT NULL,
  ignorepm text NOT NULL,
  groupterms text NOT NULL,
  authstr varchar(20) NOT NULL DEFAULT '',
  spacename varchar(40) NOT NULL,
  buyercredit smallint(6) NOT NULL DEFAULT '0',
  sellercredit smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

INSERT INTO cdb_memberfields VALUES ('1','','','','','','','','','','','','','0','0','','','','','','','0','0');

DROP TABLE IF EXISTS cdb_membermagics;
CREATE TABLE cdb_membermagics (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  magicid smallint(6) unsigned NOT NULL DEFAULT '0',
  num smallint(6) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_members;
CREATE TABLE cdb_members (
  uid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  username char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  secques char(8) NOT NULL DEFAULT '',
  gender tinyint(1) NOT NULL DEFAULT '0',
  adminid tinyint(1) NOT NULL DEFAULT '0',
  groupid smallint(6) unsigned NOT NULL DEFAULT '0',
  groupexpiry int(10) unsigned NOT NULL DEFAULT '0',
  extgroupids char(20) NOT NULL DEFAULT '',
  regip char(15) NOT NULL DEFAULT '',
  regdate int(10) unsigned NOT NULL DEFAULT '0',
  lastip char(15) NOT NULL DEFAULT '',
  lastvisit int(10) unsigned NOT NULL DEFAULT '0',
  lastactivity int(10) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  posts mediumint(8) unsigned NOT NULL DEFAULT '0',
  digestposts smallint(6) unsigned NOT NULL DEFAULT '0',
  oltime smallint(6) unsigned NOT NULL DEFAULT '0',
  pageviews mediumint(8) unsigned NOT NULL DEFAULT '0',
  credits int(10) NOT NULL DEFAULT '0',
  extcredits1 int(10) NOT NULL DEFAULT '0',
  extcredits2 int(10) NOT NULL DEFAULT '0',
  extcredits3 int(10) NOT NULL DEFAULT '0',
  extcredits4 int(10) NOT NULL DEFAULT '0',
  extcredits5 int(10) NOT NULL DEFAULT '0',
  extcredits6 int(10) NOT NULL DEFAULT '0',
  extcredits7 int(10) NOT NULL DEFAULT '0',
  extcredits8 int(10) NOT NULL DEFAULT '0',
  email char(40) NOT NULL DEFAULT '',
  bday date NOT NULL DEFAULT '0000-00-00',
  sigstatus tinyint(1) NOT NULL DEFAULT '0',
  tpp tinyint(3) unsigned NOT NULL DEFAULT '0',
  ppp tinyint(3) unsigned NOT NULL DEFAULT '0',
  styleid smallint(6) unsigned NOT NULL DEFAULT '0',
  dateformat tinyint(1) NOT NULL DEFAULT '0',
  timeformat tinyint(1) NOT NULL DEFAULT '0',
  pmsound tinyint(1) NOT NULL DEFAULT '0',
  showemail tinyint(1) NOT NULL DEFAULT '0',
  newsletter tinyint(1) NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  timeoffset char(4) NOT NULL DEFAULT '',
  newpm tinyint(1) NOT NULL DEFAULT '0',
  accessmasks tinyint(1) NOT NULL DEFAULT '0',
  editormode tinyint(1) unsigned NOT NULL DEFAULT '2',
  customshow tinyint(1) unsigned NOT NULL DEFAULT '26',
  xspacestatus tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  UNIQUE KEY username (username),
  KEY email (email),
  KEY groupid (groupid)
) TYPE=MyISAM AUTO_INCREMENT=2;

INSERT INTO cdb_members VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','','0','1','1','0','','hidden','1170596852','127.0.0.1','0','1170597433','1170596852','0','0','1','0','0','0','0','0','0','0','0','0','0','name@domain.com','0000-00-00','0','0','0','0','','0','0','1','1','0','9999','0','0','2','26','0');

DROP TABLE IF EXISTS cdb_memberspaces;
CREATE TABLE cdb_memberspaces (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  style char(20) NOT NULL,
  description char(100) NOT NULL,
  layout char(200) NOT NULL,
  side tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_moderators;
CREATE TABLE cdb_moderators (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  inherited tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_modworks;
CREATE TABLE cdb_modworks (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  modaction char(3) NOT NULL DEFAULT '',
  dateline date NOT NULL DEFAULT '2006-01-01',
  count smallint(6) unsigned NOT NULL DEFAULT '0',
  posts smallint(6) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_myposts;
CREATE TABLE cdb_myposts (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  pid int(10) unsigned NOT NULL DEFAULT '0',
  position smallint(6) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  special tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,tid),
  KEY tid (tid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_mythreads;
CREATE TABLE cdb_mythreads (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  special tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,tid),
  KEY tid (tid,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_onlinelist;
CREATE TABLE cdb_onlinelist (
  groupid smallint(6) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  title varchar(30) NOT NULL DEFAULT '',
  url varchar(30) NOT NULL DEFAULT ''
) TYPE=MyISAM;

INSERT INTO cdb_onlinelist VALUES ('1','1','����Ա','online_admin.gif');
INSERT INTO cdb_onlinelist VALUES ('2','2','��������','online_supermod.gif');
INSERT INTO cdb_onlinelist VALUES ('3','3','����','online_moderator.gif');
INSERT INTO cdb_onlinelist VALUES ('0','4','��Ա','online_member.gif');

DROP TABLE IF EXISTS cdb_onlinetime;
CREATE TABLE cdb_onlinetime (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  thismonth smallint(6) unsigned NOT NULL DEFAULT '0',
  total mediumint(8) unsigned NOT NULL DEFAULT '0',
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

INSERT INTO cdb_onlinetime VALUES ('1','10','60','1170601084');

DROP TABLE IF EXISTS cdb_orders;
CREATE TABLE cdb_orders (
  orderid char(32) NOT NULL DEFAULT '',
  `status` char(3) NOT NULL DEFAULT '',
  buyer char(50) NOT NULL DEFAULT '',
  admin char(15) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  amount int(10) unsigned NOT NULL DEFAULT '0',
  price float(7,2) unsigned NOT NULL DEFAULT '0.00',
  submitdate int(10) unsigned NOT NULL DEFAULT '0',
  confirmdate int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY orderid (orderid),
  KEY submitdate (submitdate),
  KEY uid (uid,submitdate)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_paymentlog;
CREATE TABLE cdb_paymentlog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  amount int(10) unsigned NOT NULL DEFAULT '0',
  netamount int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid,uid),
  KEY uid (uid),
  KEY authorid (authorid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_pluginhooks;
CREATE TABLE cdb_pluginhooks (
  pluginhookid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  pluginid smallint(6) unsigned NOT NULL DEFAULT '0',
  available tinyint(1) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  description mediumtext NOT NULL,
  `code` mediumtext NOT NULL,
  PRIMARY KEY (pluginhookid),
  KEY pluginid (pluginid),
  KEY available (available)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_plugins;
CREATE TABLE cdb_plugins (
  pluginid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  adminid tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) NOT NULL DEFAULT '',
  identifier varchar(40) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  datatables varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(100) NOT NULL DEFAULT '',
  copyright varchar(100) NOT NULL DEFAULT '',
  modules text NOT NULL,
  PRIMARY KEY (pluginid),
  UNIQUE KEY identifier (identifier)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_pluginvars;
CREATE TABLE cdb_pluginvars (
  pluginvarid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  pluginid smallint(6) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  title varchar(100) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  variable varchar(40) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT 'text',
  `value` text NOT NULL,
  extra text NOT NULL,
  PRIMARY KEY (pluginvarid),
  KEY pluginid (pluginid)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_pms;
CREATE TABLE cdb_pms (
  pmid int(10) unsigned NOT NULL AUTO_INCREMENT,
  msgfrom varchar(15) NOT NULL DEFAULT '',
  msgfromid mediumint(8) unsigned NOT NULL DEFAULT '0',
  msgtoid mediumint(8) unsigned NOT NULL DEFAULT '0',
  folder enum('inbox','outbox') NOT NULL DEFAULT 'inbox',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `subject` varchar(75) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY msgtoid (msgtoid,folder,dateline),
  KEY msgfromid (msgfromid,folder,dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_pmsearchindex;
CREATE TABLE cdb_pmsearchindex (
  searchid int(10) unsigned NOT NULL AUTO_INCREMENT,
  keywords varchar(255) NOT NULL DEFAULT '',
  searchstring varchar(255) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  pms smallint(6) unsigned NOT NULL DEFAULT '0',
  pmids text NOT NULL,
  PRIMARY KEY (searchid)
) TYPE=MyISAM AUTO_INCREMENT=1;

DROP TABLE IF EXISTS cdb_polloptions;
CREATE TABLE cdb_polloptions (
  polloptionid int(10) unsigned NOT NULL AUTO_INCREMENT,
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  votes mediumint(8) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  polloption varchar(80) NOT NULL DEFAULT '',
  voterids mediumtext NOT NULL,
  PRIMARY KEY (polloptionid),
  KEY tid (tid,displayorder)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_polls;
CREATE TABLE cdb_polls (
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  multiple tinyint(1) NOT NULL DEFAULT '0',
  visible tinyint(1) NOT NULL DEFAULT '0',
  maxchoices tinyint(3) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_posts;
CREATE TABLE cdb_posts (
  pid int(10) unsigned NOT NULL AUTO_INCREMENT,
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `first` tinyint(1) NOT NULL DEFAULT '0',
  author varchar(15) NOT NULL DEFAULT '',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(80) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message mediumtext NOT NULL,
  useip varchar(15) NOT NULL DEFAULT '',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  anonymous tinyint(1) NOT NULL DEFAULT '0',
  usesig tinyint(1) NOT NULL DEFAULT '0',
  htmlon tinyint(1) NOT NULL DEFAULT '0',
  bbcodeoff tinyint(1) NOT NULL DEFAULT '0',
  smileyoff tinyint(1) NOT NULL DEFAULT '0',
  parseurloff tinyint(1) NOT NULL DEFAULT '0',
  attachment tinyint(1) NOT NULL DEFAULT '0',
  rate smallint(6) NOT NULL DEFAULT '0',
  ratetimes tinyint(3) unsigned NOT NULL DEFAULT '0',
  status tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (pid),
  KEY fid (fid),
  KEY authorid (authorid),
  KEY dateline (dateline),
  KEY invisible (invisible),
  KEY displayorder (tid,invisible,dateline),
  KEY `first` (tid,`first`)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_profilefields;
CREATE TABLE cdb_profilefields (
  fieldid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  title varchar(50) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  size tinyint(3) unsigned NOT NULL DEFAULT '0',
  displayorder smallint(6) NOT NULL DEFAULT '0',
  required tinyint(1) NOT NULL DEFAULT '0',
  unchangeable tinyint(1) NOT NULL DEFAULT '0',
  showinthread tinyint(1) NOT NULL DEFAULT '0',
  selective tinyint(1) NOT NULL DEFAULT '0',
  choices text NOT NULL,
  PRIMARY KEY (fieldid),
  KEY available (available,required,displayorder)

) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_projects;
CREATE TABLE cdb_projects (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  description varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (id),
  KEY `type` (`type`)
) TYPE=MyISAM AUTO_INCREMENT=12;

INSERT INTO cdb_projects VALUES ('1','��������̳','extcredit','�������ϣ����Աͨ����ˮ��ҳ����ʵȷ�ʽ�õ����֣�������Ҫ����һЩ�����Ե����ӻ�û��֡�','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:49:\"posts*0.5+digestposts*5+extcredits1*2+extcredits2\";s:13:\"creditspolicy\";s:299:\"a:12:{s:4:\"post\";a:0:{}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:1;i:10;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:0:{}s:8:\"votepoll\";a:0:{}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1444:\"a:8:{i:1;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:2;a:8:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:3;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:4;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:5;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:6;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:7;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:8;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('2','��������̳','extcredit','��������̳�Ļ�Ա����ͨ������һЩ���ۡ��ظ��Ȼ�û��֣�ͬʱ������̳�ķ�����������Ҫ����ϣ����Ա����һЩ�м�ֵ���������ŵȡ�','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:81:\"posts+digestposts*5+oltime*5+pageviews/1000+extcredits1*2+extcredits2+extcredits3\";s:13:\"creditspolicy\";s:315:\"a:12:{s:4:\"post\";a:1:{i:1;i:1;}s:5:\"reply\";a:1:{i:2;i:1;}s:6:\"digest\";a:1:{i:1;i:10;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:0:{}s:8:\"votepoll\";a:0:{}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1036:\"a:8:{i:1;a:6:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:2;a:6:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:3;a:6:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:4;a:6:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:5;a:6:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:6;a:6:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:7;a:6:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}i:8;a:6:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('3','��������Ӱ����̳','extcredit','��������̳��Ҫ�����ͼƬ��������������Ա���������һ����չ���֣�������','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:86:\"posts+digestposts*2+pageviews/2000+extcredits1*2+extcredits2+extcredits3+extcredits4*3\";s:13:\"creditspolicy\";s:324:\"a:12:{s:4:\"post\";a:1:{i:2;i:1;}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:1;i:10;}s:10:\"postattach\";a:1:{i:4;i:3;}s:9:\"getattach\";a:1:{i:2;i:-2;}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:0:{}s:8:\"votepoll\";a:0:{}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1454:\"a:8:{i:1;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:2;a:8:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:3;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:4;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:5;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:6;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:7;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:8;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('4','���¡�С˵����̳','extcredit','�����͵���̳�����ӻ�Ա��ԭ�����»�����ת�������£��������һ����չ���֣��Ĳɡ�','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:57:\"posts+digestposts*8+extcredits2+extcredits3+extcredits4*2\";s:13:\"creditspolicy\";s:307:\"a:12:{s:4:\"post\";a:1:{i:2;i:1;}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:4;i:10;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:0:{}s:8:\"votepoll\";a:0:{}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1454:\"a:8:{i:1;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:2;a:8:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:3;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:4;a:8:{s:5:\"title\";s:4:\"�Ĳ�\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:5;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:6;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:7;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:8;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('5','��������̳','extcredit','��������̳���������ǵõ���Ա�Ľ�����������Ҫ��ͨ��ͶƱ�ķ�ʽ���ֻ�Ա�Ľ��飬�������һ����ֲ���Ϊ���μ�ͶƱ������һ����չ����Ϊ�������ԡ�','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:63:\"posts*0.5+digestposts*2+extcredits1*2+extcredits3+extcredits4*2\";s:13:\"creditspolicy\";s:306:\"a:12:{s:4:\"post\";a:0:{}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:1;i:8;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:0:{}s:8:\"votepoll\";a:1:{i:4;i:5;}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1456:\"a:8:{i:1;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:2;a:8:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:3;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:4;a:8:{s:5:\"title\";s:6:\"������\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:5;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:6;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:7;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:8;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('6','ó������̳','extcredit','��������̳��ע�ص��ǻ�Ա֮��Ľ��ף����ʹ�û��ֲ��ԣ����׳ɹ�������һ����չ���֣����Ŷȡ�','a:4:{s:10:\"savemethod\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:14:\"creditsformula\";s:55:\"posts+digestposts+extcredits1*2+extcredits3+extcredits4\";s:13:\"creditspolicy\";s:306:\"a:12:{s:4:\"post\";a:0:{}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:1;i:5;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}s:15:\"promotion_visit\";a:1:{i:3;i:2;}s:18:\"promotion_register\";a:1:{i:3;i:2;}s:13:\"tradefinished\";a:1:{i:4;i:6;}s:8:\"votepoll\";a:0:{}s:10:\"lowerlimit\";a:0:{}}\";s:10:\"extcredits\";s:1456:\"a:8:{i:1;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:2;a:8:{s:5:\"title\";s:4:\"��Ǯ\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:3;a:8:{s:5:\"title\";s:4:\"����\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:4;a:8:{s:5:\"title\";s:6:\"���Ŷ�\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";s:1:\"1\";s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:5;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:6;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:7;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}i:8;a:8:{s:5:\"title\";s:0:\"\";s:4:\"unit\";s:0:\"\";s:5:\"ratio\";i:0;s:9:\"available\";N;s:10:\"lowerlimit\";i:0;s:12:\"showinthread\";N;s:15:\"allowexchangein\";N;s:16:\"allowexchangeout\";N;}}\";}');
INSERT INTO cdb_projects VALUES ('7','̳����������','forum','�ð�������˲���������ģ�鹲�����Լ���������Ҫ�ܸߵ�Ȩ�޲�������ð�顣Ҳ�ʺ��ڱ����Ը߰�顣','a:33:{s:7:\"styleid\";s:1:\"0\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:10:\"allowshare\";s:1:\"0\";s:16:\"allowpostspecial\";s:1:\"0\";s:14:\"alloweditrules\";s:1:\"1\";s:10:\"recyclebin\";s:1:\"1\";s:11:\"modnewposts\";s:1:\"0\";s:6:\"jammer\";s:1:\"0\";s:16:\"disablewatermark\";s:1:\"0\";s:12:\"inheritedmod\";s:1:\"0\";s:9:\"autoclose\";s:1:\"0\";s:12:\"forumcolumns\";s:1:\"0\";s:12:\"threadcaches\";s:2:\"40\";s:16:\"allowpaytoauthor\";s:1:\"0\";s:13:\"alloweditpost\";s:1:\"1\";s:6:\"simple\";s:1:\"0\";s:11:\"postcredits\";s:0:\"\";s:12:\"replycredits\";s:0:\"\";s:16:\"getattachcredits\";s:0:\"\";s:17:\"postattachcredits\";s:0:\"\";s:13:\"digestcredits\";s:0:\"\";s:16:\"attachextensions\";s:0:\"\";s:11:\"threadtypes\";s:0:\"\";s:8:\"viewperm\";s:7:\"	1	2	3	\";s:8:\"postperm\";s:7:\"	1	2	3	\";s:9:\"replyperm\";s:7:\"	1	2	3	\";s:13:\"getattachperm\";s:7:\"	1	2	3	\";s:14:\"postattachperm\";s:7:\"	1	2	3	\";s:16:\"supe_pushsetting\";s:0:\"\";}');
INSERT INTO cdb_projects VALUES ('8','������������','forum','�����ÿ��������⻺��ϵ����������Ȩ�����ü���ϵ͡�','a:33:{s:7:\"styleid\";s:1:\"0\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:10:\"allowshare\";s:1:\"1\";s:16:\"allowpostspecial\";s:1:\"5\";s:14:\"alloweditrules\";s:1:\"0\";s:10:\"recyclebin\";s:1:\"1\";s:11:\"modnewposts\";s:1:\"0\";s:6:\"jammer\";s:1:\"0\";s:16:\"disablewatermark\";s:1:\"0\";s:12:\"inheritedmod\";s:1:\"0\";s:9:\"autoclose\";s:1:\"0\";s:12:\"forumcolumns\";s:1:\"0\";s:12:\"threadcaches\";s:2:\"40\";s:16:\"allowpaytoauthor\";s:1:\"1\";s:13:\"alloweditpost\";s:1:\"1\";s:6:\"simple\";s:1:\"0\";s:11:\"postcredits\";s:0:\"\";s:12:\"replycredits\";s:0:\"\";s:16:\"getattachcredits\";s:0:\"\";s:17:\"postattachcredits\";s:0:\"\";s:13:\"digestcredits\";s:0:\"\";s:16:\"attachextensions\";s:0:\"\";s:11:\"threadtypes\";s:0:\"\";s:8:\"viewperm\";s:0:\"\";s:8:\"postperm\";s:0:\"\";s:9:\"replyperm\";s:0:\"\";s:13:\"getattachperm\";s:0:\"\";s:14:\"postattachperm\";s:0:\"\";s:16:\"supe_pushsetting\";s:0:\"\";}');
INSERT INTO cdb_projects VALUES ('9','������������','forum','�����ÿ����˷�����ˣ������������������û��顣','a:33:{s:7:\"styleid\";s:1:\"0\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:10:\"allowshare\";s:1:\"1\";s:16:\"allowpostspecial\";s:1:\"1\";s:14:\"alloweditrules\";s:1:\"0\";s:10:\"recyclebin\";s:1:\"1\";s:11:\"modnewposts\";s:1:\"1\";s:6:\"jammer\";s:1:\"1\";s:16:\"disablewatermark\";s:1:\"0\";s:12:\"inheritedmod\";s:1:\"0\";s:9:\"autoclose\";s:1:\"0\";s:12:\"forumcolumns\";s:1:\"0\";s:12:\"threadcaches\";s:1:\"0\";s:16:\"allowpaytoauthor\";s:1:\"1\";s:13:\"alloweditpost\";s:1:\"0\";s:6:\"simple\";s:1:\"0\";s:11:\"postcredits\";s:0:\"\";s:12:\"replycredits\";s:0:\"\";s:16:\"getattachcredits\";s:0:\"\";s:17:\"postattachcredits\";s:0:\"\";s:13:\"digestcredits\";s:0:\"\";s:16:\"attachextensions\";s:0:\"\";s:11:\"threadtypes\";s:0:\"\";s:8:\"viewperm\";s:0:\"\";s:8:\"postperm\";s:7:\"	1	2	3	\";s:9:\"replyperm\";s:0:\"\";s:13:\"getattachperm\";s:0:\"\";s:14:\"postattachperm\";s:0:\"\";s:16:\"supe_pushsetting\";s:0:\"\";}');
INSERT INTO cdb_projects VALUES ('10','��������','forum','�����������﷢������һ����֮����Զ��ر����⡣','a:33:{s:7:\"styleid\";s:1:\"0\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:10:\"allowshare\";s:1:\"1\";s:16:\"allowpostspecial\";s:1:\"9\";s:14:\"alloweditrules\";s:1:\"0\";s:10:\"recyclebin\";s:1:\"1\";s:11:\"modnewposts\";s:1:\"0\";s:6:\"jammer\";s:1:\"0\";s:16:\"disablewatermark\";s:1:\"0\";s:12:\"inheritedmod\";s:1:\"1\";s:9:\"autoclose\";s:2:\"30\";s:12:\"forumcolumns\";s:1:\"0\";s:12:\"threadcaches\";s:2:\"40\";s:16:\"allowpaytoauthor\";s:1:\"1\";s:13:\"alloweditpost\";s:1:\"1\";s:6:\"simple\";s:1:\"0\";s:11:\"postcredits\";s:0:\"\";s:12:\"replycredits\";s:0:\"\";s:16:\"getattachcredits\";s:0:\"\";s:17:\"postattachcredits\";s:0:\"\";s:13:\"digestcredits\";s:0:\"\";s:16:\"attachextensions\";s:0:\"\";s:8:\"viewperm\";s:0:\"\";s:8:\"postperm\";s:22:\"	1	2	3	11	12	13	14	15	\";s:9:\"replyperm\";s:0:\"\";s:13:\"getattachperm\";s:0:\"\";s:14:\"postattachperm\";s:0:\"\";s:16:\"supe_pushsetting\";s:0:\"\";}');
INSERT INTO cdb_projects VALUES ('11','���ֹ�ˮ����','forum','�����������⻺��ϵ�������������е��������ⰴť��','a:33:{s:7:\"styleid\";s:1:\"0\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:10:\"allowshare\";s:1:\"1\";s:16:\"allowpostspecial\";s:2:\"15\";s:14:\"alloweditrules\";s:1:\"0\";s:10:\"recyclebin\";s:1:\"1\";s:11:\"modnewposts\";s:1:\"0\";s:6:\"jammer\";s:1:\"0\";s:16:\"disablewatermark\";s:1:\"0\";s:12:\"inheritedmod\";s:1:\"0\";s:9:\"autoclose\";s:1:\"0\";s:12:\"forumcolumns\";s:1:\"0\";s:12:\"threadcaches\";s:2:\"40\";s:16:\"allowpaytoauthor\";s:1:\"1\";s:13:\"alloweditpost\";s:1:\"1\";s:6:\"simple\";s:1:\"0\";s:11:\"postcredits\";s:0:\"\";s:12:\"replycredits\";s:0:\"\";s:16:\"getattachcredits\";s:0:\"\";s:17:\"postattachcredits\";s:0:\"\";s:13:\"digestcredits\";s:0:\"\";s:16:\"attachextensions\";s:0:\"\";s:11:\"threadtypes\";s:0:\"\";s:8:\"viewperm\";s:0:\"\";s:8:\"postperm\";s:0:\"\";s:9:\"replyperm\";s:0:\"\";s:13:\"getattachperm\";s:0:\"\";s:14:\"postattachperm\";s:0:\"\";s:16:\"supe_pushsetting\";s:0:\"\";}');

DROP TABLE IF EXISTS cdb_promotions;
CREATE TABLE cdb_promotions (
  ip char(15) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_ranks;
CREATE TABLE cdb_ranks (
  rankid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  ranktitle varchar(30) NOT NULL DEFAULT '',
  postshigher mediumint(8) unsigned NOT NULL DEFAULT '0',
  stars tinyint(3) NOT NULL DEFAULT '0',
  color varchar(7) NOT NULL DEFAULT '',
  PRIMARY KEY (rankid)
) TYPE=MyISAM AUTO_INCREMENT=6;

INSERT INTO cdb_ranks VALUES ('1','������ѧ','0','1','');
INSERT INTO cdb_ranks VALUES ('2','С��ţ��','50','2','');
INSERT INTO cdb_ranks VALUES ('3','ʵϰ����','300','5','');
INSERT INTO cdb_ranks VALUES ('4','����׫����','1000','4','');
INSERT INTO cdb_ranks VALUES ('5','��Ƹ����','3000','5','');

DROP TABLE IF EXISTS cdb_ratelog;
CREATE TABLE cdb_ratelog (
  pid int(10) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  extcredits tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  score smallint(6) NOT NULL DEFAULT '0',
  reason char(40) NOT NULL DEFAULT '',
  KEY pid (pid,dateline),
  KEY dateline (dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_regips;
CREATE TABLE cdb_regips (
  ip char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  count smallint(6) NOT NULL DEFAULT '0',
  KEY ip (ip)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_relatedthreads;
CREATE TABLE cdb_relatedthreads (
  tid mediumint(8) NOT NULL DEFAULT '0',
  `type` enum('general','trade') NOT NULL DEFAULT 'general',
  expiration int(10) NOT NULL DEFAULT '0',
  keywords varchar(255) NOT NULL DEFAULT '',
  relatedthreads text NOT NULL,
  PRIMARY KEY (tid,`type`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_rewardlog;
CREATE TABLE cdb_rewardlog (
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  answererid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned DEFAULT '0',
  netamount int(10) unsigned NOT NULL DEFAULT '0',
  KEY userid (authorid,answererid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_rsscaches;
CREATE TABLE cdb_rsscaches (
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  forum char(50) NOT NULL DEFAULT '',
  author char(15) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  description char(255) NOT NULL DEFAULT '',
  UNIQUE KEY tid (tid),
  KEY fid (fid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_searchindex;
CREATE TABLE cdb_searchindex (
  searchid int(10) unsigned NOT NULL AUTO_INCREMENT,
  keywords varchar(255) NOT NULL DEFAULT '',
  searchstring text NOT NULL,
  useip varchar(15) NOT NULL DEFAULT '',
  uid mediumint(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  threadtypeid smallint(6) unsigned NOT NULL DEFAULT '0',
  threads smallint(6) unsigned NOT NULL DEFAULT '0',
  tids text NOT NULL,
  PRIMARY KEY (searchid)
) TYPE=MyISAM AUTO_INCREMENT=1;

DROP TABLE IF EXISTS cdb_sessions;
CREATE TABLE cdb_sessions (
  sid char(6) binary NOT NULL DEFAULT '',
  ip1 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip2 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip3 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip4 tinyint(3) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  groupid smallint(6) unsigned NOT NULL DEFAULT '0',
  styleid smallint(6) unsigned NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  `action` tinyint(1) unsigned NOT NULL DEFAULT '0',
  lastactivity int(10) unsigned NOT NULL DEFAULT '0',
  lastolupdate int(10) unsigned NOT NULL DEFAULT '0',
  pageviews smallint(6) unsigned NOT NULL DEFAULT '0',
  seccode mediumint(6) unsigned NOT NULL DEFAULT '0',
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  bloguid mediumint(8) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY sid (sid),
  KEY uid (uid),
  KEY bloguid (bloguid)
) TYPE=HEAP;

DROP TABLE IF EXISTS cdb_settings;
CREATE TABLE cdb_settings (
  variable varchar(32) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (variable)
) TYPE=MyISAM;

INSERT INTO cdb_settings VALUES ('accessemail','');
INSERT INTO cdb_settings VALUES ('adminipaccess','');
INSERT INTO cdb_settings VALUES ('allowcsscache','1');
INSERT INTO cdb_settings VALUES ('archiverstatus','1');
INSERT INTO cdb_settings VALUES ('attachbanperiods','');
INSERT INTO cdb_settings VALUES ('attachimgpost','1');
INSERT INTO cdb_settings VALUES ('attachrefcheck','0');
INSERT INTO cdb_settings VALUES ('attachsave','3');
INSERT INTO cdb_settings VALUES ('authkey','CrVSXaKzoyJb4Rd');
INSERT INTO cdb_settings VALUES ('bannedmessages','1');
INSERT INTO cdb_settings VALUES ('bbclosed','');
INSERT INTO cdb_settings VALUES ('bbinsert','1');
INSERT INTO cdb_settings VALUES ('bbname','Discuz! Board');
INSERT INTO cdb_settings VALUES ('bbrules','0');
INSERT INTO cdb_settings VALUES ('bbrulestxt','');
INSERT INTO cdb_settings VALUES ('bdaystatus','0');
INSERT INTO cdb_settings VALUES ('boardlicensed','0');
INSERT INTO cdb_settings VALUES ('censoremail','');
INSERT INTO cdb_settings VALUES ('censoruser','');
INSERT INTO cdb_settings VALUES ('closedreason','');
INSERT INTO cdb_settings VALUES ('creditsformula','extcredits1');
INSERT INTO cdb_settings VALUES ('creditsformulaexp','');
INSERT INTO cdb_settings VALUES ('creditsnotify','');
INSERT INTO cdb_settings VALUES ('creditspolicy','a:7:{s:4:\"post\";a:0:{}s:5:\"reply\";a:0:{}s:6:\"digest\";a:1:{i:1;i:10;}s:10:\"postattach\";a:0:{}s:9:\"getattach\";a:0:{}s:2:\"pm\";a:0:{}s:6:\"search\";a:0:{}}');
INSERT INTO cdb_settings VALUES ('creditstax','0.2');
INSERT INTO cdb_settings VALUES ('creditstrans','2');
INSERT INTO cdb_settings VALUES ('custombackup','');
INSERT INTO cdb_settings VALUES ('dateformat','Y-n-j');
INSERT INTO cdb_settings VALUES ('debug','1');
INSERT INTO cdb_settings VALUES ('delayviewcount','0');
INSERT INTO cdb_settings VALUES ('deletereason','');
INSERT INTO cdb_settings VALUES ('doublee','1');
INSERT INTO cdb_settings VALUES ('dupkarmarate','0');
INSERT INTO cdb_settings VALUES ('ec_account','');
INSERT INTO cdb_settings VALUES ('ec_maxcredits','1000');
INSERT INTO cdb_settings VALUES ('ec_maxcreditspermonth','0');
INSERT INTO cdb_settings VALUES ('ec_mincredits','0');
INSERT INTO cdb_settings VALUES ('ec_ratio','0');
INSERT INTO cdb_settings VALUES ('editedby','1');
INSERT INTO cdb_settings VALUES ('editoroptions','1');
INSERT INTO cdb_settings VALUES ('edittimelimit','');
INSERT INTO cdb_settings VALUES ('exchangemincredits','100');
INSERT INTO cdb_settings VALUES ('extcredits','a:2:{i:1;a:3:{s:5:\"title\";s:4:\"����\";s:12:\"showinthread\";s:0:\"\";s:9:\"available\";i:1;}i:2;a:3:{s:5:\"title\";s:4:\"��Ǯ\";s:12:\"showinthread\";s:0:\"\";s:9:\"available\";i:1;}}');
INSERT INTO cdb_settings VALUES ('fastpost','1');
INSERT INTO cdb_settings VALUES ('floodctrl','15');
INSERT INTO cdb_settings VALUES ('forumjump','0');
INSERT INTO cdb_settings VALUES ('globalstick','1');
INSERT INTO cdb_settings VALUES ('gzipcompress','0');
INSERT INTO cdb_settings VALUES ('hideprivate','1');
INSERT INTO cdb_settings VALUES ('hottopic','10');
INSERT INTO cdb_settings VALUES ('icp','');
INSERT INTO cdb_settings VALUES ('initcredits','0,0,0,0,0,0,0,0,0');
INSERT INTO cdb_settings VALUES ('ipaccess','');
INSERT INTO cdb_settings VALUES ('ipregctrl','');
INSERT INTO cdb_settings VALUES ('jscachelife','1800');
INSERT INTO cdb_settings VALUES ('jsmenustatus','15');
INSERT INTO cdb_settings VALUES ('jsrefdomains','');
INSERT INTO cdb_settings VALUES ('jsstatus','0');
INSERT INTO cdb_settings VALUES ('karmaratelimit','0');
INSERT INTO cdb_settings VALUES ('loadctrl','0');
INSERT INTO cdb_settings VALUES ('losslessdel','365');
INSERT INTO cdb_settings VALUES ('maxavatarpixel','120');
INSERT INTO cdb_settings VALUES ('maxavatarsize','20000');
INSERT INTO cdb_settings VALUES ('maxbdays','0');
INSERT INTO cdb_settings VALUES ('maxchargespan','0');
INSERT INTO cdb_settings VALUES ('maxfavorites','100');
INSERT INTO cdb_settings VALUES ('maxincperthread','0');
INSERT INTO cdb_settings VALUES ('maxmodworksmonths','3');
INSERT INTO cdb_settings VALUES ('maxonlinelist','0');
INSERT INTO cdb_settings VALUES ('maxonlines','5000');
INSERT INTO cdb_settings VALUES ('maxpolloptions','10');
INSERT INTO cdb_settings VALUES ('maxpostsize','10000');
INSERT INTO cdb_settings VALUES ('maxsearchresults','500');
INSERT INTO cdb_settings VALUES ('maxsigrows','100');
INSERT INTO cdb_settings VALUES ('maxsmilies','10');
INSERT INTO cdb_settings VALUES ('maxspm','0');
INSERT INTO cdb_settings VALUES ('maxsubscriptions','100');
INSERT INTO cdb_settings VALUES ('backupdir','uXDPv6');
INSERT INTO cdb_settings VALUES ('membermaxpages','100');
INSERT INTO cdb_settings VALUES ('memberperpage','25');
INSERT INTO cdb_settings VALUES ('memliststatus','1');
INSERT INTO cdb_settings VALUES ('minpostsize','10');
INSERT INTO cdb_settings VALUES ('moddisplay','flat');
INSERT INTO cdb_settings VALUES ('modratelimit','0');
INSERT INTO cdb_settings VALUES ('modreasons','���/SPAM\r\n�����ˮ\r\nΥ������\r\n�Ĳ�����\r\n�ظ�����\r\n\r\n�Һ���ͬ\r\n��Ʒ����\r\nԭ������');
INSERT INTO cdb_settings VALUES ('modworkstatus','0');
INSERT INTO cdb_settings VALUES ('myrecorddays','30');
INSERT INTO cdb_settings VALUES ('newbiespan','0');
INSERT INTO cdb_settings VALUES ('newsletter','');
INSERT INTO cdb_settings VALUES ('nocacheheaders','0');
INSERT INTO cdb_settings VALUES ('oltimespan','10');
INSERT INTO cdb_settings VALUES ('onlinerecord','1	1040034649');
INSERT INTO cdb_settings VALUES ('passport_expire','3600');
INSERT INTO cdb_settings VALUES ('passport_extcredits','0');
INSERT INTO cdb_settings VALUES ('passport_key','');
INSERT INTO cdb_settings VALUES ('passport_login_url','');
INSERT INTO cdb_settings VALUES ('passport_logout_url','');
INSERT INTO cdb_settings VALUES ('passport_register_url','');
INSERT INTO cdb_settings VALUES ('passport_status','');
INSERT INTO cdb_settings VALUES ('passport_url','');
INSERT INTO cdb_settings VALUES ('postbanperiods','');
INSERT INTO cdb_settings VALUES ('postmodperiods','');
INSERT INTO cdb_settings VALUES ('postperpage','10');
INSERT INTO cdb_settings VALUES ('pvfrequence','60');
INSERT INTO cdb_settings VALUES ('qihoo','a:9:{s:6:"status";i:0;s:9:"searchbox";i:6;s:7:"summary";i:1;s:6:"jammer";i:1;s:9:"maxtopics";i:10;s:8:"keywords";s:0:"";s:10:"adminemail";s:0:"";s:8:"validity";i:1;s:14:"relatedthreads";a:6:{s:6:"bbsnum";i:0;s:6:"webnum";i:0;s:4:"type";a:3:{s:4:"blog";s:4:"blog";s:4:"news";s:4:"news";s:3:"bbs";s:3:"bbs";}s:6:"banurl";s:0:"";s:8:"position";i:1;s:8:"validity";i:1;}}');
INSERT INTO cdb_settings VALUES ('ratelogrecord','5');
INSERT INTO cdb_settings VALUES ('regadvance','0');
INSERT INTO cdb_settings VALUES ('regctrl','0');
INSERT INTO cdb_settings VALUES ('regfloodctrl','0');
INSERT INTO cdb_settings VALUES ('regstatus','1');
INSERT INTO cdb_settings VALUES ('regverify','0');
INSERT INTO cdb_settings VALUES ('reportpost','1');
INSERT INTO cdb_settings VALUES ('rewritestatus','0');
INSERT INTO cdb_settings VALUES ('rssstatus','1');
INSERT INTO cdb_settings VALUES ('rssttl','60');
INSERT INTO cdb_settings VALUES ('runwizard', '1');
INSERT INTO cdb_settings VALUES ('searchbanperiods','');
INSERT INTO cdb_settings VALUES ('searchctrl','30');
INSERT INTO cdb_settings VALUES ('seccodestatus','0');
INSERT INTO cdb_settings VALUES ('seodescription','');
INSERT INTO cdb_settings VALUES ('seohead','');
INSERT INTO cdb_settings VALUES ('seokeywords','');
INSERT INTO cdb_settings VALUES ('seotitle','');
INSERT INTO cdb_settings VALUES ('showemail','');
INSERT INTO cdb_settings VALUES ('showimages','1');
INSERT INTO cdb_settings VALUES ('showsettings','7');
INSERT INTO cdb_settings VALUES ('sitename','Comsenz Inc.');
INSERT INTO cdb_settings VALUES ('siteurl','http://www.comsenz.com/');
INSERT INTO cdb_settings VALUES ('smcols','4');
INSERT INTO cdb_settings VALUES ('smileyinsert','1');
INSERT INTO cdb_settings VALUES ('starthreshold','2');
INSERT INTO cdb_settings VALUES ('statscachelife','180');
INSERT INTO cdb_settings VALUES ('statstatus','');
INSERT INTO cdb_settings VALUES ('styleid','1');
INSERT INTO cdb_settings VALUES ('stylejump','1');
INSERT INTO cdb_settings VALUES ('subforumsindex','');
INSERT INTO cdb_settings VALUES ('supe_siteurl','');
INSERT INTO cdb_settings VALUES ('supe_sitename','');
INSERT INTO cdb_settings VALUES ('supe_status','0');
INSERT INTO cdb_settings VALUES ('supe_tablepre','');
INSERT INTO cdb_settings VALUES ('threadmaxpages','1000');
INSERT INTO cdb_settings VALUES ('threadsticky','ȫ���ö�,�����ö�,�����ö�');
INSERT INTO cdb_settings VALUES ('timeformat','H:i');
INSERT INTO cdb_settings VALUES ('timeoffset','8');
INSERT INTO cdb_settings VALUES ('topicperpage','20');
INSERT INTO cdb_settings VALUES ('transfermincredits','1000');
INSERT INTO cdb_settings VALUES ('transsidstatus','0');
INSERT INTO cdb_settings VALUES ('userstatusby','1');
INSERT INTO cdb_settings VALUES ('visitbanperiods','');
INSERT INTO cdb_settings VALUES ('visitedforums','10');
INSERT INTO cdb_settings VALUES ('vtonlinestatus','1');
INSERT INTO cdb_settings VALUES ('wapcharset','2');
INSERT INTO cdb_settings VALUES ('wapdateformat','n/j');
INSERT INTO cdb_settings VALUES ('wapmps','500');
INSERT INTO cdb_settings VALUES ('wapppp','5');
INSERT INTO cdb_settings VALUES ('wapstatus','1');
INSERT INTO cdb_settings VALUES ('waptpp','10');
INSERT INTO cdb_settings VALUES ('watermarkquality','80');
INSERT INTO cdb_settings VALUES ('watermarkstatus','0');
INSERT INTO cdb_settings VALUES ('watermarktrans','65');
INSERT INTO cdb_settings VALUES ('welcomemsg','');
INSERT INTO cdb_settings VALUES ('welcomemsgtxt','�𾴵�{username}�����Ѿ�ע���Ϊ{sitename}�Ļ�Ա�������ڷ�������ʱ�����ص��ط��ɷ��档\r\n�������ʲô���ʿ�����ϵ����Ա��Email: {adminemail}��\r\n\r\n\r\n{bbname}\r\n{time}');
INSERT INTO cdb_settings VALUES ('whosonlinestatus','1');
INSERT INTO cdb_settings VALUES ('indexname','index.php');
INSERT INTO cdb_settings VALUES ('spacedata','a:11:{s:9:\"cachelife\";s:3:\"900\";s:14:\"limitmythreads\";s:1:\"5\";s:14:\"limitmyreplies\";s:1:\"5\";s:14:\"limitmyrewards\";s:1:\"5\";s:13:\"limitmytrades\";s:1:\"5\";s:13:\"limitmyvideos\";s:1:\"0\";s:12:\"limitmyblogs\";s:1:\"8\";s:14:\"limitmyfriends\";s:1:\"0\";s:16:\"limitmyfavforums\";s:1:\"5\";s:17:\"limitmyfavthreads\";s:1:\"0\";s:10:\"textlength\";s:3:\"300\";}');
INSERT INTO cdb_settings VALUES ('thumbstatus','0');
INSERT INTO cdb_settings VALUES ('thumbwidth','400');
INSERT INTO cdb_settings VALUES ('thumbheight','300');
INSERT INTO cdb_settings VALUES ('forumlinkstatus','1');
INSERT INTO cdb_settings VALUES ('pluginjsmenu','���');
INSERT INTO cdb_settings VALUES ('magicstatus','1');
INSERT INTO cdb_settings VALUES ('magicmarket','1');
INSERT INTO cdb_settings VALUES ('maxmagicprice','50');
INSERT INTO cdb_settings VALUES ('upgradeurl','http://localhost/develop/dzhead/develop/upgrade.php');
INSERT INTO cdb_settings VALUES ('ftp','a:10:{s:2:\"on\";s:1:\"0\";s:3:\"ssl\";s:1:\"0\";s:4:\"host\";s:0:\"\";s:4:\"port\";s:2:\"21\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";s:9:\"attachdir\";s:1:\".\";s:9:\"attachurl\";s:0:\"\";s:7:\"hideurl\";s:1:\"0\";s:7:\"timeout\";s:1:\"0\";}');
INSERT INTO cdb_settings VALUES ('wapregister','0');
INSERT INTO cdb_settings VALUES ('jswizard','');
INSERT INTO cdb_settings VALUES ('passport_shopex','0');
INSERT INTO cdb_settings VALUES ('seccodeanimator','1');
INSERT INTO cdb_settings VALUES ('welcomemsgtitle','{username}�����ã���л����ע�ᣬ���Ķ��������ݡ�');
INSERT INTO cdb_settings VALUES ('cacheindexlife','0');
INSERT INTO cdb_settings VALUES ('cachethreadlife','0');
INSERT INTO cdb_settings VALUES ('cachethreaddir','forumdata/threadcaches');
INSERT INTO cdb_settings VALUES ('jsdateformat','');
INSERT INTO cdb_settings VALUES ('seccodedata','a:13:{s:8:\"minposts\";s:0:\"\";s:16:\"loginfailedcount\";i:0;s:5:\"width\";i:150;s:6:\"height\";i:60;s:4:\"type\";s:1:\"0\";s:10:\"background\";s:1:\"1\";s:10:\"adulterate\";s:1:\"1\";s:3:\"ttf\";s:1:\"0\";s:5:\"angle\";s:1:\"0\";s:5:\"color\";s:1:\"1\";s:4:\"size\";s:1:\"0\";s:6:\"shadow\";s:1:\"1\";s:8:\"animator\";s:1:\"0\";}');
INSERT INTO cdb_settings VALUES ('frameon','0');
INSERT INTO cdb_settings VALUES ('framewidth','180');
INSERT INTO cdb_settings VALUES ('smrows','4');
INSERT INTO cdb_settings VALUES ('watermarktype','0');
INSERT INTO cdb_settings VALUES ('secqaa','a:2:{s:8:\"minposts\";s:1:\"1\";s:6:\"status\";i:0;}');
INSERT INTO cdb_settings VALUES ('supe_circlestatus','0');
INSERT INTO cdb_settings VALUES ('spacestatus','1');
INSERT INTO cdb_settings VALUES ('whosonline_contract','0');
INSERT INTO cdb_settings VALUES ('attachdir','./attachments');
INSERT INTO cdb_settings VALUES ('attachurl','attachments');
INSERT INTO cdb_settings VALUES ('onlinehold','15');
INSERT INTO cdb_settings VALUES ('msgforward', 'a:3:{s:11:\"refreshtime\";i:3;s:5:\"quick\";i:1;s:8:\"messages\";a:13:{i:0;s:19:\"thread_poll_succeed\";i:1;s:19:\"thread_rate_succeed\";i:2;s:23:\"usergroups_join_succeed\";i:3;s:23:\"usergroups_exit_succeed\";i:4;s:25:\"usergroups_update_succeed\";i:5;s:20:\"buddy_update_succeed\";i:6;s:17:\"post_edit_succeed\";i:7;s:18:\"post_reply_succeed\";i:8;s:24:\"post_edit_delete_succeed\";i:9;s:22:\"post_newthread_succeed\";i:10;s:13:\"admin_succeed\";i:11;s:17:\"pm_delete_succeed\";i:12;s:15:\"search_redirect\";}}');
INSERT INTO cdb_settings VALUES ('smthumb','20');
INSERT INTO cdb_settings VALUES ('tagstatus', 1);
INSERT INTO cdb_settings VALUES ('hottags', 20);
INSERT INTO cdb_settings VALUES ('viewthreadtags', 100);
INSERT INTO cdb_settings VALUES ('rewritecompatible', '');
INSERT INTO cdb_settings VALUES ('imagelib', '0');
INSERT INTO cdb_settings VALUES ('imageimpath', '');
INSERT INTO cdb_settings VALUES ('regname', 'register.php');
INSERT INTO cdb_settings VALUES ('reglinkname', 'ע��');
INSERT INTO cdb_settings VALUES ('activitytype', '���Ѿۻ�\r\n���⽼��\r\n�Լݳ���\r\n����\r\n���ϻ');
INSERT INTO cdb_settings VALUES ('userdateformat','Y-n-j\r\nY/n/j\r\nj-n-Y\r\nj/n/Y');
INSERT INTO cdb_settings VALUES ('tradetypes', '');
INSERT INTO cdb_settings VALUES ('tradeimagewidth', 200);
INSERT INTO cdb_settings VALUES ('tradeimageheight', 150);
INSERT INTO cdb_settings VALUES ('customauthorinfo', 'a:1:{i:0;a:9:{s:3:\"uid\";a:1:{s:4:\"menu\";s:1:\"1\";}s:5:\"posts\";a:1:{s:4:\"menu\";s:1:\"1\";}s:6:\"digest\";a:1:{s:4:\"menu\";s:1:\"1\";}s:7:\"credits\";a:1:{s:4:\"menu\";s:1:\"1\";}s:8:\"readperm\";a:1:{s:4:\"menu\";s:1:\"1\";}s:8:\"location\";a:1:{s:4:\"menu\";s:1:\"1\";}s:6:\"oltime\";a:1:{s:4:\"menu\";s:1:\"1\";}s:7:\"regtime\";a:1:{s:4:\"menu\";s:1:\"1\";}s:8:\"lastdate\";a:1:{s:4:\"menu\";s:1:\"1\";}}}');
INSERT INTO cdb_settings VALUES ('ec_credit', 'a:2:{s:18:"maxcreditspermonth";i:6;s:4:"rank";a:15:{i:1;i:4;i:2;i:11;i:3;i:41;i:4;i:91;i:5;i:151;i:6;i:251;i:7;i:501;i:8;i:1001;i:9;i:2001;i:10;i:5001;i:11;i:10001;i:12;i:20001;i:13;i:50001;i:14;i:100001;i:15;i:200001;}}');
INSERT INTO cdb_settings VALUES ('mail', 'a:10:{s:8:"mailsend";s:1:"1";s:6:"server";s:13:"smtp.21cn.com";s:4:"port";s:2:"25";s:4:"auth";s:1:"1";s:4:"from";s:26:"Discuz <username@21cn.com>";s:13:"auth_username";s:17:"username@21cn.com";s:13:"auth_password";s:8:"password";s:13:"maildelimiter";s:1:"0";s:12:"mailusername";s:1:"1";s:15:"sendmail_silent";s:1:"1";}');
INSERT INTO cdb_settings VALUES ('watermarktext', '');
INSERT INTO cdb_settings VALUES ('watermarkminwidth', '0');
INSERT INTO cdb_settings VALUES ('watermarkminheight', '0');
INSERT INTO cdb_settings VALUES ('inviteconfig', '');
INSERT INTO cdb_settings VALUES ('historyposts', '0	0');
INSERT INTO cdb_settings VALUES ('zoomstatus', '1');
INSERT INTO cdb_settings VALUES ('postno', '#');
INSERT INTO cdb_settings VALUES ('postnocustom', '');
INSERT INTO cdb_settings VALUES ('maxbiotradesize', '400');
INSERT INTO cdb_settings VALUES ('insenz', '');
INSERT INTO cdb_settings VALUES ('videoinfo','a:9:{s:4:\"open\";i:0;s:5:\"vtype\";s:24:\"����	����	����	Ӱ��	����\";s:6:\"bbname\";s:0:\"\";s:3:\"url\";s:0:\"\";s:5:\"email\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"sitetype\";s:179:\"����	����	����	Ӱ��	����	��Ϸ	��Ů	����	����	����	����	ѧ��	����	����	����	����	ʱ��	����	����	�ֻ�	��Ӱ	Ϸ��	����	����	У԰	����	����	��ʷ	����	����	�ƾ�	����	����	����	����	�ۺ�\";s:7:\"vsiteid\";s:0:\"\";s:9:\"vsitecode\";s:0:\"\";}');
INSERT INTO cdb_settings VALUES ('google','');
INSERT INTO cdb_settings VALUES ('baidusitemap','1');
INSERT INTO cdb_settings VALUES ('baidusitemap_life','12');

DROP TABLE IF EXISTS cdb_smilies;
CREATE TABLE cdb_smilies (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  typeid smallint(6) unsigned NOT NULL,
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  `type` enum('smiley','icon') NOT NULL DEFAULT 'smiley',
  `code` varchar(30) NOT NULL DEFAULT '',
  url varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=30;

INSERT INTO cdb_smilies VALUES ('1','1','0','smiley',':)','smile.gif');
INSERT INTO cdb_smilies VALUES ('2','1','0','smiley',':(','sad.gif');
INSERT INTO cdb_smilies VALUES ('3','1','0','smiley',':D','biggrin.gif');
INSERT INTO cdb_smilies VALUES ('4','1','0','smiley',':\'(','cry.gif');
INSERT INTO cdb_smilies VALUES ('5','1','0','smiley',':@','huffy.gif');
INSERT INTO cdb_smilies VALUES ('6','1','0','smiley',':o','shocked.gif');
INSERT INTO cdb_smilies VALUES ('7','1','0','smiley',':P','tongue.gif');
INSERT INTO cdb_smilies VALUES ('8','1','0','smiley',':$','shy.gif');
INSERT INTO cdb_smilies VALUES ('9','1','0','smiley',';P','titter.gif');
INSERT INTO cdb_smilies VALUES ('10','1','0','smiley',':L','sweat.gif');
INSERT INTO cdb_smilies VALUES ('11','1','0','smiley',':Q','mad.gif');
INSERT INTO cdb_smilies VALUES ('12','1','0','smiley',':lol','lol.gif');
INSERT INTO cdb_smilies VALUES ('13','1','0','smiley',':hug:','hug.gif');
INSERT INTO cdb_smilies VALUES ('14','1','0','smiley',':victory:','victory.gif');
INSERT INTO cdb_smilies VALUES ('15','1','0','smiley',':time:','time.gif');
INSERT INTO cdb_smilies VALUES ('16','1','0','smiley',':kiss:','kiss.gif');
INSERT INTO cdb_smilies VALUES ('17','1','0','smiley',':handshake','handshake.gif');
INSERT INTO cdb_smilies VALUES ('18','1','0','smiley',':call:','call.gif');
INSERT INTO cdb_smilies VALUES ('19','0','0','icon','','icon1.gif');
INSERT INTO cdb_smilies VALUES ('20','0','0','icon','','icon2.gif');
INSERT INTO cdb_smilies VALUES ('21','0','0','icon','','icon3.gif');
INSERT INTO cdb_smilies VALUES ('22','0','0','icon','','icon4.gif');
INSERT INTO cdb_smilies VALUES ('23','0','0','icon','','icon5.gif');
INSERT INTO cdb_smilies VALUES ('24','0','0','icon','','icon6.gif');
INSERT INTO cdb_smilies VALUES ('25','0','0','icon','','icon7.gif');
INSERT INTO cdb_smilies VALUES ('26','0','0','icon','','icon8.gif');
INSERT INTO cdb_smilies VALUES ('27','0','0','icon','','icon9.gif');
INSERT INTO cdb_smilies VALUES ('28','1','0','smiley',':loveliness:','loveliness.gif');
INSERT INTO cdb_smilies VALUES ('29','1','0','smiley',':funk:','funk.gif');

DROP TABLE IF EXISTS cdb_spacecaches;
CREATE TABLE cdb_spacecaches (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  variable varchar(20) NOT NULL,
  `value` text NOT NULL,
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,variable)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_stats;
CREATE TABLE cdb_stats (
  `type` char(10) NOT NULL DEFAULT '',
  variable char(10) NOT NULL DEFAULT '',
  count int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`,variable)
) TYPE=MyISAM;

INSERT INTO cdb_stats VALUES ('total','hits','1');
INSERT INTO cdb_stats VALUES ('total','members','0');
INSERT INTO cdb_stats VALUES ('total','guests','1');
INSERT INTO cdb_stats VALUES ('os','Windows','1');
INSERT INTO cdb_stats VALUES ('os','Mac','0');
INSERT INTO cdb_stats VALUES ('os','Linux','0');
INSERT INTO cdb_stats VALUES ('os','FreeBSD','0');
INSERT INTO cdb_stats VALUES ('os','SunOS','0');
INSERT INTO cdb_stats VALUES ('os','OS/2','0');
INSERT INTO cdb_stats VALUES ('os','AIX','0');
INSERT INTO cdb_stats VALUES ('os','Spiders','0');
INSERT INTO cdb_stats VALUES ('os','Other','0');
INSERT INTO cdb_stats VALUES ('browser','MSIE','1');
INSERT INTO cdb_stats VALUES ('browser','Netscape','0');
INSERT INTO cdb_stats VALUES ('browser','Mozilla','0');
INSERT INTO cdb_stats VALUES ('browser','Lynx','0');
INSERT INTO cdb_stats VALUES ('browser','Opera','0');
INSERT INTO cdb_stats VALUES ('browser','Konqueror','0');
INSERT INTO cdb_stats VALUES ('browser','Other','0');
INSERT INTO cdb_stats VALUES ('week','0','0');
INSERT INTO cdb_stats VALUES ('week','1','1');
INSERT INTO cdb_stats VALUES ('week','2','0');
INSERT INTO cdb_stats VALUES ('week','3','0');
INSERT INTO cdb_stats VALUES ('week','4','0');
INSERT INTO cdb_stats VALUES ('week','5','0');
INSERT INTO cdb_stats VALUES ('week','6','0');
INSERT INTO cdb_stats VALUES ('hour','00','0');
INSERT INTO cdb_stats VALUES ('hour','01','0');
INSERT INTO cdb_stats VALUES ('hour','02','0');
INSERT INTO cdb_stats VALUES ('hour','03','0');
INSERT INTO cdb_stats VALUES ('hour','04','0');
INSERT INTO cdb_stats VALUES ('hour','05','0');
INSERT INTO cdb_stats VALUES ('hour','06','0');
INSERT INTO cdb_stats VALUES ('hour','07','0');
INSERT INTO cdb_stats VALUES ('hour','08','0');
INSERT INTO cdb_stats VALUES ('hour','09','0');
INSERT INTO cdb_stats VALUES ('hour','10','1');
INSERT INTO cdb_stats VALUES ('hour','11','0');
INSERT INTO cdb_stats VALUES ('hour','12','0');
INSERT INTO cdb_stats VALUES ('hour','13','0');
INSERT INTO cdb_stats VALUES ('hour','14','0');
INSERT INTO cdb_stats VALUES ('hour','15','0');
INSERT INTO cdb_stats VALUES ('hour','16','0');
INSERT INTO cdb_stats VALUES ('hour','17','0');
INSERT INTO cdb_stats VALUES ('hour','18','0');
INSERT INTO cdb_stats VALUES ('hour','19','0');
INSERT INTO cdb_stats VALUES ('hour','20','0');
INSERT INTO cdb_stats VALUES ('hour','21','0');
INSERT INTO cdb_stats VALUES ('hour','22','0');
INSERT INTO cdb_stats VALUES ('hour','23','0');

DROP TABLE IF EXISTS cdb_statvars;
CREATE TABLE cdb_statvars (
  `type` varchar(20) NOT NULL DEFAULT '',
  variable varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`type`,variable)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_styles;
CREATE TABLE cdb_styles (
  styleid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  available tinyint(1) NOT NULL DEFAULT '1',
  templateid smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (styleid)
) TYPE=MyISAM AUTO_INCREMENT=3;

INSERT INTO cdb_styles VALUES ('1','Ĭ��ģ��','1','1');
INSERT INTO cdb_styles VALUES ('2','�Ȳʰ���','1','2');
INSERT INTO cdb_styles VALUES ('3','��������','1','3');
INSERT INTO cdb_styles VALUES ('4','��ױ����','1','4');
INSERT INTO cdb_styles VALUES ('5','ʫ����԰','1','1');
INSERT INTO cdb_styles VALUES ('6','���ⰻȻ','1','1');

DROP TABLE IF EXISTS cdb_stylevars;
CREATE TABLE cdb_stylevars (
  stylevarid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  styleid smallint(6) unsigned NOT NULL DEFAULT '0',
  variable text NOT NULL,
  substitute text NOT NULL,
  PRIMARY KEY (stylevarid),
  KEY styleid (styleid)
) TYPE=MyISAM AUTO_INCREMENT=42;

INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (1, 'available', ''),
  (1, 'commonboxborder', '#E8E8E8'),
  (1, 'noticebg', '#FFFFF2'),
  (1, 'tablebg', '#FFF'),
  (1, 'highlightlink', '#069'),
  (1, 'commonboxbg', '#F7F7F7'),
  (1, 'bgcolor', '#FFF'),
  (1, 'altbg1', '#F5FAFE'),
  (1, 'altbg2', '#E8F3FD'),
  (1, 'link', '#000'),
  (1, 'bordercolor', '#9DB3C5'),
  (1, 'headercolor', '#2F589C header_bg.gif'),
  (1, 'headertext', '#FFF'),
  (1, 'tabletext', '#000'),
  (1, 'text', '#666'),
  (1, 'catcolor', '#E8F3FD cat_bg.gif'),
  (1, 'borderwidth', '1px'),
  (1, 'fontsize', '12px'),
  (1, 'tablespace', '1px'),
  (1, 'msgfontsize', '14px'),
  (1, 'msgbigsize', '16px'),
  (1, 'msgsmallsize', '12px'),
  (1, 'font', 'Helvetica, Arial, sans-serif'),
  (1, 'smfontsize', '0.83em'),
  (1, 'smfont', 'Verdana, Arial, Helvetica, sans-serif'),
  (1, 'bgborder', '#CAD9EA'),
  (1, 'maintablewidth', '98%'),
  (1, 'imgdir', 'images/default'),
  (1, 'boardimg', 'logo.gif'),
  (1, 'inputborder', '#DDD'),
  (1, 'catborder', '#CAD9EA'),
  (1, 'lighttext', '#999'),
  (1, 'framebgcolor', 'frame_bg.gif'),
  (1, 'headermenu', '#FFF menu_bg.gif'),
  (1, 'headermenutext', '#333'),
  (1, 'boxspace', '10px'),
  (1, 'portalboxbgcode', '#FFF portalbox_bg.gif'),
  (1, 'noticeborder', '#EDEDCE'),
  (1, 'noticetext', '#090'),
  (1, 'stypeid', '1');
INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (2, 'available', ''),
  (2, 'bgcolor', '#FFF'),
  (2, 'altbg1', '#FFF'),
  (2, 'altbg2', '#F7F7F3'),
  (2, 'link', '#262626'),
  (2, 'bordercolor', '#C1C1C1'),
  (2, 'headercolor', '#FFF forumbox_head.gif'),
  (2, 'headertext', '#D00'),
  (2, 'catcolor', '#F90 cat_bg.gif'),
  (2, 'tabletext', '#535353'),
  (2, 'text', '#535353'),
  (2, 'borderwidth', '1px'),
  (2, 'tablespace', '1px'),
  (2, 'fontsize', '12px'),
  (2, 'msgfontsize', '14px'),
  (2, 'msgbigsize', '16px'),
  (2, 'msgsmallsize', '12px'),
  (2, 'font', 'Arial,Helvetica,sans-serif'),
  (2, 'smfontsize', '11px'),
  (2, 'smfont', 'Arial,Helvetica,sans-serif'),
  (2, 'boardimg', 'logo.gif'),
  (2, 'imgdir', './images/Beijing2008'),
  (2, 'maintablewidth', '98%'),
  (2, 'bgborder', '#C1C1C1'),
  (2, 'catborder', '#E2E2E2'),
  (2, 'inputborder', '#D7D7D7'),
  (2, 'lighttext', '#535353'),
  (2, 'headermenu', '#FFF menu_bg.gif'),
  (2, 'headermenutext', '#54564C'),
  (2, 'framebgcolor', ''),
  (2, 'noticebg', ''),
  (2, 'commonboxborder', '#F0F0ED'),
  (2, 'tablebg', '#FFF'),
  (2, 'highlightlink', '#535353'),
  (2, 'commonboxbg', '#F5F5F0'),
  (2, 'boxspace', '8px'),
  (2, 'portalboxbgcode', '#FFF portalbox_bg.gif'),
  (2, 'noticeborder', ''),
  (2, 'noticetext', '#DD0000'),
  (2, 'stypeid', '1');
INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (3, 'available', ''),
  (3, 'bgcolor', '#222D2D'),
  (3, 'altbg1', '#3E4F4F'),
  (3, 'altbg2', '#384747'),
  (3, 'link', '#CEEBEB'),
  (3, 'bordercolor', '#1B2424'),
  (3, 'headercolor', '#1B2424'),
  (3, 'headertext', '#94B3C5'),
  (3, 'catcolor', '#293838'),
  (3, 'tabletext', '#CEEBEB'),
  (3, 'text', '#999'),
  (3, 'borderwidth', '6px'),
  (3, 'tablespace', '0'),
  (3, 'fontsize', '12px'),
  (3, 'msgfontsize', '14px'),
  (3, 'msgbigsize', '16px'),
  (3, 'msgsmallsize', '12px'),
  (3, 'font', 'Arial'),
  (3, 'smfontsize', '11px'),
  (3, 'smfont', 'Arial,sans-serif'),
  (3, 'boardimg', 'logo.gif'),
  (3, 'imgdir', './images/Overcast'),
  (3, 'maintablewidth', '98%'),
  (3, 'bgborder', '#384747'),
  (3, 'catborder', '#1B2424'),
  (3, 'inputborder', '#EEE'),
  (3, 'lighttext', '#74898E'),
  (3, 'headermenu', '#3E4F4F'),
  (3, 'headermenutext', '#CEEBEB'),
  (3, 'framebgcolor', '#222D2D'),
  (3, 'noticebg', '#3E4F4F'),
  (3, 'commonboxborder', '#384747'),
  (3, 'tablebg', '#3E4F4F'),
  (3, 'highlightlink', '#9CB2A0'),
  (3, 'commonboxbg', '#384747'),
  (3, 'boxspace', '6px'),
  (3, 'portalboxbgcode', '#293838'),
  (3, 'noticeborder', '#384747'),
  (3, 'noticetext', '#C7E001'),
  (3, 'stypeid', '1');
INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (4, 'noticetext', '#C44D4D'),
  (4, 'noticeborder', '#D6D6D6'),
  (4, 'portalboxbgcode', '#FFF portalbox_bg.gif'),
  (4, 'boxspace', '6px'),
  (4, 'commonboxbg', '#FAFAFA'),
  (4, 'highlightlink', '#C44D4D'),
  (4, 'tablebg', '#FFF'),
  (4, 'commonboxborder', '#DEDEDE'),
  (4, 'noticebg', '#FAFAFA'),
  (4, 'framebgcolor', '#FFECF9'),
  (4, 'headermenu', 'transparent'),
  (4, 'headermenutext', ''),
  (4, 'lighttext', '#999'),
  (4, 'catborder', '#D7D7D7'),
  (4, 'inputborder', ''),
  (4, 'bgborder', '#CECECE'),
  (4, 'stypeid', '1'),
  (4, 'maintablewidth', '920px'),
  (4, 'imgdir', 'images/PinkDresser'),
  (4, 'boardimg', 'logo.gif'),
  (4, 'smfont', 'Arial,Helvetica,sans-serif'),
  (4, 'smfontsize', '12px'),
  (4, 'font', 'Arial,Helvetica,sans-serif'),
  (4, 'msgsmallsize', '12px'),
  (4, 'msgbigsize', '16px'),
  (4, 'msgfontsize', '14px'),
  (4, 'fontsize', '12px'),
  (4, 'tablespace', '0'),
  (4, 'borderwidth', '1px'),
  (4, 'text', '#666'),
  (4, 'tabletext', '#666'),
  (4, 'catcolor', '#FAFAFA category_bg.gif'),
  (4, 'headertext', '#FFF'),
  (4, 'headercolor', '#E7BFC9 forumbox_head.gif'),
  (4, 'bordercolor', '#D88E9D'),
  (4, 'link', '#C44D4D'),
  (4, 'altbg2', '#F1F1F1'),
  (4, 'available', ''),
  (4, 'altbg1', '#FBFBFB'),
  (4, 'bgcolor', '#FBF4F5 bg.gif');
INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (5, 'available', ''),
  (5, 'bgcolor', '#FFF'),
  (5, 'altbg1', '#FFFBF8'),
  (5, 'altbg2', '#FBF6F1'),
  (5, 'link', '#54564C'),
  (5, 'bordercolor', '#D7B094'),
  (5, 'headercolor', '#BE6A2D forumbox_head.gif'),
  (5, 'headertext', '#FFF'),
  (5, 'catcolor', '#E9E9E9 cat_bg.gif'),
  (5, 'tabletext', '#7B7D72'),
  (5, 'text', '#535353'),
  (5, 'borderwidth', '1px'),
  (5, 'tablespace', '1px'),
  (5, 'fontsize', '12px'),
  (5, 'msgfontsize', '14px'),
  (5, 'msgbigsize', '16px'),
  (5, 'msgsmallsize', '12px'),
  (5, 'font', 'Arial, sans-serif'),
  (5, 'smfontsize', '11px'),
  (5, 'smfont', 'Arial, sans-serif'),
  (5, 'boardimg', 'logo.gif'),
  (5, 'imgdir', './images/Picnicker'),
  (5, 'maintablewidth', '98%'),
  (5, 'bgborder', '#E8C9B7'),
  (5, 'catborder', '#E6E6E2'),
  (5, 'inputborder', ''),
  (5, 'lighttext', '#878787'),
  (5, 'headermenu', '#FFF menu_bg.gif'),
  (5, 'headermenutext', '#54564C'),
  (5, 'framebgcolor', 'frame_bg.gif'),
  (5, 'noticebg', '#FAFAF7'),
  (5, 'commonboxborder', '#E6E6E2'),
  (5, 'tablebg', '#FFF'),
  (5, 'highlightlink', ''),
  (5, 'commonboxbg', '#F5F5F0'),
  (5, 'boxspace', '6px'),
  (5, 'portalboxbgcode', '#FFF portalbox_bg.gif'),
  (5, 'noticeborder', '#E6E6E2'),
  (5, 'noticetext', '#FF3A00'),
  (5, 'stypeid', '1');
INSERT INTO cdb_stylevars (styleid, variable, substitute) VALUES
  (6, 'available', ''),
  (6, 'bgcolor', '#FFF'),
  (6, 'altbg1', '#F5F5F0'),
  (6, 'altbg2', '#F9F9F9'),
  (6, 'link', '#54564C'),
  (6, 'bordercolor', '#D9D9D4'),
  (6, 'headercolor', '#80A400 forumbox_head.gif'),
  (6, 'headertext', '#FFF'),
  (6, 'catcolor', '#F5F5F0 cat_bg.gif'),
  (6, 'tabletext', '#7B7D72'),
  (6, 'text', '#535353'),
  (6, 'borderwidth', '1px'),
  (6, 'tablespace', '1px'),
  (6, 'fontsize', '12px'),
  (6, 'msgfontsize', '14px'),
  (6, 'msgbigsize', '16px'),
  (6, 'msgsmallsize', '12px'),
  (6, 'font', 'Arial,sans-serif'),
  (6, 'smfontsize', '11px'),
  (6, 'smfont', 'Arial,sans-serif'),
  (6, 'boardimg', 'logo.gif'),
  (6, 'imgdir', './images/GreenPark'),
  (6, 'maintablewidth', '98%'),
  (6, 'bgborder', '#D9D9D4'),
  (6, 'catborder', '#D9D9D4'),
  (6, 'inputborder', '#D9D9D4'),
  (6, 'lighttext', '#878787'),
  (6, 'headermenu', '#FFF menu_bg.gif'),
  (6, 'headermenutext', '#262626'),
  (6, 'framebgcolor', ''),
  (6, 'noticebg', '#FAFAF7'),
  (6, 'commonboxborder', '#E6E6E2'),
  (6, 'tablebg', '#FFF'),
  (6, 'highlightlink', '#535353'),
  (6, 'commonboxbg', '#F9F9F9'),
  (6, 'boxspace', '6px'),
  (6, 'portalboxbgcode', '#FFF portalbox_bg.gif'),
  (6, 'noticeborder', '#E6E6E2'),
  (6, 'noticetext', '#FF3A00'),
  (6, 'stypeid', '1');

DROP TABLE IF EXISTS cdb_subscriptions;
CREATE TABLE cdb_subscriptions (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  lastnotify int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid,uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_tags;
CREATE TABLE cdb_tags (
  tagname char(20) NOT NULL,
  closed tinyint(1) NOT NULL DEFAULT '0',
  total mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (tagname),
  KEY total (total),
  KEY closed (closed)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_templates;
CREATE TABLE cdb_templates (
  templateid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `directory` varchar(100) NOT NULL DEFAULT '',
  copyright varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (templateid)
) TYPE=MyISAM AUTO_INCREMENT=3;

INSERT INTO cdb_templates VALUES ('1','Ĭ��ģ����ϵ','./templates/default','��ʢ���루�������Ƽ����޹�˾');
INSERT INTO cdb_templates VALUES ('2','�Ȳʰ���','./templates/Beijing2008','��ʢ���루�������Ƽ����޹�˾');
INSERT INTO cdb_templates VALUES ('3','��������','./templates/Overcast','��ʢ���루�������Ƽ����޹�˾');
INSERT INTO cdb_templates VALUES ('4','��ױ����','./templates/PinkDresser','��ʢ���루�������Ƽ����޹�˾');

DROP TABLE IF EXISTS cdb_threads;
CREATE TABLE cdb_threads (
  tid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  fid smallint(6) unsigned NOT NULL DEFAULT '0',
  iconid smallint(6) unsigned NOT NULL DEFAULT '0',
  typeid smallint(6) unsigned NOT NULL DEFAULT '0',
  readperm tinyint(3) unsigned NOT NULL DEFAULT '0',
  price smallint(6) NOT NULL DEFAULT '0',
  author char(15) NOT NULL DEFAULT '',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` char(80) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  lastposter char(15) NOT NULL DEFAULT '',
  views int(10) unsigned NOT NULL DEFAULT '0',
  replies mediumint(8) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(1) NOT NULL DEFAULT '0',
  highlight tinyint(1) NOT NULL DEFAULT '0',
  digest tinyint(1) NOT NULL DEFAULT '0',
  rate tinyint(1) NOT NULL DEFAULT '0',
  blog tinyint(1) NOT NULL DEFAULT '0',
  special tinyint(1) NOT NULL DEFAULT '0',
  attachment tinyint(1) NOT NULL DEFAULT '0',
  subscribed tinyint(1) NOT NULL DEFAULT '0',
  moderated tinyint(1) NOT NULL DEFAULT '0',
  closed mediumint(8) unsigned NOT NULL DEFAULT '0',
  itemid mediumint(8) unsigned NOT NULL DEFAULT '0',
  supe_pushstatus tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (tid),
  KEY digest (digest),
  KEY displayorder (fid,displayorder,lastpost),
  KEY blog (blog,authorid,dateline),
  KEY typeid (fid,typeid,displayorder,lastpost)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_threadsmod;
CREATE TABLE cdb_threadsmod (
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  `action` char(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  magicid smallint(6) unsigned NOT NULL,
  KEY tid (tid,dateline),
  KEY expiration (expiration,`status`)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_threadtags;
CREATE TABLE cdb_threadtags (
  tagname char(20) NOT NULL,
  tid int(10) unsigned NOT NULL,
  KEY tagname (tagname),
  KEY tid (tid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_threadtypes;
CREATE TABLE cdb_threadtypes (
  typeid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  special smallint(6) NOT NULL DEFAULT '0',
  modelid smallint(6) unsigned NOT NULL DEFAULT '0',
  expiration tinyint(1) NOT NULL DEFAULT '0',
  template text NOT NULL,
  PRIMARY KEY (typeid)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_tradecomments;
CREATE TABLE cdb_tradecomments (
  id mediumint(8) NOT NULL AUTO_INCREMENT,
  orderid char(32) NOT NULL,
  pid int(10) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL,
  raterid mediumint(8) unsigned NOT NULL,
  rater char(15) NOT NULL,
  rateeid mediumint(8) unsigned NOT NULL,
  ratee char(15) NOT NULL,
  message char(200) NOT NULL,
  explanation char(200) NOT NULL,
  score tinyint(1) NOT NULL,
  dateline int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY raterid (raterid,`type`,dateline),
  KEY rateeid (rateeid,`type`,dateline),
  KEY orderid (orderid)
) TYPE=MyISAM AUTO_INCREMENT=1;


DROP TABLE IF EXISTS cdb_tradelog;
CREATE TABLE cdb_tradelog (
  tid mediumint(8) unsigned NOT NULL,
  pid int(10) unsigned NOT NULL,
  orderid varchar(32) NOT NULL,
  tradeno varchar(32) NOT NULL,
  `subject` varchar(100) NOT NULL,
  price decimal(8,2) NOT NULL,
  quality tinyint(1) unsigned NOT NULL DEFAULT '0',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  number smallint(5) unsigned NOT NULL DEFAULT '0',
  tax decimal(6,2) unsigned NOT NULL DEFAULT '0.00',
  locus varchar(100) NOT NULL,
  sellerid mediumint(8) unsigned NOT NULL,
  seller varchar(15) NOT NULL,
  selleraccount varchar(50) NOT NULL,
  buyerid mediumint(8) unsigned NOT NULL,
  buyer varchar(15) NOT NULL,
  buyercontact varchar(50) NOT NULL,
  buyercredits smallint(5) unsigned NOT NULL DEFAULT '0',
  buyermsg varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  offline tinyint(1) NOT NULL DEFAULT '0',
  buyername varchar(50) NOT NULL,
  buyerzip varchar(10) NOT NULL,
  buyerphone varchar(20) NOT NULL,
  buyermobile varchar(20) NOT NULL,
  transport tinyint(1) NOT NULL DEFAULT '0',
  transportfee smallint(6) unsigned NOT NULL DEFAULT '0',
  baseprice decimal(8,2) NOT NULL,
  discount tinyint(1) NOT NULL DEFAULT '0',
  ratestatus tinyint(1) NOT NULL DEFAULT '0',
  message text NOT NULL,
  UNIQUE KEY orderid (orderid),
  KEY sellerid (sellerid),
  KEY buyerid (buyerid),
  KEY `status` (`status`),
  KEY buyerlog (buyerid,`status`,lastupdate),
  KEY sellerlog (sellerid,`status`,lastupdate),
  KEY tid (tid,pid),
  KEY pid (pid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_tradeoptionvars;
CREATE TABLE cdb_tradeoptionvars (
  typeid smallint(6) unsigned NOT NULL DEFAULT '0',
  pid mediumint(8) unsigned NOT NULL DEFAULT '0',
  optionid smallint(6) unsigned NOT NULL DEFAULT '0',
  `value` mediumtext NOT NULL,
  KEY typeid (typeid),
  KEY pid (pid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_trades;
CREATE TABLE cdb_trades (
  tid mediumint(8) unsigned NOT NULL,
  pid int(10) unsigned NOT NULL,
  typeid smallint(6) unsigned NOT NULL,
  sellerid mediumint(8) unsigned NOT NULL,
  seller char(15) NOT NULL,
  account char(50) NOT NULL,
  `subject` char(100) NOT NULL,
  price decimal(8,2) NOT NULL,
  amount smallint(6) unsigned NOT NULL DEFAULT '1',
  quality tinyint(1) unsigned NOT NULL DEFAULT '0',
  locus char(20) NOT NULL,
  transport tinyint(1) NOT NULL DEFAULT '0',
  ordinaryfee smallint(4) unsigned NOT NULL DEFAULT '0',
  expressfee smallint(4) unsigned NOT NULL DEFAULT '0',
  emsfee smallint(4) unsigned NOT NULL DEFAULT '0',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  lastbuyer char(15) NOT NULL,
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  totalitems smallint(5) unsigned NOT NULL DEFAULT '0',
  tradesum decimal(8,2) NOT NULL DEFAULT '0.00',
  closed tinyint(1) NOT NULL DEFAULT '0',
  aid mediumint(8) unsigned NOT NULL,
  displayorder tinyint(1) NOT NULL,
  costprice decimal(8,2) NOT NULL,
  PRIMARY KEY (tid,pid),
  KEY sellerid (sellerid),
  KEY totalitems (totalitems),
  KEY tradesum (tradesum),
  KEY displayorder (tid,displayorder),
  KEY sellertrades (sellerid,tradesum,totalitems),
  KEY typeid (typeid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS cdb_typemodels;
CREATE TABLE cdb_typemodels (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  options mediumtext NOT NULL,
  customoptions mediumtext NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=100;

INSERT INTO cdb_typemodels VALUES ('1','���ݽ�����Ϣ','0','1','7	10	13	65	66	68','');
INSERT INTO cdb_typemodels VALUES ('2','��Ʊ������Ϣ','0','1','55	56	58	67	7	13	68','');
INSERT INTO cdb_typemodels VALUES ('3','��Ȥ������Ϣ','0','1','8	9	31','');
INSERT INTO cdb_typemodels VALUES ('4','��˾��Ƹ��Ϣ','0','1','34	48	54	51	47	46	44	45	52	53','');

ALTER TABLE cdb_typemodels AUTO_INCREMENT=101;

DROP TABLE IF EXISTS cdb_typeoptions;
CREATE TABLE cdb_typeoptions (
  optionid smallint(6) unsigned NOT NULL auto_increment,
  classid smallint(6) unsigned NOT NULL default '0',
  displayorder tinyint(3) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  identifier varchar(40) NOT NULL default '',
  `type` varchar(20) NOT NULL default '',
  rules mediumtext NOT NULL,
  PRIMARY KEY  (optionid),
  KEY classid (classid)
) TYPE=MyISAM  AUTO_INCREMENT=3001 ;

INSERT INTO cdb_typeoptions VALUES (1, 0, 0, 'ͨ����', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (2, 0, 0, '������', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (3, 0, 0, '������', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (4, 0, 0, '��ְ��Ƹ��', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (5, 0, 0, '������', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (6, 0, 0, '��������', '', '', '', '');
INSERT INTO cdb_typeoptions VALUES (7, 1, 0, '����', '', 'name', 'text', '');
INSERT INTO cdb_typeoptions VALUES (9, 1, 0, '����', '', 'age', 'number', '');
INSERT INTO cdb_typeoptions VALUES (10, 1, 0, '��ַ', '', 'address', 'text', '');
INSERT INTO cdb_typeoptions VALUES (11, 1, 0, 'QQ', '', 'qq', 'number', '');
INSERT INTO cdb_typeoptions VALUES (12, 1, 0, '����', '', 'mail', 'email', '');
INSERT INTO cdb_typeoptions VALUES (13, 1, 0, '�绰', '', 'phone', 'text', '');
INSERT INTO cdb_typeoptions VALUES (14, 5, 0, '��ѵ����', '', 'teach_pay', 'text', '');
INSERT INTO cdb_typeoptions VALUES (15, 5, 0, '��ѵʱ��', '', 'teach_time', 'text', '');
INSERT INTO cdb_typeoptions VALUES (20, 2, 0, '¥��', '', 'floor', 'number', '');
INSERT INTO cdb_typeoptions VALUES (21, 2, 0, '��ͨ״��', '', 'traf', 'textarea', '');
INSERT INTO cdb_typeoptions VALUES (22, 2, 0, '��ͼ', '', 'images', 'image', '');
INSERT INTO cdb_typeoptions VALUES (24, 2, 0, '�۸�', '', 'price', 'text', '');
INSERT INTO cdb_typeoptions VALUES (26, 5, 0, '��ѵ����', '', 'teach_name', 'text', '');
INSERT INTO cdb_typeoptions VALUES (28, 3, 0, '����', '', 'heighth', 'number', '');
INSERT INTO cdb_typeoptions VALUES (29, 3, 0, '����', '', 'weighth', 'number', '');
INSERT INTO cdb_typeoptions VALUES (33, 1, 0, '��Ƭ', '', 'photo', 'image', '');
INSERT INTO cdb_typeoptions VALUES (35, 5, 0, '����ʽ', '', 'service_type', 'text', '');
INSERT INTO cdb_typeoptions VALUES (36, 5, 0, '����ʱ��', '', 'service_time', 'text', '');
INSERT INTO cdb_typeoptions VALUES (37, 5, 0, '�������', '', 'service_pay', 'text', '');
INSERT INTO cdb_typeoptions VALUES (39, 6, 0, '��ַ', '', 'site_url', 'url', '');
INSERT INTO cdb_typeoptions VALUES (40, 6, 0, '�����ʼ�', '', 'site_mail', 'email', '');
INSERT INTO cdb_typeoptions VALUES (42, 6, 0, '��վ����', '', 'site_name', 'text', '');
INSERT INTO cdb_typeoptions VALUES (46, 4, 0, 'ְλ', '', 'recr_intend', 'text', '');
INSERT INTO cdb_typeoptions VALUES (47, 4, 0, '�����ص�', '', 'recr_palce', 'text', '');
INSERT INTO cdb_typeoptions VALUES (49, 4, 0, '��Ч����', '', 'recr_end', 'calendar', '');
INSERT INTO cdb_typeoptions VALUES (51, 4, 0, '��˾����', '', 'recr_com', 'text', '');
INSERT INTO cdb_typeoptions VALUES (52, 4, 0, '����Ҫ��', '', 'recr_age', 'text', '');
INSERT INTO cdb_typeoptions VALUES (54, 4, 0, 'רҵ', '', 'recr_abli', 'text', '');
INSERT INTO cdb_typeoptions VALUES (55, 5, 0, 'ʼ��', '', 'leaves', 'text', '');
INSERT INTO cdb_typeoptions VALUES (56, 5, 0, '�յ�', '', 'boundfor', 'text', '');
INSERT INTO cdb_typeoptions VALUES (57, 6, 0, 'Alexa����', '', 'site_top', 'number', '');
INSERT INTO cdb_typeoptions VALUES (58, 5, 0, '����/����', '', 'train_no', 'text', '');
INSERT INTO cdb_typeoptions VALUES (59, 5, 0, '����', '', 'trade_num', 'number', '');
INSERT INTO cdb_typeoptions VALUES (60, 5, 0, '�۸�', '', 'trade_price', 'text', '');
INSERT INTO cdb_typeoptions VALUES (61, 5, 0, '��Ч����', '', 'trade_end', 'calendar', '');
INSERT INTO cdb_typeoptions VALUES (63, 1, 0, '��ϸ����', '', 'detail_content', 'textarea', '');
INSERT INTO cdb_typeoptions VALUES (64, 1, 0, '����', '', 'born_place', 'text', '');
INSERT INTO cdb_typeoptions VALUES (65, 2, 0, '���', '', 'money', 'text', '');
INSERT INTO cdb_typeoptions VALUES (66, 2, 0, '���', '', 'acreage', 'text', '');
INSERT INTO cdb_typeoptions VALUES (67, 5, 0, '����ʱ��', '', 'time', 'calendar', 'N;');
INSERT INTO cdb_typeoptions VALUES (68, 1, 0, '���ڵ�', '', 'now_place', 'text', '');


DROP TABLE IF EXISTS cdb_typeoptionvars;
CREATE TABLE cdb_typeoptionvars (
  typeid smallint(6) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  optionid smallint(6) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  `value` mediumtext NOT NULL,
  KEY typeid (typeid),
  KEY tid (tid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_typevars;
CREATE TABLE cdb_typevars (
  typeid smallint(6) NOT NULL DEFAULT '0',
  optionid smallint(6) NOT NULL DEFAULT '0',
  available tinyint(1) NOT NULL DEFAULT '0',
  required tinyint(1) NOT NULL DEFAULT '0',
  unchangeable tinyint(1) NOT NULL DEFAULT '0',
  search tinyint(1) NOT NULL DEFAULT '0',
  displayorder tinyint(3) NOT NULL DEFAULT '0',
  UNIQUE KEY optionid (typeid,optionid),
  KEY typeid (typeid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_usergroups;
CREATE TABLE cdb_usergroups (
  groupid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  radminid tinyint(3) NOT NULL DEFAULT '0',
  `type` enum('system','special','member') NOT NULL DEFAULT 'member',
  system char(8) NOT NULL DEFAULT 'private',
  grouptitle char(30) NOT NULL DEFAULT '',
  creditshigher int(10) NOT NULL DEFAULT '0',
  creditslower int(10) NOT NULL DEFAULT '0',
  stars tinyint(3) NOT NULL DEFAULT '0',
  color char(7) NOT NULL DEFAULT '',
  groupavatar char(60) NOT NULL DEFAULT '',
  readaccess tinyint(3) unsigned NOT NULL DEFAULT '0',
  allowvisit tinyint(1) NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowreply tinyint(1) NOT NULL DEFAULT '0',
  allowpostpoll tinyint(1) NOT NULL DEFAULT '0',
  allowpostreward tinyint(1) NOT NULL DEFAULT '0',
  allowposttrade tinyint(1) NOT NULL DEFAULT '0',
  allowpostactivity tinyint(1) NOT NULL DEFAULT '0',
  allowpostvideo tinyint(1) NOT NULL DEFAULT '0',
  allowdirectpost tinyint(1) NOT NULL DEFAULT '0',
  allowgetattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostattach tinyint(1) NOT NULL DEFAULT '0',
  allowvote tinyint(1) NOT NULL DEFAULT '0',
  allowmultigroups tinyint(1) NOT NULL DEFAULT '0',
  allowsearch tinyint(1) NOT NULL DEFAULT '0',
  allowavatar tinyint(1) NOT NULL DEFAULT '0',
  allowcstatus tinyint(1) NOT NULL DEFAULT '0',
  allowuseblog tinyint(1) NOT NULL DEFAULT '0',
  allowinvisible tinyint(1) NOT NULL DEFAULT '0',
  allowtransfer tinyint(1) NOT NULL DEFAULT '0',
  allowsetreadperm tinyint(1) NOT NULL DEFAULT '0',
  allowsetattachperm tinyint(1) NOT NULL DEFAULT '0',
  allowhidecode tinyint(1) NOT NULL DEFAULT '0',
  allowhtml tinyint(1) NOT NULL DEFAULT '0',
  allowcusbbcode tinyint(1) NOT NULL DEFAULT '0',
  allowanonymous tinyint(1) NOT NULL DEFAULT '0',
  allownickname tinyint(1) NOT NULL DEFAULT '0',
  allowsigbbcode tinyint(1) NOT NULL DEFAULT '0',
  allowsigimgcode tinyint(1) NOT NULL DEFAULT '0',
  allowviewpro tinyint(1) NOT NULL DEFAULT '0',
  allowviewstats tinyint(1) NOT NULL DEFAULT '0',
  disableperiodctrl tinyint(1) NOT NULL DEFAULT '0',
  reasonpm tinyint(1) NOT NULL DEFAULT '0',
  maxprice smallint(6) unsigned NOT NULL DEFAULT '0',
  maxpmnum smallint(6) unsigned NOT NULL DEFAULT '0',
  maxsigsize smallint(6) unsigned NOT NULL DEFAULT '0',
  maxattachsize mediumint(8) unsigned NOT NULL DEFAULT '0',
  maxsizeperday int(10) unsigned NOT NULL DEFAULT '0',
  maxpostsperhour tinyint(3) unsigned NOT NULL DEFAULT '0',
  attachextensions char(100) NOT NULL DEFAULT '',
  raterange char(150) NOT NULL DEFAULT '',
  mintradeprice smallint(6) unsigned NOT NULL DEFAULT '1',
  maxtradeprice smallint(6) unsigned NOT NULL DEFAULT '0',
  minrewardprice smallint(6) NOT NULL DEFAULT '1',
  maxrewardprice smallint(6) NOT NULL DEFAULT '0',
  magicsdiscount tinyint(1) NOT NULL,
  allowmagics tinyint(1) unsigned NOT NULL,
  maxmagicsweight smallint(6) unsigned NOT NULL,
  allowbiobbcode tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowbioimgcode tinyint(1) unsigned NOT NULL DEFAULT '0',
  maxbiosize smallint(6) unsigned NOT NULL DEFAULT '0',
  allowinvite tinyint(1) NOT NULL DEFAULT '0',
  allowmailinvite tinyint(1) NOT NULL DEFAULT '0',
  maxinvitenum tinyint(3) unsigned NOT NULL DEFAULT '0',
  inviteprice smallint(6) unsigned NOT NULL DEFAULT '0',
  maxinviteday smallint(6) unsigned NOT NULL DEFAULT '0',
  allowpostdebate tinyint(1) NOT NULL DEFAULT '0',
  tradestick tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (groupid),
  KEY creditsrange (creditshigher,creditslower)
) TYPE=MyISAM AUTO_INCREMENT=16;

INSERT INTO cdb_usergroups VALUES ('1','1','system','private','����Ա','0','0','9','','','200','1','1','1','1','1','1','1','1','3','1','1','1','1','2','3','1','1','1','1','1','1','1','0','1','1','1','1','1','1','1','1','0','30','200','500','2048000','0','0','','1	-30	30	500','1','0','1','0','0','2','200','2','2','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('2','2','system','private','��������','0','0','8','','','150','1','1','1','1','1','1','1','1','1','1','1','1','1','1','3','1','1','1','1','1','1','1','0','1','0','1','1','1','1','1','1','0','20','120','300','2048000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','1	-15	15	50','1','0','1','0','0','2','180','2','2','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('3','3','system','private','����','0','0','7','','','100','1','1','1','1','1','1','1','1','1','1','1','1','1','1','3','1','1','0','1','1','1','1','0','1','0','1','1','1','1','1','1','0','10','80','200','2048000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','1	-10	10	30','1','0','1','0','0','2','160','2','2','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('4','0','system','private','��ֹ����','0','0','0','','','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('5','0','system','private','��ֹ����','0','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('6','0','system','private','��ֹ IP','0','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('7','0','system','private','�ο�','0','0','0','','','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','gif,jpg,jpeg,png','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('8','0','system','private','�ȴ���֤��Ա','0','0','0','','','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','50','0','0','0','','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('9','0','member','private','��ؤ','-9999999','0','0','','','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','chm,pdf,zip,rar,tar,gz,bzip2,gif,jpg,jpeg,png','','1','0','1','0','1','0','0','0','0','0','0','0','0','0','0','0','5');
INSERT INTO cdb_usergroups VALUES ('10','0','member','private','������·','0','50','1','','','10','1','1','1','0','0','1','0','0','0','1','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','1','0','1','0','0','0','0','20','80','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','1','40','1','1','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('11','0','member','private','ע���Ա','50','200','2','','','20','1','1','1','1','1','1','1','1','0','1','0','1','0','1','1','0','0','0','0','0','0','0','0','0','0','0','1','0','1','1','0','0','0','30','100','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','1','60','1','1','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('12','0','member','private','�м���Ա','200','500','3','','','30','1','1','1','1','1','1','1','1','0','1','0','1','0','1','2','0','0','0','0','0','0','0','0','1','0','0','1','0','1','1','0','0','0','50','150','256000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','1','80','1','1','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('13','0','member','private','�߼���Ա','500','1000','4','','','50','1','1','1','1','1','1','1','1','0','1','1','1','1','1','3','1','0','0','0','0','0','0','0','1','0','1','1','0','1','1','0','0','0','60','200','512000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','1	-10	10	30','1','0','1','0','0','2','100','2','2','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('14','0','member','private','���ƻ�Ա','1000','3000','6','','','70','1','1','1','1','1','1','1','1','0','1','1','1','1','1','3','1','0','0','0','1','1','0','0','1','0','1','1','1','1','1','0','0','0','80','300','1024000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','1	-15	15	40','1','0','1','0','0','2','120','2','2','0','0','0','0','0','0','1','5');
INSERT INTO cdb_usergroups VALUES ('15','0','member','private','��̳Ԫ��','3000','9999999','8','','','90','1','1','1','1','1','1','1','1','0','1','1','1','1','1','3','1','0','1','0','1','1','0','0','1','1','1','1','1','1','1','0','0','0','100','500','2048000','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','1	-20	20	50','1','0','1','0','0','2','140','2','2','0','0','0','0','0','0','1','5');

DROP TABLE IF EXISTS cdb_validating;
CREATE TABLE cdb_validating (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  submitdate int(10) unsigned NOT NULL DEFAULT '0',
  moddate int(10) unsigned NOT NULL DEFAULT '0',
  admin varchar(15) NOT NULL DEFAULT '',
  submittimes tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  message text NOT NULL,
  remark text NOT NULL,
  PRIMARY KEY (uid),
  KEY `status` (`status`)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_videos;
CREATE TABLE cdb_videos (
  vid varchar(16) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  pid int(10) unsigned NOT NULL DEFAULT '0',
  vtype tinyint(1) unsigned NOT NULL DEFAULT '0',
  vview mediumint(8) unsigned NOT NULL DEFAULT '0',
  vtime smallint(6) unsigned NOT NULL DEFAULT '0',
  visup tinyint(1) unsigned NOT NULL DEFAULT '0',
  vthumb varchar(128) NOT NULL DEFAULT '',
  vtitle varchar(64) NOT NULL DEFAULT '',
  vclass varchar(32) NOT NULL DEFAULT '',
  vautoplay tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (vid),
  UNIQUE KEY uid (vid,uid),
  KEY dateline (dateline)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_videotags;
CREATE TABLE cdb_videotags (
  tagname char(10) NOT NULL DEFAULT '',
  vid char(14) NOT NULL DEFAULT '',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY tagname (tagname,vid),
  KEY tid (tid)
) TYPE=MyISAM;


DROP TABLE IF EXISTS cdb_words;
CREATE TABLE cdb_words (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  admin varchar(15) NOT NULL DEFAULT '',
  find varchar(255) NOT NULL DEFAULT '',
  replacement varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) TYPE=MyISAM AUTO_INCREMENT=1;

