<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthApiController extends Controller
{
    public function registro(Request $request){
        $registerUserData = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8'
        ]);
        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'password' => Hash::make($registerUserData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'=>'success',
            'message'=>'Conta criado com sucesso!',
            'data' => [
                'name'=>$user->name,
                'email'=>$user->email,
                'tokenAuth'=>$token
            ],
        ],201);
    }
    function login(Request $request) {
        //TENTA LOGAR COM OS DADOS PASSADOS NA REQUEST
        //SE NÃO DER, RETORNA UMA MENSAGEM DE ERRO.
        if (!Auth::attempt($request->only('email', 'password'))) {
            //print("TENTOU MAS DEU RUIM \n");
            return response()->json(['message' => 'Dados de Login Inválidos'], 401);
        }

        //print("testando: ".$request["email"]);

        //PEGA O USUÁRIO, BUSCANDO PELO EMAIL (UNIQUE) E CRIA UM TOKEN PARA ELE
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

       //RETORNA RETORNO PADRÁO, IMBUTIDO CONFIGURAÇÕESAUTENTICAÇÃO
        return response()->json([
            'status'=>'success',
            'message'=>'Login relaizado com sucesso!',
            'data' => [
                'email'=>$user->email,
                'tokenAuth'=>$token
            ],
        ]);

    }


/*
    function logout(Request $Request){
        //PEGA O USUÁRIO LOGADO, DELETA SEUS TOKENS E O DESLOGA.
        $user = Auth::user();
        $user->tokens()->delete();
        auth()->guard('web')->logout();
        return response()->json(['message' => 'Usuario efetuou logout'],200);
    }
  */
}
