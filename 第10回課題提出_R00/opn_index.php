<?php
// 課題：ブックマークアプリ
// php5回目版
// opn_index.php
//  ・今回スタート部分
//  ・セッション対応
//  ・公開用一覧表形式表示画面（Ｗｅｂは無料ページテンプレ流用） 
//  ・公開詳細表示（更新流用）（Ｗｅｂは無料ページテンプレ流用）
//  ・「会員ログイン」リンク
//  ・ＧＢＫの追加対応

include "funcs.php";
//最初にSESSIONを開始！！
// session_start();

//SSIDチェックと新しいセッションIDを発行（前のSESSION IDは無効）
// chkSsid();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示

$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //表形式1行単位に$viewへ
        $view .= '<tr>';
            //1列目
            $view .= '<td align="center"><a href="opn_detail.php?bmid=' . $result["bmid"] . '">';
            $view .= $result["bmname"].'<br>' ;
            $view .= '<img src=' .$result["bmimage"] .'>';
            $view .= '</a></td>';
            //2列目
            $view .= '<td align="center">';
            $view .= $result["bmauthors"] ;
            $view .= '</td>';
            //3列目
            $view .= '<td align="center">';
            $view .= $result["bmrating"] ;
            $view .= '</td>';
            //4列目
            $view .= '<td>';
            $view .= $result["bmdescription"] ;
            $view .= '</td>';
        $view .= '</tr>';
    }
}
?>

<!-- //下記のＷｅｂは無料テンプレートだが、著作がついているので
//Copyright外せないので注意 -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ブックマークアプリ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description">
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>
<h1 id="logo"><a href="opn_index.php"><img src="logo.png" alt="logoSite"></a></h1>
<nav id="menubar">
<ul>
<li><a href="login.php">Login</a></li>
<li><a href="#bookmark">BookMark</a></li>
</ul>
</nav>
</header>

<div class="contents" id="about">

<section id="new">
<h2>更新情報・お知らせ</h2>
<dl>
<dt>2018/11/07</dt>
<dd>ブックマーク登録時に、ISBN入力で、GoogleBooks のAPI検索を使って書籍の基本情報を閲覧・登録ができるようになりました！　とても便利です！</dd>
<dt>2018/10/12</dt>
<dd>村上春樹ノーベル文学賞受賞なるか？！はじめました。</dd>
<dt>2018/07/03</dt>
<dd>村井純のインターネット放浪記、絶賛発売中。</dd>
<dt>2018/03/31</dt>
<dd>BookMarkCafeは東証二部に上場いたしました。</dd>
<dt>2017/12/01</dt>
<dd>HP公開しました。</dd>
</dl>
</section>

<section id="bookmark">
<h2>登録ブックマーク（例）    
</h2>
<table class="ta1">
    <tr>
    <th colspan="4" class="tamidashi">貴方のブックマークを公開してみませんか。</th>
    </tr>

    <th width="150">【詳細クリック】書籍名</th>
    <th width="150">著者</th>
    <th width="150">おすすめ度</th>
    <th >書籍説明</th>
    </tr>
    <?=$view?>

</table>
</section>
<p class="pagetop"><a href="#">↑</a></p>
</div>

<footer>
<small>Copyright&copy; <a href="opn_index.php">BookMark Cafe Co.,Ltd.</a> All Rights Reserved.</small>
<span class="pr">《<a href="http://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
</footer>

<!--背景用の画像の読み込み-->
<aside id="bg"><img src="images/bg.jpg" class="landscape"><img src="images/bg2.jpg" class="portrait"></aside>

</body>
</html>
