<?php

namespace App\Http\Controllers;

use App\Code;
use App\Company;
use App\Package;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $companyId  = $user->company_id;
        $company    = Company::find($companyId);
        $package    = Package::find($company->package_id);
        $packages    = Package::all();
        $totalCodes = Code::where('company_id', $companyId)->count();
        $totalProducts = Product::where('company_id', $companyId)->count();
        $companyPayments = Payment::all()->where('company_id', $companyId);

        $totalPossibleCodes = 0;
        foreach($companyPayments as $payment){
            $totalPossibleCodes += $packages[$payment->package_id]->max_codes;
        }

        return view('dashboard/dashboard', array('user' => $user, 'company' => $company, 'package' => $package, 'totalPossibleCodes' => $totalPossibleCodes,'totalCodes' => $totalCodes, 'totalProducts' => $totalProducts));
    }

    public function welcome()
    {
        if (!(Auth::check())) {
            return view('welcome');
        } else {
            return redirect()->route('dashboard');
        }
    }
}