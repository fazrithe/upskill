<?php
use App\Models\UserAnswerScore;

if (!function_exists('getScore')) {
    function getScore($id){
        $score = UserAnswerScore::where('tryout_id',$id)->first();
        if(!empty($score)){
            return $score->total_score;
        }else{
            return '0';
        }
    }
}
?>
