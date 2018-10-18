<?php

// 課題：ブックマークアプリ
// php4回目版
// opn_detail.php
//  ・「公開詳細ブックマーク画面」処理
//  （ラジオボタン処理含む）
//  ・トップページへの戻りリンクを追加

$bmid = $_GET["bmid"];
include "funcs.php";
$pdo = db_con();

//２．データ参照SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE bmid=:bmid");
$stmt->bindValue(":bmid", $bmid, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ取得
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

//４．ラジオボタンチェック
$chkRat5 = ($row["bmrating"]=="★★★★★")? "checked" :"";
$chkRat4 = ($row["bmrating"]=="★★★★☆")? "checked" :"";
$chkRat3 = ($row["bmrating"]=="★★★☆☆")? "checked" :"";
$chkRat2 = ($row["bmrating"]=="★★☆☆☆")? "checked" :"";
$chkRat1 = ($row["bmrating"]=="★☆☆☆☆")? "checked" :"";
$chkRat0 = ($row["bmrating"]=="☆☆☆☆☆")? "checked" :"";

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク詳細</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body marginwidth="50">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="opn_index.php">【戻る】トップページ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h3 align='center'>（公開）ブックマーク詳細</h3>
<form method="get" action="opn_index.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>ブックマーク詳細</legend> -->
     <label>書籍名：<input type="text" name="bmname" value="<?=$row["bmname"]?>"></label><br>

     <label>おすすめ度：<br>

     <input type="radio" name="bmrating" value="★★★★★" <?=$chkRat5?>> 【★★★★★】５つ星<br>
     <input type="radio" name="bmrating" value="★★★★☆" <?=$chkRat4?>> 【★★★★☆】４つ星<br>
     <input type="radio" name="bmrating" value="★★★☆☆" <?=$chkRat3?>> 【★★★☆☆】３つ星<br>
     <input type="radio" name="bmrating" value="★★☆☆☆" <?=$chkRat2?>> 【★★☆☆☆】２つ星<br>
     <input type="radio" name="bmrating" value="★☆☆☆☆" <?=$chkRat1?>> 【★☆☆☆☆】１つ星<br>
     <input type="radio" name="bmrating" value="☆☆☆☆☆" <?=$chkRat0?>> 【☆☆☆☆☆】星なし<br><br>

     <label>書籍コメント：<textArea name="bmcomm" rows="4" cols="40"><?=$row["bmcomm"]?></textArea></label><br>
     
     <label>書籍URL：<input type="text" name="bmurl" value="<?=$row["bmurl"]?>"></label><br>

     <input type="submit" value="【戻る】">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>