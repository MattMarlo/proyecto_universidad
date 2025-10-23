<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $table = 'career';

    protected $primaryKey = 'career_id';

    public $timestamps = false;
    protected $fillable = [
        'career_name',
        'duration_years',
        'modality',
        'faculty_id',
        'carrer_number' 
    ];

    public function faculty()
    {

        return $this->belongsTo(Faculty::class, 'faculty_id', 'faculty_id');
    }

    public function professors()
    {

        return $this->hasMany(Professor::class, 'career_id', 'career_id');
    }
}
