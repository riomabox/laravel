<?php

namespace App\Http\Controllers;

use Request;
use Input;
use App\Models\Koki;



use App\Http\Requests;
use App\Http\Controllers\Controller;

class KokiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item['koki'] = Koki::all();
        return view('koki.index',$item);
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
         // $item = new Koki();
         // $item->nama = "tepung maizena";
         // $item->kode = "BHN01";
         // $item->save();
         // return redirect('koki');

//        cara 2
       // $item = array('nama' => "telur ayam",'kode' => "BHN02");
       // Koki::create($item);

        if (Request::isMethod('get'))  {
            return view('create');

        }
        elseif (Request::isMethod('post'))  {

            $item= array('nama' =>Input::get('nama'),'kode' =>Input::get('kode'));
            Koki::create($item);
            return redirect('koki');

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
        // $item =  Koki::find($id);
        // $item->nama= "Kentang";
        // $item->save();
        if (Request::isMethod('get'))
        {   $item['koki'] = Koki::find($id);  //sama dengan compact
            return view('koki.update',$item);

        }
        elseif (Request::isMethod('post'))  {

            $item=Koki::find($id);
            $item->nama=Input::get('nama');
            $item->kode=Input::get('kode');
            $item->save();
            
            return redirect('koki');

        }


        $item['koki'] = Koki::all();
        return redirect('koki');
    }

    public function delete($id)
    {
        //
        $item =  Koki::find($id);
        $item->delete();
       $item['koki'] = Koki::all();
        return redirect('koki');
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
    
    public function detail($id)
    {
        $koki = Koki::findOrFail($id);
        return view('koki.detail', compact('koki'));
    }
}
