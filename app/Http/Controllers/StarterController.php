<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Response;
use Illuminate\support\facades\view;

class StarterController extends Controller
{
   public function index()
   {

    // Retern response (view , josn ,redirect , file)

    $user='mohameddd';
    $title="store";

    

   
    return view('dashboard.index',compact('user','title')
   );
   }
}
