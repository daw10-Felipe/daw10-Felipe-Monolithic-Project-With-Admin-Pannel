<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        // 2. Comprobamos si está logueado Y si su rol es 2
        if (Auth::check() && Auth::user()->role_id == 2 && !$request->has('vistaprevia')) {
            return redirect('/admin');
        }

        // Si no es admin o no está logueado, carga la vista normal
        return view('pages.home');
    }
}
