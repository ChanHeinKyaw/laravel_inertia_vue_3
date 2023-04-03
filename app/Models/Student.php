<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['major_id', 'email', 'name', 'phone', 'address'];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
}
