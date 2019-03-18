<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillboardChartController extends Controller
{
    public function index()
    {
        return view('billboardcharts.index');
    }

    public function showChart()
    {
        return view('billboardcharts.showchart');
    }
}
