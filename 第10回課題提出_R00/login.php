<!DOCTYPE html>
<!-- // 課題：ブックマークアプリ
// php4回目版
// login.php
//  ・ログイン入力画面
//  ・トップページへの戻りリンクを追加 -->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" >【認証】ログイン</a>
        <a class="navbar-brand" href="opn_index.php">【戻る】トップページ</a>
   </nav>
</header>

<!-- LOgin_act.php は認証処理用のPHPです。 -->
<a>　会員様は、認証情報を入力してください。</a><br><br>
<form name="form1" action="login_act.php" method="post">
　ログインID:　　　　　<input type="text" name="lid" /><br><br>
　ログインパスワード:　<input type="password" name="lpw" /><br><br>
　<input type="submit" value="ログイン" />
</form>

</body>
</html>