<?php

namespace App\Http\Controllers;

use App\Models\Menu_;
use Illuminate\Http\Request;

class DashboardMenu_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return ('ini adalah kunjungan');
        return view('admin-access.kunjungan.index',["title"=>"Data Kunjungan | Polbangtan Gowa","active"=>"Kunjungan"]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu_  $menu_
     * @return \Illuminate\Http\Response
     */
    public function show(Menu_ $menu_)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu_  $menu_
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu_ $menu_)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu_  $menu_
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu_ $menu_)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu_  $menu_
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu_ $menu_)
    {
        //
    }
}
