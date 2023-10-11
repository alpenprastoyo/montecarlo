<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RBATransactionModel extends Model
{
    use HasFactory;

    protected $table ='tbl_transaction_rba';

    protected $fillable = [
      'id',
      'id_section',
      'id_rba',
      'id_user',
      'probability',
      'impact',
      'risk_index'
    ];


    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function rba(){
        return $this->belongsTo(RBAModel::class,'id_rba','id');
    } 
    
}
