<?php

// 課題：ブックマークアプリ
// php3回目版
// usr_index.php
//  ・今回スタート部
//  ・ユーザ一覧表形式表示画面 
//  ・（実装）登録、削除、更新、（未実装）検索
//  ・「登録」リンク
//  ・「削除」リンク
//  ・「更新」リンク

include "funcs.php";
//最初にSESSIONを開始！！
// session_start();

//SSIDチェック
// chkSsid();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
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
            $view .= '<td align="center"><a href="usr_delete.php?id=' . $result["id"] . '">';
            $view .= "[☓]";
            $view .= '</a></td>';
            //2列目
            $view .= '<td align="center"><a href="usr_update.php?id=' . $result["id"] . '">';
            $view .= $result["name"] ;
            $view .= '</a></td>';
            //3列目
            $view .= '<td align="center">';
            $view .= $result["lid"] ;
            $view .= '</td>';
            //4列目
            $view .= '<td align="center">';
            $view .= $result["lpw"] ;
            $view .= '</td>';
            //5列目
            $view .= '<td align="center">';
            $view .= $result["kanri_flg"] ;
            $view .= '</td>';
            //6列目
            $view .= '<td align="center">';
            $view .= $result["life_flg"] ;
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

        <a class="navbar-brand" href="usr_insert.php">【登録】新規ユーザ</a> <a class="navbar-brand" href="index.php">【戻る】ブックマーク一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <h2 align='center'>ユーザ一覧</h2><br>
    <table border='3' width='100%' height='100' bgcolor=':#e3f0fb';>
        <tr bgcolor="#ccffff">
        <th width='70'>【削除】</th>
        <th width='200'>　　　【更新】 ユーザ名</th>
        <th width='150'>ログインＩＤ</th>
        <th width='150'>ログイン・パスワード</th>
        <th width='150'>管理者権限</th>
        <th width='150'>使用権限</th>
        </tr>
        <?=$view?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>
