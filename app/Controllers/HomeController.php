<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index(){
        //echo  'hello world';
    // --2--  dah ely 3ayez awsalo fe el nehaya
        //return view('home');
        // return view('home', compact('users'));
        //-----dah keda hayroooo7 ll view
        return view('home' ,[
            'username' => 'ahmed',
            'age' => 20
        ]);

    }
}

