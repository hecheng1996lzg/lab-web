-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-09 17:16:11
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
  `article_info` varchar(1000) NOT NULL COMMENT '文章相关信息（期刊/会议，日期等）',
  `time` year(4) NOT NULL COMMENT '发表年份'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `name`, `authors`, `article_info`, `time`) VALUES
(1, 'AAGA: Affinity-Aware Grouping Method for Allocation of Virtual Machines', 'Jianhai Chen*, Kevin Chiew, Deshi Ye, Liangwei Zhu, Wenzhi Chen', 'IEEE International Conference on Advanced Information Networking and Applications', 2013),
(2, 'A Fine-grained Performance-based Decision Model for Virtualization Application Solution', 'Jianhai Chen*, Dawei Huang, Bei Wang, Deshi Ye, Qinming He, Wenzhi Chen', 'Proceedings of the third TPC Technology Conference on Performance Evaluation & Benchmarking (TPCTC’11)', 2011),
(3, 'DP: Dynamic Prepage in Postcopy Migration for Fixed-Size Data Load', 'Shuang Wu, Ce Yang, Jianhai Chen, Qinming He, Bei Wang', 'Network and Parallel Computing. Springer Berlin Heidelberg', 2016),
(4, 'ITC-LM: a Smart Iteration-Termination Criterion Based Live Virtual Machine Migration', 'Liangwei Zhu, Jianhai Chen, Qinming He, Dawei, Huang Shuang Wu', '10th IFIP International Conference on Network and Parallel Computing (IFIP NPC’2013)', 2013),
(5, 'Virt-LM: A Benchmark for Live Migration of Virtual Machine', 'Dawei Huang, Deshi Ye, Qinming He, Jianhai Chen, Kejiang Ye', 'ACM/SPEC International Conference on Performance Engineering (ACM/SPEC ICPE’2011)', 2011);

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
  `status` varchar(255) NOT NULL COMMENT '授权状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `patents`
--

INSERT INTO `patents` (`id`, `name`, `author`, `status`) VALUES
(1, '基于虚拟机迁移和负载感知整合的云数据中心节能方法', '吴朝晖,叶可江,姜晓红,何钦铭', '授权'),
(2, 'Openstack令牌访问保护机制的实现方法及系统', '王津航；陈建海；王备；何钦铭；侯文龙；程雨夏；黄步添', '实质性审查');

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
  `endTime` date NOT NULL COMMENT '项目预计结束时间',
  `description` text NOT NULL COMMENT '项目描述',
  `status` tinyint(1) NOT NULL COMMENT '项目进行状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `projects`
--

INSERT INTO `projects` (`id`, `name`, `startTime`, `endTime`, `description`, `status`) VALUES
(1, 'JUNO 虚拟计算IO性能和调度策略开发', '2014-04-01', '2017-07-01', '针对运行 JUNO 计算任务的虚拟机（简称JUNO虚拟机），提出合理的性能测试方案，编写测试工具并给出分析报告和虚拟化应用建议；采集JUNO虚拟机的性能数据，对虚拟机 vCPU 性能和IO性能进行优化；根据物理机规格给出虚拟机容量规划建议； 实现基于Openstack 的虚拟机调度决策系统，提供虚拟机的初始放置，负载均衡，热点消除，冷点整合四个功能点的调度决策。', 1);

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
  `photo` varchar(255) NOT NULL COMMENT '照片',
  `bool` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`id`, `name`, `adYear`, `status`, `photo`, `bool`) VALUES
(1, '吕颖', 2014, '虚拟化性能评测', 'assets\\images\\team\\student\\buwei.jpg', '1'),
(2, '翁海琴', 2014, '机器学习', 'assets\\images\\team\\student\\hqw.jpg', '1'),
(3, '张淼', 2016, '高性能计算', 'assets\\images\\team\\student\\zhangmiao.jpg', '1'),
(4, '袁佳琪', 2017, '机器学习', 'assets\\images\\team\\student\\yjq.jpg', '2'),
(5, '测试一位', 2017, '学习', 'assets\\images\\team\\student\\yjq.jpg', '1'),
(6, '测试二位', 2017, '工作单位一', 'assets\\images\\team\\student\\yjq.jpg', '2');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
