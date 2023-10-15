<?php

namespace App\Http\Controllers;

use App\Models\RBATransactionModel;
use App\Models\WBSModel;
use App\Models\WBSTransactionModel;
use Illuminate\Http\Request;

class MontecarloController extends Controller
{
    
    public function index(){
        $data_wbs = [];
        $data_rba = [];


        $wbs_transaction = WBSTransactionModel::groupBy('id_wbs')->get();
        foreach($wbs_transaction as $w){
            $impact_kumulative = 0;
            $probability_kumulative = 0;
            for($i = 1; $i <= 5; $i++){
                $wbs_count = WBSTransactionModel::where([['id_wbs', $w['id_wbs']]])->count();
                $impact_count = WBSTransactionModel::where([['id_wbs', $w['id_wbs']],['impact',$i]])->count();
                $probability_count = WBSTransactionModel::where([['id_wbs', $w['id_wbs']],['probability',$i]])->count();
                $impact_prob = $impact_count / $wbs_count;
                $probability_prob = $probability_count / $wbs_count;
                $impact_kumulative = $impact_kumulative + $impact_prob;
                $probability_kumulative = $probability_kumulative + $probability_prob;
                $data_wbs[] = [
                    'id_wbs' => $w['id_wbs'],
                    'impact' => $i,
                    'impact_frequency' => $impact_count, 
                    'impact_prob' => number_format((float)$impact_prob, 2, '.', ''),
                    'impact_kumulative' => number_format((float)$impact_kumulative, 2, '.', ''), 
                    'probability' => $i,
                    'probability_frequency' => $probability_count, 
                    'probability_prob' => number_format((float)$probability_prob, 2, '.', ''),
                    'probability_kumulative' => number_format((float)$probability_kumulative, 2, '.', ''), 
                ];
            }      
        }

        $rba_transaction = RBATransactionModel::groupBy('id_rba')->get();
        foreach($rba_transaction as $w){
            $impact_kumulative = 0;
            $probability_kumulative = 0;
            for($i = 1; $i <= 5; $i++){
                $rbacount = RBATransactionModel::where([['id_rba', $w['id_rba']]])->count();
                $impact_count = RBATransactionModel::where([['id_rba', $w['id_rba']],['impact',$i]])->count();
                $probability_count = RBATransactionModel::where([['id_rba', $w['id_rba']],['probability',$i]])->count();
                $impact_prob = $impact_count / $rbacount;
                $probability_prob = $probability_count / $rbacount;
                $impact_kumulative = $impact_kumulative + $impact_prob;
                $probability_kumulative = $probability_kumulative + $probability_prob;
                $data_rba[] = [
                    'id_rba' => $w['id_rba'],
                    'impact' => $i,
                    'impact_frequency' => $impact_count, 
                    'impact_prob' => number_format((float)$impact_prob, 2, '.', ''),
                    'impact_kumulative' => number_format((float)$impact_kumulative, 2, '.', ''), 
                    'probability' => $i,
                    'probability_frequency' => $probability_count, 
                    'probability_prob' => number_format((float)$probability_prob, 2, '.', ''),
                    'probability_kumulative' => number_format((float)$probability_kumulative, 2, '.', ''), 
                ];
            }      
        }

        $monte_carlo_wbs = [];

        for($i=0; $i<100;$i++){
            $wbs_test = [];
            $impact_class = 1;
            $probability_class = 1;
            $random_decimal = number_format(rand(0, 100) / 100, 2);
            foreach($wbs_transaction as $w){
                $id_wbs = $w['id_wbs'];
                $result = array_filter($data_wbs, function($item) use ($id_wbs) {
                    return $item['id_wbs'] == $id_wbs;
                });

                foreach($result as $r){
                    if($random_decimal <= $r['impact_kumulative'] ){
                        $impact_class = $r['impact'];
                        break;
                    }
                }

                foreach($result as $r){
                    if($random_decimal <= $r['probability_kumulative'] ){
                        $probability_class = $r['probability'];
                        break;
                    }
                }

                $wbs_test[] = [
                    'id_wbs' => $id_wbs,
                    'impact_class' => $impact_class,
                    'probability_class' => $probability_class,
                    'risk_index' => $impact_class * $probability_class
                ]; 
            }
            $monte_carlo_wbs[] = [
                "rand" => $random_decimal,
                "wbs_result" => $wbs_test,
                "wbs" => $wbs_transaction
            ];
        }

        $monte_carlo_wbs_average = [];

        foreach ($wbs_transaction as $w){
            $impact = 0;
            $probability = 0;
            $risk = 0;
            $id_wbs =  $w['id_wbs'];
            foreach($monte_carlo_wbs as $r){
                $result = array_filter($r['wbs_result'], function($item) use ($id_wbs) {
                    return $item['id_wbs'] == $id_wbs;
                });
                $impact = $impact + array_sum(array_column($result, 'impact_class'));
                $probability = $probability + array_sum(array_column($result, 'probability_class'));
                $risk = $risk + array_sum(array_column($result, 'risk_index'));
            }

            $monte_carlo_wbs_average[] = [
                "id_wbs" => $id_wbs,
                "impact_average" => number_format($impact / count($monte_carlo_wbs),3),
                "probability_average" => number_format($probability / count($monte_carlo_wbs),3),
                "risk_index_average" => number_format($impact / count($monte_carlo_wbs),3) * number_format($probability / count($monte_carlo_wbs),3)
            ];
        }

        $monte_carlo_rba = [];

        for($i=0; $i<100;$i++){
            $rba_test = [];
            $impact_class = 1;
            $probability_class = 1;
            $random_decimal = number_format(rand(0, 100) / 100, 2);
            foreach($rba_transaction as $w){
                $id_rba = $w['id_rba'];
                $result = array_filter($data_rba, function($item) use ($id_rba) {
                    return $item['id_rba'] == $id_rba;
                });

                foreach($result as $r){
                    if($random_decimal <= $r['impact_kumulative'] ){
                        $impact_class = $r['impact'];
                        break;
                    }
                }

                foreach($result as $r){
                    if($random_decimal <= $r['probability_kumulative'] ){
                        $probability_class = $r['probability'];
                        break;
                    }
                }

                $rba_test[] = [
                    'id_rba' => $id_rba,
                    'impact_class' => $impact_class,
                    'probability_class' => $probability_class,
                    'risk_index' => $impact_class * $probability_class
                ]; 
            }
            $monte_carlo_rba[] = [
                "rand" => $random_decimal,
                "rba_result" => $rba_test,
                "rba" => $rba_transaction,
            ];
        }

        $monte_carlo_rba_average = [];

        foreach ($rba_transaction as $w){
            $impact = 0;
            $probability = 0;
            $risk = 0;
            $id_rba =  $w['id_rba'];
            foreach($monte_carlo_rba as $r){
                $result = array_filter($r['rba_result'], function($item) use ($id_rba) {
                    return $item['id_rba'] == $id_rba;
                });
                $impact = $impact + array_sum(array_column($result, 'impact_class'));
                $probability = $probability + array_sum(array_column($result, 'probability_class'));
                $risk = $risk + array_sum(array_column($result, 'risk_index'));
            }

            $monte_carlo_rba_average[] = [
                "id_rba" => $id_rba,
                "impact_average" => number_format($impact / count($monte_carlo_rba),3),
                "probability_average" => number_format($probability / count($monte_carlo_rba),3),
                "risk_index_average" => number_format($impact / count($monte_carlo_rba),3) * number_format($probability / count($monte_carlo_rba),3)
            ];
        }

        $data = [
            'wbs' => $data_wbs,
            'rba' => $data_rba,
            'monte_carlo_wbs' => $monte_carlo_wbs,
            'monte_carlo_wbs_average' => $monte_carlo_wbs_average,
            'monte_carlo_rba' => $monte_carlo_rba,
            'monte_carlo_rba_average' => $monte_carlo_rba_average,
            'data_wbs' => $wbs_transaction,
            'data_rba' => $rba_transaction
        ];
        
        return view('montecarlo.index', $data);
    }



}
