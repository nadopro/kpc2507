<!-- init.php -->
<div class="row">
  <div class="col p-0"><!-- 여백 제거용 -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

      <!-- 인디케이터(점) --------------------------------------------------->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
      </div>

      <!-- 슬라이드 이미지 --------------------------------------------------->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/la.jpg" class="d-block w-100" alt="Los Angeles">
          <!-- 필요 없으면 caption 부분 삭제 -->
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-25 rounded-3 p-2">
            <h5>Los Angeles</h5>
            <p>LA skyline at dusk</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="img/chicago.jpg" class="d-block w-100" alt="Chicago">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-25 rounded-3 p-2">
            <h5>Chicago</h5>
            <p>The Windy City</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="img/ny.jpg" class="d-block w-100" alt="New York">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-25 rounded-3 p-2">
            <h5>New York</h5>
            <p>NYC lights at night</p>
          </div>
        </div>
      </div>

      <!-- 이전/다음 화살표 --------------------------------------------------->
      <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div><!-- /.carousel -->
  </div><!-- /.col -->
</div><!-- /.row -->
