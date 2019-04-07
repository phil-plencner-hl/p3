<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Support\Str;

class BillboardChartController extends Controller
{
    public function index(Request $request)
    {
        $numResults = $request->session()->get('numResults', '');
        $year = $request->session()->get('year', '');
        $chart = $request->session()->get('chart', '');
        $albumList = $request->session()->get('albumList', '');

        return view('billboardcharts.index')->with([
            'numResults' => $numResults,
            'year' => $year,
            'chart' => $chart,
            'albumList' => $albumList,
        ]);
    }

    public function chartProcess(Request $request)
    {
        $request->validate([
            'numResults' => 'bail|required|integer|min:1|max:10',
            'year' => 'required',
            'chart' => 'required',
        ]);

        # Start with an empty array of search results; books that
        # match our search query will get added to this array
        $albumList = [];

        $numResults = $request->input('numResults', null);
        $year = $request->input('year', null);
        $chart = $request->input('chart', null);

        # Only try and search *if* there's all the fields are filled out.
        if ($numResults && $year && $chart) {
            # Open the charts.json data file
            $chartsRawData = file_get_contents(database_path('/charts.json'));

            # Decode the charts JSON data into an array
            $albums = json_decode($chartsRawData, true);

            $albumList = $this->getByYearAndChart($albums, $year, $chart);

            # Only show the number of results selected
            $albumList = array_slice($albumList, 0, $numResults, true);
        }

        return redirect('/')->with([
            'numResults' => $numResults,
            'year' => $year,
            'chart' => $chart,
            'albumList' => $albumList,
        ]);
    }

    public function getByYear(Array $albums, Int $year)
    {
        $results = [];

        # Filter album list according to year
        foreach ($albums as $key => $album) {
            $match = $year == $album['year'];
            if ($match) {
                $results[$album['position'] . '-' . $album['title']] = $album;
            }
        }

        return $results;
    }

    public function getByChart(Array $albums, String $chart)
    {
        $results = [];

        # Filter album list according to Billboard chart
        foreach ($albums as $key => $album) {
            $match = $chart == $album['chart'];
            if ($match) {
                $results[$album['position'] . '-' . $album['title']] = $album;
            }
        }

        return $results;
    }

    public function getByYearAndChart(Array $albums, Int $year, String $chart)
    {
        $results = [];

        $yearAlbums = $this->getByYear($albums, $year);
        $chartAlbums = $this->getByChart($albums, $chart);
        $mergedAlbums = array_intersect_key($yearAlbums, $chartAlbums);

        // Sort by Position
        foreach ($mergedAlbums as $key => $album) {
            $results[$album['position']] = $mergedAlbums[$key];
        }
        ksort($results);

        return $results;
    }
}
