/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_wblms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-01-20 11:45:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_emp_list`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_emp_list`;
CREATE TABLE `tbl_emp_list` (
  `empID` varchar(8) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `civilstatus` varchar(15) NOT NULL DEFAULT '',
  `bday` varchar(150) NOT NULL DEFAULT '',
  `bplace` varchar(150) NOT NULL DEFAULT '',
  `contactnumber` varchar(11) NOT NULL DEFAULT '',
  `address` varchar(150) NOT NULL DEFAULT '',
  `empstatus` varchar(15) NOT NULL DEFAULT '',
  `position` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_emp_list
-- ----------------------------
INSERT INTO `tbl_emp_list` VALUES ('19640001', 'Marie Ann', 'A.', 'Fontanilla', 'Female', 'Married', '1997-12-31', 'Bacnotan, La Union', '09452677111', 'Bacnotan, La Union', 'Regular', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19640002', 'Irish May', 'Dela Vega', 'Bulauan', 'Female', 'Single', '2000-03-22', 'San Fernando, La Union', '09526783600', 'San Fernando, La Union', 'Regular', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19640003', 'Jan Micko', 'Lubrin', 'Nelmida', 'Male', 'Single', '1998-01-01', 'San Fernando La Union', '09456277860', 'San Fernando, La Union', 'Regular', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19640005', 'Reynasan', 'Lambinicio', 'Pascual', 'Female', 'Single', '1998-01-01', 'San Fernando, La Union', '09567819875', 'City of San Fernando, La Union', 'Contractual', 'Librarian');
INSERT INTO `tbl_emp_list` VALUES ('19640007', 'Johanna Marielle ', 'Arce', 'Dangalan', 'Female', 'Single', '1998-01-01', 'San Fernando La Union', '09222222222', 'San Fernando, La Union', 'Regular', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19640008', 'Abcde', 'F.', 'Ghijk', 'Male', 'Married', '1998-01-01', 'San Fernando La Union', '09452677800', 'SFC', 'Regular', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19641980', ',m', 'mn', 'm ', 'Male', 'Single', '1998-01-01', 'lkj', '09', 'kjh', 'Regular', 'kjkh');
INSERT INTO `tbl_emp_list` VALUES ('19644565', 'fdsdf', 'adsfsdf', 'Jan Nelmida', 'Male', 'Single', '1998-01-01', 'SFC', '09452677800', 'kjh', 'Regular', 'sdfgh');
INSERT INTO `tbl_emp_list` VALUES ('19645634', 'Johanna Marielle', 'Arce', 'Dangalan', 'Male', 'Single', '1998-01-01', 'San Fernando, La Union', '09452677899', 'GHGF', 'Contractual', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19645643', 'fdsdf', 'Arce', 'Jan Nelmida', 'Female', 'Single', '1998-01-01', 'San Fabian, La Union', '09526783600', 'kjkuytf', 'Regular', 'nh');
INSERT INTO `tbl_emp_list` VALUES ('19647689', 'jjj', 'jjj', 'jjj', 'Male', 'Single', '1998-01-01', 'jjj', '09526783600', 'jjj', 'Regular', 'jjj');
INSERT INTO `tbl_emp_list` VALUES ('19647809', 'Jjjj Jjjj', 'jjj', 'Jjjjjjjjj', 'Female', 'Single', '1998-01-01', 'San Fabian, La Union', '09056372889', 'jhggfggh', 'Contractual', 'IT');
INSERT INTO `tbl_emp_list` VALUES ('19649234', 'Albert', 'Hipol', 'Subang', 'Male', 'Single', '1998-01-01', 'San Fernando La Union', '09056372889', 'Carlatan, San Fernando, La Union', 'Regular', 'IT Expert');
INSERT INTO `tbl_emp_list` VALUES ('19649809', 'hhh', 'hh', 'hhh', '', ' ', '1998-01-01', 'hh', '09526783600', 'hhh', ' ', 'Staff');
INSERT INTO `tbl_emp_list` VALUES ('19649898', 'Jake Vincent', 'Rivera', 'Casugay', 'Male', 'Single', '1998-01-01', 'San Fernando, La Union', '0956372889', 'Carlatan, City of San Fernando, La Union', 'Contractual', 'Programmer');

-- ----------------------------
-- Table structure for `tbl_leave_list`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_leave_list`;
CREATE TABLE `tbl_leave_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `leavetitle` varchar(150) NOT NULL,
  `hours` int(10) NOT NULL,
  `minutes` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_leave_list
-- ----------------------------
INSERT INTO `tbl_leave_list` VALUES ('1', 'Sick Leave', '120', '0');
INSERT INTO `tbl_leave_list` VALUES ('2', 'Emergency Leave', '24', '0');
INSERT INTO `tbl_leave_list` VALUES ('3', 'Vacation Leave', '120', '0');
INSERT INTO `tbl_leave_list` VALUES ('4', 'Birthday Leave', '8', '0');
INSERT INTO `tbl_leave_list` VALUES ('5', 'Maternity Leave', '840', '0');
INSERT INTO `tbl_leave_list` VALUES ('6', 'Paternity Leave', '56', '0');
INSERT INTO `tbl_leave_list` VALUES ('7', 'Calamity Leave', '8', '0');

-- ----------------------------
-- Table structure for `tbl_leave_record`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_leave_record`;
CREATE TABLE `tbl_leave_record` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(8) NOT NULL,
  `leavetitle` varchar(100) NOT NULL,
  `remaining_hrs` int(15) NOT NULL,
  `remaining_mins` int(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_leave_record
-- ----------------------------
INSERT INTO `tbl_leave_record` VALUES ('44', '19640001', 'Birthday Leave', '0', '0');
INSERT INTO `tbl_leave_record` VALUES ('45', '19640002', 'Vacation Leave', '96', '0');
INSERT INTO `tbl_leave_record` VALUES ('46', '19640003', 'Emergency Leave', '22', '0');
INSERT INTO `tbl_leave_record` VALUES ('48', '19649234', 'Emergency Leave', '20', '0');
INSERT INTO `tbl_leave_record` VALUES ('50', '19640001', 'Sick Leave', '119', '60');
INSERT INTO `tbl_leave_record` VALUES ('51', '19640001', 'Sick Leave', '118', '60');
INSERT INTO `tbl_leave_record` VALUES ('52', '19640001', 'Vacation Leave', '118', '0');
INSERT INTO `tbl_leave_record` VALUES ('53', '19640001', 'Vacation Leave', '115', '60');
INSERT INTO `tbl_leave_record` VALUES ('54', '19640001', 'Emergency Leave', '22', '0');
INSERT INTO `tbl_leave_record` VALUES ('55', '19640001', 'Sick Leave', '113', '60');

-- ----------------------------
-- Table structure for `tbl_leavecredits`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_leavecredits`;
CREATE TABLE `tbl_leavecredits` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employeename` varchar(150) NOT NULL,
  `leave` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_leavecredits
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_leaveform`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_leaveform`;
CREATE TABLE `tbl_leaveform` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `employeeid` int(8) NOT NULL,
  `employeename` varchar(100) NOT NULL,
  `hours` varchar(10) NOT NULL,
  `minutes` varchar(10) NOT NULL,
  `todate` date NOT NULL,
  `fromdate` date NOT NULL,
  `datefiled` date DEFAULT NULL,
  `typeofleave` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_leaveform
-- ----------------------------
INSERT INTO `tbl_leaveform` VALUES ('64', '19640001', 'Marie Ann A. Fontanilla ', '8', '00', '2021-11-19', '2021-11-19', '2021-11-16', 'Birthday Leave', 'Birthday Leave');
INSERT INTO `tbl_leaveform` VALUES ('65', '19640002', 'Irish May Dela Vega Bulauan ', '24', '00', '2021-11-19', '2021-11-17', '2021-11-15', 'Vacation Leave', 'Jamming');
INSERT INTO `tbl_leaveform` VALUES ('66', '19640003', 'Jan Micko Lubrin Nelmida ', '2', '00', '2021-11-18', '2021-11-18', '2021-11-17', 'Emergency Leave', 'Emergency');
INSERT INTO `tbl_leaveform` VALUES ('68', '19649234', 'Albert Hipol Subang ', '4', '00', '2021-11-19', '2021-11-19', '2021-11-18', 'Emergency Leave', 'emergency');
INSERT INTO `tbl_leaveform` VALUES ('69', '19649234', 'Albert Hipol Subang ', '24', '00', '2021-11-19', '2021-11-19', '2021-11-18', 'Emergency Leave', 'emergency');
INSERT INTO `tbl_leaveform` VALUES ('71', '19640001', 'Marie Ann', '1', '00', '2021-12-02', '2021-12-02', '0000-00-00', 'Sick Leave', 'd');
INSERT INTO `tbl_leaveform` VALUES ('72', '19640001', 'Marie Ann,A.,Fontanilla', '1', '00', '2021-12-02', '2021-12-02', '0000-00-00', 'Sick Leave', 'ww');
INSERT INTO `tbl_leaveform` VALUES ('73', '19640001', 'Marie AnnA.Fontanilla', '2', '00', '2021-12-02', '2021-12-02', '0000-00-00', 'Vacation Leave', 'tr');
INSERT INTO `tbl_leaveform` VALUES ('74', '19640001', 'Marie Ann A. Fontanilla', '2', '00', '2021-12-02', '2021-12-02', '0000-00-00', 'Vacation Leave', 'tr');
INSERT INTO `tbl_leaveform` VALUES ('75', '19640001', 'Marie Ann A. Fontanilla', '2', '00', '2021-12-15', '2021-12-15', '0000-00-00', 'Emergency Leave', 'dsa');
INSERT INTO `tbl_leaveform` VALUES ('76', '19640001', 'Marie Ann A. Fontanilla ', '24', '00', '2021-12-17', '2021-12-16', '2021-12-16', 'Emergency Leave', 'kjh');
INSERT INTO `tbl_leaveform` VALUES ('77', '19640001', 'Marie Ann A. Fontanilla ', '24', '00', '2021-12-17', '2021-12-16', '2021-12-16', 'Emergency Leave', 'kjh');
INSERT INTO `tbl_leaveform` VALUES ('78', '19640001', 'Marie Ann A. Fontanilla', '5', '00', '2021-12-16', '2021-12-16', '2021-12-16', 'Sick Leave', 'sick');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `employeeid` int(8) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('19640004', 'mmm', 'mmm', 'mmm', 'Staff');
INSERT INTO `tbl_users` VALUES ('19640008', 'Jjjjjj', 'jjjjjj', 'jjjj', 'Staff');
INSERT INTO `tbl_users` VALUES ('19641000', 'Admin Admin', 'Admin', 'admin', 'Admin');
INSERT INTO `tbl_users` VALUES ('19641001', 'Jan Micko Nelmida', 'janmicko', 'janmicko', 'Admin');
INSERT INTO `tbl_users` VALUES ('19641002', 'Staff Staff', 'Staff', 'staff', 'Staff');
INSERT INTO `tbl_users` VALUES ('19641003', 'Marie Ann Fontanilla', 'marieanns', 'marieann', 'Staff');
INSERT INTO `tbl_users` VALUES ('19641005', 'Albert Subang', 'Albert', 'albert', 'Staff');
