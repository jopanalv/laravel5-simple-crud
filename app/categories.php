<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\items;

class categories extends Model
{
    protected $primaryKey ='category_id';
    public function items(){
        return $this->belongTo(items::class);
    }
}
