<link href="{{asset('css/hieuung/carousel.css')}}" rel="stylesheet">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="{{asset('img/img_ad/ad1.jpg')}}" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Giày đẹp mỗi ngày</h1>
              <p>Đến với Shop hàng ngày bạn có cơ hội nhận giày ADIDAS</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="{{asset('img/img_ad/ad2.jpg')}}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Giảm giá 50%</h1>
              <p>Từ ngày 30/02 đến 31/03 Shop giảm giá 20% cho các đơn hàng trên 1 triệu đồng</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="{{asset('img/img_ad/ad3.jpg')}}" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Thực sự khác biệt với NIKE FREE RNid  2017</h1>
              <p>Cảmm giác êm chân, thực sự nam tính và pha thêm một chút khác biệt</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Xem thêm</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>