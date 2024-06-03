<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;

class BienController extends Controller
{
    public function listeBien()
    {
        $biens = Bien::all();
        return view('/biens/index',compact('biens'));
    }
}
