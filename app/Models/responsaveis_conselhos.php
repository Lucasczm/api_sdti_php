<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsaveis_conselhos extends Model
{
    protected $table = 'responsaveis_conselhos';
    public $timestamps = false;
    protected $guarded = [];

    public function conselho  ()
    {
        return $this->hasOne(conselhos::class);
    }
}
