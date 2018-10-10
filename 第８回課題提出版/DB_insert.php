<?php
// 課題：ブックマークアプリ
// php3回目版
// DB_insert.php
//  ・「ＤＢ登録」処理

//1. GETデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bmname = $_GET["bmname"];
$bmrating = $_GET["bmrating"];
$bmcomm = $_GET["bmcomm"];
$bmurl = $_GET["bmurl"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bmid,bmname,bmrating,bmurl,bmcomm,bmindate)VALUES(null,:bmname,:bmrating,:bmurl,:bmcomm,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bmname', $bmname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmrating', $bmrating, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmcomm', $bmcomm, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmurl', $bmurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
}

?>