<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tesbrowsing extends Controller
{
    public function isi(Request $request)
    {
        $lihat = $this->sparql->query('SELECT* WHERE{?pura a pura:Kabupaten} ORDER BY ?pura');
        $resultkab = [];
        foreach ($lihat as $item) {
            array_push($resultkab, [
                'kabupaten' => str_replace('_', ' ', $this->parseData($item->pura->getUri())),
            ]);
        }

        $rowPerKecamatan = [];
        foreach ($resultkab as $item) {
            array_push($rowPerKecamatan, [
                $this->sparql->query('SELECT ?kabupaten (count(distinct ?kabupaten) as ?count) (group_concat(?kecamatan) as ?kecamatans) (count(distinct ?kecamatan) as ?totalkecamatan) (group_concat(?desa) as ?desas) (group_concat(?banjar) as ?banjars) (count(distinct ?banjar) as ?totalbanjar)(count(distinct ?desa) as ?totalDesas)WHERE{VALUES ?kabupaten {pura:' . $item['kabupaten'] . '} ?kabupaten pura:mempunyaiKecamatan ?kecamatan .?kecamatan pura:mempunyaiDesa ?desa .?desa pura:mempunyaiBanjar ?banjar} group by ?kabupaten')
            ]);
        }

        // dd($rowPerKecamatan);

        // $data = array(

        //     'rowPerKecamatan' => $rowPerKecamatan
        // );

        $isi = [
            'rowPerKecamatan' => $rowPerKecamatan,
            'link' => 'tesbrowsingKabupaten'
        ];
       

        return view('tesbrowsing', [
            "title" => "Lihat",
            "result" => $resultkab,
            // 'data' => $data,           
            'isi' => $isi
        ]);
    }


    public function isiKabupaten($kab)
    {

        // $provinsi = $this->sparql->query('SELECT*WHERE {VALUES ?pura{pura:Denpasar}. ?pura pura:memilikititikKoordinat ?map.}
        // ');

        // $resultProvinsi = [];
        // foreach ($provinsi as $item) {
        //     array_push($resultProvinsi, [
        //         'nama' => str_replace('_', ' ', $this->parseData($item->pura->getUri())),
        //        'map' => $this->parseData($item->map),
        //     ]);
        // }
        // dd($resultProvinsi);

        $kabupaten = $this->sparql->query('SELECT * WHERE {?kabupaten a pura:Kabupaten .?kabupaten pura:mempunyaiKecamatan ?kecamatan}');
        $resultkabupaten = [];
        foreach ($kabupaten as $item) {
            array_push($resultkabupaten, [
                'kabupaten' => $this->parseData($item->kabupaten->getUri()),
                'kecamatan' => $this->parseData($item->kecamatan->getUri()),
            ]);
        }

        // $rowPerKecamatan = [];
        // foreach ($resultkabupaten as $item) {
        //     array_push($rowPerKecamatan, [
        //         $this->sparql->query('SELECT ?kecamatan (count(distinct ?kecamatan) as ?totalkecamatan) (group_concat(?desa) as ?desas) (group_concat(?banjar) as ?banjars) (count(distinct ?banjar) as ?totalbanjar)(count(distinct ?desa) as ?totalDesas)WHERE{VALUES ?kecamatan {pura:' . $item['kecamatan'] . '} ?kecamatan pura:mempunyaiDesa ?desa .?desa pura:mempunyaiBanjar ?banjar} group by ?kecamatan')
        //     ]);
        // }

    // dd($rowPerKecamatan);

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
            // 'provinsi' => $resultProvinsi,
            'resp' => 1,
            // 'rowPerKecamatan' => $rowPerKecamatan,
            'kabupaten' => $resultKecamatan,
            'link' => 'tesbrowsingKecamatan'
        ];

        return view('teskecamatan', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiKecamatan($kec)
    {

        // $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        // $resultProvinsi = [];
        // foreach ($provinsi as $item) {
        //     array_push($resultProvinsi, [
        //         'provinsi' => $this->parseData($item->provinsi->getUri())
        //     ]);
        // }

        $kecamatan = $this->sparql->query('SELECT * WHERE {?kecamatan a pura:Kecamatan. ?kecamatan pura:mempunyaiDesa ?desa}');
        $resultkecamatan = [];
        foreach ($kecamatan as $item) {
            array_push($resultkecamatan, [
                'kecamatan' => $this->parseData($item->kecamatan->getUri()),
                'desa' => $this->parseData($item->desa->getUri()),
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
            // 'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultDesa,
            'link' => 'tesbrowsingDesa'
        ];

        return view('tesdesa', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiDesa($des)
    {

        // $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        // $resultProvinsi = [];
        // foreach ($provinsi as $item) {
        //     array_push($resultProvinsi, [
        //         'provinsi' => $this->parseData($item->provinsi->getUri())
        //     ]);
        // }

        $desa = $this->sparql->query('SELECT * WHERE {?desa a pura:Desa. ?desa pura:mempunyaiBanjar ?banjar}');
        $resultdesa = [];
        foreach ($desa as $item) {
            array_push($resultdesa, [
                'desa' => $this->parseData($item->desa->getUri()),
                'banjar' => $this->parseData($item->banjar->getUri()),
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
            // 'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultBanjar,
            'link' => 'tesbrowsingBanjar'
        ];

        return view('tesdesa', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    public function isiBanjar($ban)
    {

        // $provinsi = $this->sparql->query('SELECT * WHERE {?provinsi a pura:Provinsi}');
        // $resultProvinsi = [];
        // foreach ($provinsi as $item) {
        //     array_push($resultProvinsi, [
        //         'provinsi' => $this->parseData($item->provinsi->getUri())
        //     ]);
        // }

        $banjar = $this->sparql->query('SELECT * WHERE {?banjar a pura:Banjar. ?banjar pura:memilikiPura ?pura}');
        $resultbanjar = [];
        foreach ($banjar as $item) {
            array_push($resultbanjar, [
                'banjar' => $this->parseData($item->banjar->getUri()),
                'pura' => $this->parseData($item->pura->getUri()),
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
            // 'provinsi' => $resultProvinsi,
            'resp' => 1,
            'kabupaten' => $resultPura,
            'link' => 'readmore'
        ];

        return view('tesdesa', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }

    // SELECT * WHERE { ?provinsi a pura:Provinsi.?provinsi pura:mempunyaiKabupaten ?kabupaten .?kabupaten pura:mempunyaiKecamatan ?kecamatan .?kecamatan pura:mempunyaiDesa ?desa.?desa pura:mempunyaiBanjar ?banjar .?banjar pura:memilikiPura ?pura}


}
