<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {
       $pagecontent = view('frontend.home.index');

       $pagemain = array (
           'title' => 'Home',
           'pagecontent' => $pagecontent
       );

       return view('frontend.masterpage_frontend', $pagemain);
   }
}
