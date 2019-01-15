<?php
// 卒開：松井さんPJ VI分析結果集計・表示処理
// mp_json_sum.php
//  ・Video Indexerの分析結果jsonからの分析データ抽出
//  ・評価５項目（100点満点）、総合点の処理
//  ・松井さん詳細表示HTML（例）の組み込み(1/12版更新)
//  ・総合得点％割合対応

//JSONファイル指定解析
$jsonfilename = $_GET["jsonfile"];
// var_dump($jsonfile); 

$jsondata = file_get_contents($jsonfilename);
// var_dump($jsondata);

$jsondata = mb_convert_encoding($jsondata, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($jsondata,true);
// var_dump($arr);

if ($arr === NULL){
    return; //データ無しの処理
}else{
    //データ有りの処理
    //サマリ集計

    //１．表現力
    //画像上の表情の検知数のカウント
    $sentiments_cnt = count($arr['summarizedInsights']['sentiments']);
    // echo '  1_1_$sentiments_cnt:',$sentiments_cnt;

    //音声上の表情の検知数のカウント
    $emotions_cnt = count($arr['summarizedInsights']['emotions']);
    // echo '  1_2_$emotions_cnt:',$emotions_cnt;


    //2．文章力
    //統計（WordCount）の総件数
 
    if(array_key_exists('0',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt0 = $arr['summarizedInsights']['statistics']['speakerWordCount']['0'];
    }else{
        $WC_cnt0 = 0;
    }

    if(array_key_exists('1',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt1 = $arr['summarizedInsights']['statistics']['speakerWordCount']['1'];
    }else{
        $WC_cnt1 = 0;
    }

    if(array_key_exists('2',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt2 = $arr['summarizedInsights']['statistics']['speakerWordCount']['2'];
    }else{
        $WC_cnt2 = 0;
    }

    if(array_key_exists('3',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt3 = $arr['summarizedInsights']['statistics']['speakerWordCount']['3'];
    }else{
        $WC_cnt3 = 0;
    }

    if(array_key_exists('4',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt4 = $arr['summarizedInsights']['statistics']['speakerWordCount']['4'];
    }else{
        $WC_cnt4 = 0;
    }

    if(array_key_exists('5',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt5 = $arr['summarizedInsights']['statistics']['speakerWordCount']['5'];
    }else{
        $WC_cnt5 = 0;
    }

    if(array_key_exists('6',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt6 = $arr['summarizedInsights']['statistics']['speakerWordCount']['6'];
    }else{
        $WC_cnt6 = 0;
    }

    if(array_key_exists('7',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt7 = $arr['summarizedInsights']['statistics']['speakerWordCount']['7'];
    }else{
        $WC_cnt7 = 0;
    }

    if(array_key_exists('8',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt8 = $arr['summarizedInsights']['statistics']['speakerWordCount']['8'];
    }else{
        $WC_cnt8 = 0;
    }

    if(array_key_exists('9',$arr['summarizedInsights']['statistics']['speakerWordCount'])){
        $WC_cnt9 = $arr['summarizedInsights']['statistics']['speakerWordCount']['9'];
    }else{
        $WC_cnt9 = 0;
    }


    $WordCount_cnt = $WC_cnt0 + $WC_cnt1 + $WC_cnt2 + $WC_cnt3 + $WC_cnt4 + $WC_cnt5 + $WC_cnt6 + $WC_cnt7 + $WC_cnt8 + $WC_cnt9;

    // echo '  2_1_$WordCount_cnt:',$WordCount_cnt;


    //3．構成力
    //ラベル区分(labels)の検知数のカウント（未使用）
    $labels_cnt = count($arr['summarizedInsights']['labels']);
    // echo '  3_1_$labels_cnt:',$labels_cnt;

    //ブランド(brands)の検知数のカウント(未使用)
    $brands_cnt = count($arr['summarizedInsights']['brands']);
    // echo '  3_2_$brands_cnt:',$brands_cnt;

    //トピックス（topic)の検知数のカウント
    $topics_cnt = count($arr['summarizedInsights']['topics']);
    // echo '  3_3_$topics_cnt:',$topics_cnt;


    //4．語彙
    //キーワード（Keywords）の検知数のカウント
    $keywords_cnt = count($arr['summarizedInsights']['keywords']);
    // echo '  4_1_$keywords_cnt:',$keywords_cnt;

    //Transcriptの検知数のカウント
    $transcript_cnt = count($arr['videos'][0]['insights']['transcript']);
    // echo '  4_2_$transcript_cnt:',$transcript_cnt;

    // $bc_transword = array();
    $transword_cnt = 0;
    //transcriptの文字のカウント
    for($i=0;$i<$transcript_cnt;$i++){

        $transword = $arr['videos'][0]['insights']['transcript'][$i]['text'];
        // $bc_transword[] = $transword;
        $transword_cnt = mb_strlen($transword, 'UTF-8') + $transword_cnt ;

        // echo '  4_3_1_$$transword:',$transword;
        // echo '  4_3_2_$transword_cnt:',$transword_cnt;

    }
    // echo '  4_3_$transword_cnt:',$transword_cnt;


    //5．画面構成
    //動画画面上での情報量（ocr）の検知数のカウント

    if(array_key_exists('ocr',$arr['videos'][0]['insights'])){
        $ocr_cnt = count($arr['videos'][0]['insights']['ocr']);
    }else{
        $ocr_cnt = 0;
    }

    // echo '  5_1_$ocr_cnt:',$ocr_cnt;
       
}

//
//各評価要素毎の５段階レーティングの処理
//

//1.表現力（表情）
$HyouGen_Sent_Rate = 0.7; //画像表情70%(仮)
$HyouGen_Emot_Rate = 0.3; //音声表情30%(仮)

//1_1 sentiments point
if( $sentiments_cnt <= 0 ){
    $sentiments_point = 1;    
}elseif( $sentiments_cnt > 0 && $sentiments_cnt >= 1 ){
    $sentiments_point = 2;    
}elseif( $sentiments_cnt > 1 && $sentiments_cnt >= 2 ){
    $sentiments_point = 3;    
}elseif( $sentiments_cnt > 2 && $sentiments_cnt >= 3 ){
    $sentiments_point = 4;    
}elseif( $sentiments_cnt > 3 ){
    $sentiments_point = 5;    
}

//1_2 emotions point
if( $emotions_cnt >= 0 ){
    $emotions_point = 2;    
}elseif( $emotions_cnt > 0 && $emotions_cnt >= 1 ){
    $emotions_point = 3;    
}elseif( $emotions_cnt > 1 && $emotions_cnt >= 2 ){
    $emotions_point = 4;    
}elseif( $emotions_cnt > 2 ){
    $emotions_point = 5;    
}

//1 HyouGen_point
$HyouGen_point = $sentiments_cnt*$HyouGen_Sent_Rate + $emotions_cnt*$HyouGen_Emot_Rate;
// echo ' $HyouGen_point:',$HyouGen_point;


//2.文章力（単語の量）
//2 BunSho_point
if( $WordCount_cnt <= 2 ){
    $BunSho_point = 1;    
}elseif( $WordCount_cnt > 2 && $WordCount_cnt <= 5 ){
    $BunSho_point = 2;    
}elseif( $WordCount_cnt > 5 && $WordCount_cnt <= 6 ){
    $BunSho_point = 3;    
}elseif( $WordCount_cnt > 6 && $WordCount_cnt <= 7 ){
    $BunSho_point = 4;    
}elseif( $WordCount_cnt > 7 ){
    $BunSho_point = 5;    
}

// echo ' $BunSho_point:',$BunSho_point;

//3.構成力（ラベル）
//3 KouSei_point
if( $topics_cnt > 4 ){
    $KouSei_point = 1;    
}elseif( $topics_cnt <= 4 && $topics_cnt > 3 ){
    $KouSei_point = 2;
}elseif( $topics_cnt <= 3 && $topics_cnt > 2 ){
    $KouSei_point = 3;    
}elseif( $topics_cnt == 0 ){
    $KouSei_point = 3;    
}elseif( $topics_cnt <= 2  && $topics_cnt > 1 ){
    $KouSei_point = 4;    
}elseif( $topics_cnt <= 1 ){
    $KouSei_point = 5;    
}

// echo ' $KouSei_point:',$KouSei_point;

//4.語彙力（文字量／キーワード）
//4 Goi_point
//翻訳した日本語文字数をKeyword数で割った値とするが、
//Keywordが０件の場合は、point=2とした

if( $keywords_cnt == 0){
    $Goi_point = 2;   
}else{
    $goi = $transword_cnt / $keywords_cnt; //語彙力：文字数÷キーワード数と定義

    if( $goi < 100 ){
        $Goi_point = 1;   
    }elseif( $goi >= 100 && $goi < 150 ){
        $Goi_point = 2;
    }elseif( $goi >= 150 && $goi < 200 ){
        $Goi_point = 3;
    }elseif( $goi >= 200 && $goi < 250 ){
        $Goi_point = 4;
    }elseif( $goi > 250 ){
        $Goi_point = 5;    
    }
    
}

// echo ' $Goi_point:',$Goi_point;

//5.画面情報（動画画面上の情報量）

//5 Ocr point
if( $ocr_cnt <= 0 ){
    $ocr_point = 2;    
}elseif( $ocr_cnt > 0 && $ocr_cnt >= 1 ){
    $ocr_point = 3;    
}elseif( $ocr_cnt > 1 && $ocr_cnt >= 2 ){
    $ocr_point = 4;    
}elseif( $ocr_cnt > 2 ){
    $ocr_point = 5;    
}

// echo ' $ocr_point:',$ocr_point;


//
// 評価値最終調整
//
$point_rate = 20; //要素別100点満点ベース

$HyouGen_Scr = $HyouGen_point * $point_rate;
$BunSho_Scr = $BunSho_point * $point_rate;
$KouSei_Scr = $KouSei_point * $point_rate;
$Goi_Scr = $Goi_point * $point_rate;
$ocr_Scr = $ocr_point * $point_rate;

$visit_Scr = 80;//ダミーデータ

//ChartRadarData用配列
$Chart_Data = array($HyouGen_Scr,$BunSho_Scr,$KouSei_Scr,$Goi_Scr,$ocr_Scr,$visit_Scr);
$json_Chart_data = json_encode($Chart_Data);
// var_dump($Chart_Data);


$Presenter_name ="ゆかまる";
$Presenter_ID ="@chibayuka";
$Presenter_title ="#23歳#海外旅行初めて";
$Presenter_chartTitle ="全く英語が話せない私が、初めてアジアに2週間行った結果";
$Presenter_ranking =1;


$Total_Scr = $HyouGen_Scr + $BunSho_Scr + $KouSei_Scr + $Goi_Scr + $ocr_Scr + $visit_Scr;

$Per     = round(($Total_Scr / 600) *100);//総合得点表示バーの％を計算
$Percent = (String)$Per;//総合得点表示バーの％を計算

// echo '$Percent:',$Percent;
$Total_Scr_Percent = '"' .'width:'.$Percent.'%;'.'"';//総合得点表示バーの％を計算
// echo '$Total_Scr_Percent:',$Total_Scr_Percent;

// echo ' $HyouGen_Scr:',$HyouGen_Scr;
// echo ' $BunSho_Scr:',$BunSho_Scr;
// echo ' $$Kousei_Scr:',$KouSei_Scr;
// echo ' $Goi_Scr:',$Goi_Scr;
// echo ' $ocr_Scr:',$ocr_Scr;
// echo ' $visit_Scr:',$visit_Scr;
// echo ' $Total_Scr:',$Total_Scr;

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
            <img src="image/face_01.png" alt="サムネイル" align="top" width="100px" >
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
                        // pointBackgroundColor: "rgba(0, 0, 0, 0.1)",
                        pointBorderColor: '#B5B5B5',
                        pointBorderWidth:1,
                        pointRadius:0,
                        // pointHoverBackgroundColor: 'rgba(180, 180, 180, 0.1)',
                        // pointHoverBorderColor: "rgba(0, 0, 0, 0.1)",
                        // pointBorderWidth: 1,
                        lineTension: 0.5,
                        data: [<?=$HyouGen_Scr?>, <?=$BunSho_Scr?>, <?=$KouSei_Scr?>, <?=$Goi_Scr?>, <?=$ocr_Scr?>, <?=$visit_Scr?>]
                    }]
                };
                // console.log(chartRadarData.datasets.data);
            </script>

            <script  src="js/index01.js"></script>


                        
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js'></script>
    <script  src="js/index01.js"></script>

    </body>
    </html>
