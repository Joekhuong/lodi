@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Idols</div>
                    <div class="card-body">
                        <a href="{{ url('/idols/create') }}" class="btn btn-success btn-sm" title="Add New Idol">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- <form method="GET" action="{{ url('/idols') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->

                        <br/>
                        <br/>
                        @include('layouts.datatable')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Img Url</th><th>Dob</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($idols as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img class="mr-4" src="{{ $item->img_url }}" alt="Icon" height="60" width="60">
                                        </td>
                                        <td>{{ $item->dob }}</td>
                                        <td>
                                            <a href="{{ url('/idols/' . $item->id) }}" title="View Idol"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/idols/' . $item->id . '/edit') }}" title="Edit Idol"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/idols' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Idol" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $idols->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
