<!DOCTYPE html>
<!-- 
// 課題：ブックマークアプリ
// php3回目版
// insert.php
//  ・「登録画面」処理
 -->

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
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
<form method="get" action="DB_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク登録</legend>
     登録するブックマークの情報を入力してください。<br>
     <label>書籍名：<input type="text" name="bmname"></label><br>

     <label>おすすめ度：<br>
     <input type="radio" name="bmrating" value="★★★★★"> 【★★★★★】５つ星<br>
     <input type="radio" name="bmrating" value="★★★★☆"> 【★★★★☆】４つ星<br>
     <input type="radio" name="bmrating" value="★★★☆☆"> 【★★★☆☆】３つ星<br>
     <input type="radio" name="bmrating" value="★★☆☆☆"> 【★★☆☆☆】２つ星<br>
     <input type="radio" name="bmrating" value="★☆☆☆☆"> 【★☆☆☆☆】１つ星<br>
     <input type="radio" name="bmrating" value="☆☆☆☆☆"> 【☆☆☆☆☆】星なし<br><br>

     <label>書籍コメント：<textArea name="bmcomm" rows="4" cols="40"></textArea></label><br>
     
     <label>書籍URL：<input type="text" name="bmurl"></label><br>
     <input type="submit" value="【登録】">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
