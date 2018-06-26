<?php

namespace App\Http\Controllers;

use App\AdditionalInformation;
use App\Code;
use App\CodeType;
use App\Company;
use App\Package;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CodeController extends Controller
{
    public function viewAction(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $companyId  = $user->company_id;
        $company    = Company::find($companyId);
        $codes      = Code::all()->where('company_id', $companyId);
        $totalCodes = Code::where('company_id', $companyId)->count();
        $products   = Product::all()->where('company_id', $companyId);

        $packages           = Package::all();
        $companyPayments    = Payment::all()->where('company_id', $companyId);
        $totalPossibleCodes = 0;
        foreach ($companyPayments as $payment) {
            $totalPossibleCodes += $packages[$payment->package_id]->max_codes;
        }

        return view('codes/view', array('user' => $user, 'company' => $company, 'totalPossibleCodes' => $totalPossibleCodes, 'codes' => $codes, 'totalCodes' => $totalCodes, 'products' => $products));
    }

    public function newCode(Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $companyId = $user->company_id;
        $company   = Company::find($companyId);

        $products = Product::all()->where('company_id', $companyId);

        $codeTypes = CodeType::all();

        $packages           = Package::all();
        $companyPayments    = Payment::all()->where('company_id', $companyId);
        $totalPossibleCodes = 0;
        foreach ($companyPayments as $payment) {
            $totalPossibleCodes += $packages[$payment->package_id]->max_codes;
        }

        return view('codes/new', array('user' => $user, 'company' => $company, 'totalPossibleCodes' => $totalPossibleCodes, 'products' => $products, 'codeTypes' => $codeTypes));
    }

    public function createCode(Request $request)
    {
        $this->validate($request, array(
            'code' => 'required|numeric|unique:codes,code_id',
        ));
        $user = Auth::user();

        $companyId = $user->company_id;

        $code             = new Code();
        $code->code_id    = $request['code'];
        $code->type       = $request['codeType'];
        $code->product_id = $request['productId'];
        $code->company_id = $companyId;

        $code->save();

        return redirect()->route('editCode', $code->id);
    }

    public function editCode($codeId, Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $code      = Code::find($codeId);
        $companyId = $user->company_id;
        $company   = Company::find($companyId);

        $arrayData = array(
            'button1' => array('url' => '', 'icon' => ''),
            'button2' => array('url' => '', 'icon' => ''),
            'button3' => array('url' => '', 'icon' => ''),
            'button4' => array('url' => '', 'icon' => ''),
        );

        if (!empty($code->data)) {
            $data    = json_decode($code->data);
            $buttons = $data;

            $counter = 0;
            foreach ($buttons as $buttonsArray) {
                foreach ($buttonsArray as $button) {
                    $counter++;
                }
            }

            switch ($counter) {
                case 1:
                    $arrayData['button1']['url']  = $buttons[0][0]->url;
                    $arrayData['button1']['icon'] = $buttons[0][0]->icon;
                    break;
                case 2:
                    $arrayData['button1']['url']  = $buttons[0][0]->url;
                    $arrayData['button1']['icon'] = $buttons[0][0]->icon;
                    $arrayData['button2']['url']  = $buttons[0][1]->url;
                    $arrayData['button2']['icon'] = $buttons[0][1]->icon;
                    break;
                case 3:
                    $arrayData['button1']['url']  = $buttons[0][0]->url;
                    $arrayData['button1']['icon'] = $buttons[0][0]->icon;
                    $arrayData['button2']['url']  = $buttons[1][0]->url;
                    $arrayData['button2']['icon'] = $buttons[1][0]->icon;
                    $arrayData['button3']['url']  = $buttons[1][1]->url;
                    $arrayData['button3']['icon'] = $buttons[1][1]->icon;
                    break;
                case 4:
                    $arrayData['button1']['url']  = $buttons[0][0]->url;
                    $arrayData['button1']['icon'] = $buttons[0][0]->icon;
                    $arrayData['button2']['url']  = $buttons[0][1]->url;
                    $arrayData['button2']['icon'] = $buttons[0][1]->icon;
                    $arrayData['button3']['url']  = $buttons[1][0]->url;
                    $arrayData['button3']['icon'] = $buttons[1][0]->icon;
                    $arrayData['button4']['url']  = $buttons[1][1]->url;
                    $arrayData['button4']['icon'] = $buttons[1][1]->icon;
                    break;
            }
        }


        $products = Product::all()->where('company_id', $companyId);

        return view('codes/edit', array(
                'user'        => $user,
                'code'        => $code,
                'products'    => $products,
                'company'     => $company,
                'button1url'  => $arrayData['button1']['url'],
                'button1icon' => $arrayData['button1']['icon'],
                'button2url'  => $arrayData['button2']['url'],
                'button2icon' => $arrayData['button2']['icon'],
                'button3url'  => $arrayData['button3']['url'],
                'button3icon' => $arrayData['button3']['icon'],
                'button4url'  => $arrayData['button4']['url'],
                'button4icon' => $arrayData['button4']['icon'],
            )
        );
    }

    public function editCode2($codeId, Request $request)
    {
        App::setLocale($request->session()->get('locale'));

        $user = Auth::user();

        $code           = Code::find($codeId);
        $companyId      = $user->company_id;
        $company        = Company::find($companyId);
        $products       = Product::all()->where('company_id', $companyId);
        $additionalInfo = AdditionalInformation::all()->where('code_id', $codeId)->count();
        if ($additionalInfo == 0) {
            $additionalInfo = new AdditionalInformation();
        } else {
            $additionalInfo = AdditionalInformation::all()->where('code_id', $codeId)->first();
        }

        return view('codes/edit2', array(
                'user'           => $user,
                'code'           => $code,
                'products'       => $products,
                'company'        => $company,
                'additionalInfo' => $additionalInfo,
            )
        );
    }

    public function updateCode($codeId, Request $request)
    {
        $user = Auth::user();

        $code    = Code::find($codeId);
        $product = Product::find($request['productId']);

        $companyId = $product->company_id;
        $company   = Company::find($companyId);

        $buttons = $request['button'];
        $url     = $request['url'];

        foreach ($buttons as $key => $value) {
            if (empty($value)) {
                unset($buttons[$key]);
            }
        }
        $buttons = array_values($buttons);

        if (count($url) > 0) {
            foreach ($url as $key => $value) {
                if (empty($value)) {
                    unset($url[$key]);
                }
            }

            $url = array_values($url);
        }

        $successfulCodes = array(
            '0', '200', '201', '202', '203', '204', '205', '206',
        );

        if (isset($url)) {
            foreach ($url as $key => $webURL) {

                $webURL = preg_replace('/^http:\/\//', 'https://', $webURL);
                $re     = '/http[s]*:\/\//';

                if (!preg_match($re, $webURL)) {
                    $webURL = 'https://' . $webURL;
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $webURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);


                if (!in_array($httpcode, $successfulCodes)) {
                    $webURL = preg_replace('/^https:\/\//', 'http://', $webURL);
                    $ch     = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $webURL);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_exec($ch);
                    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
                }

                if (!in_array($httpcode, $successfulCodes)) {
                    // TODO error (really use this url?)
                }

                $url[$key] = $webURL;
            }
        }

        $counterButtons = count($buttons);


//        $data = array(
//            'product' =>
//                array(
//                    'code'         => $code->code_id,
//                    'manufacturer' => $company->name,
//                    'name'         => $product->name,
//                ),
//        );

        switch ($counterButtons) {
            case 0:
                $data = null;
                break;
            case 1:
                if ($buttons[0] == 'youtube') {
                    $actions[0] = 'youtube';
                } elseif ($buttons[0] == 'facebook') {
                    $actions[0] = 'facebook';
                } else {
                    $actions[0] = 'link';
                }
                $data = array(
                    array(
                        array(
                            'icon'   => $buttons[0],
                            'action' => $actions[0],
                            'url'    => $url[0],
                        ),
                    ),
                );
                break;
            case 2:
                if ($buttons[0] == 'youtube') {
                    $actions[0] = 'youtube';
                } elseif ($buttons[0] == 'facebook') {
                    $actions[0] = 'facebook';
                } else {
                    $actions[0] = 'link';
                }

                if ($buttons[1] == 'youtube') {
                    $actions[1] = 'youtube';
                } elseif ($buttons[1] == 'facebook') {
                    $actions[1] = 'facebook';
                } else {
                    $actions[1] = 'link';
                }
                $data = array(
                    array(
                        array(
                            'icon'   => $buttons[0],
                            'action' => $actions[0],
                            'url'    => $url[0],
                        ),
                        array(
                            'icon'   => $buttons[1],
                            'action' => $actions[1],
                            'url'    => $url[1],
                        ),
                    ),
                );
                break;
            case 3:
                if ($buttons[0] == 'youtube') {
                    $actions[0] = 'youtube';
                } elseif ($buttons[0] == 'facebook') {
                    $actions[0] = 'facebook';
                } else {
                    $actions[0] = 'link';
                }

                if ($buttons[1] == 'youtube') {
                    $actions[1] = 'youtube';
                } elseif ($buttons[1] == 'facebook') {
                    $actions[1] = 'facebook';
                } else {
                    $actions[1] = 'link';
                }

                if ($buttons[2] == 'youtube') {
                    $actions[2] = 'youtube';
                } elseif ($buttons[2] == 'facebook') {
                    $actions[2] = 'facebook';
                } else {
                    $actions[2] = 'link';
                }
                $data = array(
                    array(
                        array(
                            'icon'   => $buttons[0],
                            'action' => $actions[0],
                            'url'    => $url[0],
                        ),
                    ),
                    array(
                        array(
                            'icon'   => $buttons[1],
                            'action' => $actions[1],
                            'url'    => $url[1],
                        ),
                        array(
                            'icon'   => $buttons[2],
                            'action' => $actions[2],
                            'url'    => $url[2],
                        ),
                    ),
                );
                break;
            case 4:
                if ($buttons[0] == 'youtube') {
                    $actions[0] = 'youtube';
                } elseif ($buttons[0] == 'facebook') {
                    $actions[0] = 'facebook';
                } else {
                    $actions[0] = 'link';
                }

                if ($buttons[1] == 'youtube') {
                    $actions[1] = 'youtube';
                } elseif ($buttons[1] == 'facebook') {
                    $actions[1] = 'facebook';
                } else {
                    $actions[1] = 'link';
                }

                if ($buttons[2] == 'youtube') {
                    $actions[2] = 'youtube';
                } elseif ($buttons[2] == 'facebook') {
                    $actions[2] = 'facebook';
                } else {
                    $actions[2] = 'link';
                }

                if ($buttons[3] == 'youtube') {
                    $actions[3] = 'youtube';
                } elseif ($buttons[3] == 'facebook') {
                    $actions[3] = 'facebook';
                } else {
                    $actions[3] = 'link';
                }
                $data = array(
                    array(
                        array(
                            'icon'   => $buttons[0],
                            'action' => $actions[0],
                            'url'    => $url[0],
                        ),
                        array(
                            'icon'   => $buttons[1],
                            'action' => $actions[1],
                            'url'    => $url[1],
                        ),
                    ),
                    array(
                        array(
                            'icon'   => $buttons[2],
                            'action' => $actions[2],
                            'url'    => $url[2],
                        ),
                        array(
                            'icon'   => $buttons[3],
                            'action' => $actions[3],
                            'url'    => $url[3],
                        ),
                    ),
                );
                break;
        }

        $code->data       = json_encode($data);
        $code->code_id    = $request['code'];
        $code->product_id = $request['productId'];

        $code->update();

        return redirect()->route('editCode2', $codeId);
    }

    public function updateCode2($codeId, Request $request)
    {
        $user           = Auth::user();
        $additionalInfo = AdditionalInformation::all()->where('code_id', $codeId)->count();

        if ($additionalInfo == 0) {
            $additionalInfo = new AdditionalInformation();

            $additionalInfo->code_id                   = $codeId;
            $additionalInfo->vegan                     = !empty($request['vegan']) ? 1 : 0;
            $additionalInfo->lactose                   = !empty($request['lactose']) ? 1 : 0;
            $additionalInfo->gluten                    = !empty($request['gluten']) ? 1 : 0;
            $additionalInfo->pregnant_women            = !empty($request['pregnant_women']) ? 1 : 0;
            $additionalInfo->bio                       = !empty($request['bio']) ? 1 : 0;
            $additionalInfo->prescription              = !empty($request['prescription']) ? 1 : 0;
            $additionalInfo->adult                     = !empty($request['adult']) ? 1 : 0;
            $additionalInfo->country                   = $request['country'];
            $additionalInfo->description               = $request['description'];
            $additionalInfo->usp                       = $request['usp'];
            $additionalInfo->supplementary_ingredients = $request['supplementary_ingredients'];
            $additionalInfo->nicotin                   = $request['nicotin'];
            $additionalInfo->alcohol                   = $request['alcohol'];

            $additionalInfo->save();
        } else {
            $additionalInfo = AdditionalInformation::all()->where('code_id', $codeId)->first();

            $additionalInfo->code_id                   = $codeId;
            $additionalInfo->vegan                     = !empty($request['vegan']) ? 1 : 0;
            $additionalInfo->lactose                   = !empty($request['lactose']) ? 1 : 0;
            $additionalInfo->gluten                    = !empty($request['gluten']) ? 1 : 0;
            $additionalInfo->pregnant_women            = !empty($request['pregnant_women']) ? 1 : 0;
            $additionalInfo->bio                       = !empty($request['bio']) ? 1 : 0;
            $additionalInfo->prescription              = !empty($request['prescription']) ? 1 : 0;
            $additionalInfo->adult                     = !empty($request['adult']) ? 1 : 0;
            $additionalInfo->country                   = $request['country'];
            $additionalInfo->description               = $request['description'];
            $additionalInfo->usp                       = $request['usp'];
            $additionalInfo->supplementary_ingredients = $request['supplementary_ingredients'];
            $additionalInfo->nicotin                   = $request['nicotin'];
            $additionalInfo->alcohol                   = $request['alcohol'];

            $additionalInfo->update();
        }

        return redirect()->route('viewCodes');
    }

    /**
     * ?fields=products,buttons,data
     *
     * @param $codeType
     * @param $codeId
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getDataFromCode($codeType, $codeId)
    {
        $code = DB::table('codes')
            ->leftJoin('code_types', 'code_types.id', '=', 'codes.type')
            ->select('codes.*')
            ->where('codes.code_id', $codeId)
            ->where('code_types.name', $codeType)
            ->get()
            ->first();

        if (empty($code)) {
            return response('', 404);
        }

        $data   = array();
        $fields = Input::get('fields');
        $fields = empty($fields) ? array('product', 'buttons', 'info') : explode(',', $fields);

        if (in_array('product', $fields)) {
            $company = DB::table('companies')
                ->where('id', $code->company_id)
                ->get()
                ->first();

            $product = DB::table('products')
                ->where('id', $code->product_id)
                ->get()
                ->first();

            $data['product'] = array(
                'code'         => $code->code_id,
                'manufacturer' => $company->name,
                'name'         => $product->name,

            );
        }
        if (in_array('buttons', $fields)) {
            $buttonsGroup = json_decode($code->data);
            foreach ($buttonsGroup as $key => $buttons) {
                foreach ($buttons as $key2 => $button) {
                    $buttonsGroup[$key][$key2] = (array)$button;
                }
            }

            $data['buttons'] = $buttonsGroup;
        }
        if (in_array('info', $fields)) {
            $additionalInformation = DB::table('additional_informations')
                ->select('vegan', 'lactose', 'gluten', 'pregnant_women', 'bio', 'prescription', 'adult', 'country', 'description', 'usp', 'supplementary_ingredients', 'nicotin', 'alcohol')
                ->where('code_id', $code->id)
                ->get()
                ->first();

            $data['info'] = $additionalInformation;
        }

        return response(json_encode($data))
            ->header('Access-Control-Allow-Origin', '*');
    }

    /**
     * ?fields=products,buttons,data
     *
     * @param $codeId
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getDataFromCode2($codeId)
    {
        $code = DB::table('codes_gtin')
            ->select('codes_gtin.*')
            ->where('codes_gtin.gtin_code', $codeId)
            ->get()
            ->first();

        if (empty($code)) {
            return response('', 404);
        }

        $data   = array();
        $fields = Input::get('fields');
        $fields = empty($fields) ? array('product', 'buttons', 'info') : explode(',', $fields);

        if (in_array('product', $fields)) {

            $data['product'] = array(
                'gtin_code'                  => $code->gtin_code,
                'gtin_name'                  => $code->gtin_name,
                'segmentation'               => $code->segmentation,
                'gtin_image'                 => $code->gtin_image,
                'brand'                      => $code->brand,
                'brand_image'                => $code->brand_image,
                'brand_link'                 => $code->brand_link,
                'brand_owner'                => $code->brand_owner,
                'brand_owner_link'           => $code->brand_owner_link,
                'brand_owner_wikipedia_link' => $code->brand_owner_wikipedia_link,
                'brand_owner_image'          => $code->brand_owner_image,
                'logistical_owner'           => $code->logistical_owner,
//                'gln_country_iso_code'       => $code->gln_country_iso_code,
//                'gln_city'                   => $code->gln_city,
//                'gln_postal_code'            => $code->gln_postal_code,
//                'gln_address2'               => $code->gln_address2,
                'weight_g'                   => $code->weight_g,
                'weight_oz'                  => $code->weight_oz,
                'volume_ml'                  => $code->volume_ml,
                'volume_fl_oz'               => $code->volume_floz,
                'alcohol_by_volume'          => $code->alcohol_by_volume,
                'alcohol_by_weight'          => $code->alcohol_by_weight,
//                'registration'                  => $code->registration,
//                'registration_country_iso_code' => $code->registration_country_iso_code,
            );
        }

        if (in_array('buttons', $fields)) {

            $data['buttons'] = array(
                array(
                    array(
                        'icon'   => 'web',
                        'action' => 'link',
                        'url'    => $code->brand_link,
                    ),
                ),
            );
        }

//        if (in_array('info', $fields)) {
//            $additionalInformation = DB::table('additional_informations')
//                ->select('vegan', 'lactose', 'gluten', 'pregnant_women', 'bio', 'prescription', 'adult', 'country', 'description', 'usp', 'supplementary_ingredients', 'nicotin', 'alcohol')
//                ->where('code_id', $code->id)
//                ->get()
//                ->first();
//
//            $data['info'] = $additionalInformation;
//        }

        return response(json_encode($data))
            ->header('Access-Control-Allow-Origin', '*');
    }

    public function deleteCode($codeId)
    {
        $user = Auth::user();

        Code::where('id', $codeId)->delete();

        return redirect()->route('viewCodes');
    }
}