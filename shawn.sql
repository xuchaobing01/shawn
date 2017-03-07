DROP TABLE IF EXISTS `shawn_admin`;
CREATE TABLE `shawn_admin`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '用户名', 
	`password` varchar(255) COLLATE utf8_bin DEFATUT '' COMMENT '密码',
	`loginnum` int(11) DEFAULT '0' COMMENT '登录次数',
	`last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录ip',
	`last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
	`real_name` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
	`status` int(1) DEFAULT '0' COMMENT '状态',
	`roleid` int(11)  DEFAULT '1' COMMENT '用户角色id',
	PRIMARY KEY ('id'),
	KEY 'username'('username'),
	KEY 'status'('status'), 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;