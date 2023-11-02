<?php

namespace App\Http\Controllers;

use App\ProdukFeedback;
use Illuminate\Http\Request;
// use session;
use Illuminate\Support\Facades\Auth;

class ProdukFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login terlebih dahulu'
            ],400);
        }

        // check if user already give feedback

        $produkFeedback = ProdukFeedback::where('produk_id', $request->produk_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($produkFeedback) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan feedback'
            ],400);
        }
        
        ProdukFeedback::create([
            'produk_id' => $request->produk_id,
            'user_id' => Auth::user()->id,
            'upvote' => $request->upvote,
            'downvote' => $request->downvote,
            'komentar' => $request->komentar
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil ditambahkan'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdukFeedback  $produkFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukFeedback $produkFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdukFeedback  $produkFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukFeedback $produkFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdukFeedback  $produkFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukFeedback $produkFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdukFeedback  $produkFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukFeedback $produkFeedback)
    {
        //
    }
}
