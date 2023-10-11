<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RBAModel extends Model
{
    use HasFactory;

    protected $table ='tbl_rba';
    
    protected $fillable = [
      'id',
      'nama_rba',
    ];

    public function wbs_rba(){
        return $this->hasMany(RBAWBSModel::class,'id_rba','id');
    }



}
