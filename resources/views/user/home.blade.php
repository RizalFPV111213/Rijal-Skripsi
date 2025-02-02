@extends('layouts.user')

@section('header')
    <style>
        .full-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 180px;
        }
        #hero{
            background: url('{{asset('user/images/hero-bg.jpg')}}') top center;
        }
        .image-center{
          display: block;
          margin-left: 6.5px;
          margin-right: 6.5px;
          width: 100%;
        } 
        .portfolio-box {
            margin-bottom: 30px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .portfolio-image {
            position: relative;
            width: 100%;
            padding-bottom: 100%; /* Ini membuat rasio 1:1 */
            overflow: hidden;
        }

        .portfolio-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Memastikan gambar menutupi area dengan baik */
            transition: transform 0.3s ease;
        }

        .portfolio-info {
            padding: 15px;
            text-align: left;
        }

        .portfolio-info h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .portfolio-info p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        /* Hover Effect */
        .portfolio-box:hover .portfolio-image img {
            transform: scale(1.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .portfolio-box {
                margin-bottom: 20px;
            }
        }
    </style>    
@endsection

@section('hero')
    <h1>Welcome to Digita.id</h1>
    <h2>Kami adalah agen Jasa Foto dan Video beserta Drone di area Bekasi</h2>
    <a href="#about" class="btn-get-started">Get Started</a>
@endsection


@section('content')

      <!--========================== About Us Section ============================-->
      <section id="about">
        <div class="container">
          <div class="row about-container">
  
            <div class="col-lg-7 content order-lg-1 order-2">
              <h2 class="title">Tentang Kami</h2>
              <p> {!!$about[0]->caption!!}</p>
              <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{url('about')}}">Readme</a>
              </div>
            </div>
  
            <div class="col-lg-5 background order-lg-2 order-1 wow fadeInRight" 
                style="background: url('{{asset('about_image/'.$about[0]->image)}}') center top no-repeat; background-size: cover;"></div>
          </div>
  
        </div>
      </section>
  
      <!--========================== Services Section ============================-->
      <section id="services">
        <div class="container wow fadeIn">
          <div class="section-header">
            <h3 class="section-title">Mengapa Memilih Kami?</h3>
            <p class="section-description"></p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
              <div class="box">
                <div class="icon"><i class="fa fa-shield"></i></div>
                <h4 class="title">Hasil Berkualitas</h4>
                <p class="description"></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
              <div class="box">
                <div class="icon"><i class="fa fa-money"></i></div>
                <h4 class="title">Harga Ekonomis</h4>
                <p class="description"></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
              <div class="box">
                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                <h4 class="title">Kenyamanan client</h4>
                <p class="description"></p>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- #services -->
  
      <!--========================== Call To Action Section ============================-->
      <section id="call-to-action">
        <div class="container wow fadeIn">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">Jadilah Client Kami Dan Dapatkan Hasil Terbaik</h3>
              <p class="cta-text"></p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="{{url('contact')}}">Contact</a>
            </div>
          </div>
  
        </div>
      </section>
  
      <!--========================== category Section ============================-->
      <section id="category">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Articels</h3>
            <p class="section-description"></p>
          </div>
          <div class="row">
  
          <div class="row" id="category-wrapper">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12 category-item filter-app" >
                      <a href="">
                        <img src="{{asset('category_image/'.$category->image)}}" class="image-center">
                        <div class="details">
                          <h4>{{$category->name}}</h4>
                          <span>{{$category->description}}</span>
                        </div>
                      </a>
                </div>
            @endforeach  
          </div>
  
        </div>
      </section>
  
      <!--========================== Gallery Section ============================-->
      <section id="gallery" class="gallery-section">
        <div class="container wow fadeInUp">
            <div class="section-header text-center mb-5">
                <h3 class="section-title">PORTFOLIO KAMI</h3>
                <div class="divider mx-auto"></div>
            </div>
            <div class="container wow fadeInUp">
              <div class="row justify-content-center">
                  @forelse ($portfolios as $portfolio)
                      <div class="col-lg-4 col-md-6 mb-4">
                          <div class="portfolio-box">
                              <div class="portfolio-image">
                                  <img src="{{ url($portfolio->image) }}" 
                                       alt="{{ $portfolio->title }}">
                              </div>
                              <div class="portfolio-info">
                                  <h4>{{ $portfolio->title }}</h4>
                              </div>
                          </div>
                      </div>
                  @empty
                      <div class="col-12 text-center">
                          <p>Belum ada portfolio yang ditampilkan</p>
                      </div>
                  @endforelse
              </div>
            </div>
        </div>
      </section>
@endsection