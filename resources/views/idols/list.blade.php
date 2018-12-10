@if(empty($idols) == false)
@include('layouts.datatable')
@php
    $show_panel = $show_panel ?? true;
@endphp
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Img Url</th>
                <th>Date of Birth</th>
                <th></th>
                @if($show_panel)                
                    <th>Actions</th>
                @endif
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
                    <a href="{{ url('/pages/' . $item->page->key) }}" title="Idol page"><button class="btn btn-info btn-sm"><i
                                class="fa fa-eye" aria-hidden="true"></i> Go to page</button></a>
                </td>
                @if($show_panel)                
                <td>
                    <a href="{{ url('/admin/idols/' . $item->id) }}" title="View Idol"><button class="btn btn-info btn-sm"><i
                                class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/admin/idols/' . $item->id . '/edit') }}" title="Edit Idol"><button class="btn btn-primary btn-sm"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/idols' . '/' . $item->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Idol" onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                </td>
                @endif                
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@else
<h1>Please search again, can not found any idol</h1>
@endif

