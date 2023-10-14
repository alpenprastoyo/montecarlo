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

        $rbatransaction = RBATransactionModel::groupBy('id_rba')->get();
        foreach($rbatransaction as $w){
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

        $data = [
            'wbs' => $data_wbs,
            'rba' => $data_rba
        ];
        
        return view('montecarlo.index', $data);

    }

}
