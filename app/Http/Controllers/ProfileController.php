<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function editAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $userRole = $user->role_id;

        switch ($userRole) {
            case 1:
                $companyId = $user->company_id;
                $company   = Company::find($companyId);

                return view('profile/user/edit', array('user' => $user, 'company' => $company));
            case 2:
                $companyId = $user->company_id;
                $company   = Company::find($companyId);

                return view('profile/company/edit', array('user' => $user, 'company' => $company));
            case 3:
                return view('profile/superuser/edit', array('user' => $user));
        }
    }

    public function saveUserProfile(Request $request)
    {
        $user = Auth::user();

        $user->salutation = $request['salutation'];
        $user->first_name = $request['firstName'];
        $user->last_name  = $request['lastName'];
        $user->email      = $request['email'];
        $user->phone      = $request['phone'];

        $user->update();

        return redirect()->route('editProfile');
    }

    public function saveCompanyProfile(Request $request)
    {
        $user = Auth::user();

        $companyId = $user->company_id;
        $company   = Company::find($companyId);

        $user->salutation = $request['salutation'];
        $user->first_name = $request['firstName'];
        $user->last_name  = $request['lastName'];
        $user->email      = $request['email'];
        $user->phone      = $request['phone'];
        if ($request->hasFile('avatar')) {
            $avatar         = Input::file('avatar');
            $filenameAvatar = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar->getRealPath())->resize(100, 100)->save(public_path('images/avatar/' . $filenameAvatar));
            $user->avatar = $filenameAvatar;
        }

        $company->name          = $request['companyName'];
        $company->legal_form    = $request['legalForm'];
        $company->street        = $request['street'];
        $company->street_number = $request['streetNumber'];
        $company->zip           = $request['zip'];
        $company->city          = $request['city'];
        $company->country       = $request['country'];
        $company->email         = $request['companyEmail'];
        $company->phone         = $request['companyPhone'];
        if ($request->hasFile('companyAvatar')) {
            $companyAvatar         = Input::file('companyAvatar');
            $filenameCompanyAvatar = time() . '.' . $companyAvatar->getClientOriginalExtension();
            Image::make($companyAvatar)->resize(100, 100)->save(public_path('images/avatar/' . $filenameCompanyAvatar));
            $company->avatar = $filenameCompanyAvatar;
        }

        $company->update();
        $user->update();

        return redirect()->route('editProfile');
    }
}