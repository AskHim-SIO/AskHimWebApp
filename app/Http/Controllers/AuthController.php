<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function ViewLogin()
    {
        return View('Auth/login');
    }

    public function ViewRegister()
    {
        return View('Auth/register');
    }

    public function Register(Request $request)
    {
        $client = new Client();

        $validatedData = $request->validate([
            'email' => 'required | max:255',
            'firstname' => 'required | max:100',
            'name' => 'required | max:255',
            'password' => 'required | max:255',
        ], [
            'email.required' => "Merci d'entrer un e-mail",
            'email.max' => "Cette e-mail est trop long",
            'firstname.required' => "Merci d'entrer votre prenom",
            'firstname.max' => "Ce prenom est trop long",
            'name.required' => "Merci d'entrer votre nom",
            'name.max' => "Ce nom est trop long",
            'password.required' => "Merci d'entrer un mot de passe",
            'password.max' => "Ce mot de passe est trop long",
        ]);
        //todo gérer la complexité d'un mot de passe+sur api aussi

        //todo faire une route booléenne de test email unique + retour message erreur

        //todo voir pour rentrer un objet dans une session

        //        $userAuth = new Auth('morel', "malcom", "malcom@gmail.com");
        //        $modelSerialize = serialize($userAuth);
        //        session(['auth' => $modelSerialize]);

        // Verifier les values
        try {
            $r = $client->request('POST', 'http://askhim.ctrempe.fr:8080/user/create-user', [
                'json' => [
                    "email" => $request->email,
                    "firstname" => $request->firstName,
                    "name" => $request->name,
                    "password" => $request->password
                ],
            ]);

            session(['email' => $request->email]);
            return redirect()->route('home');

        } catch (GuzzleException $e) {
            $error = $e->getCode();
            echo $error;
        }
//        $salut = $r->getBody();
//        $test = json_decode($salut);
//        echo $test;
//        return view('dashboard', compact('test'));
    }

    public function Login(Request $request)
    {
        $client = new Client();
//            http://askhim.ctrempe.fr:8080/user/login
        $r = $client->request('POST', 'http://askhim.ctrempe.fr:8080/user/login', [
            'json' => [
                "email" => $request->email,
                "password" => $request->password
            ],
        ]);
        $statuscode = $r->getStatusCode();
        $r = json_decode($r->getBody());

        //todo gestion erreur
//        if (200 === $statuscode) {
//            // Do something
//        } elseif (304 === $statuscode) {
//            // Nothing to do
//        } elseif (404 === $statuscode) {
//            //toast
//        } else {
//            throw new MyException("Invalid response from api...");
//        }

        session(['email' => $r->email]);
        return redirect()->route('home');
    }

    public function Disconnect()
    {
        session()->flush();
        return View('welcome');
    }
}
