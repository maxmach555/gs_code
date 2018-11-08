<?php
// 課題：ブックマークアプリ
// php4回目版
// login_act.php
//  ・ログイン認証処理
//  ・パスワードハッシュ処理

//最初にSESSIONを開始！！
session_start();

//POST型ログイン画面入力受け取り
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

echo $lpw;

//0.外部ファイル読み込み
include ("funcs.php");

//1.  DB接続します
$pdo = db_con();

//2. ユーザ認証SQL作成 認証一致はSELECT文の条件として記載
//  ＩＤが一致、かつパス一致、かつ使用権限有り（＝０）
$sql = "SELECT * FROM gs_user_table WHERE lid=:id AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $lid, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

$dmy = password_verify($lpw);
echo " $dmy：";
echo $dmy;

//5. 該当レコードがあればSESSIONに値を代入
if( password_verify($lpw,$val["lpw"])){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  // $_SESSION["life_flg"] = $val['life_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: index.php");//ブックマーク一覧へ
}else{
  //logout処理後、ＴＯＰ画面へ
  header("Location: logout.php");
}

exit();
?>

