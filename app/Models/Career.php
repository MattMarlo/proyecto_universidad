<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    // Le dice a Laravel que la tabla se llama 'Career' (no 'careers')
    protected $table = 'Career';

    // Le dice a Laravel que la clave primaria es 'career_id' (no 'id')
    protected $primaryKey = 'career_id';

    // Deshabilita created_at y updated_at
    public $timestamps = false;
    protected $fillable = [
        'career_name',
        'duration_years',
        'modality',
        'faculty_id',
        'carrer_number' // Incluye el campo agregado por ALTER TABLE
    ];

    // Relación: Una Career pertenece a una Faculty
    public function faculty()
    {
        // El primer argumento es la clave foránea en la tabla 'Career'
        // El segundo es la clave local en la tabla 'Faculty'
        return $this->belongsTo(Faculty::class, 'faculty_id', 'faculty_id');
    }

    // Relación: Una Career tiene muchos Professor
    public function professors()
    {
        // El primer argumento es la clave foránea en la tabla 'Professor'
        // El segundo es la clave local en la tabla 'Career'
        return $this->hasMany(Professor::class, 'career_id', 'career_id');
    }
}
