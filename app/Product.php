<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps = false;

    public function getAmount(){
    	return $this->quantity * $this->rate;
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
