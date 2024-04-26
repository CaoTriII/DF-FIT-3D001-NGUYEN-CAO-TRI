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
                            <h2 class="sec__title text-white ">Payment Method </h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<section class="booking-area padding-top-100px" style="text-align: center">
        <form action="{{route('client.vn_payment')}}" method="POST">
            @csrf
            <div class="btn-box">
                <h2 class="sec__title text-black ">Payment Method Select</h2>
             @php
            $cartCollection = Cart::getContent();
            @endphp
                @foreach ($cartCollection as $item)
                @php
                $total = (($item->price * $item->quantity)*5/100)+($item->price * $item->quantity);
                @endphp
                    <input type="hidden" name="total_vnpay" value="{{ $total }}">
                @endforeach
                <button  name="redirect" class="theme-btn" type="submit">Confirm Booking</button>
            </div>
    </form>
</section><!-- end booking-area -->


@endsection
