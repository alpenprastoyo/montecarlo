<?php

namespace App\Http\Controllers;

use App\Models\RBAModel;
use App\Models\RBATransactionModel;
use App\Models\RBAWBSModel;
use App\Models\User;
use App\Models\WBSModel;
use App\Models\WBSTransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function getFirstNWords($inputString, $n)
    {
        // Split the input string into an array of words
        $words = explode(' ', $inputString);

        // Take the first n words from the array
        $result = array_slice($words, 0, $n);

        // Join the selected words back into a string
        $resultString = implode(' ', $result);

        if (count($words) > $n) {
            $resultString = $resultString . '....';
        }

        return $resultString;
    }


    public function index()
    {
        $wbsrba = RBAWBSModel::orderByDesc('risk_index')->first();
        $responden = WBSTransactionModel::groupBy('id_user');
        $getwbsrba = RBAWBSModel::orderByDesc('risk_index')->get();

        $labels = [];
        foreach ($getwbsrba->pluck('kalimat')->toArray() as $s) {
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

        return view('admin.index', $data);
    }

    public function respondenList()
    {
        $responden = User::where('role', 'responden')->get();

        $data = [
            'responden' => $responden
        ];

        return view('admin.responden_list', $data);
    }

    public function respondenGraph()
    {
        $usia1 = User::whereBetween('usia', [16,21])->where('role','responden')->get()->count();
        $usia2 = User::whereBetween('usia', [20,31])->where('role','responden')->get()->count();
        $usia3 = User::whereBetween('usia', [30,41])->where('role','responden')->get()->count();
        $usia4 = User::whereBetween('usia', [40,51])->where('role','responden')->get()->count();
        $usia5 = User::whereBetween('usia', [50,61])->where('role','responden')->get()->count();
        $usia6 = User::whereBetween('usia', [61,120])->where('role','responden')->get()->count();

        $dataUsia = [$usia1, $usia2, $usia3, $usia4, $usia5, $usia6];


        $pria = User::where('role','responden')->where('jenis_kelamin','Pria')->get()->count();
        $wanita = User::where('role','responden')->where('jenis_kelamin','Wanita')->get()->count();
        $dataGender = [$pria, $wanita];


        $konsultan = User::where('role','responden')->where('jenis_perusahaan','Konsultan')->get()->count();
        $kontraktor = User::where('role','responden')->where('jenis_perusahaan','Kontraktor')->get()->count();
        $pemerintahan = User::where('role','responden')->where('jenis_perusahaan','Pemerintahan')->get()->count();
        $dataPerusahaan = [$konsultan, $kontraktor, $pemerintahan];

        //  Query Diagram Pengalaman Kerja
        $pengalaman1 = User::whereBetween('pengalaman_kerja', [0,6])->where('role','responden')->get()->count();
        $pengalaman2 = User::whereBetween('pengalaman_kerja', [5,11])->where('role','responden')->get()->count();
        $pengalaman3 = User::whereBetween('pengalaman_kerja', [10,16])->where('role','responden')->get()->count();
        $pengalaman4 = User::whereBetween('pengalaman_kerja', [15,21])->where('role','responden')->get()->count();
        $pengalaman5 = User::whereBetween('pengalaman_kerja', [20,26])->where('role','responden')->get()->count();
        $pengalaman6 = User::whereBetween('pengalaman_kerja', [26,100])->where('role','responden')->get()->count();


        $dataPengalaman = [$pengalaman1, $pengalaman2, $pengalaman3, $pengalaman4, $pengalaman5, $pengalaman6];

        //  Query Diagram Pendidikan Terakhir

        $d3 = User::where('role','responden')->where('pendidikan_terakhir','D3')->get()->count();
        $d4 = User::where('role','responden')->where('pendidikan_terakhir','D4')->get()->count();
        $s1 = User::where('role','responden')->where('pendidikan_terakhir','S1')->get()->count();
        $s2 = User::where('role','responden')->where('pendidikan_terakhir','S2')->get()->count();
        $s3 = User::where('role','responden')->where('pendidikan_terakhir','S3')->get()->count();

        $dataPendidikan = [$d3, $d4, $s1, $s2, $s3];

        //  Query Diagram Jabatan

        $totalJabatan = User::select(DB::raw('count(*) as count, jabatan'))->where('role','responden')->groupBy('jabatan')->get();
        $labelJabatan = [];
        $jumlah_jabatan = [];
        foreach ($totalJabatan as $j){
            $labelJabatan[] = $j->jabatan;
            $jumlah_jabatan[] = $j->count;
        }


        // $queryJabatan_1 = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE NOT Role = 'admin'");
        // $queryJabatan_2 = mysqli_query($koneksi, "SELECT DISTINCT jabatan FROM tbl_users WHERE NOT Role = 'admin'");

        // $labelJabatan = array();
        // $querryjumlahjabatan = mysqli_fetch_all(mysqli_query($koneksi, "select count(jabatan) as jumlah from tbl_users group by jabatan"));
        // $jumlahjabatan = array();

        // foreach ($querryjumlahjabatan as $a) {
        //     $jumlah_jabatan[] = $a[0];
        // }




        // $totalJabatan = array();


        // while ($dataJabatan_1 = mysqli_fetch_array($queryJabatan_2)) {
        //     $labelJabatan[] = $dataJabatan_1['jabatan'];
        // }



        // $totalJabatan = mysqli_num_rows($queryJabatan_1);

        
        $data = [
            'dataUsia' => $dataUsia,
            'dataPerusahaan' => $dataPerusahaan,
            'dataPengalaman' => $dataPengalaman,
            'dataPendidikan' => $dataPendidikan,
            'dataGender' => $dataGender,
            'jumlah_jabatan' => $jumlah_jabatan,
            'labelJabatan' => $labelJabatan,
        ];


        return view('admin.responden_graph',$data);
    }

    public function addResponden(){
        return view('admin.responden_add');
    }

    public function inputResponden(Request $request){
        $data = $request->post();


        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'responden';

        User::create($data);

        return redirect()->route('admin.responden.index')->with('sukses', 'Data Data responden berhasil di tambah');
    }

    public function editResponden($id){
        $data = [
            'responden' => User::find($id)
        ];


        return view('admin.responden_edit',$data);
    }

    public function updateResponden(Request $request){
        $data = $request->post();

        $data['password'] = Hash::make($data['password']);

        User::find($data['id'])->update($data);

        return redirect()->route('admin.responden.index')->with('sukses', 'Data Data responden berhasil di update');
    }

    public function deleteResponden($id){
        
        User::find($id)->delete();

        return redirect()->route('admin.responden.index')->with('sukses', 'Data Data responden berhasil di hapus');

    }

    public function Wbs()
    {
        $wbs = WBSModel::get();

        $data = [
            'wbs' => $wbs
        ];

        return view('admin.wbs', $data);
    }

    public function Rba()
    {
        $rba = RBAModel::get();

        $data = [
            'rba' => $rba
        ];

        return view('admin.rba', $data);
    }

    public function riskIndex(){

        $WBARBS = RBAWBSModel::get();

        $data = [
            'wbarbs' => $WBARBS
        ];

        return view('admin.risk_index',$data);

    }

    public function petunjuk()
    {
        return view('admin.petunjuk');
    } 
}
