DROP TABLE IF EXISTS `shawn_admin`;
CREATE TABLE `shawn_admin`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户名',
	`password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '密码',
	`loginnum` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
	`last_login_ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '最后登录ip',
	`last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
	`real_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '真实姓名',
	`status` int(1) NOT NULL DEFAULT '0' COMMENT '状态:1正常;0停用',
	`roleid` int(11)  NOT NULL DEFAULT '1' COMMENT '用户角色id',
	PRIMARY KEY (`id`),
	UNIQUE KEY `username` (`username`),
	KEY `status` (`status`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `shawn_admin` VALUES('1','admin','21232f297a57a5a743894a0e4a801fc3','0','127.0.0.1','1488867682','admin','1','1');