<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    public function getAmount(){
    	return $this->quantity * $this->rate;
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
