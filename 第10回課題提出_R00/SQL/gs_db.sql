-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 11 朁E08 日 15:24
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
-- テーブルの構造 `gs_an_img_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_img_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_img_table`
--

INSERT INTO `gs_an_img_table` (`id`, `name`, `email`, `naiyou`, `image`, `indate`) VALUES
(1, 'test1', 'test1', 'test1', 'upload/20181021041512d41d8cd98f00b204e9800998ecf8427e.png', '2018-10-21'),
(2, 'sasaki', 'mach@rakuten.jp', 'あｓｄふぁふぁ', 'upload/20181021103935d41d8cd98f00b204e9800998ecf8427e.png', '2018-10-21');

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
  `bmauthors` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bmdescription` text COLLATE utf8_unicode_ci,
  `bmisbn` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bmimage` text COLLATE utf8_unicode_ci,
  `bmindate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`bmid`, `bmname`, `bmrating`, `bmurl`, `bmcomm`, `bmauthors`, `bmdescription`, `bmisbn`, `bmimage`, `bmindate`) VALUES
(28, '愛蔵版蝉しぐれ', '★★★★★', 'http://books.google.co.jp/books?id=qBUDMQAACAAJ&dq=isbn:9784163905747&hl=&source=gbs_api', '号泣号泣', '藤沢周平', '苛烈な運命に翻弄されつつ成長してゆく少年藩士を描いた、藤沢作品の金字塔。', '9784163905747', 'http://books.google.com/books/content?id=qBUDMQAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:40:11'),
(30, 'アルジャーノンに花束を愛蔵版', '★★★★☆', 'http://books.google.co.jp/books?id=1DpFrgEACAAJ&dq=isbn:9784152095336&hl=&source=gbs_api', 'これも号泣', 'ダニエルキイス', '幼児なみの知能のため、みんなからバカにされてきたチャーリイ・ゴードン。頭がよくなる手術を受けた彼は、ついに天才へと変貌する―知を求めさまよう青年がやがて知る、ほんとうの愛とは?心の成長を描く不朽の名作。ファン必携の愛蔵版。', '9784152095336', 'http://books.google.com/books/content?id=1DpFrgEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:46:31'),
(31, 'コンピュータの構成と設計', '★★★☆☆', 'http://books.google.co.jp/books?id=Irc5GwAACAAJ&dq=isbn:9784822280567&hl=&source=gbs_api', 'コンピュータ世界の古典', 'ジョン・L. ヘネシー', 'コンピュータの仕組みとは?世界の読者が認めたNo.1の教科書が内容一新,待望の第2版登場。', '9784822280567', 'http://books.google.com/books/content?id=Irc5GwAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:47:16'),
(32, '鉄道員(ぽっぽや)', '★★★★☆', 'http://books.google.co.jp/books?id=_rsvngEACAAJ&dq=isbn:9784083211898&hl=&source=gbs_api', 'だめ、号泣', '浅田次郎', 'まもなく廃線となる、北海道のとあるローカル線。その終着駅の駅長・佐藤乙松もまた、退職のときをむかえようとしていた。娘を亡くした日も、妻を亡くした日も、乙松は駅に立ちつづけた。そんな彼のもとに、ある日、小さな“訪問者”がやってきた...。表題作「鉄道員」のほか、お盆の夜に起こった“ある奇跡”を描いた作品「うらぼんえ」も収録。小学上級・中学から。', '9784083211898', 'http://books.google.com/books/content?id=_rsvngEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:47:39'),
(33, '深海のYrr 上', '★★★★☆', 'http://books.google.co.jp/books?id=RtkqNwAACAAJ&dq=isbn:9784150411701&hl=&source=gbs_api', '最近のSFでは一番。映画化してほしい。', 'フランク・シェッツィング', 'ノルウェー海で発見された無数の異様な生物。海洋生物学者ヨハンソンの努力で、その生物が海底で新燃料メタンハイドレートの層を掘り続けていることが判明した。カナダ西岸ではタグボートやホエールウォッチングの船をクジラやオルカの群れが襲い、生物学者アナワクが調査を始める。さらに世界各地で猛毒のクラゲが出現、海難事故が続発し、フランスではロブスターに潜む病原体が猛威を振るう。母なる海に何が起きたのか。', '9784150411701', 'http://books.google.com/books/content?id=RtkqNwAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:48:44'),
(34, '星を継ぐもの', '★★★★★', 'https://play.google.com/store/books/details?id=2SdzBQAAQBAJ&source=gbs_api', 'SFの最高傑作。', 'ジェイムズ・Ｐ・ホーガン', 'ハードＳＦの巨星が一世を風靡した歴史的傑作。星雲賞受賞。 月面調査隊が真紅の宇宙服をまとった死体を発見した。すぐさま地球の研究室で綿密な調査が行なわれた結果、驚くべき事実が明らかになった。死体はどの月面基地の所属でもなく、世界のいかなる人間でもない。ほとんど現代人と同じ生物であるにもかかわらず、5万年以上も前に死んでいたのだ。謎は謎を呼び、一つの疑問が解決すると、何倍もの疑問が生まれてくる。やがて木星の衛星ガニメデで地球のものではない宇宙船の残骸が発見されたが……。', '9784488663018', 'http://books.google.com/books/content?id=2SdzBQAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2018-11-07 22:49:14'),
(35, '宇宙のランデヴー', '★★★★☆', 'http://books.google.co.jp/books?id=h1PTngEACAAJ&dq=isbn:9784150119430&hl=&source=gbs_api', 'ガンダムORGINのモチーフ。', 'アーサー・C. クラーク', '2130年、太陽系に突如侵入した謎の物体は、直径20キロ、自転周期4分という巨大な金属筒であることが判明した。人類が長いあいだ期待し、同時に怖れてもいた宇宙からの最初の訪問者が、ついに現われたのだ!“ラーマ”と命名されたこの人工物体の調査のため派遣されたエンデヴァー号は、苦心のすえラーマとのランデヴーに成功、その内部へと入ったが...ヒューゴー賞ほかあまたの賞を受賞した名作、待望の改訳決定版!', '9784150119430', 'http://books.google.com/books/content?id=h1PTngEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-07 22:50:10'),
(38, '生きがいの創造', '★★★★★', 'http://books.google.co.jp/books?id=UkGzl9wGB3kC&dq=isbn:9784569810898&hl=&source=gbs_api', '読む人を選ぶ、ナイトサイエンスの世界。', '飯田史彦', '200万部のベストセラー・シリーズを集大成する、待望の第5弾、ついに登場。スピリチュアルな現象をどのように理解し、わかりやすく語れば良いのだろうか?「先立った夫からのメッセージ」「運命の赤い糸」「幽霊の正体」「死後の生命」「神様の証明」「病気になる理由」「生まれ変わりの真相」「自死者の運命」「うつ状態からの脱出」...スピリチュアリティ・カウンセリングの最高権威が、各界の切実な要望を受けて発表する、「誰にでも安心して渡せる解説書」の決定版。', '9784569810898', 'http://books.google.com/books/content?id=UkGzl9wGB3kC&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2018-11-08 01:48:32'),
(39, '詳解ネットワークQoS技術', '★★★★★', 'http://books.google.co.jp/books?id=cryuAAAACAAJ&dq=isbn:9784274079214&hl=&source=gbs_api', 'ネットワーク　オタク仕様', '戸田巌', 'インターネットのQoS技術を詳しく解説', '9784274079214', 'http://books.google.com/books/content?id=cryuAAAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-08 01:50:39'),
(40, 'クライマーズ・ハイ', '★★★★☆', 'http://books.google.co.jp/books?id=EMpSGQAACAAJ&dq=isbn:9784167659035&hl=&source=gbs_api', 'チェック・ダブルチェック', '橫山秀夫', '1985年、御巣鷹山に未曾有の航空機事故発生。衝立岩登攀を予定していた地元紙の遊軍記者、悠木和雅が全権デスクに任命される。一方、共に登る予定だった同僚は病院に搬送されていた。組織の相剋、親子の葛藤、同僚の謎めいた言葉、報道とは―。あらゆる場面で己を試され篩に掛けられる、著者渾身の傑作長編。', '9784167659035', 'http://books.google.com/books/content?id=EMpSGQAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-08 23:02:11'),
(41, '実践サイバーセキュリティモニタリング', '★★★★★', 'http://books.google.co.jp/books?id=iieNDAEACAAJ&dq=isbn:9784339028539&hl=&source=gbs_api', 'ＳＯＣ関係者におすすめです。', '八木毅', '', '9784339028539', 'http://books.google.com/books/content?id=iieNDAEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-08 23:08:45'),
(42, 'アナライジング・マルウェア', '★★★★☆', 'http://books.google.co.jp/books?id=_bGiBqcgLfgC&dq=isbn:9784873114552&hl=&source=gbs_api', '検体解析、先ずはここから。', '新井悠', '最新のマルウェア(悪意あるソフト)対策を知る', '9784873114552', 'http://books.google.com/books/content?id=_bGiBqcgLfgC&printsec=frontcover&img=1&zoom=5&source=gbs_api', '2018-11-08 23:10:40');

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
-- Indexes for table `gs_an_img_table`
--
ALTER TABLE `gs_an_img_table`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `gs_an_img_table`
--
ALTER TABLE `gs_an_img_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `bmid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
