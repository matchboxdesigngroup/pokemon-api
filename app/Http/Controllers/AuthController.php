<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{

    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();

            return $this->sendSuccess(
                [
                    'token' => $authUser->createToken($request->name)->plainTextToken,
                    'name' => $request->name
                ],
                'User "' . $request->email . '" successfully signed in.'
            );
        }
        else{
            return $this->sendError('Unauthorized', [], 403);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()){
            return $this->sendError('ValidationError', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        // TODO: exit if user already exists

        $user = User::create($input);

        return $this->sendSuccess(
            [
                'token' => $user->createToken($request->name)->plainTextToken,
                'name' => $user->name
            ],
            'User created successfully.'
        );
    }

}
