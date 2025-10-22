<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table ='Faculty';
    protected $primaryKey = 'faculty_id';
    public $timestamps= false;
    protected $fillable = [
        'faculty_name',
        'location',
        'dean_name',
        'acronym_name',
        'phone_fac',
        'email_fac',
        'logo_fac',
        'year_fac'
    ];
    public function carrers(){
        return $this->hasMany(Career::class,'faculty_id','faculty_id');
    }

}
