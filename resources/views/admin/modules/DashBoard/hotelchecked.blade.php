@extends('admin.master')
@section('content')
<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Orders</h2>

                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="index.html" class="text-white">Home</a></li>
                            <li>Dashboard</li>
                            <li>Orders</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
     
                       <div class="form-content2">
                        <h3 class="title" style="margin-bottom: 40px">TOTAL CHECKED LIST</h3>

                           <div class="table-form table-responsive">
                               <table class="table">
                                   <thead>
                                   <tr>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Hotel Booked</th>
                                        <th scope="col">Room Booked</th>
                                       <th scope="col">Booked day</th>
                                       <th scope="col">Check_in</th>
                                       <th scope="col">Check_out</th>
                                       <th scope="col">Cost</th>
                                       <th scope="col">Quantity</th>
                                       <th scope="col">Total Cost</th>
                                       <th scope="col">Check-in status</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                    @foreach ($todayArrivals as $item)
                                            @if ($item->booking->status == 2)
                                                <tr>
                                                    <td scope="row">{{ $item->booking->fullname }}</td>
                                                    <td scope="row">{{ $item->room->hotel->name }}</td>
                                                    <td scope="row">{{ $item->room->name }}</td>                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->check_in }}</td>
                                                    <td>{{ $item->check_out }}</td>
                                                    <td>{{ number_format($item->price) }} VND</td>
                                                    <td>{{$item->quantity}} Room</td>
                                                    <td>{{ number_format((($item->price * $item->quantity)*5/100)+($item->price * $item->quantity)) }} VND</td>
                                                    <td>Checked</td>
                                                </tr>
                                            @endif
                                    @endforeach
                                </tbody>
                               </table>
                           </div>
                       </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-nav" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="border-top mt-5"></div>

        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
</div><!-- end dashboard-content-wrap -->
@endsection
