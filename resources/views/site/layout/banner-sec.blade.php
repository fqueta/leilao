<style>
    #banner-sec:after{
        content: "";
        position: absolute;
        left: 50%;
        top: 0;
        width: 100%;
        height: 35%;
        background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), url("{{App\Qlib\Qlib::get_thumbnail_link(@$post_id)}}") center top no-repeat;
        z-index: 0;
        border-radius: 0 0 50% 50%;
        transform: translateX(-50%) rotate(0deg);
    }
</style>
<section id="banner-sec" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
