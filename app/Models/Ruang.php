<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\table;

class Ruang extends Model
{
    use HasFactory;
    protected $table = 'ruang';
    protected $guarded = [];
}
