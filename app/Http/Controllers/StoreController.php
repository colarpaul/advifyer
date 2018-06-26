<?php

namespace App\Http\Controllers;

use App\Company;
use App\Package;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    public function viewAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();
        $companyId = $user->company_id;
        $company = Company::find($companyId);
        $packages = Package::all()->where('id', '!=', 0);

        return view('store/index', array('user' => $user, 'company' => $company, 'packages' => $packages));
    }
    public function buyPackage($packageId)
    {
        $user = Auth::user();
        $companyId = $user->company_id;

        $payment             = new Payment();
        $payment->company_id  = $companyId;
        $payment->package_id = $packageId;

        $payment->save();

        return redirect()->route('viewPayments');
    }
}