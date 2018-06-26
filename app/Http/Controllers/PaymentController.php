<?php

namespace App\Http\Controllers;

use App\Company;
use App\Package;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    public function viewAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user      = Auth::user();
        $companyId = $user->company_id;
        $company   = Company::find($companyId);
        $payments  = Payment::all()->where('company_id', $companyId);
        $packages  = Package::all();
        $products  = Product::all();

        return view('payments/index', array('user' => $user, 'company' => $company, 'payments' => $payments, 'packages' => $packages, 'products' => $products));
    }

    public function downloadAction($paymentId)
    {
        $user    = Auth::user();
        $payment = Payment::find($paymentId);
        $package = Package::find($payment->package_id);
        $company = Company::find($payment->company_id);

        $pdf  = App::make('dompdf.wrapper');
        $html = View::make('payments/template', array('payment' => $payment, 'user' => $user, 'package' => $package, 'company' => $company))->render();
        $pdf->loadHTML($html);

        return $pdf->stream();
    }
}