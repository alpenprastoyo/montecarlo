<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WBSTransactionModel extends Model
{
    use HasFactory;

    protected $table ='tbl_transaction_wbs';

    protected $fillable = [
      'id',
      'id_section',
      'id_wbs',
      'id_user',
      'probability',
      'impact',
      'risk_index'
    ];


    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function wbs(){
        return $this->belongsTo(WBSModel::class,'id_wbs','id');
    } 

}
