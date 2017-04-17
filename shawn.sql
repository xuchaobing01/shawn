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
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT '管理员表';

INSERT INTO `shawn_admin` VALUES('1','admin','21232f297a57a5a743894a0e4a801fc3','0','127.0.0.1','1488867682','admin','1','1');


DROP TABLE IF EXISTS `shawn_role`;
CREATE TABLE `shawn_role` (
	`id` INT (11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	`rolename` VARCHAR (155) NOT NULL DEFAULT '' COMMENT '角色名称',
	`node` VARCHAR (255) DEFAULT '' COMMENT '权限节点数据',
	`pid` INT (11) DEFAULT '0' COMMENT '上级角色id',
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT '角色表';

INSERT INTO `shawn_role` VALUES('1','超级管理员','*','0');

DROP TABLE IF EXISTS `shawn_node`;
CREATE TABLE `shawn_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nodename` varchar(155) NOT NULL DEFAULT '' COMMENT '节点名称',
  `module_name` varchar(155) NOT NULL DEFAULT '' COMMENT '模块名',
  `control_name` varchar(155) NOT NULL DEFAULT '' COMMENT '控制器名',
  `action_name` varchar(155) NOT NULL COMMENT '方法名',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是菜单项 1不是 2是',
  `pid` int(11) NOT NULL COMMENT '父级节点id',
  `style` varchar(155) DEFAULT '' COMMENT '菜单样式',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=innoDB DEFAULT CHARSET=utf8 COMMENT '权限表';


