<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function changeLang($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);

        return redirect()->back();
    }
}
