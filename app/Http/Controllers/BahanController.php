<?php

namespace App\Http\Controllers;

use Request;
use Input;
use App\Models\Bahan;



use App\Http\Requests;
use App\Http\Controllers\Controller;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item['bahan'] = Bahan::all();
        return view('index',$item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Cara 1
         // $item = new Bahan();
         // $item->nama = "tepung maizena";
         // $item->kode = "BHN01";
         // $item->save();
         // return redirect('bahan');

//        cara 2
       // $item = array('nama' => "telur ayam",'kode' => "BHN02");
       // Bahan::create($item);

        if (Request::isMethod('get'))  {
            return view('create');

        }
        elseif (Request::isMethod('post'))  {

            $item= array('nama' =>Input::get('nama'),'kode' =>Input::get('kode'));
            Bahan::create($item);
            return redirect('bahan');

        }




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
        //
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
        //
        // $item =  Bahan::find($id);
        // $item->nama= "Kentang";
        // $item->save();
        if (Request::isMethod('get'))
        {   $item['bahan'] = Bahan::find($id);
            return view('update',$item);

        }
        elseif (Request::isMethod('post'))  {

            $item=Bahan::find($id);
            $item->nama=Input::get('nama');
            $item->kode=Input::get('kode');
            $item->save();
            
            return redirect('bahan');

        }


        $item['bahan'] = Bahan::all();
        return redirect('bahan');
    }

    public function delete($id)
    {
        //
        $item =  Bahan::find($id);
        $item->delete();
       $item['bahan'] = Bahan::all();
        return redirect('bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
