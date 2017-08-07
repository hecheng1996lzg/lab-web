-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-07 08:11:59
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT '文章名称',
  `authors` varchar(1000) NOT NULL COMMENT '文章作者',
  `article_info` varchar(1000) NOT NULL COMMENT '文章相关信息（期刊/会议，日期等）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_title`
--

CREATE TABLE `article_title` (
  `article_id` int(10) NOT NULL,
  `title_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_path` varchar(1000) NOT NULL COMMENT '新闻路径',
  `date` datetime DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `news_path`, `date`, `title`) VALUES
(1, 'webPage\\news\\new1.html', '2017-08-05 00:00:00', '测试模板');

-- --------------------------------------------------------

--
-- 表的结构 `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT '专利名称',
  `author` varchar(1000) NOT NULL COMMENT '专利作者',
  `status` int(11) NOT NULL COMMENT '授权状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `patent_title`
--

CREATE TABLE `patent_title` (
  `patent_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT '项目名称',
  `startTime` date NOT NULL COMMENT '项目开始时间',
  `endTime` date NOT NULL COMMENT '项目结束时间',
  `description` text NOT NULL COMMENT '项目描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `project_title`
--

CREATE TABLE `project_title` (
  `project_id` int(10) NOT NULL,
  `title_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `adYear` year(4) NOT NULL COMMENT '入学年份',
  `status` varchar(255) NOT NULL COMMENT '状态',
  `photo` varchar(255) NOT NULL COMMENT '照片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`id`, `name`, `adYear`, `status`, `photo`) VALUES
(1, '吕颖', 2014, '虚拟化性能评测', 'assets\\images\\team\\student\\buwei.jpg'),
(2, '翁海琴', 2014, '机器学习', 'assets\\images\\team\\student\\hqw.jpg'),
(3, '张淼', 2016, '高性能计算', 'assets\\images\\team\\student\\zhangmiao.jpg'),
(4, '袁佳琪', 2017, '机器学习', 'assets\\images\\team\\student\\yjq.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `teachers`
--

CREATE TABLE `teachers` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `title` varchar(255) NOT NULL COMMENT '职位',
  `research` varchar(255) NOT NULL COMMENT '研究方向',
  `tel` varchar(255) NOT NULL COMMENT '电话',
  `email` varchar(255) NOT NULL COMMENT '邮件',
  `photo` varchar(255) NOT NULL COMMENT '照片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `title`, `research`, `tel`, `email`, `photo`) VALUES
(1, '陈建海', '讲师', '虚拟化、高性能计算、区块链', '1111111', 'dasda@zju.edu.cn', 'assets\\images\\team\\teacher.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `titles`
--

CREATE TABLE `titles` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '标签名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '访学老师姓名',
  `photo` varchar(255) NOT NULL COMMENT '访学老师照片',
  `contact` varchar(255) NOT NULL COMMENT '访学老师联系方式',
  `research` varchar(255) NOT NULL COMMENT '访学老师研究方向'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `photo`, `contact`, `research`) VALUES
(1, '阿达的', 'assets\\images\\team\\visitor\\a.jpg', 'daad@da.com', '多少度');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
