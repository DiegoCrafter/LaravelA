<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\Facades\JWTManager as JWT;
use App\User;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function register(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $user = DB::connection('oracle')->select(
            DB::raw("call P_INSERT_USUARIO (:p0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16)"),array(
                'p0' => "Daniel ",
                'p1' => "mendoza quispesx",
                'p2' => "guardaespalda",
                'p3' => 201521978,
                'p4' => null,
                'p5' => 987654123,
                'p6' => 76126737,
                'p7' => "M",
                'p8' => 1,
                'p9' => 6,
                'p10' => 1,
                'p11' => "Daniel C",
                'p12' => Hash::make("12356"),
                'p13' => null,
                'p14' => $current_date_time,
                'p15' => null,
                'p16' => "1")
        );

        return $user;
    }


    public function login(Request $request){
        $credentials = $request->json()->all();

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        }catch(JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser(){

        try {
            if(!$user == JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 404);
            }
        }catch(Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
            return response()->json(['token_expired'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
        
    }

}