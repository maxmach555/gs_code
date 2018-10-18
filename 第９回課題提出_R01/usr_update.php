<?php

// 課題：ブックマークアプリ
// php4回目版
// usr_update.php
//  ・「ユーザ情報更新画面」処理
//  （ラジオボタン処理含む）

$id = $_GET["id"];
include "funcs.php";
$pdo = db_con();

//２．データ更新SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ取得
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

//４．ラジオボタンチェック
$chkKf0 = ($row["kanri_flg"]==0)? "checked" :"";
$chkKf1 = ($row["kanri_flg"]==1)? "checked" :"";
$chkLf0 = ($row["life_flg"]==0)? "checked" :"";
$chkLf1 = ($row["life_flg"]==1)? "checked" :"";

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ情報更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body marginwidth="50">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="usr_index.php">【戻る】ユーザ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<form method="get" action="usrDB_update.php">
  <div class="jumbotron">
   <fieldset>

    <legend>　ユーザ情報更新</legend>
     　登録ユーザの情報を更新してください。<br><br>
     <label>　ユーザ名　　：<input type="text" name="name" value='<?=$row["name"]?>'></label><br><br>
     <label>　ログインＩＤ：<input type="text" name="lid" value='<?=$row["lid"]?>'></label><br><br>
     <label>　パスワード　：<input type="password" name="lpw" value='<?=$row["lpw"]?>'></label><br><br>
     <label>　管理者権限： <input type="radio" name="kanri_flg" value=0 <?=$chkKf0?>>管理者　 <input type="radio" name="kanri_flg" value=1 <?=$chkKf1?>>スーパー管理者<br><br>
     <label>　使用権限　： <input type="radio" name="life_flg" value=0 <?=$chkLf0?>>使用中　 <input type="radio" name="life_flg" value=1 <?=$chkLf1?>>使用中止<br><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="【ユーザ情報更新】" >

    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
