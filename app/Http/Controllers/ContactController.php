<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    public function viewAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user      = Auth::user();
        $companyId = $user->company_id;
        $company   = Company::find($companyId);

        return view('contact/index', array('user' => $user, 'company' => $company));
    }

    public function sendMessage(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        Mail::send('contact.template', array('request' => $request), function ($m) use ($request) {
            $m->from($request['email'], $request['firstName'] . ' ' . $request['lastName']);
            $m->to('paul@advifyer.com')->subject('Avifyer ContactPage');
        });

        return redirect()->route('viewContact');
    }
}