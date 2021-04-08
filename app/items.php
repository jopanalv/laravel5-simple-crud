<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categories;

class items extends Model
{
    protected $fillable=[
        'item_name','item_price','category_id','item_qty'
    ];
    protected $primaryKey ='id';
    public function categories(){
        return $this->hasOne(categories::class);
    }
}
