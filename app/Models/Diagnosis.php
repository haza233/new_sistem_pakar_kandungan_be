<?php
// app/Models/Diagnosis.php  
  
namespace App\Models;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
  
class Diagnosis extends Model  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'user_id',  
        'disease_id',  
        'certainty_factor',  
    ];  
  
    public function user()  
    {  
        return $this->belongsTo(User::class);  
    }  
  
    public function disease()  
    {  
        return $this->belongsTo(Disease::class);  
    }  
  
    public function symptoms()  
    {  
        return $this->belongsToMany(Symptom::class, 'diagnosis_symptoms');  
    }  
}  
