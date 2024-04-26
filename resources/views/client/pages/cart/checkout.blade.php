@extends('client.master')
@push('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('input[name="quantity"]').change(function(){
                var quantity = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: '{{route('client.updatebooking') }}',
                    data: {'id':id, 'quantity':quantity},
                    dataType: "json",
                    success: function (response) {
                        if(response.status==200){
                            window.location.reload();
                        }
                    }
                });
            })
        });
    </script>
@endpush
@section('content')
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Checkout</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<section class="booking-area padding-top-100px padding-bottom-70px">
    <form action="{{route('client.checkoutPost')}}" method="POST">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Booking Submission</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content3 ">
                        <div class="contact-form-action">
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">First Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="fullname" placeholder="First name" value="{{Auth::user()->full_name}}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Your Email</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Email address" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Phone Number</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-12 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Address Line</label>
                                            <div class="form-group">
                                                <span class="la la-map-marked form-icon"></span>
                                                <input class="form-control" type="text" name="address" placeholder="Address line">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div>
                                <div class="card-body ">
                                    <ul class="list-items list-items-2 py-3">
                                        <li><span>Price Total:</span></li>
                                    </ul>
                                    @php
                                    $cartCollection = Cart::getContent();
                                    @endphp
                                    @foreach ($cartCollection as $item)
                                    @php
                                    $total = (($item->price * $item->quantity)*5/100)+($item->price * $item->quantity);

                                    @endphp
                                    <ul class="list-items list-items-2 pt-3">
                                        <li >{{ number_format($total) }}VND</li>
                                    </ul>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                </div><!-- end col-lg-12 -->

                                    <div class="btn-box">
                                        @foreach ($cartCollection as $item)
                                            <input type="hidden" name="total_vnpay" value="{{ $total }}">
                                        @endforeach
                                        <div class="checkout__input__checkbox">
                                            <label for="paypal">
                                                VNPay ATM
                                                <input name="payment_method" type="checkbox" id="paypal" value="vnpay_atm">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="paypal">
                                                VNPay EMV
                                                <input name="payment_method" type="checkbox" id="paypal" value="vnpay_emv">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <p><strong>NOTE: You will not be able to cancel the room after your payment, and you will not be refunded, please consider.</strong></p>
                                        <button  name="redirect" class="theme-btn" type="submit">Confirm Booking</button>
                                    </div>

                            </form>

                        </div><!-- end contact-form-action -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="form-box booking-detail-form">
                    <div class="form-title-wrap">
                        <h3 class="title">Your Booking</h3>
                    </div><!-- end form-title-wrap -->
                    <div class="form-content3">
                        <div class="card-item shadow-none radius-none mb-0">
                            @php
                            $cartCollection = Cart::getContent();
                            // dd($cartCollection);
                            @endphp
                            @foreach ($cartCollection as $item)
                            <div class="card-img pb-4">
                                    <img src="{{ asset('uploads/' . $item['attributes']['image']) }}" alt="room-img">
                            </div>
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="card-title">{{$item->name}} </h3>
                                    </div>
                                </div>
                                <div class="section-block"></div>

                                <ul class="list-items list-items-2 list-items-flush py-2">
                                    <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-calendar mr-1 font-size-17"></i>From</span>{{ date("d/m/Y", strtotime($item->attributes->check_in)) }}</li>
                                    <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-calendar mr-1 font-size-17"></i>To</span>{{date("d/m/Y", strtotime($item->attributes->check_out))}}</li>
                                </ul>
                                <h3 class="card-title pb-3">Other Details</h3>
                                <div class="section-block"></div>
                                <ul class="list-items list-items-2 py-3">
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Room</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p style="width: 20px; border:none">{{$item->quantity}}</p>
                                        </div>
                                    </div>
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">People</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p style="width: 20px; border:none">{{$item->attributes->adult_number}}</p>
                                        </div>
                                    </div>
                                </ul>
                                <ul class="list-items list-items-2 py-3">
                                    <li><span>Per Room Price:</span>{{number_format($item->price)}}VND</li>
                                    <li><span>Committion</span>5%</li>
                                    <li><span>Total:</span>{{ number_format((($item->price * $item->quantity)*5/100)+($item->price * $item->quantity)) }} VND</li>
                                </ul>
                            </div>
                            <form method="POST" action="{{ route('client.delete.booking', ['bookingId' => $item->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary" style="color: black">
                                    x
                                </button>
                            </form>

                            @endforeach
                        </div><!-- end card-item -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    </form>
</section><!-- end booking-area -->


@endsection
