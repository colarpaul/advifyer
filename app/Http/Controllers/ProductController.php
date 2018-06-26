<?php

namespace App\Http\Controllers;

use App\Company;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Adding a product in Database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $userRole = $user->role_id;

        switch ($userRole) {
            case 1:
                $companyId = $user->company_id;
                $company   = Company::find($companyId);
                $products  = Product::all()->where('company_id', $companyId);

                return view('products/user/index', array('user' => $user, 'company' => $company, 'products' => $products));
            case 2:
                $companyId     = $user->company_id;
                $company       = Company::find($companyId);
                $products      = Product::all()->where('company_id', $companyId);
                $totalProducts = Product::where('company_id', $companyId)->count();

                return view('products/company/index', array('user' => $user, 'company' => $company, 'products' => $products, 'totalProducts' => $totalProducts));
        }
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();

        $companyId = $user->company_id;

        $product             = new Product();
        $product->name       = $request['productName'];
        $product->category   = $request['categoryName'];
        $product->price      = $request['productPrice'];
        $product->company_id = $companyId;

        $product->save();

        return redirect()->route('viewProducts');
    }

    public function deleteProduct($productId)
    {
        $user = Auth::user();

        Product::where('id', $productId)->delete();

        return redirect()->route('viewProducts');
    }

    public function editProduct($productId, Request $request)
    {
        $user = Auth::user();

        $product = Product::find($productId);

        $product->name = $request['productName'];
        if ($request['productCategory'] == '-') {
            $request['productCategory'] = null;
        }
        $product->category = $request['productCategory'];
        $product->price    = $request['productPrice'];

        $product->update();
    }
}