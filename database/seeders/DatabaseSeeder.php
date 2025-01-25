<?php
// database/seeders/DatabaseSeeder.php  
  
namespace Database\Seeders;  
  
use Illuminate\Database\Seeder;  
use App\Models\User;  
use App\Models\Symptom;  
use App\Models\Disease;  
use App\Models\Rule;  
  
class DatabaseSeeder extends Seeder  
{  
    public function run()  
    {  
        // Create Admin User  
        User::create([  
            'nama' => 'Admin',  
            'email' => 'admin@example.com',  
            'password' => bcrypt('admin'),  
            'role' => 'admin',  
        ]);  
  
        // Create Symptoms  
        $symptoms = Symptom::factory()->count(10)->create();  
  
        // Create Diseases  
        $diseases = Disease::factory()->count(5)->create();  
  
        // Create Rules  
        foreach ($diseases as $disease) {  
            foreach ($symptoms as $symptom) {  
                Rule::create([  
                    'disease_id' => $disease->id,  
                    'symptom_id' => $symptom->id,  
                    'weight' => rand(1, 10) / 10,  
                ]);  
            }  
        }  
    }  
}  
