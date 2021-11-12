<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $primaryKey = 'departemen_id';
    protected $guarded = ['departemen_id'];

    public function dpts(){
        return $this->hasMany(Dpt::class, 'departemen_id', 'departemen_id');
    }
}
