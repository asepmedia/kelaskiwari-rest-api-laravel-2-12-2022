<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    //
    public $kontak = [
        [
            'id'        => 1,
            'nama'      => 'KelasKiwari',
            'nohp'      => '08xxx',
            'alamat'    => 'Jl. Kiwari'
        ],
        [
            'id'        => 2,
            'nama'      => 'Flutter Dev.',
            'nohp'      => '08xxx',
            'alamat'    => 'Jl. Flutter'
        ]
    ];

    public function index()
    {
        return response()->json($this->kontak);
    }

    public function show($id)
    {
        // $detail = collect($this->kontak)
        //     ->where('id', $id)
        //     ->first();

        // if(!$detail) {
        //     return response()->json([
        //         'status'    => false,
        //         'message'   => "Kontak dengan ID : $id tidak ditemukan"
        //     ]);
        // }

        try {
            $detail = collect($this->kontak)
                ->where('id', $id)
                ->firstOrFail();
        } catch(\Exception $e) {
            return response()->json([
                'status'    => false,
                'message'   => "Kontak dengan ID : $id tidak ditemukan"
            ]);
        }

        return response()->json($detail);
    }
}
