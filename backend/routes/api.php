<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    function csvtojson($file, $delimiter)
    {
        if (($handle = fopen($file, "r")) === false) {
            die("can't open the file.");
        }

        $csv_headers = fgetcsv($handle, 4000, $delimiter);
        $csv_json = array();

        while ($row = fgetcsv($handle, 4000, $delimiter)) {
            $csv_json[] = array_combine($csv_headers, $row);
        }

        fclose($handle);
        return json_encode($csv_json);
    }


    $jsonresult = csvtojson("../interactions.csv", ",");
    return $jsonresult;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
