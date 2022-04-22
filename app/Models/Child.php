<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'master_id', 'cash'];

    public function master(){
        return $this->belongsTo(Master::class);
    }
}
