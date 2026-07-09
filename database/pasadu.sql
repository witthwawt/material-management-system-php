-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `pasadu`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `buy_orders`
-- 

CREATE TABLE `buy_orders` (
  `b_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `u_id` int(2) NOT NULL,
  `price` float NOT NULL,
  `date` varchar(10) NOT NULL,
  `status_buy` varchar(1) NOT NULL,
  `s_id` varchar(1) NOT NULL,
  PRIMARY KEY  (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

-- 
-- dump ตาราง `buy_orders`
-- 

INSERT INTO `buy_orders` VALUES (118, 11, 42.8, '25-07-2559', '2', '2');
INSERT INTO `buy_orders` VALUES (119, 11, 32.1, '25-07-2559', '2', '1');
INSERT INTO `buy_orders` VALUES (120, 11, 2459.93, '25-07-2559', '2', '4');
INSERT INTO `buy_orders` VALUES (121, 11, 105.93, '26-07-2559', '1', '2');
INSERT INTO `buy_orders` VALUES (122, 11, 2565.86, '26-07-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (123, 11, 2459.93, '26-07-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (124, 11, 595, '26-07-2559', '1', '');
INSERT INTO `buy_orders` VALUES (125, 11, 12299.7, '26-07-2559', '2', '3');
INSERT INTO `buy_orders` VALUES (126, 11, 662.33, '26-07-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (127, 11, 2565.86, '26-07-2559', '2', '2');
INSERT INTO `buy_orders` VALUES (128, 11, 8961.25, '31-07-2559', '2', '4');
INSERT INTO `buy_orders` VALUES (147, 11, 64.2, '12-09-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (146, 11, 1070, '28-08-2559', '1', '4');
INSERT INTO `buy_orders` VALUES (131, 11, 160.5, '06-08-2559', '2', '3');
INSERT INTO `buy_orders` VALUES (132, 11, 9945.65, '06-08-2559', '2', '3');
INSERT INTO `buy_orders` VALUES (133, 11, 214, '08-08-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (134, 11, 10.7, '12-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (135, 11, 105.93, '12-08-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (136, 11, 2565.86, '18-08-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (137, 11, 21517.7, '21-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (138, 11, 27969.8, '22-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (139, 11, 197.95, '23-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (140, 11, 197.95, '23-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (141, 11, 2996, '26-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (142, 11, 481.5, '28-08-2559', '1', '1');
INSERT INTO `buy_orders` VALUES (143, 11, 1059.3, '28-08-2559', '1', '3');
INSERT INTO `buy_orders` VALUES (144, 11, 5992, '28-08-2559', '1', '4');
INSERT INTO `buy_orders` VALUES (145, 11, 1337.5, '28-08-2559', '2', '4');
INSERT INTO `buy_orders` VALUES (148, 11, 53.5, '14-09-2559', '1', '4');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `buy_orders_detail`
-- 

CREATE TABLE `buy_orders_detail` (
  `bo_id` int(2) NOT NULL auto_increment,
  `b_id` int(3) unsigned zerofill NOT NULL,
  `p_id` int(2) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `b_recive` varchar(3) NOT NULL,
  `b_st` varchar(1) NOT NULL,
  `b_date` varchar(10) NOT NULL,
  PRIMARY KEY  (`bo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=225 ;

-- 
-- dump ตาราง `buy_orders_detail`
-- 

INSERT INTO `buy_orders_detail` VALUES (173, 128, 31, '2', '0', 'y', '31-07-2559');
INSERT INTO `buy_orders_detail` VALUES (155, 122, 31, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (163, 126, 31, '6', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (162, 125, 32, '5', '0', 'y', '31-07-2559');
INSERT INTO `buy_orders_detail` VALUES (161, 124, 31, '5', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (160, 124, 27, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (172, 128, 32, '3', '0', 'y', '31-07-2559');
INSERT INTO `buy_orders_detail` VALUES (171, 128, 26, '2', '0', 'y', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (156, 123, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (154, 122, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (153, 121, 31, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (152, 120, 32, '1', '0', 'y', '14-08-2559');
INSERT INTO `buy_orders_detail` VALUES (151, 119, 28, '1', '0', 'y', '25-07-2559');
INSERT INTO `buy_orders_detail` VALUES (165, 126, 57, '2', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (166, 126, 24, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (167, 118, 57, '1', '0', 'y', '26-07-2559');
INSERT INTO `buy_orders_detail` VALUES (168, 118, 28, '1', '0', 'y', '30-07-2559');
INSERT INTO `buy_orders_detail` VALUES (169, 127, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (170, 127, 31, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (174, 128, 27, '2', '1', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (175, 128, 30, '1', '0', 'y', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (176, 129, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (177, 130, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (178, 130, 31, '3', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (179, 131, 27, '1', '0', 'y', '06-08-2559');
INSERT INTO `buy_orders_detail` VALUES (180, 131, 29, '1', '0', 'y', '06-08-2559');
INSERT INTO `buy_orders_detail` VALUES (181, 132, 32, '4', '0', 'y', '06-08-2559');
INSERT INTO `buy_orders_detail` VALUES (182, 132, 31, '1', '0', 'y', '06-08-2559');
INSERT INTO `buy_orders_detail` VALUES (183, 133, 27, '2', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (184, 134, 22, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (185, 135, 31, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (186, 136, 32, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (187, 136, 31, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (188, 137, 77, '40', '0', 'y', '21-08-2559');
INSERT INTO `buy_orders_detail` VALUES (189, 137, 71, '20', '1', 'w', '21-08-2559');
INSERT INTO `buy_orders_detail` VALUES (190, 137, 65, '30', '14', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (191, 137, 66, '50', '1', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (192, 137, 63, '20', '1', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (193, 137, 64, '10', '7', 'w', '21-08-2559');
INSERT INTO `buy_orders_detail` VALUES (194, 137, 72, '30', '28', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (195, 137, 73, '30', '28', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (196, 137, 74, '30', '28', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (197, 138, 68, '10', '6', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (198, 138, 76, '10', '6', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (199, 138, 75, '10', '5', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (200, 138, 70, '10', '4', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (201, 138, 67, '10', '3', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (202, 138, 69, '10', '2', 'w', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (203, 138, 32, '10', '0', 'y', '22-08-2559');
INSERT INTO `buy_orders_detail` VALUES (204, 139, 78, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (205, 139, 79, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (206, 140, 78, '1', '0', 'y', '23-08-2559');
INSERT INTO `buy_orders_detail` VALUES (207, 140, 79, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (208, 141, 79, '20', '1', 'w', '26-08-2559');
INSERT INTO `buy_orders_detail` VALUES (209, 142, 78, '10', '3', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (210, 143, 31, '10', '7', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (211, 144, 82, '80', '30', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (212, 144, 85, '90', '50', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (213, 144, 84, '10', '5', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (214, 144, 83, '80', '10', 'w', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (215, 145, 83, '50', '0', 'y', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (217, 127, 84, '2', '0', 'y', '28-08-2559');
INSERT INTO `buy_orders_detail` VALUES (218, 127, 28, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (219, 129, 25, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (220, 130, 69, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (221, 146, 29, '20', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (222, 147, 29, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (223, 147, 22, '1', '', 'n', '');
INSERT INTO `buy_orders_detail` VALUES (224, 148, 29, '1', '', 'n', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `division`
-- 

CREATE TABLE `division` (
  `d_id` int(2) NOT NULL auto_increment,
  `danme` varchar(50) NOT NULL,
  PRIMARY KEY  (`d_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- dump ตาราง `division`
-- 

INSERT INTO `division` VALUES (1, 'การเงิน');
INSERT INTO `division` VALUES (2, 'ธุรการ');
INSERT INTO `division` VALUES (4, 'พัฒนาธุรกิจ');
INSERT INTO `division` VALUES (3, 'บริหาร 9 - 10');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders`
-- 

CREATE TABLE `orders` (
  `o_id` int(2) NOT NULL auto_increment,
  `o_date` varchar(10) NOT NULL,
  `u_id` int(2) NOT NULL,
  `a_date` varchar(10) NOT NULL,
  `name_a` varchar(30) NOT NULL,
  `st_id` varchar(1) NOT NULL,
  PRIMARY KEY  (`o_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=284 ;

-- 
-- dump ตาราง `orders`
-- 

INSERT INTO `orders` VALUES (243, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (242, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (251, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (240, '07-08-2559', 32, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (239, '07-08-2559', 32, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (237, '06-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (236, '06-08-2559', 32, '06-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (235, '06-08-2559', 13, '06-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (234, '06-08-2559', 13, '06-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (233, '06-08-2559', 13, '06-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (231, '04-08-2559', 13, '04-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (230, '31-07-2559', 13, '04-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (228, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (229, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (227, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (226, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (225, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (224, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (223, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (222, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (221, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (217, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (219, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (220, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (216, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (215, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (214, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (212, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (213, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (211, '30-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (218, '31-07-2559', 13, '31-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (209, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (192, '25-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (208, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (206, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (207, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (205, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (204, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (203, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (202, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (201, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (195, '26-07-2559', 13, '26-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (196, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (197, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (198, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (199, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (200, '30-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (194, '26-07-2559', 13, '30-07-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (250, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (249, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (252, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (253, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (254, '08-08-2559', 13, '08-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (255, '09-08-2559', 13, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (256, '12-08-2559', 13, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (257, '12-08-2559', 13, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (258, '12-08-2559', 13, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (259, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (260, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (261, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (262, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (263, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (264, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (265, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (266, '12-08-2559', 32, '12-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (267, '12-08-2559', 32, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (268, '14-08-2559', 32, '23-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (269, '23-08-2559', 13, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (270, '23-08-2559', 13, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (271, '23-08-2559', 13, '23-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (272, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (273, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (274, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (275, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (276, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (277, '28-08-2559', 11, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (278, '28-08-2559', 32, '', '', '1');
INSERT INTO `orders` VALUES (279, '28-08-2559', 32, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (282, '28-08-2559', 34, '28-08-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (281, '28-08-2559', 13, '14-09-2559', 'วิทวัส', '2');
INSERT INTO `orders` VALUES (283, '12-09-2559', 13, '12-09-2559', 'วิทวัส', '2');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders_detail`
-- 

CREATE TABLE `orders_detail` (
  `d_id` int(2) NOT NULL auto_increment,
  `o_id` int(2) NOT NULL,
  `p_id` int(2) NOT NULL,
  `s_qty` int(3) NOT NULL,
  `o_reciveo` varchar(3) NOT NULL,
  PRIMARY KEY  (`d_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=674 ;

-- 
-- dump ตาราง `orders_detail`
-- 

INSERT INTO `orders_detail` VALUES (595, 255, 28, 1, '');
INSERT INTO `orders_detail` VALUES (594, 255, 32, 2, '');
INSERT INTO `orders_detail` VALUES (593, 254, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (592, 254, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (591, 253, 31, 2, '1');
INSERT INTO `orders_detail` VALUES (590, 253, 32, 2, '1');
INSERT INTO `orders_detail` VALUES (589, 253, 28, 4, '1');
INSERT INTO `orders_detail` VALUES (588, 252, 27, 2, '1');
INSERT INTO `orders_detail` VALUES (586, 252, 31, 2, '1');
INSERT INTO `orders_detail` VALUES (585, 252, 32, 6, '1');
INSERT INTO `orders_detail` VALUES (584, 251, 57, 4, '1');
INSERT INTO `orders_detail` VALUES (583, 251, 24, 5, '1');
INSERT INTO `orders_detail` VALUES (582, 251, 22, 11, '11');
INSERT INTO `orders_detail` VALUES (581, 250, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (580, 250, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (579, 250, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (578, 250, 25, 1, '1');
INSERT INTO `orders_detail` VALUES (577, 250, 26, 1, '1');
INSERT INTO `orders_detail` VALUES (567, 248, 57, 6, '');
INSERT INTO `orders_detail` VALUES (576, 250, 30, 2, '1');
INSERT INTO `orders_detail` VALUES (575, 250, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (560, 13, 23, 1, '');
INSERT INTO `orders_detail` VALUES (559, 13, 26, 2, '');
INSERT INTO `orders_detail` VALUES (574, 250, 28, 2, '1');
INSERT INTO `orders_detail` VALUES (561, 246, 57, 2, '');
INSERT INTO `orders_detail` VALUES (556, 246, 31, 1, '');
INSERT INTO `orders_detail` VALUES (548, 13, 27, 1, '');
INSERT INTO `orders_detail` VALUES (545, 13, 32, 2, '');
INSERT INTO `orders_detail` VALUES (544, 13, 29, 7, '');
INSERT INTO `orders_detail` VALUES (543, 237, 25, 2, '2');
INSERT INTO `orders_detail` VALUES (542, 243, 57, 1, '1');
INSERT INTO `orders_detail` VALUES (541, 243, 24, 1, '1');
INSERT INTO `orders_detail` VALUES (540, 243, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (539, 243, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (538, 243, 25, 1, '1');
INSERT INTO `orders_detail` VALUES (537, 243, 26, 1, '1');
INSERT INTO `orders_detail` VALUES (536, 243, 30, 1, '1');
INSERT INTO `orders_detail` VALUES (535, 243, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (534, 243, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (533, 243, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (532, 243, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (531, 243, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (555, 246, 32, 4, '');
INSERT INTO `orders_detail` VALUES (554, 246, 27, 3, '');
INSERT INTO `orders_detail` VALUES (572, 249, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (571, 249, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (526, 242, 26, 2, '2');
INSERT INTO `orders_detail` VALUES (525, 241, 29, 6, '');
INSERT INTO `orders_detail` VALUES (524, 241, 28, 5, '');
INSERT INTO `orders_detail` VALUES (523, 241, 27, 4, '');
INSERT INTO `orders_detail` VALUES (547, 13, 31, 40, '');
INSERT INTO `orders_detail` VALUES (520, 240, 31, 2, '1');
INSERT INTO `orders_detail` VALUES (519, 240, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (518, 239, 22, 2, '1');
INSERT INTO `orders_detail` VALUES (517, 239, 23, 4, '1');
INSERT INTO `orders_detail` VALUES (549, 244, 32, 1, '');
INSERT INTO `orders_detail` VALUES (550, 244, 31, 2, '');
INSERT INTO `orders_detail` VALUES (511, 237, 28, 2, '2');
INSERT INTO `orders_detail` VALUES (510, 237, 27, 2, '2');
INSERT INTO `orders_detail` VALUES (509, 237, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (551, 244, 27, 3, '');
INSERT INTO `orders_detail` VALUES (507, 236, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (506, 235, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (505, 234, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (504, 234, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (503, 233, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (502, 233, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (500, 231, 32, 1, '2');
INSERT INTO `orders_detail` VALUES (499, 228, 24, 1, '5');
INSERT INTO `orders_detail` VALUES (498, 230, 30, 1, '2');
INSERT INTO `orders_detail` VALUES (497, 229, 32, 1, '0');
INSERT INTO `orders_detail` VALUES (496, 229, 31, 2, '');
INSERT INTO `orders_detail` VALUES (495, 228, 32, 1, '0');
INSERT INTO `orders_detail` VALUES (494, 227, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (493, 226, 26, 1, '2');
INSERT INTO `orders_detail` VALUES (492, 225, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (491, 225, 57, 1, '3');
INSERT INTO `orders_detail` VALUES (490, 224, 23, 1, '5');
INSERT INTO `orders_detail` VALUES (489, 224, 22, 1, '5');
INSERT INTO `orders_detail` VALUES (488, 223, 25, 1, '3');
INSERT INTO `orders_detail` VALUES (487, 223, 30, 1, '3');
INSERT INTO `orders_detail` VALUES (486, 222, 29, 1, '4');
INSERT INTO `orders_detail` VALUES (485, 222, 28, 1, '4');
INSERT INTO `orders_detail` VALUES (484, 221, 27, 3, '');
INSERT INTO `orders_detail` VALUES (483, 221, 26, 3, '');
INSERT INTO `orders_detail` VALUES (482, 220, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (481, 220, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (480, 219, 24, 1, '');
INSERT INTO `orders_detail` VALUES (477, 219, 23, 2, '');
INSERT INTO `orders_detail` VALUES (476, 218, 23, 1, '15');
INSERT INTO `orders_detail` VALUES (468, 214, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (466, 213, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (465, 212, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (464, 211, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (452, 206, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (451, 205, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (450, 205, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (474, 217, 57, 1, '20');
INSERT INTO `orders_detail` VALUES (473, 216, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (470, 215, 57, 1, '2');
INSERT INTO `orders_detail` VALUES (475, 218, 22, 1, '15');
INSERT INTO `orders_detail` VALUES (458, 209, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (456, 208, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (455, 207, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (442, 204, 32, 1, '');
INSERT INTO `orders_detail` VALUES (437, 203, 23, 1, '');
INSERT INTO `orders_detail` VALUES (436, 202, 28, 1, '');
INSERT INTO `orders_detail` VALUES (432, 201, 32, 1, '');
INSERT INTO `orders_detail` VALUES (431, 200, 24, 50, '50');
INSERT INTO `orders_detail` VALUES (430, 200, 61, 50, '50');
INSERT INTO `orders_detail` VALUES (429, 199, 57, 1, '1');
INSERT INTO `orders_detail` VALUES (428, 198, 26, 1, '1');
INSERT INTO `orders_detail` VALUES (405, 193, 30, 1, '20');
INSERT INTO `orders_detail` VALUES (404, 192, 29, 1, '19');
INSERT INTO `orders_detail` VALUES (427, 198, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (426, 198, 23, 1, '1');
INSERT INTO `orders_detail` VALUES (425, 198, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (424, 198, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (423, 198, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (422, 198, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (421, 197, 25, 1, '2');
INSERT INTO `orders_detail` VALUES (420, 197, 22, 1, '2');
INSERT INTO `orders_detail` VALUES (419, 197, 29, 1, '2');
INSERT INTO `orders_detail` VALUES (418, 197, 28, 1, '2');
INSERT INTO `orders_detail` VALUES (417, 197, 27, 1, '2');
INSERT INTO `orders_detail` VALUES (416, 197, 31, 1, '2');
INSERT INTO `orders_detail` VALUES (415, 197, 32, 1, '2');
INSERT INTO `orders_detail` VALUES (414, 197, 23, 2, '2');
INSERT INTO `orders_detail` VALUES (413, 196, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (412, 195, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (410, 194, 27, 1, '3');
INSERT INTO `orders_detail` VALUES (409, 194, 31, 1, '3');
INSERT INTO `orders_detail` VALUES (407, 194, 32, 3, '3');
INSERT INTO `orders_detail` VALUES (406, 193, 26, 1, '20');
INSERT INTO `orders_detail` VALUES (596, 256, 32, 3, '');
INSERT INTO `orders_detail` VALUES (597, 256, 31, 2, '0');
INSERT INTO `orders_detail` VALUES (598, 256, 27, 2, '1');
INSERT INTO `orders_detail` VALUES (599, 256, 28, 4, '0');
INSERT INTO `orders_detail` VALUES (600, 257, 28, 2, '15');
INSERT INTO `orders_detail` VALUES (601, 257, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (602, 257, 26, 1, '1');
INSERT INTO `orders_detail` VALUES (603, 258, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (604, 259, 31, 5, '1');
INSERT INTO `orders_detail` VALUES (605, 260, 28, 2, '5');
INSERT INTO `orders_detail` VALUES (606, 261, 32, 2, '5');
INSERT INTO `orders_detail` VALUES (607, 262, 28, 2, '5');
INSERT INTO `orders_detail` VALUES (608, 262, 32, 1, '5');
INSERT INTO `orders_detail` VALUES (609, 263, 27, 1, '14');
INSERT INTO `orders_detail` VALUES (610, 264, 28, 2, '2');
INSERT INTO `orders_detail` VALUES (611, 264, 27, 2, '2');
INSERT INTO `orders_detail` VALUES (615, 265, 32, 1, '1');
INSERT INTO `orders_detail` VALUES (613, 265, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (614, 265, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (617, 266, 32, 4, '4');
INSERT INTO `orders_detail` VALUES (626, 268, 57, 1, '5');
INSERT INTO `orders_detail` VALUES (619, 267, 27, 8, '1');
INSERT INTO `orders_detail` VALUES (620, 267, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (621, 267, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (631, 269, 31, 1, '');
INSERT INTO `orders_detail` VALUES (630, 268, 27, 3, '5');
INSERT INTO `orders_detail` VALUES (627, 268, 24, 1, '5');
INSERT INTO `orders_detail` VALUES (628, 268, 22, 5, '5');
INSERT INTO `orders_detail` VALUES (632, 270, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (633, 270, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (634, 270, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (635, 270, 29, 1, '1');
INSERT INTO `orders_detail` VALUES (636, 271, 31, 1, '1');
INSERT INTO `orders_detail` VALUES (637, 271, 27, 1, '1');
INSERT INTO `orders_detail` VALUES (638, 271, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (639, 270, 25, 1, '1');
INSERT INTO `orders_detail` VALUES (640, 272, 84, 2, '2');
INSERT INTO `orders_detail` VALUES (641, 272, 78, 2, '2');
INSERT INTO `orders_detail` VALUES (642, 269, 78, 1, '1');
INSERT INTO `orders_detail` VALUES (643, 269, 84, 1, '1');
INSERT INTO `orders_detail` VALUES (644, 269, 83, 1, '');
INSERT INTO `orders_detail` VALUES (645, 269, 29, 1, '');
INSERT INTO `orders_detail` VALUES (646, 273, 28, 1, '');
INSERT INTO `orders_detail` VALUES (647, 274, 23, 2, '');
INSERT INTO `orders_detail` VALUES (648, 274, 24, 1, '');
INSERT INTO `orders_detail` VALUES (649, 273, 78, 1, '');
INSERT INTO `orders_detail` VALUES (650, 273, 82, 1, '');
INSERT INTO `orders_detail` VALUES (651, 275, 84, 2, '2');
INSERT INTO `orders_detail` VALUES (652, 275, 82, 1, '1');
INSERT INTO `orders_detail` VALUES (653, 275, 28, 1, '1');
INSERT INTO `orders_detail` VALUES (654, 275, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (656, 276, 57, 16, '16');
INSERT INTO `orders_detail` VALUES (657, 276, 67, 1, '1');
INSERT INTO `orders_detail` VALUES (658, 276, 22, 1, '1');
INSERT INTO `orders_detail` VALUES (659, 276, 82, 1, '1');
INSERT INTO `orders_detail` VALUES (660, 277, 25, 1, '1');
INSERT INTO `orders_detail` VALUES (661, 277, 76, 1, '1');
INSERT INTO `orders_detail` VALUES (662, 277, 65, 1, '1');
INSERT INTO `orders_detail` VALUES (663, 278, 78, 50, '');
INSERT INTO `orders_detail` VALUES (664, 279, 78, 1, '1');
INSERT INTO `orders_detail` VALUES (665, 279, 84, 1, '1');
INSERT INTO `orders_detail` VALUES (671, 282, 83, 30, '30');
INSERT INTO `orders_detail` VALUES (670, 282, 84, 5, '5');
INSERT INTO `orders_detail` VALUES (668, 281, 78, 1, '1');
INSERT INTO `orders_detail` VALUES (669, 281, 84, 1, '1');
INSERT INTO `orders_detail` VALUES (672, 283, 78, 1, '1');
INSERT INTO `orders_detail` VALUES (673, 283, 84, 1, '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders_status`
-- 

CREATE TABLE `orders_status` (
  `st_id` int(2) NOT NULL auto_increment,
  `st_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `orders_status`
-- 

INSERT INTO `orders_status` VALUES (1, 'รอการอนุมัติ');
INSERT INTO `orders_status` VALUES (2, 'อนุมัติแล้ว');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `stock`
-- 

CREATE TABLE `stock` (
  `p_id` int(2) NOT NULL auto_increment,
  `pname` varchar(20) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `price` varchar(5) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `c_id` int(1) NOT NULL,
  `s_id` int(1) NOT NULL,
  `su_id` int(1) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

-- 
-- dump ตาราง `stock`
-- 

INSERT INTO `stock` VALUES (78, 'ซองน้ำตาล', '1', '46', 'spd_20080220130505_b.jpg', '22-08-2559', 1, 1, 14);
INSERT INTO `stock` VALUES (84, 'น้ำยาล้างจาน', '7', '20', 'sdfgdghf.jpg', '28-08-2559', 3, 4, 13);
INSERT INTO `stock` VALUES (28, 'ไม้กวาด', '1', '30', '8.jpg', '27-06-2559', 3, 4, 5);
INSERT INTO `stock` VALUES (29, 'ถ้วยชาม', '0', '50', '9.jpg', '27-06-2559', 3, 4, 10);
INSERT INTO `stock` VALUES (83, 'ถุงขยะ', '20', '25', 'sdfsdfdsgtyh.jpg', '28-08-2559', 3, 4, 0);
INSERT INTO `stock` VALUES (82, 'กระดาษชำระ', '48', '20', 'clavvs2.jpg', '28-08-2559', 3, 1, 0);
INSERT INTO `stock` VALUES (25, 'แฟ้ม', '14', '20', '15191002.jpg', '27-06-2559', 1, 1, 6);
INSERT INTO `stock` VALUES (22, 'ปากกา', '0', '10', '1428050333-825-o.jpg', '27-06-2559', 1, 1, 2);
INSERT INTO `stock` VALUES (23, 'ดินสอ', '17', '5', 'pencil-913101_960_720.png', '27-06-2559', 1, 1, 2);
INSERT INTO `stock` VALUES (24, 'ยางลบ', '18', '5', 'Faber_Castell_Erasers.jpg', '27-06-2559', 1, 1, 3);
INSERT INTO `stock` VALUES (69, 'กระดาษคาร์บอน', '8', '119', '6574687542.jpg', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (67, 'เข็มหมุด', '6', '25', 'product-20130407-161923.jpg', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (68, 'สก๊อตเทป', '4', '21', 'PVC-Ruber-Transparant-Shine-Pad-hockey-Stick.jpg', '20-08-2559', 1, 1, 8);
INSERT INTO `stock` VALUES (70, 'กระดาษไข', '6', '45', 'CONTENT479588522534.jpg', '20-08-2559', 1, 1, 9);
INSERT INTO `stock` VALUES (71, 'สมุดบัญชี', '19', '45', '0007369_90002217bmp-2248.jpeg', '20-08-2559', 1, 1, 4);
INSERT INTO `stock` VALUES (65, 'คลิป', '15', '63', 'UexsrSf6_400x400.png', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (66, 'เป๊ก', '49', '40', '154686.jpg', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (57, 'ไม้บรรทัด', '2', '10', '1154.png', '09-07-2559', 1, 1, 8);
INSERT INTO `stock` VALUES (63, 'กระดาษ A4', '19', '244', '50dc188188e33.jpg', '20-08-2559', 1, 1, 1);
INSERT INTO `stock` VALUES (72, 'กระดาษฝาก ', '2', '21', '84311.jpg', '20-08-2559', 1, 1, 1);
INSERT INTO `stock` VALUES (73, 'กระดาษเบิก', '2', '21', '84313.jpg', '20-08-2559', 1, 1, 1);
INSERT INTO `stock` VALUES (74, 'ใบเสร็จ', '2', '21', '84315.jpg', '20-08-2559', 1, 1, 1);
INSERT INTO `stock` VALUES (75, 'ลิ้นแฟ้มเหล็ก', '5', '65', '84324.jpg', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (76, 'เม็ก ', '3', '40', '457865786.jpg', '20-08-2559', 1, 1, 8);
INSERT INTO `stock` VALUES (77, 'ลูกแม็ก No.10', '40', '198', '13181002.jpg', '20-08-2559', 1, 1, 7);
INSERT INTO `stock` VALUES (85, 'ผงซักฟอก', '40', '20', 'dsfewrw.jpg', '28-08-2559', 3, 4, 14);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `stock_category`
-- 

CREATE TABLE `stock_category` (
  `c_id` int(2) NOT NULL auto_increment,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `stock_category`
-- 

INSERT INTO `stock_category` VALUES (1, 'พัสดุสำนักงาน');
INSERT INTO `stock_category` VALUES (3, 'พัสดุงานบ้านงานครัว');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `stock_unit`
-- 

CREATE TABLE `stock_unit` (
  `su_id` int(2) NOT NULL auto_increment,
  `su_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`su_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `stock_unit`
-- 

INSERT INTO `stock_unit` VALUES (1, 'รีม');
INSERT INTO `stock_unit` VALUES (2, 'แท่ง');
INSERT INTO `stock_unit` VALUES (3, 'โหล');
INSERT INTO `stock_unit` VALUES (4, 'เล่ม');
INSERT INTO `stock_unit` VALUES (5, 'ด้าม');
INSERT INTO `stock_unit` VALUES (6, 'แฟ้ม');
INSERT INTO `stock_unit` VALUES (7, 'กล่อง');
INSERT INTO `stock_unit` VALUES (8, 'อัน');
INSERT INTO `stock_unit` VALUES (9, 'แผ่น');
INSERT INTO `stock_unit` VALUES (10, 'ใบ');
INSERT INTO `stock_unit` VALUES (11, 'ม้วน');
INSERT INTO `stock_unit` VALUES (12, 'แพ็ค');
INSERT INTO `stock_unit` VALUES (13, 'ขวด');
INSERT INTO `stock_unit` VALUES (14, 'ซอง');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `supplier`
-- 

CREATE TABLE `supplier` (
  `s_id` int(2) NOT NULL auto_increment,
  `s_name` varchar(50) NOT NULL,
  `s_address` varchar(100) NOT NULL,
  `s_tel` varchar(10) NOT NULL,
  `tax` varchar(10) NOT NULL,
  `m_photo` varchar(100) NOT NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `supplier`
-- 

INSERT INTO `supplier` VALUES (1, 'บริษัท โยย่า เครื่องเขียน', '1188 ถนน อุดมสุข แขวง บางนา เขต บางนา กรุงเทพมหานคร 10260', '0444444444', '123456789', '55555.jpg');
INSERT INTO `supplier` VALUES (4, 'บริษัท บ้านเครื่องครัว จำกัด', '66/2 ถนนจรัญสนิทวงศ์ แขวงอรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร 10700', '042 240 50', '4444444444', 'hh-logo-house.jpg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user`
-- 

CREATE TABLE `user` (
  `u_id` int(2) NOT NULL auto_increment,
  `title_name` varchar(6) NOT NULL,
  `name` varchar(30) NOT NULL default 'ชื่อ',
  `lastname` varchar(30) NOT NULL default 'นามสกุล',
  `sex` varchar(5) NOT NULL default 'เพศ',
  `address` varchar(150) NOT NULL default 'ที่อยู่',
  `phone` varchar(10) NOT NULL,
  `FilesName` varchar(100) NOT NULL default 'รูปพนักงาน',
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL default 'รหัสผ่าน',
  `d_id` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `status_work` varchar(1) NOT NULL,
  PRIMARY KEY  (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- dump ตาราง `user`
-- 

INSERT INTO `user` VALUES (11, 'นาย', 'วิทวัส', 'บุญปัญญา', 'ชาย', '191 หมู่ 2 ต.จำปาขัน อ.สุวรรณภูมิ จ.ร้อยเอ็ด', '0934214018', '120120-125218 copy.jpg', 'admin', '1234', '2', '0', 'y');
INSERT INTO `user` VALUES (13, 'นาย', 'มนูญรัฐ', 'หันตุลา', 'ชาย', '51 ม.1 ต.พนมไพร จ.ร้อยเอ็ด 45140', '0887168042', '2016_0724_20535600.jpg', 'user', '1234', '2', '1', 'y');
INSERT INTO `user` VALUES (26, 'นางสาว', 'ญาณกร', 'เขตศิริสุข', 'หญิง', '113 หมู่ ที่ 12 โพนทอง', '0777777777', '13895244_642615579233698_7731275304385765327_n.jpg', 'investigat', '1234', '3', '2', 'y');
INSERT INTO `user` VALUES (32, 'นาย', 'สุพจน์', 'บัวเลิง', 'ชาย', '113 หมู่ ที่ 12 โพนทอง', '0850119626', '12928371_560320430804136_6560319486453234896_n.jpg', 't', '1', '1', '1', 'y');
INSERT INTO `user` VALUES (34, 'นางสาว', 'ญาณกร2', 'เขตศิริสุข2', 'หญิง', 'ราชภัฏ', '0987456123', '13895244_642615579233698_7731275304385765327_n.jpg', 'nn', '1', '1', '1', 'y');
INSERT INTO `user` VALUES (33, 'นางสาว', 'อัจฉราภรณ์', 'จุฑาผาด', 'หญิง', 'ราชภัฏร้อยเอ็ด', '0824758495', 'dsfgsgfg.jpg', 'u', '11', '1', '1', 'y');
