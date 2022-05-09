<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('assets/img/logo1.png') }}" rel="icon">
    <title> Sirakaja | Browsing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/drop.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="sidebar close">
        <div class="logo-details">
            <i><img src="{{ asset('assets/img/logo1.png') }}" class="na" alt="" width="37" height="32"></i>
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
                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdyHonyTQgrTX9yuY1nKaOpzKnSWuAjKnWYsLLL1OIrh_by_w/formResponse">
                    <i class='bx bxs-file-blank'></i>
                    <span class="link_name">Tugas</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="https://bit.ly/PuraKahyanganJagat">Tugas</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="/">
                        <i class='bx bx-home'></i>
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

    <section class="home-section" style=" height: auto;">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <a class="con ms-2" href="/tesbrowsing">
                <i class='bx bx-globe'></i>
                <span class="text border-0">Browsing</span>
            </a>
        </div>
        <main>

            <div class="row mt-3 ms-2 me-2">
              <?php $i = 0;?>
                 @foreach ($isi['kabupaten'] as $item)                 
                        <div class="col-lg-3 mb-3" style="width: auto">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title" style="text-align: center">{{ $i+1 }}.
                                      {{ str_replace('_', ' ', $item['kabupaten']) }}
                                    </h2>
                                    <div class="row">
                                        <div class="col">                                           
                                            {{-- <h6>Desa : {{ $item[0]->totalDesas }}</h6>
                                            <h6>Banjar : {{ $item[0]->totalbanjar }}</h6> --}}
                                            <a href="/{{ $isi['link'] }}/{{ str_replace(' ', '_', $item['kabupaten']) }}"
                                            class="btn btn-primary">lebih lanjut </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                @endforeach
             
            </div>
            

        </main>


    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
