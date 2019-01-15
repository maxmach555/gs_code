<?php
// 卒開：松井さんPJ 
// mp_radar_view.php
//  ・指定midで分析結果DBからの分析データ読み込み
//  ・レーダチャート表示

include ("funcs.php");

//mid受け取り
$mid = $_GET["mid"];

//1.  DB接続します
$pdo = db_con();

//２．データ参照SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_sp_anal_tbl WHERE mid=:mid");
$stmt->bindValue(":mid", $mid, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ取得
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

$HyouGen_Scr = $row["sp_hyougen_scr"];
$BunSho_Scr = $row["sp_bunsho_scr"];
$KouSei_Scr = $row["sp_kousei_scr"];
$Goi_Scr = $row["sp_goi_scr"];
$ocr_Scr = $row["sp_ocr_scr"];
$visit_Scr = $row["sp_visit_scr"];

$Total_Scr = $row["sp_total_scr"];

$Presenter_name = $row["pre_name"];
$Presenter_ID = $row["pre_acc"];
$Presenter_title = $row["mov_title"];
$Presenter_chartTitle = $row["pre_comm"];
$Presenter_ranking = $row["pre_rank"];
$Presenter_thum = '"'.$row["thum_name"].'"';

$Per     = round(($Total_Scr / 600) *100);//総合得点表示バーの％を計算
$Percent = (String)$Per;//総合得点表示バーの％を計算

$Total_Scr_Percent = '"' .'width:'.$Percent.'%;'.'"';//総合得点表示バーの％を計算

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=10.0, user-scalable=yes">
<title>speeech</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="./css/style01.css">
<link href="https://fonts.googleapis.com/css?family=Kosugi+Maru|Noto+Sans+JP:100,300,400,500,700,900&amp;subset=cyrillic,japanese" rel="stylesheet">


<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body>
    <img src="image/logo_w.png" alt="ロゴ" align="top" width="68px">

    <div id="top_area">
        <div id="intro">
            <h2 id="name"><?=$Presenter_name?></h2>
            <p><?=$Presenter_ID?></p>
            <p><?=$Presenter_title?></p>
        </div>
        <div id="thum">
            <img src=<?=$Presenter_thum?> alt="サムネイル" align="top" width="100px" >
            <!-- <img src="image/face_01.png" alt="サムネイル" align="top" width="100px" > -->
        </div>
    </div>
    <div id="score">
        <div id="rank">
            <p>現在の順位</p>
            <h1 id="ranking"><?=$Presenter_ranking?>位</h1>
        </div>
        <div id="rank">
            <p>総合得点</p>
            <h1 id="ranking"><?=$Total_Scr?>点</h1>
        </div>
    
    </div>
    <div id="contents">
    
    <script  src="js/index01.js"></script>
    <section>
        <div class="card">
            <div class="wrapper">
                <div class="chart">   
                    <p id="chartTitle"><?=$Presenter_chartTitle?></p>       
                    <canvas id="chartRadar" width="240"></canvas>
                    <!-- <canvas id="chartBar"></canvas> -->
                    <div id="score00">
                        <div class="scoteLeft">
                            <p id="chartScore01">表現力：<?=$HyouGen_Scr?>点</p>
                            <p id="chartScore01">文章力：<?=$BunSho_Scr?>点</p>
                            <p id="chartScore01">構成力：<?=$KouSei_Scr?>点</p>

                        </div>
                        <div class="scoreRight">
                            <p id="chartScore01">語彙力：<?=$Goi_Scr?>点</p>
                            <p id="chartScore01">演出力：<?=$ocr_Scr?>点</p>
                            <p id="chartScore01">人気力：<?=$visit_Scr?>点</p>
                        </div>
                    </div>
                    <p id="bar">総合得点</p>
                        <div class="bar-wrap">
                            <div class="bar" style=<?=$Total_Scr_Percent?>></div>
                            <p id="amount" class="anime"><?=$Total_Scr?>点</p>
                        </div>
                     
                <canvas id="myCanvas" width="330" height="600"></canvas>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.0.0/Chart.js'></script>
            
            
            <script>
                var chartRadarData = {
                    labels: ["表現力", "文章力", "構成力", "語彙力", "演出力", "人気力"],
                    datasets: [{
                        label: "Skill Level",
                        backgroundColor: "rgba(253,149,28,.5)",
                        borderColor: "#FF943C",
                        borderWidth:0.1,
                        pointBorderColor: '#B5B5B5',
                        pointBorderWidth:1,
                        pointRadius:0,
                        lineTension: 0.5,
                        data: [<?=$HyouGen_Scr?>, <?=$BunSho_Scr?>, <?=$KouSei_Scr?>, <?=$Goi_Scr?>, <?=$ocr_Scr?>, <?=$visit_Scr?>]
                    }]
                };
            </script>

            <!-- <script  src="js/index01.js"></script> -->
                        
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js'></script>
    <script  src="js/index01.js"></script>

    </body>
    </html>
