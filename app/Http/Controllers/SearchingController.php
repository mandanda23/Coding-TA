<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    public function index(Request $request)
    {
        $kabupaten = $this->sparql->query('SELECT * WHERE {?kabupaten a pura:Kabupaten}ORDER BY ?Kabupaten');
        $kecamatan = $this->sparql->query('SELECT * WHERE {?kecamatan a pura:Kecamatan}');
        $Dewa = $this->sparql->query('SELECT * WHERE {?Dewa a pura:Dewa}ORDER BY ?Dewa');
        $Banjar = $this->sparql->query('SELECT * WHERE {?Banjar a pura:Banjar}');
        $HariPiodalan = $this->sparql->query('SELECT * WHERE {?HariPiodalan a pura:HariPiodalan}ORDER BY ?HariPiodalan');
        $Warna = $this->sparql->query('SELECT * WHERE {?Warna a pura:Warna}ORDER BY ?Warna');


        $Kabupaten = [];
        foreach ($kabupaten as $item) {
            array_push($Kabupaten, [
                'kabupaten' => $this->parseData($item->kabupaten->getUri())
            ]);
        }
        $resultKecamatan = [];
        foreach ($kecamatan as $item) {
            array_push($resultKecamatan, [
                'kecamatan' => $this->parseData($item->kecamatan->getUri())
            ]);
        }
        $resultDewa = [];
        foreach ($Dewa as $item) {
            array_push($resultDewa, [
                'Dewa' => $this->parseData($item->Dewa->getUri())
            ]);
        }
        $resultBanjar = [];
        foreach ($Banjar as $item) {
            array_push($resultBanjar, [
                'Banjar' => $this->parseData($item->Banjar->getUri())
            ]);
        }
        $resultHariPiodalan = [];
        foreach ($HariPiodalan as $item) {
            array_push($resultHariPiodalan, [
                'HariPiodalan' => $this->parseData($item->HariPiodalan->getUri())
            ]);
        }
        $resultWarna = [];
        foreach ($Warna as $item) {
            array_push($resultWarna, [
                'Warna' => $this->parseData($item->Warna->getUri())
            ]);
        }

        $sql=NULL;

        if ($request->has('cari_pura') != '') {
            $resp = 1;
            $sql = 'SELECT * WHERE {';
            $i = 0;
            if ($request->cari_kabupaten != '') {
                if ($i == 0) {
                    $sql = $sql . '?pura pura:memilikiKabupaten pura:' . $request->cari_kabupaten;
                    $i++;
                } else {
                    $sql = $sql . '. ?pura pura:memilikiKabupaten pura:' . $request->cari_kabupaten;
                }
            } else {
                $sql = $sql;
            }

            // if ($request->cari_kecamatan != '') {
            //     if ($i == 0) {
            //         $sql = $sql . '?pura pura:memilikiKecamatan pura:' . $request->cari_kecamatan;
            //         $i++;
            //     } else {
            //         $sql = $sql . '. ?pura pura:memilikiKecamatan pura:' . $request->cari_kecamatan;
            //     }
            // } else {
            //     $sql = $sql;
            // }

            if ($request->cari_dewa != '') {
                if ($i == 0) {
                    $sql = $sql . '?pura pura:sebagaiSthana pura:' . $request->cari_dewa;
                    $i++;
                } else {
                    $sql = $sql . '. ?pura pura:sebagaiSthana pura:' . $request->cari_dewa;
                }
            } else {
                $sql = $sql;
            }

            // if ($request->cari_banjar != '') {
            //     if ($i == 0) {
            //         $sql = $sql . '?pura pura:memilikiBanjar pura:' . $request->cari_banjar;
            //         $i++;
            //     } else {
            //         $sql = $sql . '. ?pura pura:memilikiBanjar pura:' . $request->cari_banjar;
            //     }
            // } else {
            //     $sql = $sql;
            // }
            if ($request->cari_haripiodalan != '') {
                if ($i == 0) {
                    $sql = $sql . '?pura pura:memilikihariPiodalan pura:' . $request->cari_haripiodalan;
                    $i++;
                } else {
                    $sql = $sql . '. ?pura pura:memilikihariPiodalan pura:' . $request->cari_haripiodalan;
                }
            }
            if ($request->cari_Warna != '') {
                if ($i == 0) {
                    $sql = $sql . '?pura pura:memilikiWarna pura:' . $request->cari_Warna;
                    $i++;
                } else {
                    $sql = $sql . '. ?pura pura:memilikiWarna pura:' . $request->cari_Warna;
                }
            }


            $sql = $sql . '}';
            $querydata = $this->sparql->query($sql);
            $resultpura = [];
            if ($i === 0) {
                $resultpura = [];
            } else {
                foreach ($querydata as $item) {
                    array_push($resultpura, [
                        'nama' => $this->parseData($item->pura->getUri())
                    ]);
                }
            }

            $jumlahpura = count($resultpura);
        } else {
            $resultpura = [];
            $jumlahpura = 0;
            $resp = 0;
        }


        $data = [
            'kabupaten' => $Kabupaten,
            'kecamatan' => $resultKecamatan,
            'Dewa' => $resultDewa,
            'Banjar' => $resultBanjar,
            'HariPiodalan' => $resultHariPiodalan,
            'Warna' => $resultWarna,
            'resp' => $resp,
            'jumlahpura' => $jumlahpura,
            'listpura' => $resultpura,
            'query' => $sql
        ];

        return view('searching', [
            'title' => 'Searching',
            'data' => $data
        ]);
    }
}
