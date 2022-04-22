<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cash'];

    public function children(){
        return $this->hasMany(Child::class, 'master_id');
    }
}
