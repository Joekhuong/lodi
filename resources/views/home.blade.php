@extends('layouts.app')

@section('content')
<div class="container container-homepage">
    <div class="row justify-content-center col-md-12">

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">My Idols</div>

                @php
                $follows = \Auth::user()->getFollowedIdols();
                @endphp

                <div class="card-body">
                    @if(empty($follows))
                        <h2>You have not following any idol</h2>
                    @else
                    <ul class="list-group">
                        @foreach(\Auth::user()->getFollowedIdols() as $follow)
                        
                        @php
                        $count = \App\Idol::countTotalFollowers($follow['idol_id']);
                        @endphp

                        <li class="list-group-item">
                            <a href="{{ url('/pages/' . $follow['key']) }}" title="Idol page">
                                {{$follow['name']}}
                            </a>
                            {{" ($count)"}}
                        </li>

                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-7">

            <div class="card mb-3">

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="How are you today ?"
                                rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary text-white">Ly Quoc Phong</div>

                <div class="card-body">Justin ABCD
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary text-white">Ly Quoc Phong</div>

                <div class="card-body">Justin ABCD
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
