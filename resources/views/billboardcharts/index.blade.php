@extends('layouts.master')

@section('title')
    Select A Chart
@endsection

@section('content')

    <p>Select your options below to display a particular Billboard Top Album chart.</p>

    <form method='GET' action='/chart-process'>
        <div class="row">
            <div class="col-sm-4">
                <label class='bold-label'>Type in number of results
                    <small id="numResultsHelp"
                           class="x-small form-text text-muted">Number of results must be between 1 and 10.
                    </small>
                    <input type='text'
                           name='numResults'
                           maxlength="2"
                           size="3"
                           id='numResults'
                           value='{{ old('numResults') ? old('numResults') : $numResults }}'>
                </label>
                @include('includes.error-field', ['fieldName' => 'numResults'])
            </div>
            <div class="col-sm-4">
                <label class='bold-label'>Select Year
                    <select name='year' id='year'>
                        <option value=''>Choose one...</option>
                        <option value='2002' {{ (old('year') == '2002' || $year == '2002') ? 'selected' : '' }}>2002</option>
                        <option value='2003' {{ (old('year') == '2003' || $year == '2003') ? 'selected' : '' }}>2003</option>
                        <option value='2004' {{ (old('year') == '2004' || $year == '2004') ? 'selected' : '' }}>2004</option>
                    </select>
                </label>
                @include('includes.error-field', ['fieldName' => 'year'])
            </div>
            <div class="col-sm-4">
                <fieldset class='radios'>
                    <legend>Select Billboard Chart</legend>
                    <ul id='chart-radios' class='radios'>
                        <li><label><input type='radio'
                                          name='chart'
                                          value='TOP BILLBOARD ALBUMS' {{ ($chart == 'TOP BILLBOARD ALBUMS' || old('chart') == 'TOP BILLBOARD ALBUMS') ? 'checked' : '' }}> Top Billboard Albums</label>
                        <li><label><input type='radio'
                                          name='chart'
                                          value='TOP R & B ALBUMS' {{ ($chart == 'TOP R & B ALBUMS' || old('chart') == 'TOP R & B ALBUMS') ? 'checked' : '' }}> Top R & B Albums</label>
                        <li><label><input type='radio'
                                          name='chart'
                                          value='TOP COUNTRY ALBUMS' {{ ($chart == 'TOP COUNTRY ALBUMS' || old('chart') == 'TOP COUNTRY ALBUMS') ? 'checked' : '' }}> Top Country Albums</label>
                    </ul>
                    @include('includes.error-field', ['fieldName' => 'chart'])
                </fieldset>
            </div>
            <div class="col-sm-12">
                <input type='submit' value='Search' class='btn btn-primary btn-lg'>
            </div>
        </div>
    </form>

    @if($albumList)
        <div class='alert alert-primary' role='alert'>
            You searched for the top {{ $numResults }} of the {{ ucwords(Str::lower($chart)) }} in {{ $year }}.
        </div>
        <div class="albums">
            @foreach($albumList as $key => $album)
                <div class="row album">
                    <div class="col-sm-1 position">{{ $album['position'] }}</div>
                    <div class="col-sm-7">
                        <div class='title'>{{ $album['title'] }}</div>
                        <div class='artist'> by {{ $album['artist'] }}</div>
                        <div class='year'>{{ $album['year'] }}</div>
                    </div>
                    <div class="col-sm-4 album-cover"><img src='{{ $album['cover_url'] }}'
                                                           alt='Cover photo for album {{ $album['position'] }}'></div>
                </div>
            @endforeach
        </div>
    @endif

@endsection