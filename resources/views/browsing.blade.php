<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="assets/img/logo1.png" rel="icon">
    <title> Sirakaja | Browsing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/drop.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>

  <div class="sidebar close">
    <div class="logo-details">
      <i><img src="assets/img/logo1.png" class="na" alt="" width="37" height="32"></i>
      <a class="logo_name mt-2" href="/">Sirakaja</a>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
        <a href="/lihat">
          <i class='bx bxs-dashboard'></i>
          <span class="link_name">Dashboard</span>
        </a>
      </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/lihat">Dashboard</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="/searching">
            <i class='bx bx-search-alt'></i>
            <span class="link_name">Searching</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/searching">Searching</a></li>
        </ul>
      </li>
         
      <li>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdyHonyTQgrTX9yuY1nKaOpzKnSWuAjKnWYsLLL1OIrh_by_w/formResponse">
          <i class='bx bxs-file-blank'></i>
          <span class="link_name">Questionaire</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="https://docs.google.com/forms/d/e/1FAIpQLSdyHonyTQgrTX9yuY1nKaOpzKnSWuAjKnWYsLLL1OIrh_by_w/formResponse">Questionaire</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
        <a href="/">
          <i class='bx bx-home' ></i>
          <span class="link_name">Home</span>
        </a>
      </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/">Home</a></li>
        </ul>
      </li>

    </ul>

  </div>
  <!-- end nav-->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <a class="con ms-2" href="/browsing">
        <i class='bx bx-globe'></i>
        <span class="text border-0">Browsing</span>
      </a>
    </div>
    <main>
      
      <div class="album py-2 bg-light">
        <ul class="judul"><h1>Sirakaja Browsing </h1></ul>
        <hr />
          <div class="container-fluid">
            <div class="container-fluid">
  
              <form action="" method="GET" id="cari_pura">
              <div class="row">
                <h3>
                  Pilih Salah Satu
                </h3>
                <div class="input-group mb-3">
                  <select class="form-select" id="inputGroupSelect01" name="cari_kabupaten">
                    <option selected>Pilih...</option>
                    @foreach($isi['kabupaten'] as $item)
                    <option value="{{ $item['kabupaten'] }}"> {{ str_replace('_',' ',str_replace('_',' ',$item['kabupaten'])) }}</option>
                  @endforeach
                </select>
                  </select>
                </div>
              </div>
            
            <div class="row">
              <ul>
                <input type="submit" name="cari_pura" value="Cari" class="btn btn-primary">
                <input type="submit" name="reset" value="Reset" class="btn btn-danger">
              </ul>
            </div>
          </div>
        </form>
        </div>
      </div>


      <div class="container-fluid  mt-4 bg-light">
        <div class="container-fluid">
         <h2>Hasil Pencarian</h2>
         <div class="row">
          <div>
            @if($isi['resp'] == 0)
                <h4 class="small font-weight-bold">Belum terdapat pencarian data<span> </h4>
            @elseif($isi['resp'] == 1 && $isi['jumlahpura'] == 0)
                <h4 class="small font-weight-bold">Data tidak ditemukan<span></h4>
            @else
            <table class="table" style="width: 80%">
              <thead>
                <tr>
                  <th scope="col" style="width: 20px">No</th>
                  <th scope="col">Nama</th>
                </tr>
              </thead>
                <tbody>
                  <?php $i = 0;?>
                  @foreach ($isi['listpura'] as $item)
                  <tr>
                    <th scope="row">{{ $i+1 }}</th>
                    <td><a style="color: rgba(0, 0, 0, 0.844)" href="/detailpura/{{ str_replace(' ', '_', $item['nama']) }}"> {{ str_replace('_',' ',$item['nama'] )}}</a></td>
                  </tr>
                  <?php $i++;?>
                  @endforeach
                  @endif
                </tbody>
            </table>
          </div>
         
         </div>
       </div>
      </div>
    
    </main>
  
  
  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
