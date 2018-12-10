@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('idols.list',['idols' => $idols, 'show_panel' => false])
            </div>
        </div>
    </div>
@endsection
