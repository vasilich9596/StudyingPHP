<?php
$date = date_default_timezone_set('UTC');

$fileFopPath = 'lesson-12-fops.json';

$data = json_decode(file_get_contents($fileFopPath),true);

$report= [] ;

foreach ($data as $element){
    $fop    = $element['fop'];
    $amount = $element['amount'];
    $date   = date_create_from_format('Y-m-d',$element['date']);
    $yearsWithMonth = date_format($date,'Y-m');

    if (!array_key_exists($fop,$report)){
        $report[$fop] = [];
    }

    if (!array_key_exists($yearsWithMonth,$report[$fop])){
        $report[$fop][$yearsWithMonth] = [];
    }

    $report[$fop][$yearsWithMonth][] = $amount;
}

foreach ($report as $fopName => $fopDate ){
    foreach ($fopDate as $date => $amounts){

        $total = array_sum($amounts);

        print_r($fopName.' '.$date.' '.number_format($total ,2,'-','.').PHP_EOL);
    }
}

//$weekReport = [];
//foreach ($data as $item){
//    $fopWeek    = $item['fop'];
//    $amountWeek = $item['amount'];
//    $dateWeek   = date_create_from_format('Y-m-d',$item['date']);
//
//    $yearsWithMonth = date_format($dateWeek,'Y-F-l-d');
//    $day = date_format($dateWeek,'l');
//
//    if (!array_key_exists($fopWeek,$weekReport)){
//        $weekReport[$fopWeek] = [];
//    }
//
//    if (!array_key_exists($yearsWithMonth,$weekReport[$fopWeek])){
//        $weekReport[$fopWeek][$yearsWithMonth] = [];
//    }
//
//    if ($day != 'Sunday' && $day != 'Saturday') {
//        $weekReport[$fopWeek][$yearsWithMonth][] = $amountWeek;
//    }
//}
//
//foreach ($weekReport as $fopNameWeek => $fopDateWeek ){
//    foreach ($fopDateWeek as $dateWeek => $amountsWeek){
//
//        $totalWeek = array_sum($amountsWeek);
//
//        print_r($fopNameWeek . ' ' . $dateWeek . ' ' . number_format($totalWeek, 2, '-', '.') . PHP_EOL);
//    }
//}

