@extends('client.master')
@section('content')
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Checkout Complete</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<section class="payment-area section-bg section-padding">
    <div class="container">
        <div class="row">
            <div class="form-content3">
                <div class="payment-received-list">
                    <div class="d-flex align-items-center">
                        <i class="la la-check icon-element flex-shrink-0 mr-3 ml-0"></i>
                        <div>
                            <h3 class="title pb-1" style="font-size: 50px">Thanks for your Booking!</h3>
                        </div>
                    </div>
                    <ul class="list-items py-4">
                        <li><i class="la la-check text-success mr-2"></i>Your <strong class="text-black">Order</strong>code is: {{ $booking->order_code }}</li>
                        <p></p>
                        <a><i class="la la-check text-success mr-2"></i>Come and show your Booking to Hotel to taking room </a>
                    </ul>
                    <div class="btn-box pb-4">
                    </div>

                    <div class="btn-box">
                        <a href="{{route('client.index')}}" class="theme-btn border-0 text-white bg-7">Return to Home</a>
                    </div>
                </div><!-- end card-item -->

            </div>
        </div>
    </div>
</section>
@endsection
