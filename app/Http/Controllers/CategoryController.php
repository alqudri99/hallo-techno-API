<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
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
        $final = Category::all();
       
        return view('kategori.index', compact('final'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UrlGenerator $url)
    {
        // return $request;
        if ($request->hasFile('image')) {
            // return 'f';
            $file = $request->file('image');
                $filename =\str_random(30) . '.jpg';
                
                $file->move('/home/websitet/public_html/images/', $filename);
                $photourl = $url->to('/images') . '/' . $filename;
                // return $photourl;
                Category::create([
                    'category_name' => $request->category_name,
                    'icon' => $url->to('/images') . '/' . $filename
                ]);

                $gambar[] = $photourl;
                Alert::success('Sukses','Sukses Menghapus Data!');
                return redirect('category');
        }
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
        $datas = Category::findOrFail($id);
        return view('kategori.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UrlGenerator $url)
    {
        $category = Category::findOrFail($id);
        if($request->image){
            $file = $request->file('image');
            $filename =\str_random(30) . '.jpg';
            
            $file->move('/home/websitet/public_html/images/', $filename);
            $photourl = $url->to('/images') . '/' . $filename;
            // return $photourl;
            $category->update([
                'category_name' => $request->category_name,
                'icon' => $url->to('/images') . '/' . $filename
            ]);

            $gambar[] = $photourl;
            Alert::success('Sukses','Sukses Mengupdate Data!');
            return redirect('category');
        }

        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::success('Sukses','Sukses Mengupdate Data!');
       return redirect('category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $product = Product::where('category_id', $id)->get();
        // return $product;
        if(count($product) == 0){
            $data->delete();
            Alert::success('Sukses','Sukses Menghapus Data!');
            return redirect('category');
        }else{
            Alert::error('Error','Gagal Menghapus Data Karena Terdapat Relasi!');
            return redirect('category');

        }
    }
}
