<!DOCTYPE html>
<!-- 
// 課題：ブックマークアプリ
// php5回目版
// insert.php
//  ・「ブックマークＤＢ登録画面」処理
//　・ISBN番号でのGooglブック情報を閲覧して項目に表示
 -->

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録＿検索機能</title>
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
<form method="get" action="GBK_serch.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Googleブック検索</legend>
     検索するブックISBNを入力してください。<br>
     <label>ISBN：<input type="text" name="isbn"></label><br>
     <input type="submit" value="【検索】">
    </fieldset>
  </div>
</form>

<form method="get" action="DB_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク登録</legend>
     登録するブックマークの情報を入力してください。<br>
     <label>　書籍名：　　<input type="text" name="bmname" size="40"></label><br>
     <label>　著者：　　　<input type="text" name="bmauthors" size="40"></label><br>
     <label>　説明：　　　<textArea name="bmdescription" rows="4" cols="40"></textArea></label><br>

     <label>　私のおすすめ度：<br>
     <input type="radio" name="bmrating" value="★★★★★"> 【★★★★★】５つ星<br>
     <input type="radio" name="bmrating" value="★★★★☆"> 【★★★★☆】４つ星<br>
     <input type="radio" name="bmrating" value="★★★☆☆"> 【★★★☆☆】３つ星<br>
     <input type="radio" name="bmrating" value="★★☆☆☆"> 【★★☆☆☆】２つ星<br>
     <input type="radio" name="bmrating" value="★☆☆☆☆"> 【★☆☆☆☆】１つ星<br>
     <input type="radio" name="bmrating" value="☆☆☆☆☆"> 【☆☆☆☆☆】星なし<br><br>

     <label>　私の感想：　<textArea name="bmcomm" rows="4" cols="40"></textArea></label><br>
     
     <label>　ISBN：　　　<input type="text" name="bmisbn" ></label><br>
     <label>　GoogleBooks URL：<input type="text" name="bmurl" size="80"></label><br>
     <input type="hidden" name="bmimage" value="">
     <input type="submit" value=" 【登録】 ">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>

