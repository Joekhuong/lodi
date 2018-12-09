@extends('layouts.app')

@section('content')

<div class="container container-homepage">
    <div class="row justify-content-center col-md-12">

        <div class="col-md-4">
            <!-- <div class="card mb-3">
                <div class="card-header">Idol infomation</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name : {{$page->idol->name}}</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div> -->

            <div class="d-flex flex-column justify-content-center align-items-center">

                <h2>{{$page->idol->name}}</h2>

                <img class="mb-2" src="{{$page->idol->img_url}}" alt="Icon" height="120" width="120">                

                @php
                    $has_followed = \Auth::user()->hasFollow($page->idol->id);                    
                @endphp

                @if($has_followed == false)
                    <a href="{{ url('/idols/follow/' . $page->idol->id)}}" title="Follow Idol"><button class="btn btn-info btn-sm" ><i class="fas fa-heart" aria-hidden="true"></i> Follow</button></a>
                @else
                <a href="{{ url('/idols/unfollow/' . $page->idol->id)}}" title="Unfollow Idol"><button class="btn btn-info btn-sm" ><i class="far fa-heart" aria-hidden="true"></i> Unfollow</button></a>
                @endif
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
