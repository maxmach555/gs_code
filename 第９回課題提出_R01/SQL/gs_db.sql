-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 10 朁E18 日 15:20
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `age`, `email`, `naiyou`, `indate`) VALUES
(1, '織田信長', 41, 'test1@gs.com', 'テスト1', '2018-10-06 01:08:02'),
(2, '徳川家康', 30, 'test2@gs.com', 'テスト2', '2018-10-06 01:08:03'),
(3, '勝海舟', 43, 'test3@gs.com', 'テスト3', '2018-10-06 01:08:04'),
(4, '服部半蔵', 44, 'test4@gs.com', 'テスト4', '2018-10-06 01:08:05'),
(5, '佐々木小次郎', 40, 'test5@gs.com', 'テスト5', '2018-10-06 01:08:06'),
(6, '斎藤道三', 20, 'test6@gs.com', 'テスト6', '2017-05-26 01:08:21'),
(7, '斎藤道四', 20, 'test7@gs.com', 'テスト7', '2018-10-06 01:08:11'),
(8, '斎藤道五', 10, 'test8@gs.com', 'テスト8', '2018-10-06 01:08:33'),
(9, '斎藤道六', 49, 'test9@gs.com', 'テスト9', '2018-10-06 01:08:55'),
(10, '斎藤道七', 50, 'test10@gs.com', 'テスト10', '2018-10-06 01:08:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`bmid` int(12) NOT NULL,
  `bmname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bmrating` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '☆☆☆☆☆',
  `bmurl` text COLLATE utf8_unicode_ci,
  `bmcomm` text COLLATE utf8_unicode_ci,
  `bmindate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`bmid`, `bmname`, `bmrating`, `bmurl`, `bmcomm`, `bmindate`) VALUES
(1, 'アルジャーノンに花束を', '★★★★★', 'https://books.google.co.jp/books?isbn=4152095334', '幼児なみの知能のため、みんなからバカにされてきたチャーリイ・ゴードン。頭がよくなる手術を受けた彼は、ついに天才へと変貌する―知を求めさまよう青年がやがて知る、ほ ...', '2018-10-08 10:06:28'),
(2, '蝉しぐれ', '★★★☆☆', 'https://books.google.co.jp/books?isbn=4152095334', 'いいお話でした。ほんの僅かなすれ違いが運命を大きく変えていく。少年時代の文四郎の苦労は言葉では言い表すことは難しい。そしてそのようなものをすべて無にしてしまうほど愚劣な藩政を司る者達の暗躍。剣に精進し剣を極めようと努力する文四郎 ...', '2018-10-08 10:06:28'),
(22, '深海のYrr ', '★★★★☆', 'https://books.google.co.jp/books?isbn=4150411700', 'ノルウェー海で発見された無数の異様な生物。海洋生物学者ヨハンソンの努力で、その生物が海底で新燃料メタンハイドレートの層を掘り続けていることが判明した。カナダ西岸 ...', '2018-10-10 00:25:30'),
(23, 'Inherit the Stars', '★★★★★', 'https://books.google.co.jp/books?isbn=0345301072', '３部作', '2018-10-10 00:41:40'),
(25, '足柄山の金太郎の失恋　再び', '★★☆☆☆', 'test', 'adfadfafa', '2018-10-13 22:44:57'),
(26, '足柄山の金太郎の失恋　再び', '★★★★★', 'http://google.com/abcEF', 'test1', '2018-10-14 10:10:49'),
(27, 'たくま', '★★★★☆', 'http://google.com/abc', 'おもしろかった', '2018-10-16 21:47:54');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', '$2y$10$YERF7VasRE7iq4./ZF2zi.KbVXv4DOrJdKxHsCDfSkXV.yifQBQqW', 1, 0),
(2, 'テスト2一般', 'test2', '$2y$10$rX9MZSY0XkBweD7bTDTuWeBGt5n9Yws8hbRRGFhzyyCR4gfdKI74i', 0, 0),
(3, 'テスト３', 'test3', '$2y$10$vv3hfKN9QjJvYHJs1W0OR.461Ks.dB7yX4uswGoVjAgGyLSRd9vsa', 0, 0),
(5, '一般mem1', 'mem1', '$2y$10$ji9cD2QRnzWb8rvUBU2Bg.MjaKIN18HOLnw52TlbSFPfTwRjWf1W6', 0, 0),
(6, '一般mem2', 'mem2', '$2y$10$5tUBPUVcpZuJ5gUg/COWNeGWImhMg7ZI8f026oyhESua3.rGaqUMK', 0, 1),
(7, '使用中止スーパー管理者', 'kanri1', '$2y$10$vsum1IjqnULDClJSxxemIuD0DXd0YVntse6ynTIDkSO4AWJrZYBQe', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`bmid`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `bmid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
