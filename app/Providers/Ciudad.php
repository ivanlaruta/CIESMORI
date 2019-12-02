<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";
    public function departamento()
    {
        return $this->belongsTo(Departamento::class,'departamento_id');
    }
}
