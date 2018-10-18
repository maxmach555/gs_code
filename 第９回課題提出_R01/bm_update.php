<?php

// 課題：ブックマークアプリ
// php4回目版
// bm_update.php
//  ・「ブックマーク更新画面」処理
//  （ラジオボタン処理含む）

$bmid = $_GET["bmid"];
include "funcs.php";
$pdo = db_con();

//２．データ更新SQL作成
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
  <title>ブックマーク更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body marginwidth="50">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">【戻る】ブックマーク一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <h2 align='center'>ブックマーク登録</h2><br> -->
<form method="get" action="DB_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク更新</legend>
     ブックマークの情報を更新してください。<br>
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
     <input type="hidden" name="bmid" value="<?=$row["bmid"]?>">
     <input type="submit" value="【更新】">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
