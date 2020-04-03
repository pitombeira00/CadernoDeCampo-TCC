<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $table = "local";
    protected $primaryKey = 'id';

    public function metas(){
        return $this->hasOne(metas::class);
    }
}
