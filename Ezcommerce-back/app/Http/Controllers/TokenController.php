<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function verificar(Request $request)
    {
        return response()->json([
            'status' => 'Token válido',
            'usuario' => $request->user(),
        ]);
    }
}
