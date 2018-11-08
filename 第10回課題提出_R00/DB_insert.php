<?php
// 課題：ブックマークアプリ
// php5回目版
// DB_insert.php
//  ・「ブックマークＤＢ登録」処理
//  ・GoogleBooksDB項目追加

//1. GETデータ取得(デバックのためＧｅｔ使用)
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bmname = $_GET["bmname"];
$bmrating = $_GET["bmrating"];
$bmurl = $_GET["bmurl"];
$bmcomm = $_GET["bmcomm"];
//追加
$bmauthors = $_GET["bmauthors"];
$bmdescription = $_GET["bmdescription"];
$bmisbn = $_GET["bmisbn"];
$bmimage = $_GET["bmimage"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bmid,bmname,bmrating,bmurl,bmcomm,bmauthors,bmdescription,bmisbn,bmimage,bmindate)VALUES(null,:bmname,:bmrating,:bmurl,:bmcomm,:bmauthors,:bmdescription,:bmisbn,:bmimage,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bmname', $bmname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmrating', $bmrating, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmcomm', $bmcomm, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmurl', $bmurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmauthors', $bmauthors, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmdescription', $bmdescription, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmisbn', $bmisbn, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmimage', $bmimage, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

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