<!DOCTYPE html>
<!-- 
// 課題：ブックマークアプリ
// php3回目版
// usr_insert.php
//  ・「新規ユーザ登録画面」処理
 -->

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク・新規ユーザ登録</title>
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

<form method="get" action="usrDB_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>　新規ユーザ登録</legend>
     　登録する新規ユーザの情報を入力してください。<br><br>
     <label>　ユーザ名　　：<input type="text" name="name"></label><br><br>
     <label>　ログインＩＤ：<input type="text" name="lid"></label><br><br>
     <label>　パスワード　：<input type="password" name="lpw" ></label><br><br>
     <label>　管理者権限： <input type="radio" name="kanri_flg" value=0>管理者　 <input type="radio" name="kanri_flg" value=1>スーパー管理者<br><br>
     <label>　使用権限　： <input type="radio" name="life_flg" value=0>使用中　 <input type="radio" name="life_flg" value=1>使用中止<br><br>
     <input type="submit" value="【新規ユーザ登録】" >



    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
