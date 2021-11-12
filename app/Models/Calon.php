<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'calon_id';
    protected $guarded = ['calon_id'];
}
