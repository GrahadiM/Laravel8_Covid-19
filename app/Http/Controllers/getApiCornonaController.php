<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class getApiCornonaController extends Controller
{
    public function index(Request $request){
        if($request->has('country')){
            $country  = $request->country;
        }
        else {
            $country = "Indonesia";
        }

        $host = 'covid-19-coronavirus-statistics.p.rapidapi.com';
        $key = '011280c1bemsh0c11028ba443a60p1e46eejsnc88f4ae399b9';          

        // $list_date = date_default_timezone_set('Asia/Jakarta');
        // $list_date = new DateTime( $time = 'now');
        // $list_data = $list_date;
        $list_data = $this->getApi($host, $key, $country)['data']['covid19Stats'][0];
        $list_country = $this->getApi($host, $key, $country = '')['data']['covid19Stats'];

        $country_array = [];
        foreach ($list_country as $result){
            $country_array[] = $result['country'];
        }

        $country = collect($country_array)->unique();
 
        return view('report', compact('list_data', 'country'));

        
    }

    private function getApi($host, $key, $country){
        return Http::withHeaders([
            'x-rapidapi-host' => $host,
	        'x-rapidapi-key' => $key
        ])->get('https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/stats',[
            "country" => $country
        ]);
    }
}
