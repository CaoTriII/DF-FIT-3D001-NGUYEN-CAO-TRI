

$(document).ready(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var debounce = (func, delay) => {
    let debounceTimer
    return function() {
        const context = this
        const args = arguments
            clearTimeout(debounceTimer)
                debounceTimer
            = setTimeout(() => func.apply(context, args), delay)
    }
}
$("input[name='search']").keyup(debounce(function (e) {
    var search = $(this).val();

    var url = $(this).data("url");

    $.ajax({
        type: "POST",
        url: url,
        data: {dataSearch: search},
        dataType: "json",
        success: function (response) {
            var xhtml = "";
            response.result.map(value=>{
                xhtml+="<li>" +value.name+ "</li>";
            })
            $("#contentSearch").html(xhtml);
        }
    });
    },250));


    $("select[name='rating'],select[name='district']").change(function() {
        var rating = $("select[name='rating']").val();
        var district = $("select[name='district']").val();
        var url = $("input[name='url']").data("url")

        $.ajax({
            type: "POST",
            url: url,
            data: {rating: rating, district: district},
            dataType: "json",
            success: function (response) {


                $("#table_id").html("");
                response.result.map(value => {
                    $("#table_id").append(`
                    <div class="card-item card-item-list item" >
                        <div class="card-img">
                            <a href="/client/hotel/hotel-detail/${value.id}" class="d-block">
                                <img src="/uploads/${value.image}" alt="hotel-img">
                            </a>
                            <span class="badge" >${value.star_number} Star</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="/client/hotel/hotel-detail/${value.id}" >${value.name} Hotel</a></h3>
                            <p class="card-meta">${value.address}</p>

                            <div class="card-price d-flex align-items-center justify-content-between">

                                <a href="/client/hotel/hotel-detail/${value.id}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    `)
                });
            }
        });
    });
    var today = new Date().toISOString().split('T')[0];
    $('#checkin, #checkout').attr('min', today);

    $('#checkin').on('change', function () {
        var checkinDate = $(this).val();

        if (checkinDate < today) {
            $(this).val(today);
            checkinDate = today;
        }

        $('#checkout').attr('min', checkinDate);
    });

    $('#checkout').on('change', function () {
        var checkoutDate = $(this).val();
        var checkinDate = $('#checkin').val();

        if (checkoutDate <= checkinDate || checkoutDate < today) {
            $(this).val('');
        }
    });
// Bỏ sự kiện change cho rating
$(document).ready(function () {

    var isSearchClicked = false;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var debounce = (func, delay) => {
        let debounceTimer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        }
    }


    $("input[name='search']").keyup(debounce(function (e) {
        isSearchClicked = false;
    }, 250));


    $("#search").click(function (e) {
        e.preventDefault();
        isSearchClicked = true;
        checkAndDisplayResults();
    });


    $("input[name='adult_number']").change(function (e) {
        e.preventDefault();


        var adultNumber = parseInt($(this).val());


        var roomNumber = Math.ceil(adultNumber / 2);


        $("input[name='room_number']").val(roomNumber);


        checkAndDisplayResults();
    });

    $("select[name='districts'], input[name='checkin'], input[name='checkout'], input[name='adult_number'], input[name='room_number']").change(function () {

        if (isSearchClicked) {
            checkAndDisplayResults();
        }
    });

    function checkAndDisplayResults() {
        var url = $("#search").data("url");
        var district = $("select[name='districts']").val();
        var checkinDate = $("input[name='checkin']").val();
        var checkoutDate = $("input[name='checkout']").val();
        var adultNumber = $("input[name='adult_number']").val();
        var roomNumber = Math.ceil(adultNumber / 2);

        $.ajax({
            type: "POST",
            url: url,
            data: {
                district: district,
                checkinDate: checkinDate,
                checkoutDate: checkoutDate,
                adult_number: adultNumber,
                room_number: roomNumber
            },
            dataType: "json",
            success: function (response) {
                $("#table_id").html("");
                if (response.status === 'error') {
                    $("#table_id").append('<p id="error">Room Unavailable</p>');
                    $("#error").css('width','100%');
                } else {
                    response.result.map(value => {
                        $("#table_id").append(`
                        <div class="col-lg-4.5 responsive-column" >
                            <div class="card-item">
                                <div class="card-img">
                                    <a href="/client/hotel/hotel-detail/${value.id}" class="d-block">
                                        <img src="/uploads/${value.image}" alt="hotel-img">
                                    </a>
                                </div>
                                <div class="card-body" >
                                    <h3 class="card-title"><a href="/client/hotel/hotel-detail/${value.id}" style="text-decoration:none;color:black">${value.name}</a></h3>
                                    <p class="card-meta" >${value.address}</p>
                                    <a href="/client/hotel/hotel-detail/${value.id}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                    </div>
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-4 -->
                        `)
                    });
                }
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    }
});





});

