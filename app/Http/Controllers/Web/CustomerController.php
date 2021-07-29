<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "customer";
        $Customer = Customer::all();
        return view('aplication.pages.customer.index', compact('title', 'Customer'));
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
        // try {
        $Customer = Customer::create([
            'nomer_plat' => strtoupper($request->nomer_plat),
            'jam_masuk' => new DateTime()
        ]);

        $Customer = Customer::all();
        $title = "customer";
        return view('aplication.pages.customer.index', compact('title', 'Customer'));
        // } catch (\Throwable $th) {
        //     return back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Customer = Customer::where('nomer_plat', $request->nomer_plat)->get();
        $title = "customer";
        return view('aplication.pages.customer.index', compact('title', 'Customer'));
    }

    public function geting(Request $request)
    {
        $Customer = Customer::where('nomer_plat', $request->nomer_plat)->get();
        $title = "customer";
        return view('aplication.pages.customer.index', compact('title', 'Customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function keluar($id)
    {
        $Customer = Customer::where('id', $id)->first();
        if ($Customer->jam_keluar) {
            alert()->error('Sudah Dibayar');
            return back();
        }
        $Customer->jam_keluar = new DateTime();
        $Customer->update();

        $Customer = Customer::where('id', $id)->first();
        $awal  = strtotime($Customer->jam_masuk);
        $akhir = strtotime($Customer->jam_keluar);
        $diff  = $akhir - $awal;
        $jam   = 3000 * (floor($diff / (60 * 60)));
        $menit = 100 * (floor(($diff - $jam * (60 * 60)) / 60));
        $hasil = $jam + $menit;
        alert()->success('BAYAR :' . $hasil);
        return back();
    }
}
