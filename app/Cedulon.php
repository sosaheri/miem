<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Cedulon extends Model
{
    protected $fillable = ['path'];

    public function getUrl (){
        return \Storage::url($this->pathe);
    }
}
