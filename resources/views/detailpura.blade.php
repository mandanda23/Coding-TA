<?php use App\Http\Controllers\detailpura; ?>
@extends("layouts.main")

@section('container')
    @foreach ($result as $dtl)
        <section id="" style="margin-top: 59px">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/assets/img/pura/' . $dtl['cover']) }}" class="d-block w-100" alt="Cover Pura"
                            style="height: 400px">
                    </div>
                </div>
            </div>
        </section>
        <div id="keterangan" class="container">
            <section id="penjelasan">
                <div class="container mt-3 bg-light">
                    <div class="container">
                        <div class="row">
                            <div id="wes" class="col">
                                <img src="{{ asset('/assets/img/pura/' . $dtl['gambar']) }}" class="col-md-12"
                                    alt="Gamba Pura">
                            </div>
                            <div class="col mt-2 ms-2 bg-light">
                                <div class="row-md-center" style="text-align: center">
                                    <h2>
                                        Data Pura {{ str_replace('Pura', '', $dtl['nama']) }}
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Status Pura</h3>
                                    </div>
                                    <div class="col">
                                        <h4>: {{ $dtl['Setatus'] }} </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Lokasi / Alamat Pura</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Desa</h3>
                                    </div>
                                    <div class="col">
                                        <h3>: {{ str_replace('Desa', '', $dtl['Desa']) }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Banjar</h3>
                                    </div>
                                    <div class="col">
                                        <h3>: {{ str_replace('Banjar', '', $dtl['Banjar']) }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Kecamatan</h3>
                                    </div>
                                    <div class="col">
                                        <h3>: {{ str_replace('Kecamatan', '', $dtl['Kecamatan']) }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Kabupaten</h3>
                                    </div>
                                    <div class="col">
                                        <h3>: {{ $dtl['Kabupaten'] }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Hari Piodalan</h3>
                                    </div>
                                    <div class="col">
                                        <h3>: {{ $dtl['HariPiodalan'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section>

                            <div class="container" style="text-align: justify">
                                {!! $dtl['Pengertian']!!}
                            </div>



                            <table class="table" id="pelinggih">
                                <hr />

                                <div>
                                    <h2>Pemangku Yang berada di {{ $dtl['nama'] }}</h2>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" style="text-align: center">Nama</th>
                                        <th scope="col" style="text-align: center">Foto</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($resultDetailSuci as $dtl)
                                        <tr>
                                            <th scope="row" style="width: 10px">{{ $no }}</th>
                                            <td style="width: 22%">
                                                <h6>{{ $dtl['orangsuci'] }}</h6>
                                            </td>
                                            <td>
                                                <div class="card mb-3" style="max-width: 1040px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="{{ asset('/assets/img/mangku/' . $dtl['gsuci']) }}"
                                                                class="img-fluid rounded-start" style="height: 300px"
                                                                alt="foto mangku">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <p class="card-text">Nomer HP : {{ $dtl['nohp'] }}
                                                                </p>
                                                                <p class="card-text">Alamat : {{ $dtl['alamat'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>

                            </table>

                            {{-- awal tabel pelinggih --}}

                            <table class="table" id="pelinggih">

                                <div>
                                    <h2>Pelinggih yang ada pada {{ $result[0]['nama'] }}</h2>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" style="text-align: center">Nama</th>
                                        <th scope="col" style="text-align: center">Penjelasan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($resultDetailPelinggih as $dtl)
                                        <tr>
                                            <th scope="row" style="width: 10px">{{ $i }}</th>
                                            <td style="width: 100px">
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="card" style="width: 18rem;">
                                                        <div class="card-body">
                                                            <p class="card-text">{{ $dtl['pelinggih'] }}</p>
                                                        </div>
                                                        <img src="{{ asset('/assets/img/pelinggih/' . $dtl['gpelinggih']) }}"
                                                            class="card-img-top" alt="pelinggih">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h4>Dewa : {{ $dtl['dewa'] }}</h4>
                                                <h4>Warna Kain : {{ $dtl['warna'] }}</h4>
                                                <h4>Bahan yang digunakan :
                                                    @foreach ($dtl['batu'] as $item)
                                                        {{ str_replace('_', ' ', $item) }},
                                                    @endforeach{{ $dtl['kayu'] }}
                                                </h4>
                                                <p>{{ $dtl['arti'] }}</p>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <hr />
                        </div>
                     </div>
                    <div class="btn shadow-sm mb-2 bg-body rounded">
                        <a href="javascript:history.back()">
                          <h5 style="color: black"> <i class='bx bx-arrow-back'></i>  Back</h5>
                        </a>
                    </div>
            </section>
        </div>
    @endforeach
@endsection
