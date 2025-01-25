<?php
// app/Models/Rule.php  
  
namespace App\Models;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
  
class Rule extends Model  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'disease_id',  
        'symptom_id',  
        'weight',  
    ];  
  
    public function disease()  
    {  
        return $this->belongsTo(Disease::class);  
    }  
  
    public function symptom()  
    {  
        return $this->belongsTo(Symptom::class);  
    }  
}  
