<?php

/** @var yii\web\View $this */

$this->title = 'Главная';
?>
<div class="site-index d-flex flex-column align-items-center">
<h1 class="text-center">Наша работа - делает вашу жизнь счастливее!</h1>
<div id="carouselExample" class="carousel slide mt-5 w-75">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/web/uploads/img1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/web/uploads/img2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/web/uploads/img3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>  
</div>
