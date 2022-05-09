<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class browsing extends Controller
{
    public function isi(Request $request)
    {
        $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        $resultProvinsi = [];
        foreach ($provinsi as $item) {
            array_push($resultProvinsi, [
                'provinsi' => $this->parseData($item->provinsi->getUri())
            ]);
        }
        if ($request->has('cari_pura') != '') {
            $resp = 1;
            if ($request->cari_kabupaten != '') {
                $sql = $this->sparql->query('SELECT * WHERE{VALUES ?provinsi { pura:' . $request->cari_kabupaten . '} .?provinsi pura:mempunyaiKabupaten ?kabupaten}');
            }
            $rowKabupaten = [];
            foreach ($sql as $item) {
                array_push($rowKabupaten, [
                    'kabupaten' => $this->parseData($item->kabupaten->getUri())
                ]);
            }
        } else {
            $resp = 0;
            $rowKabupaten = 0;
        }

        // dd($rowKabupaten);

        $isi = [
            'provinsi' => $resultProvinsi,
            'resp' => $resp,
            'kabupaten' => $rowKabupaten,
            'link' => 'browsingKabupaten'
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }
    public function isiKabupaten($kab)
    {

        $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        $resultProvinsi = [];
        foreach ($provinsi as $item) {
            array_push($resultProvinsi, [
                'provinsi' => $this->parseData($item->provinsi->getUri())
            ]);
        }

        $kabupaten = $this->sparql->query('SELECT * WHERE {?kabupaten a pura:Kabupaten .?kabupaten pura:mempunyaiKecamatan ?kecamatan}');
        $resultkabupaten = [];
        foreach ($kabupaten as $item) {
            array_push($resultkabupaten, [
                'kabupaten' => $this->parseData($item->kabupaten->getUri()),
                'kecamatan' => $this->parseData($item->kecamatan->getUri())
            ]);
        }

        $resultKecamatan = [];
        foreach ($resultkabupaten as $result) {
            if ($result['kabupaten'] == $kab) {
                array_push($resultKecamatan, [
                    'kabupaten' => $result['kecamatan']
                ]);
            }
        }

        // dd($resultKecamatan);

        $isi = [
            'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultKecamatan,
            'link' => 'browsingKecamatan'
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiKecamatan($kec)
    {

        $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        $resultProvinsi = [];
        foreach ($provinsi as $item) {
            array_push($resultProvinsi, [
                'provinsi' => $this->parseData($item->provinsi->getUri())
            ]);
        }

        $kecamatan = $this->sparql->query('SELECT * WHERE {?kecamatan a pura:Kecamatan. ?kecamatan pura:mempunyaiDesa ?desa}');
        $resultkecamatan = [];
        foreach ($kecamatan as $item) {
            array_push($resultkecamatan, [
                'kecamatan' => $this->parseData($item->kecamatan->getUri()),
                'desa'=> $this->parseData($item->desa->getUri()),
            ]);
        }

        $resultDesa = [];
        foreach ($resultkecamatan as $result) {
            if ($result['kecamatan'] == $kec) {
                array_push($resultDesa, [
                    'kabupaten' => $result['desa']
                ]);
            }
        }

        // dd($resultKecamatan);

        $isi = [
            'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultDesa,
            'link' => 'browsingDesa'
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiDesa($des)
    {

        $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        $resultProvinsi = [];
        foreach ($provinsi as $item) {
            array_push($resultProvinsi, [
                'provinsi' => $this->parseData($item->provinsi->getUri())
            ]);
        }

        $desa = $this->sparql->query('SELECT * WHERE {?desa a pura:Desa. ?desa pura:mempunyaiBanjar ?banjar}');
        $resultdesa = [];
        foreach ($desa as $item) {
            array_push($resultdesa, [
                'desa'=> $this->parseData($item->desa->getUri()),
                'banjar'=> $this->parseData($item->banjar->getUri()),
            ]);
        }

        $resultBanjar = [];
        foreach ($resultdesa as $result) {
            if ($result['desa'] == $des) {
                array_push($resultBanjar, [
                    'kabupaten' => $result['banjar']
                ]);
            }
        }

        // dd($resultKecamatan);

        $isi = [
            'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultBanjar,
            'link' => 'browsingBanjar'
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiBanjar($ban)
    {

        $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        $resultProvinsi = [];
        foreach ($provinsi as $item) {
            array_push($resultProvinsi, [
                'provinsi' => $this->parseData($item->provinsi->getUri())
            ]);
        }

        $banjar = $this->sparql->query('SELECT * WHERE {?banjar a pura:Banjar. ?banjar pura:memilikiPura ?pura}');
        $resultbanjar = [];
        foreach ($banjar as $item) {
            array_push($resultbanjar, [
             'banjar'=> $this->parseData($item->banjar->getUri()),
             'pura'=> $this->parseData($item->pura->getUri()),
            ]);
        }

        $resultPura = [];
        foreach ($resultbanjar as $result) {
            if ($result['banjar'] == $ban) {
                array_push($resultPura, [
                    'kabupaten' => $result['pura']
                ]);
            }
        }

        // dd($resultKecamatan);

        $isi = [
            'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultPura,
            'link' => 'readmore'
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }
}
// SELECT * WHERE { ?provinsi a pura:Provinsi.?provinsi pura:mempunyaiKabupaten ?kabupaten .?kabupaten pura:mempunyaiKecamatan ?kecamatan .?kecamatan pura:mempunyaiDesa ?desa.?desa pura:mempunyaiBanjar ?banjar .?banjar pura:memilikiPura ?pura}