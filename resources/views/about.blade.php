@extends("layouts.main")

@section("container")

<section id="manda">
  
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/1.jpg" id="satu" class="d-block w-100" alt="anjay1" style="height: 450px">
        <div class="carousel-caption d-md-block" >
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="assets/img/2.jpg" id="satu" class="d-block w-100" alt="anjay2" style="height: 450px">
        <div class="carousel-caption d-md-block">
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>
    
      <div class="carousel-item">
        <img src="assets/img/3.jpg" id="satu" class="d-block w-100" alt="anjay3" style="height: 450px">
        <div class="carousel-caption d-md-block">
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section><!--end silde-->

<div id="keterangan" class="container bg-light mt-3">
<section id="penjelasan">
  <ul style="text-align: center"><img src="assets/img/logo1.png" class="img-fluid rounded-start mt-2"  alt="logo" ></ul>
  <div class="container mt-3 bg-light">
  
      <div class="container" style="text-align: justify">
        <p>Selamat datang di Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia. Sistem Informasi ini berfungsi sebagai alat untuk mendokumentasikan pengetahuan warisan budaya sehingga pemahaman dan pengetahuan yang tersimpan didalamnya dapat dipelajari, dikembangkan, dan diteruskan oleh generasi muda berikutnya. Sistem Informasi ini memiliki fitur yaitu pencarian (searching) dan penelusuran (browsing).</p>
      </div>
      <div class="container mt-2"style="background-color: #F8F9FA;" >
        <div class="row g-0">
          <div class="col-md-4" style="text-align: center" data-aos-delay="1000" data-aos="fade-right" data-aos-duration="1000">
            <img src="assets/img/search.png" class="img-fluid rounded-start" style="width: 18rem;" alt="searching">
          </div>
          <div class="col-md-8" data-aos-delay="1000" data-aos="fade-right" data-aos-duration="1000">
            
              <h5 class="card-title" style="text-align: center">SEARCHING</h5>
              <p class="card-text" style="text-align: justify">Fitur Searching merupakan fitur pertama pada Website SIRAKAJA. Dimana pada fitur ini pengguna dapat melakukan pencarian Pura Kahyangan Jagat dengan memilih beberapa kriteria yang ada pada website dan hasil dari inputan pengguna tersebut akan menampilkan data sesuai dengan yang ada pada aplikasi.</p>
            
          </div>
        </div>
      </div>
    
      <div class="container mt-5 mb-3"style="background-color: #F8F9FA;" data-aos-delay="700" data-aos="fade-left" data-aos-duration="1000">
        <div class="row g-0">
          <div class="col-md-8">
            
              <h5 class="card-title" style="text-align: center">BROWSING</h5>
              <p class="card-text" style="text-align: justify">Fitur Browsing merupakan fitur yang memberikan pengguna bisa melakukan penjelajahan dari data Pura Kahyangan Jagat yang telah tercatat di system dengan mengikuti klasifikasi dan hirarki informasi yang tersedia. </p>
            
          </div>
          <div class="col-md-4" style="text-align: center">
            <img src="assets/img/browse.jpg" class="img-fluid rounded-start" style="width: 18rem;" alt="Browsing">
          </div>

        </div>
      </div>

   </div>
</section>  
</div>
@endsection