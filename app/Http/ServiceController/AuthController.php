<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
            'password' => 'required | min:8',
            'dateNaiss' => 'required',
        ], [
            'email.required' => "Merci d'entrer un e-mail",
            'email.max' => "Cette e-mail est trop long",
            'firstname.required' => "Merci d'entrer votre prenom",
            'firstname.max' => "Ce prenom est trop long",
            'name.required' => "Merci d'entrer votre nom",
            'name.max' => "Ce nom est trop long",
            'password.required' => "Merci d'entrer un mot de passe",
            'password.min' => "Ce mot de passe est trop simple",
            'dateNaiss.required' => "Merci d'entrer votre date de naissance",
        ]);
        //todo gérer la complexité d'un mot de passe+sur api aussi

        //todo faire une route booléenne de test email unique + retour message erreur

        $dateConvert = date('Y-m-d', strtotime($request->dateNaiss));
        $r = $client->request('POST', 'http://askhim.ctrempe.fr:8080/user/create-user', [
            'json' => [
                "dateNaiss" => $dateConvert,
                "email" => $request->email,
                "firstname" => $request->firstname,
                "name" => $request->name,
                "password" => $request->password,
            ],
        ]);
        $statuscode = $r->getStatusCode();
        $r = $r->getBody();
        $r = json_decode($r);
        if (201 === $statuscode) {
            $this->Login($request);
            return redirect()->route('home');
        }
        echo $statuscode;
        echo $dateConvert;
//      return redirect()->back();
    }

    public function Login(Request $request)
    {
        $client = new Client();

        $r = $client->request('POST', 'http://askhim.ctrempe.fr:8080/auth/login', [
            'json' => [
                "email" => $request->email,
                "password" => $request->password
            ],
        ]);

        $statuscode = $r->getStatusCode();

        //todo gestion erreur
        if (200 === $statuscode) {
            $r = $r->getBody();
            $r = $r->getContents();

            if ($r == NULL) {
                //todo rajouter une erreur de connexion
                return redirect()->back();
            }

            //todo redirection profil
            Cookie::queue('guid', "$r", 10);

            return redirect()->route('home');

        } elseif (304 === $statuscode) {
            echo "304";
        } elseif (404 === $statuscode) {
            echo "404";
        }
    }

    public function Disconnect()
    {
        Cookie::queue(Cookie::forget('guid'));

        session()->flush();

        return redirect()->back();
    }

}
