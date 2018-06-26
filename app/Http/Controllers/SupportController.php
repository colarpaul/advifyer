<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SupportController extends Controller
{
    public function viewAction()
    {
        $user = Auth::user();
        $companyId = $user->company_id;
        $company = Company::find($companyId);

        return view('support/index', array('user' => $user, 'company' => $company));
    }
}