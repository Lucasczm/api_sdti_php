<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pontos extends Model
{
    protected $table = 'pontos';
    public $timestamps = false;
    protected $guarded = [];

    public function denuncias  ()
    {
        return $this->hasMany(denuncias::class);
    }
}
