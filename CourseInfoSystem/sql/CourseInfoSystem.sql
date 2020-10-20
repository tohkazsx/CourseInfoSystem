CREATE DATABASE IF not exists db1752528;
use db1752528;

DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `course_info`;
DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `realname` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `course_info` (
  `cid` int(11) NOT NULL,
  `cname` varchar(32) NOT NULL,
  `tname` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comments` (
  `comment_no` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` varchar(256) NOT NULL,
  `ctime` DATE NOT NULL,
  PRIMARY KEY (`comment_no`),
  FOREIGN KEY (cid) REFERENCES course_info (cid),
  FOREIGN KEY (uid) REFERENCES user_info (uid)
) ENGINE=InnoDB  AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `user_detail` (
  `uid` int(11),
  `telephone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `intro` varchar(256) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO course_info values(1001,"高等数学","马洪宽","数学学院");
INSERT INTO course_info values(1002,"高等数学","黄长水","数学学院");
INSERT INTO course_info values(1003,"高等数学","周海港","数学学院");
INSERT INTO course_info values(2001,"高级程序语言设计","沈坚","电子与信息工程学院");
INSERT INTO course_info values(2002,"离散数学","王成","电子与信息工程学院");

INSERT INTO course_info values(1004,"组合数学","张莉","数学学院");
INSERT INTO course_info values(1005,"线性代数","张莉","数学学院");
INSERT INTO course_info values(3006,"普通物理","刘海兰","物理学院");
INSERT INTO course_info values(2005,"程序设计方法学","王小平","电子与信息工程学院");
INSERT INTO course_info values(2006,"数字逻辑","张冬冬","电子与信息工程学院");

INSERT INTO course_info values(3009,"结构力学","张三","物理学院");
INSERT INTO course_info values(1105,"刑法学","罗翔","法学院");
INSERT INTO course_info values(3106,"马克思主义原理基本概论","苏开贵","马克思主义学院");
INSERT INTO course_info values(2015,"软件工程","曾国荪","电子与信息工程学院");
INSERT INTO course_info values(2016,"计算机组成原理","郝泳涛","电子与信息工程学院");

INSERT INTO course_info values(1013,"数学分析","李四","数学学院");
INSERT INTO course_info values(1018,"概率论","王勇智","数学学院");
INSERT INTO course_info values(5016,"混凝土结构","王五","建筑与设计学院");
INSERT INTO course_info values(1505,"星期音乐会","费诚","音乐学院");
INSERT INTO course_info values(2007,"计算机系统实验","郭玉臣","电子与信息工程学院");

INSERT INTO comments (cid,uid,title,content,ctime)values(2007,1,"系统实验缺乏理论指导","系统实验缺乏理论指导",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(1003,1,"老师改作业很认真","老师改作业很认真",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(2006,1,"数字逻辑大作业太难","大作业太难了",NOW());

INSERT INTO comments (cid,uid,title,content,ctime)values(2007,2,"系统实验难度过大","系统实验缺乏理论指导",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(2015,2,"教学认真给分棒","老师改作业很认真，给成绩很好",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(2016,2,"老师教学不太上心","上课速度太慢了",NOW());

INSERT INTO comments (cid,uid,title,content,ctime)values(1001,1,"马老师看起来严厉其实人很好","上课改作业答疑都很负责",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(2002,1,"给分很好","老师给分很好，复习课要认真听",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(1105,2,"上课内容超有意思","老师学识渊博，上课讲解不枯燥，举例生动",NOW());

INSERT INTO comments (cid,uid,title,content,ctime)values(1505,1,"难得一遇的好课","音乐会是一种享受，老师也很热情",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(1018,1,"讲课好，但任务太多","老师很认真，但是布置任务太多",NOW());
INSERT INTO comments (cid,uid,title,content,ctime)values(2006,2,"大作业太难了","大作业太难了",NOW());