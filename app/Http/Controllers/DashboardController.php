<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\InvCard;
use App\Models\Tanah;
use App\Models\Office;
use App\Models\Kendaraan;
use App\Models\Project;
use App\Models\Proyek;
use Illuminate\Http\Request;

class   DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tanah' => self::totalAssetTanah(),
            'kendaraan' => self::totalAssetKendaraan(),
            'build' => self::totalAssetBuild(),
            'office' => self::totalAssetOffice(),
            'proyek' => self::totalAssetProject(),
            'invcard' => self::totalAssetInvCard(),
            'all' => self::totalAssetAll()
        ];
        return view('dashboard', compact('data'));
    }

    protected function totalAssetTanah()
    {
        $count = Tanah::count();
        return $count;
    }

    protected function totalAssetKendaraan()
    {
        $count = Kendaraan::count();
        return $count;
    }

    protected function totalAssetBuild()
    {
        $count = Build::count();
        return $count;
    }

    protected function totalAssetOffice()
    {
        $count = Office::count();
        return $count;
    }

    protected function totalAssetProject()
    {
        $count = Proyek::count();
        return $count;
    }

    protected function totalAssetInvCard()
    {
        $count = InvCard::count();
        return $count;
    }

    protected function totalAssetAll()
    {
        return self::totalAssetTanah() + self::totalAssetKendaraan() + self::totalAssetBuild() + self::totalAssetOffice() + self::totalAssetProject() + self::totalAssetInvCard();
    }
}
