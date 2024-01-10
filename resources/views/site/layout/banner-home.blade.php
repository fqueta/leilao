<style>
    .main-banner{
        background-image: url('{{App\Qlib\Qlib::get_thumbnail_link(@$post_id)}}');
    }
</style>
<section class="main-banner" style="">
    <div class="main-banner-content container">
        <div class="row pt-5">
            <div class="col-12 col-lg-4 py-5 text-center text-lg-start">
                <h2>Bem vindo!</h2>
                <p>
                    {!!$dados['post_excerpt']!!}
                </p>
            </div>
        </div>
    </div>
    <div class="main-banner-overlay"></div>
</section>
 <!-- Info cards -->
 <section class="info-cards mb-5">
    <div class="container">
        <div class="info-cards-content theme-bg-primary rounded">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="info-card">
                        <i class="fa-solid fa-lock"></i>
                        <h4>Segurança</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu ornare risus. Phasellus sed dolor mi. Donec laoreet convallis diam sed luctus.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 middle-card">
                    <div class="info-card">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <h4>Economia</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu ornare risus. Phasellus sed dolor mi. Donec laoreet convallis diam sed luctus.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="info-card">
                        <i class="fa-solid fa-scale-balanced"></i>
                        <h4>Transparência</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu ornare risus. Phasellus sed dolor mi. Donec laoreet convallis diam sed luctus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
