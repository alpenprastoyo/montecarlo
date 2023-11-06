<?php

namespace App\Http\Controllers;

use App\Models\RBAModel;
use App\Models\RBATransactionModel;
use App\Models\SectionModel;
use App\Models\WBSTransactionModel;
use Illuminate\Http\Request;
use Auth;


class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $id_project = 1;

        $section = SectionModel::where('id_project',$id_project)->get();
        $rba = RBAModel::get();
        
        $data = [
            'sections' => $section,
            'rba' => $rba
        ];
        
        return view('responden.kuesioner', $data);
    }

    public function add_wbs(Request $request)
    {
        
        for($i = 0 ; $i < count($request->jawaban_wbs_impact) ; $i++){
            $data = [
                'id_section' => $request->id,
                'id_wbs' => explode('|',$request->jawaban_wbs_impact[$i])[1],
                'id_user' => Auth::user()->id,
                'probability' => explode('|',$request->jawaban_wbs_probability[$i])[0],
                'impact' => explode('|',$request->jawaban_wbs_impact[$i])[0],
                'risk_index' => explode('|',$request->jawaban_wbs_probability[$i])[0] * explode('|',$request->jawaban_wbs_impact[$i])[0],
            ];

            WBSTransactionModel::updateOrCreate(
                ['id_user' => Auth::user()->id, 'id_wbs' => explode('|',$request->jawaban_wbs_impact[$i])[1]],
                $data
            );
        }

        return redirect()->route('responden.kuesioner.index');

    }

    public function add_rba(Request $request)
    {

        for($i = 0 ; $i < count($request->jawaban_rba_impact) ; $i++){
            $data = [
                'id_section' => $request->id,
                'id_rba' => explode('|',$request->jawaban_rba_impact[$i])[1],
                'id_user' => Auth::user()->id,
                'probability' => explode('|',$request->jawaban_rba_probability[$i])[0],
                'impact' => explode('|',$request->jawaban_rba_impact[$i])[0],
                'risk_index' => explode('|',$request->jawaban_rba_probability[$i])[0] * explode('|',$request->jawaban_rba_impact[$i])[0],
            ];

            RBATransactionModel::updateOrCreate(
                ['id_user' => Auth::user()->id, 'id_rba' => explode('|',$request->jawaban_rba_impact[$i])[1]],
                $data
            );
        }

        return redirect()->route('responden.kuesioner.index');

    }
}
