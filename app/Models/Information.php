<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = "informations";


    public function education(){
        return $this->hasOne(Education::class);
    }
}
