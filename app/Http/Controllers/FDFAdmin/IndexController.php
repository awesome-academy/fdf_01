<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex(){
    	return view('fdfadmin.index.index');
    }
}
