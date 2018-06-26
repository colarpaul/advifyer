<?php

namespace App\Http\Controllers;

class ReviewMetaController extends Controller
{
    public function getReviewMeta($eanCode){
       $access_key_id = "AKIAINQN6WVXRCH23NHQ";

        // Your Secret Key corresponding to the above ID, as taken from the Your Account page
        $secret_key = "6yN/CrPz3rmkC/N+odJN42L3IfO8VRwVm8h9FuDU";

        // The region you are interested in
        $endpoint = "webservices.amazon.de";

        $uri = "/onca/xml";

        $params = array(
            "Service" => "AWSECommerceService",
            "Operation" => "ItemLookup",
            "AWSAccessKeyId" => "AKIAINQN6WVXRCH23NHQ",
            "AssociateTag" => "catch0f-21",
            "ItemId" => $eanCode,
            "IdType" => "EAN",
            "ResponseGroup" => "Images,ItemAttributes,Offers",
            "SearchIndex" => "All"
        );

        // Set current timestamp if not set
        if (!isset($params["Timestamp"])) {
            $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
        }

        // Sort the parameters by key
        ksort($params);

        $pairs = array();

        foreach ($params as $key => $value) {
            array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
        }

        // Generate the canonical query
        $canonical_query_string = join("&", $pairs);

        // Generate the string to be signed
        $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

        // Generate the signature required by the Product Advertising API
        $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $secret_key, true));

        // Generate the signed URL
        $request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

        $webURL = $request_url;

        if($this->get_http_response_code($webURL) != "200"){
            echo "EAN Code not found.";
        }else{
            $xml = file_get_contents($webURL);
            $xml = new \SimpleXMLElement($xml);
            $asin = '';
            foreach ($xml->Items->Item as $item) {
                $asin = (string)$item->ASIN;
            }

            $reviewMetaURL = 'https://reviewmeta.com/api/amazon-de/'.$asin;
            if($this->get_http_response_code($reviewMetaURL) != "200"){
            echo "EAN Code not found.";
        }else{
            $reviewMetaReq = file_get_contents($reviewMetaURL);

            print_R($reviewMetaReq);}
        }

    }

    function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}
}