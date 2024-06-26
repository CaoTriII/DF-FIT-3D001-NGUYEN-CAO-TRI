@extends('admin.master')

@section('module','Room')
@section('action','List')
@push('handlejs')
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this Room?')
    }
</script>
@endpush

@section('content')
<!-- Default box -->
<div class="card form-content2">


    <div   div class="form-content1">

        <h3 class="card-title p-3">Room List</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
<div class="card-body">

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Content</th>
                <th>image</th>
                <th>status</th>
                <th>Quantity status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table_id">
            @foreach ($room as $item)
                <tr class="item">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td> {{number_format($item->price). ' VND'}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->content}}</td>
                    <td><img src="{{asset('uploads/'.$item->image)}}" width="100px"></td>
                    <td>
                        @if ($item->status==1)
                            <span class="right badge badge-success">Show</span>
                        @else()
                        <span class="right badge badge-primary">hidden</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->room_quantity_status==1)
                            <span class="right badge badge-success">Available</span>
                        @else()
                        <span class="right badge badge-primary">Unavailable</span>
                        @endif
                    </td>
                    <td><a href="{{route('admin.room.edit',['id'=>$item->id]) }}">Edit</a></td>
                    <td><a  onClick="return confirmDelete ()" href="{{route('admin.room.destroy',['id'=>$item->id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>

      </table>

    </div>
</div>
<!-- /.card -->


@endsection
