@extends('admin.master')
@push('handlejs')
<script type="text/javascript">
var ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
    var monthlyRevenue = {!! json_encode($monthlyRevenue) !!};
    var labels = Object.keys(monthlyRevenue);
    var data = Object.values(monthlyRevenue);

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Monthly Revenue',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var chartData = @json($chartData);

var hotelNames = chartData.map(function(item) {
    return item.hotel;
});
var revenues = chartData.map(function(item) {
    return item.revenue;
});

var ctx = document.getElementById('revenueChart').getContext('2d');
var revenueChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: hotelNames, // Sử dụng tên khách sạn làm nhãn cho cột dọc
        datasets: [{
            label: 'Revenue',
            data: revenues, // Sử dụng doanh số là giá trị cho cột ngang
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Revenue'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Hotel'
                }
            }
        }
    }
});
var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();

    // Format ngày hiện tại
    var formattedDate = day + '/' + month + '/' + year;

    // Hiển thị ngày hiện tại vào thẻ <span> có id là 'currentDate'
    document.getElementById('currentDate').textContent = formattedDate;
  </script>
@endpush
@section('content')
<section class="dashboard-area">
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard-bread-2">
            <h3 class="card-title p-3" style="color: white">DashBoard</h3>

        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mt-4">
                            <div class="col-lg-3 responsive-column-l ">
                                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0" style="background-color: rgb(188, 184, 184)">
                                    <div class="d-flex pb-3 justify-content-between">
                                        <div class="info-content">
                                            <p class="info__desc" style="color: black">Total Booking </p>
                                            <h4 class="info__title">
                                            {{$totalOrderCount}}
                                            </h4>
                                        </div><!-- end info-content -->
                                        <div class="info-icon icon-element " style="background-color: rgb(188, 184, 184);color:black">
                                            <i class="la la-shopping-cart"></i>
                                        </div><!-- end info-icon-->
                                    </div>
                                    <div class="section-block"></div>
                                    <a href="{{route('dashboardBooking')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>

                                </div>
                            </div><!-- end col-lg-3 -->
                            <div class="col-lg-3 responsive-column-l">
                                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0" style="background-color: rgb(188, 184, 184)">
                                    <div class="d-flex pb-3 justify-content-between">
                                        <div class="info-content">
                                            <p class="info__desc" style="color: black">To Day Check-in Hotel </p>
                                            <h4 class="info__title">

                                            </h4>
                                        </div><!-- end info-content -->
                                        <div class="info-icon icon-element" style="background-color: rgb(188, 184, 184);color:black">
                                            <i class="la la-calendar"></i>
                                        </div><!-- end info-icon-->
                                    </div>
                                    <div class="section-block"></div>
                                    <a href="{{route('showCheckInStatus')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                                </div>
                            </div><!-- end col-lg-3 -->
                            @if (Auth::user()->level == 1 || Auth::user()->level == 3)

                                <div class="col-lg-3 responsive-column-l">
                                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0" style="background-color: rgb(188, 184, 184);height:83%">
                                        <div class="d-flex pb-3 justify-content-between">
                                            <div class="info-content">
                                                <p class="info__desc" style="color: black">Committion </p>
                                                <h4 class="info__title">
                                                    @php
                                                    $totalPrice = 0;
                                                    $totalAmount = 0;
                                                @endphp
                                                    @foreach ($ordersByHotel as $hotelId => $hotel)
                                                        @foreach ($hotel['orders'] as $item)

                                                            @php
                                                                $totalAmount += (($item->price * $item->quantity) * 5 / 100) + $item->price;
                                                                $totalPrice += (($item->price * $item->quantity) * 5 / 100);
                                                            @endphp

                                                        @endforeach
                                                    @endforeach
                                                <tr>
                                                    <td >{{ number_format($totalPrice) }}VND</td>
                                                </tr>
                                                </h4>
                                            </div><!-- end info-content -->
                                            <div class="section-block"></div>
                                            <div class="info-icon icon-element" style="background-color: rgb(188, 184, 184);color:black">
                                                <i class="la la-calculator"></i>
                                            </div><!-- end info-icon-->

                                    </div>
                                </div><!-- end col-lg-3 -->
                            @else
                            <div class="col-lg-3 responsive-column-l">
                                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0 " style="background-color: rgb(188, 184, 184)">
                                    <div class="d-flex pb-3 justify-content-between">
                                        <div class="info-content">
                                            <p class="info__desc" style="color: black">Total Revenue</p>
                                            <h4 class="info__title">
                                                @php
                                                $totalPrice = 0;
                                                $totalAmount = 0;
                                            @endphp
                                            @foreach ($ordersByHotel as $hotelId => $hotel)
                                                @foreach ($hotel['orders'] as $item)
                                                    @php
                                                        $totalAmount += (($item->price * $item->quantity) * 5 / 100) + $item->price;
                                                        $totalPrice += (($item->price * $item->quantity) * 5 / 100) + ($item->price * $item->quantity);
                                                    @endphp
                                                @endforeach
                                            @endforeach
                                            <tr>
                                                <td>{{ number_format($totalPrice) }}VND</td>
                                            </tr>

                                            </h4>
                                        </div><!-- end info-content -->
                                        <div class="info-icon icon-element" style="background-color: rgb(188, 184, 184);color:black">
                                            <i class="la la-calculator"></i>
                                        </div><!-- end info-icon-->
                                    </div>
                                    <div class="section-block"></div>
                                    <a href="{{route('showCheckedStatus')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>

                                </div>
                                </div>
                            </div><!-- end col-lg-3 -->
                            @endif
                        </div><!-- end row -->
                    </div><!-- end col-lg-12 -->
                    <div class="container">
                        <h1 class="info__desc" style="color: black">Monthly Revenue</h1>

                        <canvas id="monthlyRevenueChart" width="800" height="400"></canvas>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <h1 class="info__desc" style="color: black">Daily Revenue: </h1><span id="currentDate"></span>

                                    <div class="card-body">
                                        <canvas id="revenueChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="border-top mt-4"></div>
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
@endsection
