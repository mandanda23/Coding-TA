<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lihat extends Controller
{
    public function lihat()
    {
        $lihat = $this->sparql->query('SELECT* WHERE{?pura a pura:PuraKahyanganJagat.?pura pura:memilikisetatusPura ?setatus.?pura pura:memilikiKabupaten ?kabupaten. OPTIONAL{?pura pura:gambarCover ?cover.}.}ORDER BY ?pura');

        $default = "http://www.semanticweb.org/Bali/PuraKahyanganJagat.owl#assets/img/logo1.png";

        foreach ($lihat as $item) {
            if (isset($item->cover) === false) {
                $item->cover = $default;
            }
        }

        $result = [];
        foreach ($lihat as $item) {
            array_push($result, [
                'nama' => str_replace('_', ' ', $this->parseData($item->pura->getUri())),
                'Setatus' => str_replace('_', ' ', $this->parseData($item->setatus->getUri())),
                'Kabupaten' => str_replace('_', ' ', $this->parseData($item->kabupaten->getUri())),
                'cover' => $this->parseData($item->cover)
            ]);
        }
      

        return view('lihat', [
            "title" => "Lihat",
            "result" => $result
        ]);
    }
}
