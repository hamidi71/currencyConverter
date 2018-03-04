<?php
/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 25-2-2018
 * Time: 21:35
 */



$list=array();
//https://developers.google.com/chart/interactive/docs/gallery/linechart

$month = date('m')-1;
$year = date('Y');
$datamonth=null;
$dt=null;
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);
    if (date('m', $time)==$month)
        $list[]=date('Y-m-d', $time);

}
$datamonth[]=array('DAY', 'USD', 'GBP');
foreach($list as $date){

    $datamonth[]=convet($date);


}
$dt=json_encode($datamonth, JSON_NUMERIC_CHECK);

function convet($date){
    $baseCurrency = 'EUR';
    set_time_limit(0);
    $apiUrl = "https://api.fixer.io/$date";

    $content = file_get_contents($apiUrl);

    if($content === false){
        throw new Exception('Unable to connect to API.');
    }

    $data = json_decode($content, true);

    if(!is_array($data)){
        throw new Exception('Unable to decode JSON.');
    }
    $gbpRate = $data['rates']['GBP'];
    $usdRate = $data['rates']['USD'];
    $dd=explode("-",$date);
    return array("$dd[2]",number_format($usdRate, 2),number_format($gbpRate, 2));
}

?>