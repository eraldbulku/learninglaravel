<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about()
    {
    	$people = ['Person1', 'Person2'];
    	return view('pages.about')->with([
    		'name' => 'Kobi',
    		'people' => $people
    	]);
    }

    public function contact()
    {
    	return view('pages.contact');
    }
}
