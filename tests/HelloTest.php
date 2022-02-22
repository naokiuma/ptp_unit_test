<?php
/**
 * @test
 */

use PHPUnit\Framework\TestCase;
require "./Hello.php";

    
class HelloTest extends TestCase{

    public function testCheck(){
        $temp = new Hello();
        $expected = $temp->echoMsg();
    
        $this->assertSame('hello',$expected);
       

    }

    // public function testcheck_Time(){
    //     $now_time = date("H:i:s");
        
    //     $expected1 = $this->check_Time($now_time,'18:00');
    //     $this->assertSame('まだやってます',$expected);

    // }

    
        
    /*
    $now_time 今の時間
    $end_time 終了時間 
    */
    function check_Time($now_time,$end_time){
        $end_time = date('H:i', strtotime($end_time));//秒を削り10:30 などの形式にする
        echo '今の時間は、' . $now_time . '<br>';
        echo '終了時間は、' . $end_time . '<br>';
        
        //終了時刻が日中5:00〜23:59パターン
        if(strtotime($end_time) >= strtotime('05:00') && strtotime($end_time) <= strtotime('23:59')){
            echo '日中5:00〜23:59';

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
        }else if(strtotime($end_time) >= strtotime('00:00') && strtotime($end_time) <= strtotime('04:59')){//深夜0:00~4:59
            echo '深夜0:00~4:59';

            if(strtotime($now_time) >= strtotime('04:59') && strtotime($now_time) <= strtotime('23:59')){
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




    
}