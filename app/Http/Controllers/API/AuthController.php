<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request) {
        try {
            $cretendials = $request->only(['email', 'password']);

            if(!JWTAuth::attempt($cretendials)) {
                return $this->error("Your cretendials are wrong");
            }

            $user = User::where('email', $cretendials['email'])->first();

            $payload = [
                'id'=>$user->id,
                'name'=>$user->name,
                'address'=>$user->address,
                'phone'=>$user->phone,
                'status'=>$user->status === 1 ? 'active' : 'suspend',
            ];
            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password' => $cretendials['password']]);
            return $this->success($token, "Login successful", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "something went wrong", null, $e->getCode() ? $e->getCode() : 500);
        }
    }
}
