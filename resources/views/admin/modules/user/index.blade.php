@extends('admin.master')

@section('module','Hotel')
@section('action','Users')

@push('handlejs')
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this Room?')
    }
</script>
@endpush
@section('content')

<div class="card form-content2">
    <div   div class="form-content1">
        <h3 class="card-title p-3">User List</h3>
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
        <select class  ="form-control" name="state" id="maxRows">
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
    <table  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>email</th>
                <th>Status</th>
                <th>Phone</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table_id">
            @foreach ($users as $item)
                <tr class="item">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->full_name}}</td>
                    <td>
                        @if ($item->level==1)
                        <span class="right badge badge-danger">Admin</span>
                        @elseif ($item->level==2)
                        <span class="right badge badge-dark">Owner</span>
                        @elseif ($item->level==3)
                        <span class="right badge badge-dark">Owner</span>
                        @elseif ($item->level==4)
                        <span class="right badge badge-success">Customer</span>
                        @endif
                    </td>
                    <td>{{$item->email}}</td>
                    <td>@if ($item->status)
                        <span class="right badge badge-success">Show</span>
                        @else
                        <span class="right badge badge-primary">Hidden</span>
                    @endif
                        </td>
                    <td>{{$item->phone}}</td>
                    <td>
                        @if ($item->level == 2)
                        <!-- Hiển thị danh sách khách sạn của người dùng có level 2 -->

                        <a href="{{ route('hotelList', ['user_id' => $item->id]) }}">View Hotels</a>
                        <br>
                            <!-- Hiển thị thông báo nếu không có khách sạn -->


                    @elseif ($item->level == 4)
                        <!-- Hiển thị order list của người dùng có level 4 -->

                        <a href="{{ route('orderList', ['user_id' => $item->id]) }}">View Orders</a>
                        <br>

                            <!-- Hiển thị thông báo nếu không có đơn đặt hàng -->

                    @endif
                    </td>
                    <td><a href="{{route('user.edit',['id'=>$item->id])}}">Edit</a></td>
                    @if ($item->id != 1)
                    <td><a onClick="return confirmDelete ()" href="{{route('user.destroy',['id'=>$item->id])}}">Delete</a></td>

                    @endif

                </tr>
            @endforeach
        </tbody>


      </table>
        <div class='pagination-container' >
            <nav>
                <ul class="pagination">
                    <li data-page="prev" >
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
