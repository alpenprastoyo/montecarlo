<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WBSModel extends Model
{
    use HasFactory;

    protected $table ='tbl_wbs';

    protected $fillable = [
      'id',
      'id_section',
      'nama_wbs',
      'lvl_wbs',
      'kode_wbs',
      'parent_wbs',
    ];


    public function transactionWbs(){
        return $this->hasMany(WBSTransactionModel::class,'id_wbs');
    }

    public function wbs_rba(){
        return $this->hasMany(RBAWBSModel::class,'id_wbs','id');
    }

    


}
