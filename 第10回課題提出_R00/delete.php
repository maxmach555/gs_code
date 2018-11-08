<?php
// 課題：ブックマークアプリ
// php4回目版
// delete.php
//  ・「ブックマークＤＢ削除」処理

$bmid = $_GET["bmid"];
include "funcs.php";
$pdo = db_con();
$sql = "DELETE FROM gs_bm_table WHERE bmid=:bmid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bmid', $bmid, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: index.php");
    exit;
}
?>
