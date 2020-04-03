<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metas extends Model
{
    protected $table = "metas";
    protected $primaryKey = 'id';

    public function local(){
        return $this->hasOne(local::class,'id','id_local');
    }

    public function safra(){
        return $this->hasOne(safra::class,'id','id_safra');
    }

    public function atividade(){
        return $this->hasOne(atividade::class,'id','id_atividade');
    }

    public function funcionario(){
        return $this->hasOne(funcionario::class,'id', 'id_funcionarios');
    }
}
