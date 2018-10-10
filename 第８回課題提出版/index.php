<?php

// 課題：ブックマークアプリ
// php3回目版
// index.php
//  ・今回スタート部
//  ・一覧表形式表示画面 
//  ・（実装）登録、削除、更新、ユーザ管理 （未実装）検索
//  ・「登録」リンク
//  ・「削除」リンク
//  ・「更新」リンク
//  ・「ユーザ管理」リンク

include "funcs.php";
//最初にSESSIONを開始！！
// session_start();

//SSIDチェック
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
            // $view .= '<p>';
            $view .= '<td align="center"><a href="delete.php?bmid=' . $result["bmid"] . '">';
            $view .= "[☓]";
            $view .= '</a></td>';
            //2列目
            $view .= '<td align="center"><a href="bm_update.php?bmid=' . $result["bmid"] . '">';
            $view .= $result["bmname"] ;
            $view .= '</a></td>';
            //3列目
            $view .= '<td align="center">';
            $view .= $result["bmrating"] ;
            $view .= '</td>';
            //4列目
            $view .= '<td>';
            $view .= $result["bmcomm"] ;
            $view .= '</td>';
            //5列目
            $view .= '<td>';
            $view .= $result["bmurl"] ;
            $view .= '</td>';
            //6列目
            $view .= '<td align="center">';
            $view .= $result["bmindate"] ;
            $view .= '</td>';

        $view .= '</tr>';

    }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマークアプリ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">

        <a class="navbar-brand" href="insert.php">【登録】ブックマーク</a>
        <a class="navbar-brand" href="usr_index.php">【管理】ユーザ一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <h2 align='center'>ブックマーク一覧</h2><br>
    <table border='3' width='100%' height='100' bgcolor=':#e3f0fb';>
        <tr bgcolor="#ccffff">
        <th width='70'>【削除】</th>
        <th width='300'>　　　【更新】 書籍名</th>
        <th width='100'>おすすめ度</th>
        <th >書籍コメント</th>
        <th width='150'>書籍ＵＲＬ</th>
        <th width='150''>登録日時</th>
        </tr>
        <?=$view?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>
