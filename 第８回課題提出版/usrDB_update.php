<?php
// 課題：ブックマークアプリ
// php3回目版
// usrDB_update.php
//  ・「ユーザ情報ＤＢ更新」処理

//1. GETデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$name = $_GET["name"];
$lid = $_GET["lid"];
$lpw = $_GET["lpw"];
$kanri_flg = $_GET["kanri_flg"];
$life_flg = $_GET["life_flg"];
$id = $_GET["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg,life_flg=:life_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: usr_index.php");
    exit;
}

?>









$bmname = $_GET["bmname"];
$bmrating = $_GET["bmrating"];
$bmcomm = $_GET["bmcomm"];
$bmurl = $_GET["bmurl"];
$bmid = $_GET["bmid"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET bmname=:bmname,bmrating=:bmrating,bmurl=:bmurl,bmcomm=:bmcomm WHERE bmid=:bmid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bmname', $bmname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmrating', $bmrating, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmcomm', $bmcomm, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmurl', $bmurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bmid', $bmid, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

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