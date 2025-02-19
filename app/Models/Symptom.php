<?php
// app/Models/Symptom.php  
  
namespace App\Models;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
  
class Symptom extends Model  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'name',  
        'description',  
    ];  
  
    public function rules()  
    {  
        return $this->hasMany(Rule::class);  
    }  
  
    public function diagnoses()  
    {  
        return $this->belongsToMany(Diagnosis::class, 'diagnosis_symptoms');  
    }  
}  
