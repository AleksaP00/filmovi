<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekcija extends Model
{
    use HasFactory;

    protected $fillable = ['filmID', 'datum', 'sala'];

    protected $table = 'projekcije';
}
