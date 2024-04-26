<div class="col-lg-5 responsive-column" >
    <div class="card-item" style="max-width:400px">
        <div class="card-img">
            <a href="/client/hotel/hotel-detail/${value.id}" class="d-block">
                <img src="/uploads/${value.image}" alt="hotel-img">
            </a>
        </div>
        <div class="card-body" >
            <h3 class="card-title"><a href="/client/hotel/hotel-detail/${value.id}">${value.name}</a></h3>
            <p class="card-meta">${value.address}</p>
            <a href="/client/hotel/hotel-detail/${value.id}" class="btn-text">See details<i class="la la-angle-right"></i></a>
        </div>
    </div><!-- end card-item -->
</div><!-- end col-lg-4 -->
