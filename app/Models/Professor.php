<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';

    protected $primaryKey = 'professor_id';

    // Deshabilita created_at y updated_at
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'academic_title',
        'institutional_email',
        'phone_number',
        'hire_date',
        'career_id'
    ];
    // Relación: Un Professor pertenece a una Career
    public function career()
    {
        // El primer argumento es la clave foránea en la tabla 'Professor'
        // El segundo es la clave local en la tabla 'Career'
        return $this->belongsTo(Career::class, 'career_id', 'career_id');
    }
}
