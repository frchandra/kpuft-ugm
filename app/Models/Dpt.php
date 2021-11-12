<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'dpt_id';
    protected $guarded = ['dpt_id'];

    public function departemen(){
        return $this->belongsTo(Departemen::class, 'departemen_id', 'departemen_id');
    }
}
