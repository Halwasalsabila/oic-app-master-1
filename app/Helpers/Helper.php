<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function setUrlImage($url, $default = 'example-image.jpg')
    {
        // $user = DB::table('users')->where('userid', $user_id)->first();
        // return Storage::exists($url) ? 'ada' : 'tidak ada';
        if ($url == "no-image.jpg" or $url == null) {
            return asset('img/' . $default);
        } elseif (!Storage::exists($url)) {
            return asset('img/' . $default);
        } else {
            return asset('storage/photos/' . str_replace('public/photos/', '', $url));
        }
    }


    public static function formatRupiah($price)
    {
        return 'Rp. ' . number_format($price, 0, ',', '.');
    }
}
