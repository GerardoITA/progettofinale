<?php
    
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
    
class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:32',
            'last_name' => 'string|max:32',
            'date_of_birth' => 'date|before:-18year',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $token =  $user->createToken('MyApp')->accessToken;

        return response()->json([
            'success' => true,
            'response' => $user,
            'token' => $token,
            'data' => $request->all()
        ]);
    }
    
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            
            $user = Auth::user();
            
            $token =  $user->createToken('MyApp')->accessToken;
        
    
            return response()->json([
                'success' => true,
                'response' => $user,
                'token' => $token,
                'data' => $request->all()
            ]);
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
        
    }
}
