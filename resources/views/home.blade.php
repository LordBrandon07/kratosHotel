@extends ('layouts.app')
    @section('content')
    

    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/carrusel1.png" class="d-block w-100 fixed-image-size" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/carrusel2.png" class="d-block w-100 fixed-image-size" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/carrusel3.png" class="d-block w-100 fixed-image-size" alt="...">
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

    <section id="about-me" class="about section-padding">
            <div class="container">
                <h2 class="tittle text-center">About</h2>
                <div class="row">
                    <div class="col-sm-2 col-md-12 col-lg-6">
                        <img class="my-photo index-img" src="img/index1.png" alt="">
                    </div>
                    <div class="col-sm-8 col-md-12 col-lg-6">
                        <p>Sumérgete en una experiencia única en el Kratos Hotel, un oasis de elegancia y sofisticación en el corazón de la ciudad. Con una ubicación privilegiada y un servicio de primera clase, nuestro hotel es el destino perfecto para viajeros exigentes que buscan una estancia inolvidable.

                        Desde el momento en que llegas, serás recibido por nuestro equipo dedicado, cuya misión es garantizar que cada aspecto de tu estadía sea impecable. Nuestras instalaciones de primera categoría ofrecen un ambiente sereno y acogedor, donde podrás relajarte y rejuvenecer.

                        Las habitaciones del Kratos Hotel son un refugio de confort y estilo contemporáneo. Cada una está diseñada con atención al detalle y equipada con comodidades modernas para satisfacer incluso a los huéspedes más exigentes. Desde suites lujosas hasta habitaciones ejecutivas, ofrecemos una variedad de opciones para adaptarnos a tus preferencias y necesidades.

                        Nuestro hotel también cuenta con una exquisita oferta gastronómica que deleitará tu paladar. Disfruta de una experiencia culinaria excepcional en nuestro restaurante de clase mundial, donde talentosos chefs preparan platos innovadores utilizando ingredientes frescos y de la más alta calidad.</p>
                    </div>
                </div>
            </div>
      </section>

        <!-- services -->

        <section id="services" class="section-padding">
            <div class="container text-center">
                <h2 class="tittle">Servicios</h2>
                <div class="row">
                    <div class="col-lg-4 services-content">
                      <img src="img/carrusel1.png" alt="" class="rounded-circle" width="140">
                      <h2 class="fw-normal">Piscina</h2>
                      <p>Es un oasis de relajación donde puedes disfrutar del sol, refrescarte con un chapuzón y simplemente dejarte llevar por la tranquilidad del agua. Con cómodas tumbonas y servicio de bar a tu disposición, pasar el día en nuestra piscina es la definición de lujo y bienestar.</p>
                      <!-- <p><a class="btn btn-secondary" href="#">View details »</a></p> -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                      <img src="img/carrusel2.png" alt="" class="rounded-circle" width="140">
                      <h2 class="fw-normal">Bar</h2>
                      <p>Desde cócteles artesanales hasta vinos seleccionados, nuestro bar ofrece una experiencia de bebida incomparable. Relájate con una copa después de un largo día de exploración o socializa con amigos en un ambiente refinado y acogedor.</p>
                      <!-- <p><a class="btn btn-secondary" href="#">View details »</a></p> -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                      <img src="img/carrusel3.png" alt="" class="rounded-circle" width="140">
                      <h2 class="fw-normal">Restaurante</h2>
                      <p>Nuestro equipo de chefs talentosos crea platos excepcionales que combinan sabores frescos y técnicas innovadoras. Ya sea que estés buscando una comida rápida y deliciosa o una cena gourmet, nuestro restaurante te ofrece una experiencia gastronómica que no olvidarás fácilmente.</p>
                      <!-- <p><a class="btn btn-secondary" href="#">View details »</a></p> -->
                    </div><!-- /.col-lg-4 -->
                  </div>
            </div>
            
        </section>


    
    @section('title')
  
    @endsection

  @endsection