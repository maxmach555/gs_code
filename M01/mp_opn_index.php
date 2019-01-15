<?php
// 卒開：松井さんPJ
// mp_opn_index.php
//  ・メインページ部
//  ・プレゼンター動画一覧
//  ・動画分析結果レーダーチャート表示
//  ・動画アップ機能（未実装）

include "funcs.php";

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_sp_anal_tbl");
$status = $stmt->execute();

//３．データ表示

$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //表形式1行単位に$viewへ
        $view .= '<tr>';
            //1列目
            $view .= '<td align="center"><a href="mp_radar_view.php?mid=' . $result["mid"] . '">';
            $view .= $result["pre_name"].'<br>' ;
            $view .= '<img src=' .$result["thum_name"] .'>';
            $view .= '</a></td>';
            //2列目ビデオ追加
            $view .= '<td align="center"><video controls width="80"><source src ="'.$result["mov_name"].'"></video>';
            $view .= '</td>';
            //3列目
            $view .= '<td align="center">';
            $view .= $result["mov_title"] ;
            $view .= '</td>';
            //4列目
            $view .= '<td align="center">';
            $view .= $result["sp_total_scr"] ;
            $view .= '</td>';
            //5列目
            $view .= '<td>';
            $view .= $result["pre_comm"] ;
            $view .= '</td>';
        $view .= '</tr>';
    }
}
?>

<!-- 下記のＷｅｂは無料テンプレートだが、著作がついているのでCopyright外せないので注意 -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>speech</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description">
<link rel="stylesheet" href="./css/style02.css">

</head>

<body>

<header>
<h1 id="logo"><a href="mp_opn_index.php"><img src="image/logo_w.png" alt="logoSite"></a></h1>
<nav id="menubar">
<ul>
<li><a href="mp_ViApi_req.php">Upload</a></li>
<li><a href="#bookmark">speech List</a></li>
</ul>
</nav>
</header>

<div class="contents" id="about">

<section id="new">
<h2>更新情報・お知らせ</h2>
<dl>
<dt>2019/01/16</dt>
<dd>インフルエンサー育成協力パートナー様の募集要項を公開しました。</dd>
<dt>2019/01/15</dt>
<dd>speechリリース0.8ベータ版公開いたしました。</dd>
<dt>2019/01/15</dt>
<dd>HP公開しました。</dd>
</dl>
</section>

<section id="bookmark">
<h2>speech 育成プレゼンター リスト    
</h2>
<table class="ta1">
    <tr>
    <th colspan="5" class="tamidashi">貴方のプレゼンテーション動画をAIが分析評価、インフルエンサーとしての実力評価指標として活用できます。是非、参加してみませんか。</th>
    </tr>
    <th >【詳細クリック】プレゼンター</th>
    <th >ビデオ</th>
    <th >テーマ</th>
    <th >総合得点</th>
    <th >コメント</th>
    </tr>
    <?=$view?>

</table>
</section>
<p class="pagetop"><a href="#">↑</a></p>
</div>

<footer>
<small>Copyright&copy; <a href="mp_opn_index.php">speech Co.,Ltd.</a> All Rights Reserved.</small>
<span class="pr">《<a href="http://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
</footer>

<!--背景用の画像の読み込み-->
<aside id="bg"><img src="./images/bg.jpg" class="landscape"><img src="./images/bg2.jpg" class="portrait"></aside>

</body>
</html>
