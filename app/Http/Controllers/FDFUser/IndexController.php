<?php

namespace App\Http\Controllers\FDFUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex(){
        return view('fdfuser.index.index');
    }
}
