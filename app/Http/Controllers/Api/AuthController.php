<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user
     */
    public function login(Request $request)
    {
        $notFound = $this->checkIsDeleted($request->email);

        if ($notFound){
            return ResponseFormatter::error(null, 'Invalid login details', 401);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $data = [
                'user' => $user,
                'token' => $token,
            ];
            return ResponseFormatter::success($data, 'Login successfully');
        }else{
            return ResponseFormatter::error(null, 'Invalid login details', 401);
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });

            return response()->json('Logged out successfully', 200);
        } else {
            return response()->json('No authenticated user found', 401);
        }
    }

    private function checkIsDeleted($email)
    {
        $user = User::where('email', $email)->first();
        if (!$user || $user->delete_at){
            return true;
        }else{
            return false;
        }
    }
}
