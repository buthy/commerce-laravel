<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

    public function getExemplo()
    {
        return "Oi";
        // test/exemplo
    }

    public function getExemploTeste()
    {
        return "Teste";
        // test/exemplo-teste
    }

    public function getLogin()
    {
        $data = [
            'email' => 'buthy88@gmail.com',
            'password' => '123'
        ];
        if (Auth::attempt($data)){
            return "sucesso";
        }

        if (Auth::check()) {
            return Auth::user()->name;
        }

//        dd(Auth::user());
//        return Auth::user();
        

        return "falhou";
    }

    public function getLogout()
    {
        Auth::logout();
    }

}
