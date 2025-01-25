<?php  
  
namespace App\Http\Controllers\Api;  
  
use App\Models\User;  
use App\Services\LocationService; // Import LocationService  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Hash;  
use Illuminate\Validation\ValidationException;  
use App\Http\Controllers\Controller;  
  
class AuthController extends Controller  
{  
    protected $locationService;  
  
    public function __construct(LocationService $locationService)  
    {  
        $this->locationService = $locationService;  
    }  
  
    public function register(Request $request)  
    {  
        // Validate incoming request data  
        $request->validate([  
            'nama' => 'required|string|max:255',  
            'email' => 'required|string|email|max:255|unique:users',  
            'password' => 'required|string|min:8',  
            'role' => 'required|in:pasien,dokter,admin',  
        ]);  
  
        // Create a new user  
        $user = User::create([  
            'nama' => $request->nama,  
            'email' => $request->email,  
            'password' => Hash::make($request->password),  
            'role' => $request->role,  
        ]);  
  
        return response()->json(['user' => $user], 201);  
    }  
    public function login(Request $request)    
    {    
        // Validate incoming request data with custom messages    
        $request->validate([    
            'email' => 'required|string|email',    
            'password' => 'required|string',    
        ], [  
            'email.required' => 'Email is required.',  
            'email.email' => 'The email must be a valid email address.',  
            'password.required' => 'Password is required.',  
        ]);    
            
        // Log the login attempt    
        \Log::info('Login attempt for email: ' . $request->email);    
            
        // Find the user by email    
        $user = User::where('email', $request->email)->first();    
            
        // Check for valid user and password    
        if (!$user || !Hash::check($request->password, $user->password)) {    
            \Log::warning('Invalid login attempt for email: ' . $request->email);    
            return response()->json([    
                'message' => 'The provided credentials are incorrect.',    
            ], 401); // Return 401 for incorrect credentials    
        }    
            
        // Restrict login to only users with role 'dokter' or 'pasien'    
        if (!in_array($user->role, ['dokter', 'pasien'])) {    
            return response()->json([    
                'error' => 'Login is restricted to users with the role of "dokter" or "pasien" only.',    
            ], 403);    
        }    
            
        // Create token for the user    
        $token = $user->createToken('auth_token')->plainTextToken;    
            
        // Return response with token and user information    
        return response()->json([    
            'token' => $token,    
            'id' => $user->id,    
            'user' => [    
                'nama' => $user->nama,    
                'email' => $user->email,    
                'role' => $user->role,    
            ],    
        ], 200);    
    }  
    
    
  
    public function logout(Request $request)  
    {  
        // Delete all tokens for the user  
        $request->user()->tokens()->delete();  
        return response()->json(['message' => 'Logged out successfully'], 200);  
    }  
}  
