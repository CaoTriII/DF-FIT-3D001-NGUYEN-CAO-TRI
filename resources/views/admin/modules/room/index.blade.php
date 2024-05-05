@extends('admin.master')

@section('module', 'Room')
@section('action', 'List')
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
        <div class="form-content1">
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
            <div class="form-group" style="display: none">
                <select class="form-control" name="state" id="maxRows">
                    <option value="5000">show all rows</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                </select>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Quantity Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Restore</th>
                    </tr>
                </thead>
                <tbody id="table_id">
                    @foreach ($room as $item)
                        <tr class="{{ $item->deleted_at ? 'soft-deleted-row' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) . ' VND' }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->content }}</td>
                            <td><img src="{{ asset('uploads/' . $item->image) }}" width="100px"></td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="right badge badge-success">Show</span>
                                @else
                                    <span class="right badge badge-primary">Hidden</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->room_quantity_status == 1)
                                    <span class="right badge badge-success">Available</span>
                                @else
                                    <span class="right badge badge-primary">Unavailable</span>
                                @endif
                            </td>
                            <td><a href="{{ route('admin.room.edit', ['id' => $item->id]) }}">Edit</a></td>
                            @if ($room->deleted_at)
                                <td>
                                    <form action="{{ route('admin.room.restore', ['id' => $room->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Restore</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a onClick="return confirmDelete()" href="{{route('admin.room.destroy',['id'=>$room->id])}}">Delete</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class='pagination-container'>
                <nav>
                    <ul class="pagination">
                        <li data-page="prev">
                            <span> < <span class="sr-only"></span></span>
                        </li>
                        <!--	Here the JS Function Will Add the Rows -->
                        <li data-page="next" id="prev">
                            <span> > <span class="sr-only"></span></span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- /.card -->


@endsection
