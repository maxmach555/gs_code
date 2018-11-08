<?php
// 課題：ブックマークアプリ
// php5回目版
// GBK_serch.php
//  ・ISBN番号でのGooglブック情報を検索
//  ・検索結果を入れた「ブックマークＤＢ登録画面」処理

$bkisbn = $_GET["isbn"];

$data = "https://www.googleapis.com/books/v1/volumes?q=isbn:".$bkisbn;

//url(=$data)をget
$json = file_get_contents($data);
// JSONデータを連想配列にする
$json_decode = json_decode($json, true);

    //リプライのJSON実体に合わせているだけで応用性が無い形式、本当はＪＱのライブラリ噛ませた方が楽だと思う。
    //ポイントとして、データ実体がある箇所まで指定しないと成立しない、よって途中の非該当となった場合の［０］配列も噛ませないとエラーとなる。

    //ＩＦ判定を入れてもSubtitleとかエラーが回避できない場合があり。とりあえず、当たり障りなさそうな項目だけ

if($json_decode['items'][0]['volumeInfo']['title'] == "" ){
    $GBK_title = "";    
}else{
    $GBK_title = $json_decode['items'][0]['volumeInfo']['title'];
}

if( $json_decode['items'][0]['volumeInfo']['authors'][0]== "" ){
    $GBK_authors = "";    
}else{
    $GBK_authors = $json_decode['items'][0]['volumeInfo']['authors'][0];
}

if( $json_decode['items'][0]['volumeInfo']['description'] == "" ){
    $GBK_descrip = "";    
}else{
    $GBK_descrip = $json_decode['items'][0]['volumeInfo']['description'];    
}

if( $json_decode['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'] == "" ){
    $GBK_image = "";    
}else{
    $GBK_image = $json_decode['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'];
}

if( $json_decode['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'] == "" ){
    $GBK_image = "";    
}else{
    $GBK_url = $json_decode['items'][0]['volumeInfo']['infoLink'];
}


?>

<!DOCTYPE html>
<!-- 
// insert.phpを流用、共通しての書き方ができていない。
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
     <a href = "<?=$GBK_url?>" target="_blank"><img src="<?=$GBK_image?>" alt="book img" title="Google Books Link"></a><br>
     <label>　書籍名：　　<input type="text" name="bmname" size="40" value="<?=$GBK_title?>"></label><br>
     <label>　著者：　　　<input type="text" name="bmauthors" size="40" value="<?=$GBK_authors?>">></label><br>
     <label>　説明：　　　<textArea name="bmdescription" rows="4" cols="40"><?=$GBK_descrip?></textArea></label><br>

     <label>　私のおすすめ度：<br>
     <input type="radio" name="bmrating" value="★★★★★"> 【★★★★★】５つ星<br>
     <input type="radio" name="bmrating" value="★★★★☆"> 【★★★★☆】４つ星<br>
     <input type="radio" name="bmrating" value="★★★☆☆"> 【★★★☆☆】３つ星<br>
     <input type="radio" name="bmrating" value="★★☆☆☆"> 【★★☆☆☆】２つ星<br>
     <input type="radio" name="bmrating" value="★☆☆☆☆"> 【★☆☆☆☆】１つ星<br>
     <input type="radio" name="bmrating" value="☆☆☆☆☆"> 【☆☆☆☆☆】星なし<br><br>

     <label>　私の感想：　<textArea name="bmcomm" rows="4" cols="40"></textArea></label><br>
     
     <label>　ISBN：　　<input type="text" name="bmisbn" value="<?=$bkisbn?>"></label><br>
     <label>　GoogleBooks URL：<input type="text" name="bmurl" size="80" value="<?=$GBK_url?>"></label><br>
     <input type="hidden" name="bmimage" value="<?=$GBK_image?>">
     <input type="submit" value=" 【登録】 ">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
