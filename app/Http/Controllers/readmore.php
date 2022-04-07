<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class readmore extends Controller
{
    public function detail($nama_pura)
    {
        $detail = $this->sparql->query('SELECT * WHERE
        {VALUES ?pura{pura:' . $nama_pura . '}.
            ?pura pura:memilikisetatusPura ?Setatus.
            ?pura pura:memilikiKabupaten ?Kabupaten.
            ?pura pura:memilikiKecamatan ?Kecamatan.
            ?pura pura:memilikiDesa ?Desa.
            ?pura pura:memilikiBanjar ?Banjar.
            ?pura pura:memilikihariPiodalan ?HariPiodalan.
            optional {?pura pura:memilikiPengertian ?Pengertian.}.
            optional {?pura pura:memilikititikKoordinat ?map.}
            optional {?pura pura:memilikiGambar ?gambar.}.
            optional {?pura pura:gambarCover ?cover.}.
        }limit 1');
        $default1 = "http://www.semanticweb.org/Bali/PuraKahyanganJagat.owl#img/logo1.png";
        $default = "http://www.semanticweb.org/Bali/PuraKahyanganJagat.owl# MASIH BELUM MEMILIKI DATA";
        foreach ($detail as $dtl) {
            if (isset($dtl->cover) === false) {
                $dtl->cover = $default1;
            }
            if (isset($dtl->gambar) === false) {
                $dtl->gambar = $default1;
            }
            if (isset($dtl->map) === false) {
                $dtl->map = $default1;
            }
            if (isset($dtl->Pengertian) === false) {
                $dtl->Pengertian = $default;
            }
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
                'cover' => $this->parseData($dtl->cover)
            ]);
        }

        return view('readmore', [
            "title" => "Read More",
            "result" => $result

        ]);
    }
}
