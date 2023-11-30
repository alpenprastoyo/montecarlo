<?php

namespace App\Http\Controllers;

use App\Models\RBATransactionModel;
use App\Models\RBAWBSModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespondenController extends Controller
{

    public function getEveryNthWord($sentence, $n) {
        // Remove extra spaces and trim the sentence
        $sentence = trim(preg_replace('/\s+/', ' ', $sentence));
    
        // Split the sentence into an array of words
        $words = explode(' ', $sentence);
    
        // Initialize an array to store every nth word
        $result = [];

        $i = 0;
        $j = 0;

        $sentence = [];
        foreach ($words as $word) {
            if($j < floor(count($words)/$n)){
                if($i == $n){
                    $i = 0;
                    $sentence[] = $word;
                    $result[] = implode(' ',$sentence);
                    $sentence = [];
                    $j++;
                }else{
                    $sentence[] = $word;
                    $i++;
                }
            }else{
                if($i + 2 < count($words) % $n){
                    $sentence[] = $word;
                    $i++;
                }else{
                    $sentence[] = $word;
                    $result[] = implode(' ',$sentence);
                }
            }
            
        }
    
        return $result;
    }

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
        $wbsrba = RBAWBSModel::orderByDesc('risk_index');

        $getwbsrba = $wbsrba->get();

        $highestWbsRba = $wbsrba->first();

        $labels = [];
        foreach ($getwbsrba->pluck('kalimat')->toArray() as $s){
            // $labels[] = $this->getEveryNthWord($s, 7);
            $labels[] = $this->getFirstNWords($s, 12);
        }

        $label = $labels;

        $responden = RBATransactionModel::groupBy('id_user');
        $data = [
            'highetsWbsRba' => $highestWbsRba,
            'responden' => $responden,
            'label' => json_encode($label),
            'data' => json_encode($getwbsrba->pluck('risk_index')->toArray())
        ];
        return view('responden.index',$data);
    } 

    public function user()
    {
        return view('responden.user');
    } 

    public function updateUser(Request $request){

        $data = $request->post();

        User::find(auth()->user()->id)->update($data);

        Auth::loginUsingId(auth()->user()->id);

        return redirect()->route('responden.user.index')->with('sukses', 'Data Data responden berhasil di update');
        
    }

    public function updateUserPassword(Request $request){

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->post();

        User::find(auth()->user()->id)->update($data);

        Auth::loginUsingId(auth()->user()->id);

        return redirect()->route('responden.user.index')->with('sukses', 'Password Berhasi di update');
        
    }

    public function riskIndex(){

        $WBARBS = RBAWBSModel::get();

        $data = [
            'wbarbs' => $WBARBS
        ];

        return view('responden.risk_index',$data);

    }

    public function password()
    {
        return view('responden.index');
    } 

    public function petunjuk()
    {
        return view('responden.petunjuk');
    } 
}
