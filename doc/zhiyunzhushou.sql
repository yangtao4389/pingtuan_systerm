/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : zhiyunzhushou

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 09/01/2018 15:26:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for zhi_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `zhi_auth_group`;
CREATE TABLE `zhi_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组所属模块',
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '组类型',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户组表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_auth_group
-- ----------------------------
INSERT INTO `zhi_auth_group` VALUES (1, 'admin', '1', '超级管理员组', '拥有最高权限', 1, '2,1');
INSERT INTO `zhi_auth_group` VALUES (2, 'admin', '1', '测试组', '测试后台功能', 1, '13,12,21,19,18,17,16,15,14,20,1,3');

-- ----------------------------
-- Table structure for zhi_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `zhi_auth_group_access`;
CREATE TABLE `zhi_auth_group_access`  (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id',
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户所属组表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of zhi_auth_group_access
-- ----------------------------
INSERT INTO `zhi_auth_group_access` VALUES (1, 1);

-- ----------------------------
-- Table structure for zhi_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `zhi_auth_rule`;
CREATE TABLE `zhi_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1-url;2-主菜单',
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `group` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '权限节点分组',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `module`(`module`, `status`, `type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 62 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限规则表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_auth_rule
-- ----------------------------
INSERT INTO `zhi_auth_rule` VALUES (61, 'admin', 1, 'admin/channel/contentlist', '内容列表', '内容', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (60, 'admin', 1, 'admin/channel/index', '内容分类', '内容', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (53, 'admin', 1, 'admin/diycontent/index', '自定义内容', '内容', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (52, 'admin', 1, 'admin/diytag/index', '自定义标签', '内容', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (40, 'admin', 1, 'admin/group/access', '权限列表', '会员', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (39, 'admin', 1, 'admin/group/index', '用户组列表', '会员', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (34, 'admin', 1, 'admin/index/main', '系统预览', '首页', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (35, 'admin', 1, 'admin/index/clear', '更新缓存', '首页', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (36, 'admin', 1, 'admin/config/group', '配置管理', '首页', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (37, 'admin', 1, 'admin/menu/index', '菜单管理', '首页', 1, '');
INSERT INTO `zhi_auth_rule` VALUES (38, 'admin', 1, 'admin/user/index', '用户列表', '会员', 1, '');

-- ----------------------------
-- Table structure for zhi_channel
-- ----------------------------
DROP TABLE IF EXISTS `zhi_channel`;
CREATE TABLE `zhi_channel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '类别标题',
  `parent_id` int(11) DEFAULT 0 COMMENT '父类id',
  `sort_num` int(11) DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_channel
-- ----------------------------
INSERT INTO `zhi_channel` VALUES (8, '帮助中心', 0, 0);

-- ----------------------------
-- Table structure for zhi_channel_content
-- ----------------------------
DROP TABLE IF EXISTS `zhi_channel_content`;
CREATE TABLE `zhi_channel_content`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT 0 COMMENT '类别id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标题',
  `short_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '简短描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '内容',
  `create_time` int(11) DEFAULT 0 COMMENT '创建时间',
  `publish_time` int(11) DEFAULT 0 COMMENT '发布时间',
  `status` tinyint(2) DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '内容列表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_channel_content
-- ----------------------------
INSERT INTO `zhi_channel_content` VALUES (1, 8, '测试内容1', '', '', 1514965315, 1514965308, 0);
INSERT INTO `zhi_channel_content` VALUES (2, 8, '测试内容二1', '', '<p>对对对</p>', 1514965336, 1514965320, 1);

-- ----------------------------
-- Table structure for zhi_config
-- ----------------------------
DROP TABLE IF EXISTS `zhi_config`;
CREATE TABLE `zhi_config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'text' COMMENT '配置类型',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '配置分组',
  `extra` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置说明',
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '小图标',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '状态',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '配置值',
  `sort` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type`(`type`) USING BTREE,
  INDEX `group`(`group`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 68 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '配置详情表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_config
-- ----------------------------
INSERT INTO `zhi_config` VALUES (1, 'config_group_list', 'textarea', '配置分组', 99, '', '', '', 1447305542, 1511415876, 1, '1:基本\r\n99:系统', 0);
INSERT INTO `zhi_config` VALUES (3, 'auth_config', 'textarea', 'Auth配置', 99, '', '自定义Auth.class.php类配置', '', 1379409310, 1379409564, 1, 'AUTH_ON:1\r\nAUTH_TYPE:2', 8);
INSERT INTO `zhi_config` VALUES (14, 'web_site_title', 'text', '网站标题', 1, '', '网站标题前台显示标题', '', 1378898976, 1379235274, 1, '智云后台', 0);
INSERT INTO `zhi_config` VALUES (15, 'web_site_url', 'text', '网站URL', 1, '', '网站网址', '', 1378898976, 1379235274, 1, 'http://tp5.zhiyunzhushou.com', 1);
INSERT INTO `zhi_config` VALUES (16, 'web_site_description', 'textarea', '网站描述', 1, '', '网站搜索引擎描述', '', 1378898976, 1379235841, 1, '拼团系统', 3);
INSERT INTO `zhi_config` VALUES (17, 'web_site_keyword', 'textarea', '网站关键字', 1, '', '', '', 1378898976, 1511857830, 1, '拼团系统', 6);
INSERT INTO `zhi_config` VALUES (19, 'web_site_icp', 'text', '网站备案号', 1, '', '', '', 1378900335, 1511857811, 1, '鲁ICP备17056316号-1	', 7);
INSERT INTO `zhi_config` VALUES (23, 'user_group_type', 'textarea', '会员分组类别', 99, '', '', '', 1449196835, 1511415858, 1, 'admin:后台管理员\r\nmember:普通会员', 1);
INSERT INTO `zhi_config` VALUES (67, 'cfg_appdown_image', 'image', 'App预览图', 1, '', '', '', 1515395213, 1515395213, 1, '', 0);
INSERT INTO `zhi_config` VALUES (65, 'cfg_wechart_qrcode', 'image', '微信二维码', 1, '', '', '', 1513214597, 1513214597, 1, '74', 0);
INSERT INTO `zhi_config` VALUES (66, 'cfg_app_qrcode	', 'image', 'APP下载二维码', 1, '', '', '', 1513214629, 1513215269, 1, '75', 0);
INSERT INTO `zhi_config` VALUES (44, 'web_logo', 'image', '网站logo', 0, '', '网站logo', '', 1507628370, 1513214515, 1, '29', 0);
INSERT INTO `zhi_config` VALUES (24, 'config_type_list', 'textarea', '字段类型', 99, '', '', '', 1459136529, 1459136529, 1, 'text:单行文本:varchar\r\nstring:字符串:int\r\npassword:密码:varchar\r\ntextarea:多行文本:text\r\nbool:布尔型:int\r\nselect:选择:varchar\r\nnum:数字:int\r\ndecimal:金额:decimal\r\ntags:标签:varchar\r\ndatetime:时间控件:int\r\ndate:日期控件:varchar\r\neditor:编辑器:text\r\nbind:模型绑定:int\r\nimage:图片上传:int\r\nimages:多图上传:varchar\r\nattach:文件上传:varchar', 0);

-- ----------------------------
-- Table structure for zhi_diy_content
-- ----------------------------
DROP TABLE IF EXISTS `zhi_diy_content`;
CREATE TABLE `zhi_diy_content`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placeid` int(11) DEFAULT 0 COMMENT '位置id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标题',
  `pic` int(11) DEFAULT 0 COMMENT '图片',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '内容',
  `gourl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '跳转地址',
  `sort_num` int(11) DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '自定义内容列表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_diy_content
-- ----------------------------
INSERT INTO `zhi_diy_content` VALUES (1, 1, '第一个幻灯片', 0, 'dddd', '', 0);

-- ----------------------------
-- Table structure for zhi_diy_place
-- ----------------------------
DROP TABLE IF EXISTS `zhi_diy_place`;
CREATE TABLE `zhi_diy_place`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标题',
  `group_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '子分组标题',
  `sort_num` int(11) DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '自定义位置' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_diy_place
-- ----------------------------
INSERT INTO `zhi_diy_place` VALUES (1, '顶部幻灯片', 'index', 1);

-- ----------------------------
-- Table structure for zhi_diytag
-- ----------------------------
DROP TABLE IF EXISTS `zhi_diytag`;
CREATE TABLE `zhi_diytag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tagdescript` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_diytag
-- ----------------------------
INSERT INTO `zhi_diytag` VALUES (2, '友好', '订单', 0);
INSERT INTO `zhi_diytag` VALUES (3, '订单', '搜索', 0);
INSERT INTO `zhi_diytag` VALUES (4, 'sss', 'dd', 0);
INSERT INTO `zhi_diytag` VALUES (5, '弹窗标签', '的订单', 0);

-- ----------------------------
-- Table structure for zhi_member
-- ----------------------------
DROP TABLE IF EXISTS `zhi_member`;
CREATE TABLE `zhi_member`  (
  `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户密码',
  `nickname` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '邮箱地址',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '手机号码',
  `logo` int(11) DEFAULT NULL COMMENT '头像',
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '用户类型',
  `sex` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT 0 COMMENT '用户积分',
  `signature` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户签名',
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '密码盐值',
  `login` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT 0 COMMENT '注册IP',
  `reg_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT 0 COMMENT '最后登录IP',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '会员状态',
  PRIMARY KEY (`uid`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_member
-- ----------------------------
INSERT INTO `zhi_member` VALUES (1, 'admin', 'e710b58d6f13bb8721335e345fb4fe05', 'admin', 'admin@admin.com', '', NULL, 'admin', 0, '0000-00-00', '', 0, '', 'kGbuEp', 12, 0, 1507431869, 2130706433, 1511230385, 1);
INSERT INTO `zhi_member` VALUES (7, 'jiayongwei', '51927dd7d787af0f9273709062d92713', 'admin', NULL, '15853332556', NULL, 'admin', 0, '0000-00-00', '', 0, '', 'KSFUZM', 0, 0, 1514964441, 0, 0, 1);
INSERT INTO `zhi_member` VALUES (5, 'demo', 'cea5c9824d952c4c8a806790df649a58', '演示用户', NULL, '', NULL, 'shoper', 0, '0000-00-00', '', 0, NULL, 'wpHeVf', 0, 0, 1511749345, 0, 0, 1);
INSERT INTO `zhi_member` VALUES (6, 'zhiyun2', '497ef39a242e9402105b5ee873289f13', '智云demo2', NULL, '15853332550', NULL, 'member', 0, '0000-00-00', '', 0, NULL, 'Enwcly', 0, 0, 1512023007, 0, 0, 1);

-- ----------------------------
-- Table structure for zhi_member_address
-- ----------------------------
DROP TABLE IF EXISTS `zhi_member_address`;
CREATE TABLE `zhi_member_address`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT 0,
  `cnname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  `provinceid` int(11) DEFAULT 0,
  `city_level1` int(11) DEFAULT 0,
  `city_level2` int(11) DEFAULT 0,
  `city_level3` int(11) DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  `create_time` int(11) DEFAULT 0,
  `isdefault` tinyint(2) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zhi_member_address
-- ----------------------------
INSERT INTO `zhi_member_address` VALUES (1, 7, 'dd', '0', 0, 0, 0, 0, 'dddd', 0, 0);

-- ----------------------------
-- Table structure for zhi_member_token
-- ----------------------------
DROP TABLE IF EXISTS `zhi_member_token`;
CREATE TABLE `zhi_member_token`  (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  `create_time` int(11) DEFAULT 0,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for zhi_menu
-- ----------------------------
DROP TABLE IF EXISTS `zhi_menu`;
CREATE TABLE `zhi_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `icon` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分类图标',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级分类ID',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序（同级有效）',
  `url` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否隐藏',
  `tip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否仅开发者模式可见',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pid`(`pid`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_menu
-- ----------------------------
INSERT INTO `zhi_menu` VALUES (1, '首页', 'home', 0, 1, 'admin/index/index', 0, '', '', 0, 0);
INSERT INTO `zhi_menu` VALUES (4, '会员', 'user', 0, 2, 'admin/user/index', 0, '', '', 0, 0);
INSERT INTO `zhi_menu` VALUES (58, '自定义内容', '', 54, 0, 'admin/diycontent/index', 0, '', '自定义', 0, 0);
INSERT INTO `zhi_menu` VALUES (50, '系统预览', 'dashboard', 1, 0, 'admin/index/main', 0, '', '后台首页', 0, 0);
INSERT INTO `zhi_menu` VALUES (7, '更新缓存', 'refresh', 1, 0, 'admin/index/clear', 0, '', '后台首页', 0, 0);
INSERT INTO `zhi_menu` VALUES (8, '配置管理', 'cog', 1, 0, 'admin/config/group', 0, '', '系统配置', 0, 0);
INSERT INTO `zhi_menu` VALUES (9, '菜单管理', 'book', 1, 0, 'admin/menu/index', 0, '', '系统配置', 0, 0);
INSERT INTO `zhi_menu` VALUES (16, '用户列表', 'user', 4, 0, 'admin/user/index', 0, '', '用户管理', 0, 0);
INSERT INTO `zhi_menu` VALUES (17, '用户组表', 'sitemap', 4, 0, 'admin/group/index', 0, '', '用户管理', 0, 0);
INSERT INTO `zhi_menu` VALUES (18, '权限列表', 'wrench', 4, 0, 'admin/group/access', 0, '', '用户管理', 0, 0);
INSERT INTO `zhi_menu` VALUES (59, '自定义标签', '', 54, 0, 'admin/diytag/index', 0, '', '自定义标签', 0, 0);
INSERT INTO `zhi_menu` VALUES (54, '内容', 'reorder', 0, 6, 'admin/channel/index', 0, '', '内容列表', 0, 0);
INSERT INTO `zhi_menu` VALUES (55, '内容分类', 'folder-close-alt', 54, 0, 'admin/channel/index', 0, '', '内容列表', 0, 0);
INSERT INTO `zhi_menu` VALUES (56, '内容列表', 'reorder', 54, 0, 'admin/channel/contentlist', 0, '', '内容列表', 0, 0);

-- ----------------------------
-- Table structure for zhi_picture
-- ----------------------------
DROP TABLE IF EXISTS `zhi_picture`;
CREATE TABLE `zhi_picture`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhi_picture
-- ----------------------------
INSERT INTO `zhi_picture` VALUES (75, '/uploads/picture/20180103/88cdcd3dec81400e161af2d1fd6ddaa1.png', '/uploads/picture/20180103/88cdcd3dec81400e161af2d1fd6ddaa1.png', 'ec8292a25ef4da7e4fe4f3ff44b92fe7', '661569e6d9e0dd760d5a0f43527cd6b7b22ef783', 1, 1514968706);
INSERT INTO `zhi_picture` VALUES (74, '/uploads/picture/20180103/a055a7fb310b2aa09897d0ebd1491c1b.jpg', '/uploads/picture/20180103/a055a7fb310b2aa09897d0ebd1491c1b.jpg', '2524025389cc6d43ac046b7e0fc47338', '9ded584bfcca87cc5bd4b1c2a9a5cb2a02824f73', 1, 1514968694);

SET FOREIGN_KEY_CHECKS = 1;
