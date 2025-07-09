<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable =['id','content','user_id',];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
