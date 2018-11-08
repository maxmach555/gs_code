<?php
// 課題：ブックマークアプリ
// php4回目版
// usr_delete.php
//  ・「ユーザＤＢ情報の削除」処理

$id = $_GET["id"];
include "funcs.php";
$pdo = db_con();
$sql = "DELETE FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: usr_index.php");
    exit;
}
?>