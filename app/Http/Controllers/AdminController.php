<?php

namespace App\Http\Controllers;

use App\Models\RBATransactionModel;
use App\Models\RBAWBSModel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $wbsrba = RBAWBSModel::orderByDesc('risk_index')->first();
        $responden = RBATransactionModel::groupBy('id_user');
        $data = [
            'wbsrba' => $wbsrba,
            'responden' => $responden
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
