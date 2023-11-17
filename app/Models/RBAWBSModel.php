<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RBAWBSModel extends Model
{
    use HasFactory;

    protected $table ='tbl_wbs_rba';
    
    protected $fillable = [
      'id',
      'id_wbs',
      'id_rba',
      'kalimat',
      'risk_index'
    ];

    public function rba(){
        return $this->belongsTo(RBAModel::class,'id_rba','id');
    }

    public function wbs(){
        return $this->belongsTo(WBSModel::class,'id_wbs','id');
    }
}
