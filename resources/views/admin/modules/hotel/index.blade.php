@extends('admin.master')
@push('handlejs')
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this hotel?')
    }


</script>
@endpush
@section('content')
<div class="card form-content2">
<div class="form-content1">
    <h3 class="card-title p-3">Hotel List</h3>
    <div class="form-content1" style="display: flex">
        <form action="{{ route('admin.hotel.index') }}" method="GET">
            <input type="text" name="key" placeholder="Search by hotel name">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>
    <div class="card-tools" >

    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse" >
        <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove" >
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
                <th>service</th>
                <th>Address</th>
                <th>Image</th>
                <th>Star_number</th>
                <th>District</th>
                <th>To Day Order</th>
                <th>Order</th>
                <th>Room</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table_id">
            @foreach ($hotel as $item)
                <tr class="item {{ $item->deleted_at ? 'soft-deleted-row' : '' }}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->service}}</td>
                    <td>{{$item->address}}</td>
                    <td><img src="{{asset('uploads/'.$item->image)}}" width="100px"></td>
                    <td>
                        @if ($item->star_number == 5)
                        <span class="right badge badge-warning">5 star</span>
                        @elseif($item->star_number == 4)
                        <span class="right badge badge-secondary">4 star</span>
                        @elseif($item->star_number == 3)
                        <span class="right badge badge-primary">3 star</span>
                        @elseif($item->star_number == 2)
                        <span class="right badge badge-success">2 star</span>
                        @elseif($item->star_number == 1)
                        <span class="right badge badge-dark" >1 star</span>
                        @endif
                        </td>
                    <td>
                        @if ($item->district_id == 1)
                        <span>District 1</span>
                        @elseif($item->district_id == 2)
                        <span>District 2</span>
                        @elseif($item->district_id == 3)
                        <span>District 3</span>
                        @elseif($item->district_id == 4)
                        <span>District 4</span>
                        @elseif($item->district_id == 5)
                        <span>District 5</span>
                        @elseif($item->district_id == 6)
                        <span>District 6</span>
                        @elseif($item->district_id == 7)
                        <span>District 7</span>
                        @elseif($item->district_id == 8)
                        <span>District 8</span>
                        @elseif($item->district_id == 9)
                        <span>District 9</span>
                        @elseif($item->district_id == 10)
                        <span> 10</span>
                        @elseif($item->district_id == 11)
                        <span>District 11</span>
                        @elseif($item->district_id == 12)
                        <span>District 12</span>
                        @elseif($item->district_id == 13)
                        <span>District Tan Binh</span>
                        @elseif($item->district_id == 14)
                        <span>District Phu Nhuan</span>
                        @elseif($item->district_id == 15)
                        <span>District Tan Phu</span>
                        @elseif($item->district_id == 16)
                        <span>District Go Vap</span>
                        @elseif($item->district_id == 17)
                        <span>District Tan Phu</span>
                        @elseif($item->district_id == 18)
                        <span>District Binh Chanh</span>
                        @elseif($item->district_id == 19)
                        <span>District Cu Chi</span>
                        @elseif($item->district_id == 20)
                        <span>District Binh Thanh</span>
                        @elseif($item->district_id == 21)
                        <span>District Hoc Mon</span>
                        @elseif($item->district_id == 22)
                        <span>District Can Gio</span>
                        @elseif($item->district_id == 23)
                        <span>District Nha Be</span>
                        @elseif($item->district_id == 24)
                        <span>District Thu Duc</span>
                        @endif</td>
                        <td><a href="{{route('todayorderList',['id'=>$item->id])}}">Today order list</a></td>
                    <td><a href="{{route('admin.hotel.showHotelOrders',['id'=>$item->id])}}">Order List</a></td>
                    <td><a href="{{route('admin.hotel.roomdetails',['id'=>$item->id]) }}">Room List</a></td>
                    <td><a href="{{route('admin.hotel.edit',['id'=>$item->id]) }}">Edit</a></td>
                    <td class="{{ $item->deleted_at ? 'soft-deleted' : '' }}">
                        @if ($item->deleted_at)
                            <!-- Nút Restore -->
                            <form action="{{ route('admin.hotel.restore', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Restore</button>
                            </form>
                        @else
                            <!-- Hiển thị thông tin bình thường -->
                            <a onClick="return confirmDelete()" href="{{ route('admin.hotel.destroy', ['id' => $item->id]) }}">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="pagination-container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($hotel->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">« Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $hotel->previousPageUrl() }}">« Previous</a></li>
                @endif

                <!-- Hiển thị các trang được phân -->
                @for ($i = 1; $i <= $hotel->lastPage(); $i++)
                    <li class="page-item {{ ($i === $hotel->currentPage()) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $hotel->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($hotel->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $hotel->nextPageUrl() }}">Next »</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next »</span></li>
                @endif
            </ul>
        </nav>
    </div>





</div>

<!-- /.card -->
@endsection
