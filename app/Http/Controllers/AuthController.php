<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;


class AuthController extends Controller
{

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register() {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['errorText' => $validator->errors(), 'res' => false], 422);
        }

        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->roles = 'user';
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json(['res' => true, 'data' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'roles' => $user->roles]], 201);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login() {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['errorText' => $validator->errors(), 'res' => false], 422);
        }

        $credentials = request(['name', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized', 'res' => false], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function check()
    {
//        return response()->json(auth()->user()->only(['name', 'roles']));
        // TODO: Тут нужно отправлять всегда статус код 200 OK
        // TODO:  и если не авторизован, то тупо {"auth":false}
        // TODO: если авторизован то {"auth":true,"user":{"id":1,"login":"admin"}}
        /*
        return response()->json([
            'user' => ['id' => auth()->user()->id, 'name' => auth()->user()->name, 'roles' => auth()->user()->roles],
//            'auth' => auth()->user() ? true : false,
            'auth' => auth()->user(),
        ]);
        */

        if (auth()->user()) {
            return response()->json([
                'data' => [
                    'user' => ['id' => auth()->user()->id, 'name' => auth()->user()->name, 'roles' => auth()->user()->roles],
                    'auth' => true,
                ],
                'res' => true,
            ]);
        } else {
            return response()->json([
                'data' => [
                    'user' => null,
                    'auth' => false,
                ],
                'res' => false,
            ]);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        if(request()->name) {
            $user = User::where('name', 'max')
                ->select('name', 'roles')
                ->first();

            return response()->json([
                'res' => true,
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        }
        else {
            return response()->json([
                'res' => true,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        }
    }
}
?>
