<?php

namespace App\Http\Controllers;

use App\Models\RBATransactionModel;
use App\Models\RBAWBSModel;
use App\Models\User;
use App\Models\WBSTransactionModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function getFirstNWords($inputString, $n) {
        // Split the input string into an array of words
        $words = explode(' ', $inputString);
    
        // Take the first n words from the array
        $result = array_slice($words, 0, $n);
    
        // Join the selected words back into a string
        $resultString = implode(' ', $result);

        if(count($words) > $n){
            $resultString = $resultString.'....';
        }
    
        return $resultString;
    }


    public function index()
    {
        $wbsrba = RBAWBSModel::orderByDesc('risk_index')->first();
        $responden = WBSTransactionModel::groupBy('id_user');
        $getwbsrba = RBAWBSModel::orderByDesc('risk_index')->get();


        $labels = [];
        foreach ($getwbsrba->pluck('kalimat')->toArray() as $s){
            // $labels[] = $this->getEveryNthWord($s, 7);
            $labels[] = $this->getFirstNWords($s, 12);
        }

        $label = $labels;

        $data = [
            'wbsrba' => $wbsrba,
            'responden' => $responden,
            'label' => json_encode($label),
            'data' => json_encode($getwbsrba->pluck('risk_index')->toArray())
        ];

        return view('admin.index',$data);
    } 
    
    public function respondenList(){
        $responden = User::where('role','responden')->get();

        $data = [
            'responden' => $responden
        ];

        return view('admin.responden_list',$data);
    }

    public function respondenGraph(){
        return view('admin.responden_graph');
    }
}
