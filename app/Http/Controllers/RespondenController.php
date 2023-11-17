<?php

namespace App\Http\Controllers;

use App\Models\RBATransactionModel;
use App\Models\RBAWBSModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespondenController extends Controller
{
    public function index()
    {
        $wbsrba = RBAWBSModel::orderByDesc('risk_index')->first();
        $responden = RBATransactionModel::groupBy('id_user');
        $data = [
            'wbsrba' => $wbsrba,
            'responden' => $responden
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
}
