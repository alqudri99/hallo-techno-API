<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\ProductExport;
use App\Image;
use App\Imports\ProductImport;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
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
        $final = Product::join('tb_category', 'tb_category.id', '=', 'tb_product.category_id')->select('tb_product.*', 'category_name')->get();
        // return $final;
        return view('produk.index', compact('final'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::all();
        return view('produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UrlGenerator $url)
    {
        $gambar = array();
        $postingan = Product::create($request->except('images'));

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = \str_random(30) . '.jpg';
                $file->move('/home/websitet/public_html/images/', $filename);
                $photourl = $url->to('/images') . '/' . $filename;
                Image::create([
                    'product_id' => $postingan->id,
                    'url' => $photourl
                ]);

                $gambar[] = $photourl;
            }
        }
        
        Alert::success('Sukses','Berhasil Menyimpan Data!');
        return redirect('product');


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
        $kategori = Category::all();
        $image = Image::where('product_id', $id)->get();
        // return $image;
        $datas = Product::findOrFail($id);
        return view('produk.edit', compact('kategori', 'datas', 'image'));
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
        
        // return $request;
        $postingan = Product::findOrFail($id);
        $postingan->update($request->except('images'));
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = \str_random(30) . '.jpg';
                $file->move('/home/websitet/public_html/images/', $filename);
                $photourl = $url->to('/images') . '/' . $filename;
                Image::create([
                    'product_id' => $id,
                    'url' => $photourl
                ]);

                $gambar[] = $photourl;
            }
        }
        
        Alert::success('Sukses','Berhasil Mengupdate Data!');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if($data){
            $data->delete();
            Alert::success('Error','Sukses Menghapus Data!');
            return redirect('product');
        }
        Alert::error('Error','Gagal Menghapus Data!');
        return redirect('product');
    }

    public function hapus(Request $request, UrlGenerator $url)
    {
        $outputArray = array();
        $u =null;
        // system("cd..", $outputArray, $u);
    //   return system('cd..');
        $imageToRemove = Image::where('id', $request->id)->first();

            $path = str_replace($url->to('/'), '', $imageToRemove->url);
            // return $path;
            if(file_exists(substr($path, 1))){
                if(unlink(substr($path, 1))){
                    $imageToRemove->delete();
                    return 'sukses';
                }else{
                    return 'gagal';
                }
            }else{
                return 'gak ada';
            }
       
        return 'hai';
    }


    public function fileImport(Request $request) 
    {
        // return redirect()->with('d', 'sdsdsd');
        Excel::import(new ProductImport, $request->file('file')->store('temp'));

        Alert::success('Sukses', 'Berhasil Import Excel Ke Database');
        return redirect('product');
    }

    public function ImportView(Request $request){
    return view('produk.massal');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new ProductExport,  \str_random(20).'.xlsx');
    }  


    public function ubahPassword(Request $request){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return route('product.ubahPassword');
        return view('auth.edit', compact('user'));
        }

        public function updatePassword($id){
            return $id;
            $id = Auth::user()->id;
            $user = User::findOrFail($id);
            return view('auth.edit', compact('$user'));
            }
}
