<?php 

//vendor/bin/phpunit --colors tests で
//testフォルダの中の実行をする


/*クラスを呼ばずに普通に書く方法
https://q9roku6.hatenadiary.jp/entry/2018/08/09/214924
*/

date_default_timezone_set('Asia/Tokyo');
define('NOW_TIME', date('H:i'));//ここで数字を定数化する


//終了時刻が23:59まで
echo '<hr>';
echo 'test1<br>';
$result1 = change_time_view('05:00','23:59:00');//一つ目に今の時間、2つ目に終了時間
echo $result1;
echo '<hr>';


echo 'test2<br>';
$result2 = change_time_view('23:00','18:00:00');//一つ目に今の時間、2つ目に終了時間
echo $result2;
echo '<hr>';


echo 'test3<br>';
$result3 = change_time_view('00:00','23:59:00');//一つ目に今の時間、2つ目に終了時間
echo $result3;
echo '<hr>';


//終了時刻が0時以降パターン
echo 'test4<br>';
$result4 = change_time_view('23:00','03:00:00');//一つ目に今の時間、2つ目に終了時間
echo $result4;
echo '<hr>';

echo 'test5<br>';
$result5 = change_time_view('00:00','04:40:00');//一つ目に今の時間、2つ目に終了時間
echo $result5;
echo '<hr>';

echo 'test6<br>';
$result6 = change_time_view('05:00','03:00:00');//一つ目に今の時間、2つ目に終了時間
echo $result6;
echo '<hr>';

echo 'test7<br>';
$result7 = change_time_view('04:50',':00');//一つ目に今の時間、2つ目に終了時間
echo $result7;
echo '<hr>';


$test = date('H:i', strtotime('23:00'));
echo $test;





/*
$now_time 今の時間
$end_time 終了時間 
*/
function change_time_view($now_time,$end_time){


    if(mb_strlen($end_time) === 8){//秒も入っている場合は削除
        $end_time = mb_substr($end_time,0,-3,'UTF-8');
    }


    echo '今の時間は、' . $now_time . '<br>';
    echo '終了時間は、' . $end_time . '<br>';
    //strtotime($end_time) == strtotime('05:00')

    //終了時刻が日中5:00〜23:59パターン
    if(strtotime($end_time) >= strtotime('05:01') && strtotime($end_time) <= strtotime('23:59')){
        //echo '終了時刻が日中5:01〜23:59';

        if(strtotime($now_time) >= strtotime('05:00') && strtotime($now_time) <= strtotime('23:59')){

            if(strtotime($end_time) > strtotime($now_time)){
                return '時間表示：1';
            }else{
                return '終了表示：2';
            }

        }else if(strtotime($now_time) >= strtotime('00:00') && strtotime($now_time) <= strtotime('04:59')){
            return '終了表示：3';
        }


    //終了時刻が深夜0:00~4:59パターン
    }else if(strtotime($end_time) >= strtotime('00:00') && strtotime($end_time) <= strtotime('05:00')){//深夜0:00~5:00
        //echo '終了時刻が深夜0:00~5:00';

        if(strtotime($now_time) >= strtotime('05:00') && strtotime($now_time) <= strtotime('23:59')){
            return '時間表示:4';

        }else if(strtotime($now_time) >= strtotime('00:00') && strtotime($now_time) <= strtotime('04:59')){
            if(strtotime($end_time) > strtotime($now_time)){
                return '時間表示：5';
            }else{
                return '終了表示：6';
            }
        }
    }

}
