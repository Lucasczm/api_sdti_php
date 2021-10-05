<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_config extends Model
{
    protected $table = 'app_config';
    public $timestamps = false;
    protected $guarded = [];
}
