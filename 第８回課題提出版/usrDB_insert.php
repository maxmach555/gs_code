<?php
// 課題：ブックマークアプリ
// php3回目版
// usrDB_update.php
//  ・「ユーザＤＢ登録」処理

//1. GETデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_GET["name"];
$lid = $_GET["lid"];
$lpw = $_GET["lpw"];
$kanri_flg = $_GET["kanri_flg"];
$life_flg = $_GET["life_flg"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(id,name,lid,lpw,kanri_flg,life_flg)VALUES(null,:name,:lid,:lpw,:kanri_flg,:life_flg)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

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