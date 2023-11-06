<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;


class SectionModel extends Model
{
    use HasFactory;

    protected $table ='tbl_section';
    
    protected $fillable = [
      'id',
      'id_project',
      'nama_section'
    ];

    public function wbs()
    { 
        return $this->hasMany(WBSModel::class, 'id_section', 'id');
    }

    public function rba_all(){
        return SectionModel::get(); 
    }

    public function get_rba($id){
        return DB::select('select d.* from tbl_section a join tbl_wbs b on a.id = b.id_section join tbl_wbs_rba c on b.id = c.id_wbs join tbl_rba d on c.id_rba = d.id where a.id = ? GROUP BY c.id_rba', [$id]);
    }
}
