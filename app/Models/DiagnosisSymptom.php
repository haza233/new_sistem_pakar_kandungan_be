<?php
// app/Models/DiagnosisSymptom.php  
  
namespace App\Models;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
  
class DiagnosisSymptom extends Model  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'diagnosis_id',  
        'symptom_id',  
    ];  
}  
