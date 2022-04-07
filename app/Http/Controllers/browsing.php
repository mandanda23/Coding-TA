<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class browsing extends Controller
{
    public function isi(Request $request)
    {
        $kabupaten = $this->sparql->query('SELECT * WHERE {?kabupaten a pura:Kabupaten.}ORDER BY ?Kabupaten');

        $Kabupaten = [];
        foreach ($kabupaten as $item) {
            array_push($Kabupaten, [
                'kabupaten' => $this->parseData($item->kabupaten->getUri())
            ]);
        }
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

        $isi = [
            'kabupaten' => $Kabupaten,
            'resp' => $resp,
            'jumlahpura' => $jumlahpura,
            'listpura' => $resultpura
        ];

        return view('browsing', [
            "title" => "Browsing",
            'isi' => $isi
        ]);
    }
}
