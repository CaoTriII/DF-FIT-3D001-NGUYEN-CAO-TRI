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
                        <h3 class="title" style="margin-bottom: 40px;padding-top:20px">TOTAL ORDERS LIST</h3>

                           <div class="table-form table-responsive">
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
                               <table id="example1" class="table table-bordered table-striped">
                                   <thead>
                                   <tr>
                                       <th scope="col">Hotel Name</th>
                                       <th scope="col">Booking day</th>
                                       <th scope="col">Check_in day</th>
                                       <th scope="col">Check_out day</th>
                                       <th scope="col">Cost</th>
                                       <th scope="col">Quantity</th>
                                       <th scope="col">Total Cost</th>
                                       <th scope="col">Committion</th>
                                   </tr>
                                   </thead>
                                   <tbody id="table_id">
                                    @foreach ($ordersByHotel as $hotelId => $hotel)
                                        @foreach ($hotel['orders'] as $item)
                                            <tr>
                                                <td scope="row">{{ $item->name }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->check_in }}</td>
                                                <td>{{ $item->check_out }}</td>
                                                <td>{{ number_format($item->price) }} VND</td>
                                                <td>{{$item->quantity}} Room</td>
                                                <td>{{ number_format(($item->price * $item->quantity) *5/100 +($item->price * $item->quantity))}} VND</td>
                                                <td>{{number_format(($item->price * $item->quantity) *5/100)}} VND</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                               </table>
                               <div class='pagination-container' >
                                <nav>
                                    <ul class="pagination">
                                        <li data-page="prev" >
                                            <span>  <span class="sr-only"></span></span>
                                        </li>
                                                    <!--	Here the JS Function Will Add the Rows -->
                                        <li data-page="next" id="prev">
                                            <span>  <span class="sr-only"></span></span>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                           </div>
                       </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->

            <div class="border-top mt-5"></div>

        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->







</div><!-- end dashboard-content-wrap -->
@endsection
