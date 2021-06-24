<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;


class imagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = image::all();
        return view('post.index', compact('images'));
        // dd($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' =>'required',
            'image' =>'required'

        ]);

        // harus terdapat fillabel pada model

        //cara 1
        // image::create([
        //     'name'=>$request->name,
        //     'image' => $request->image
        // ]);

        // input image
        
        if ($request->hasFile('image')) {
            $lokasi= 'public/images';
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $extension ;
            $path = $request()->file('image')->storeAs($lokasi);
            $request->image->move(public_path('images'), $imageName);
            
            $input['image'] = $path;
        }

        // cara 2
        image::create($request->all());
        

        

        return redirect('/')->with('status', 'Data Gambar Berhasil Ditambahkan');
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


    public function edit(Image $image)
    {
        // $post = Image :: find($id);
        $gambar = Image :: all();
        return view('post.edit', compact('image', 'gambar'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Image $image)
    {
        
    //    $post = Image :: find($id);

       $image-> update([
           'name'=> request('name'),
           'image'=> request('image')
       ]);

        return redirect('/')->with('status', 'Data Gambar Berhasil DiEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function destroy(Image $image)
    {
        // $singledata = image::find($id);
        // $singledata->delete();

        $image->delete();

        // dd($image);
        // return($id);
        return redirect('/')->with('status', 'Data Gambar Berhasil Dihapus');
    }
}
