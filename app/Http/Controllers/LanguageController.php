<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class LanguageController extends Controller
{
    public function languageView($locale)
    {
        FacadesSession::put('locale', $locale);
        return redirect()->back();
    }
}
