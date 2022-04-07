<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailpura extends Controller
{
    public function read($nama_pura)
    {
        $detail = $this->sparql->query('SELECT * WHERE
        {VALUES ?pura{pura:' . $nama_pura . '}.
            ?pura pura:memilikisetatusPura ?Setatus.
            ?pura pura:memilikiKabupaten ?Kabupaten.
            ?pura pura:memilikiKecamatan ?Kecamatan.
            ?pura pura:memilikiDesa ?Desa.
            ?pura pura:memilikiBanjar ?Banjar.
            ?pura pura:memilikihariPiodalan ?HariPiodalan.
            optional {?pura pura:memilikiPengertian ?Pengertian}.
            optional {?pura pura:memilikititikKoordinat ?map}.
            optional {?pura pura:memilikiGambar ?gambar}.
            optional {?pura pura:gambarCover ?cover.}.
        }limit 1');

        $default1 = "http://www.semanticweb.org/Bali/PuraKahyanganJagat.owl#logo1.png";
        $default = "http://www.semanticweb.org/Bali/PuraKahyanganJagat.owl#-";

        foreach ($detail as $dtl) {
            if (isset($dtl->cover) === false) {
                $dtl->cover = $default1;
            }
            if (isset($dtl->gambar) === false) {
                $dtl->gambar = $default1;
            }
            if (isset($dtl->Pengertian) === false) {
                $dtl->Pengertian = $default;
            }
            if (isset($dtl->map) === false) {
                $dtl->map = $default;
            }
            if (isset($dtl->nohp) === false) {
                $dtl->nohp = $default;
            }
            if (isset($dtl->alamat) === false) {
                $dtl->alamat = $default;
            }
            if (isset($dtl->warna) === false) {
                $dtl->warna = $default;
            }
            if (isset($dtl->dewa) === false) {
                $dtl->dewa = $default;
            }
            if (isset($dtl->arti) === false) {
                $dtl->arti = $default;
            }
        }
        $detailpelinggih = $this->sparql->query('SELECT * WHERE{VALUES ?pura{pura:' . $nama_pura . '}
            .optional {?pura pura:memilikiPelinggih ?pelinggih}
            .optional {?pelinggih pura:memilikiPenjelasan ?arti} 
            .optional {?pelinggih pura:sthanaDari ?dewa}
            .optional {?pelinggih pura:memilikiwarnaKain ?warna}
            .optional {?pelinggih pura:memilikiGambar ?gpelinggih}
            .optional {?pelinggih pura:memilikiKayu ?kayu}
        }');

        $namapb = [];
        $i = 0;

        foreach ($detailpelinggih as $dtl) {
            $namapb[$i]['pelinggih'] = $this->parseData($dtl->pelinggih);
            $i++;
        }
        $k = 0;
        for ($j = 0; $j < $i; $j++) {
            $detailbatu = $this->sparql->query('SELECT * WHERE{VALUES ?pelinggih{pura:' . $namapb[$j]['pelinggih'] . '}
            .optional {?pelinggih pura:memilikiBatu ?batu}
             }');
            $k = 0;
            foreach ($detailbatu as $dtl) {
                if (isset($dtl->batu) === false) {
                    $dtl->batu = $default;
                }
            }
            foreach ($detailbatu as $dtl) {
                $namapb[$j]['batu'][$k] = $this->parseData($dtl->batu);
                $k++;
            }
        }

        foreach ($detailpelinggih as $dtl) {
            if (isset($dtl->pelinggih) === false) {
                $dtl->pelinggih = $default;
            }
            if (isset($dtl->warna) === false) {
                $dtl->warna = $default;
            }
            if (isset($dtl->dewa) === false) {
                $dtl->dewa = $default;
            }
            if (isset($dtl->arti) === false) {
                $dtl->arti = $default;
            }
            if (isset($dtl->gpelinggih) === false) {
                $dtl->gpelinggih = $default1;
            }
            if (isset($dtl->batu) === false) {
                $dtl->batu = $default;
            }
            if (isset($dtl->kayu) === false) {
                $dtl->kayu = $default;
            }
        }
        $resultdetailpelinggih = [];
        $l = 0;
        foreach ($detailpelinggih as $dtl) {
            array_push($resultdetailpelinggih, [
                'pelinggih' => str_replace('_', ' ', $this->parseData($dtl->pelinggih)),
                'arti' => str_replace('_', ' ', $this->parseData($dtl->arti)),
                'dewa' => str_replace('_', ' ', $this->parseData($dtl->dewa)),
                'warna' => str_replace('_', ' ', $this->parseData($dtl->warna)),
                'gpelinggih' => str_replace('_', ' ', $this->parseData($dtl->gpelinggih)),
                'batu' => $namapb[$l]['batu'],
                'kayu' => str_replace('_', ' ', $this->parseData($dtl->kayu)),
            ]);
            $l++;
        }

        $detailsuci = $this->sparql->query('SELECT * WHERE{VALUES ?pura{pura:' . $nama_pura . '}
            .optional {?pura pura:memilikiorangSuci ?orangsuci.}
            .optional {?orangsuci pura:memilikinomerTlp ?nohp.}
            .optional {?orangsuci pura:memilikiAlamat ?alamat.}
            .optional { ?orangsuci pura:memilikigambarorangSuci ?gsuci.}
        }');

        foreach ($detailsuci as $dtl) {
            if (isset($dtl->gsuci) === false) {
                $dtl->gsuci = $default1;
            }
            if (isset($dtl->nohp) === false) {
                $dtl->nohp = $default;
            }
            if (isset($dtl->alamat) === false) {
                $dtl->alamat = $default;
            }
        }
        $resultdetailsuci = [];
        foreach ($detailsuci as $dtl) {
            array_push($resultdetailsuci, [
                'orangsuci' => str_replace('_', ' ', $this->parseData($dtl->orangsuci->getUri())),
                'nohp' => str_replace('_', ' ', $this->parseData($dtl->nohp)),
                'alamat' => str_replace('_', ' ', $this->parseData($dtl->alamat)),
                'gsuci' => str_replace('_', ' ', $this->parseData($dtl->gsuci)),

            ]);
        }

        $result = [];
        foreach ($detail as $dtl) {
            array_push($result, [
                'nama' => str_replace('_', ' ', $this->parseData($dtl->pura->getUri())),
                'Setatus' => str_replace('_', ' ', $this->parseData($dtl->Setatus->getUri())),
                'Kabupaten' => str_replace('_', ' ', $this->parseData($dtl->Kabupaten->getUri())),
                'Kecamatan' => str_replace('_', ' ', $this->parseData($dtl->Kecamatan->getUri())),
                'Desa' => str_replace('_', ' ', $this->parseData($dtl->Desa->getUri())),
                'Banjar' => str_replace('_', ' ', $this->parseData($dtl->Banjar->getUri())),
                'HariPiodalan' => str_replace('_', ' ', $this->parseData($dtl->HariPiodalan->getUri())),
                'Pengertian' => $this->parseData($dtl->Pengertian),
                'map' => $this->parseData($dtl->map),
                'gambar' => $this->parseData($dtl->gambar),
                'cover' => $this->parseData($dtl->cover),
            ]);
        }

        return view('detailpura', [
            "title" => "Detail Pura",
            'result' => $result,
            'resultDetailSuci' => $resultdetailsuci,
            'resultDetailPelinggih' => $resultdetailpelinggih
        ]);
    }
}
