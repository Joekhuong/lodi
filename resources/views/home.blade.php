@extends('layouts.app')

@section('content')
<div class="container container-homepage">
    <div class="row justify-content-center col-md-12">

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">My Idols</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
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
