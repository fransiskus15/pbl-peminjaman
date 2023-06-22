<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = ['name', 'stock'];

}