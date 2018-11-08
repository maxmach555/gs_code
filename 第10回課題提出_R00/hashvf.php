<?php
//hash
// $lpw = $_GET["lpw"];
// $hash = $_GET["hash"];
$lpw ="kanri1";
$pw = password_hash($lpw,PASSWORD_DEFAULT);

// echo "inlpw(",$lpw,") ";
// echo "inhash(",$hash,") ";
// if (password_verify($lpw,$hash)){
//     echo "OK";
// }else{
//     echo "bad";
// }
echo "outHash(",$pw,")";

?>
