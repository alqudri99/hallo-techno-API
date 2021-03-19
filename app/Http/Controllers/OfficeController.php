<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return phpInfo();s
        $final = Office::all();
        return view('office.index', compact('final'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        Office::create($request->all());
        Alert::success('Sukses','Sukses Menyimpan Data!');
        return redirect('office');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Office::findOrFail($id);
        return view('office.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Office::findOrFail($id);
        $data->update($request->all());
        Alert::success('Sukses','Sukses Mengupdate Data!');
        return redirect('office');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Office::findOrFail($id);
        if($data){
            $data->delete();
            
        Alert::success('Sukses','Sukses Menghapus Data!');
            return redirect('office');
        }
        Alert::success('Error','Gagal Menghapus Data!');
        return redirect('office');
    }
}
