<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request as HttpRequest;
use Request;
use Input;
use App\Models\Koki;
use App\Models\Resep;

use App\Models\Bahan;

use App\Http\Controllers\Controller;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public $inputRules = [
        'nama' => 'required',
    ];
    public $customAtributes = [
        'nama' => 'Nama Resep',
    ];
    
    public function index()
    {
        //cara 1
        //$item['items'] = Resep::all();
        //return view('resep.index',$item);
        //cara 2
        $items = Resep::all();
        return view('resep.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HttpRequest $request)
    {
        //
        //Cara 1
         // $item = new Resep();
         // $item->nama = "tepung maizena";
         // $item->kode = "BHN01";
         // $item->save();
         // return redirect('resep');

//        cara 2
       // $item = array('nama' => "telur ayam",'kode' => "BHN02");
       // Resep::create($item);

        if (Request::isMethod('get'))  {
            //$items['koki']  = Koki::all();
            //return view('resep.create',$items);
            $bahans = Bahan::get();
            $kokis = Koki::get();
            return view('resep.create', compact('bahans', 'kokis'));
        }
        elseif (Request::isMethod('post'))  {

            //$item= array('nama' =>Input::get('nama')
            //             ,'kode' =>Input::get('kode')
            //             ,'koki_id'=>Input::get('koki_id'));
            //Resep::create($item);
            //return redirect('resep');
            //dd(Input::all());
            //Resep::create($item);
            //return redirect('resep');
            $this->validate($request, $this->inputRules, $this->locale(), $this->customAtributes);
            $newResep = Resep::create(Input::all());
            $bahan_ids = Input::get('bahan_ids');
            $newResep->bahan()-> attach($bahan_ids);
            
            return redirect('resep/detail/' . $newResep->id);
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
    public function update($id)
    {
        //
        // $item =  Resep::find($id);
        // $item->nama= "Kentang";
        // $item->save();
        if (Request::isMethod('get'))
        {   //$item['resep'] = Resep::find($id);
            //$item['koki'] = Koki::all();
            //return view('resep.update',$item);
            $resep = Resep::find($id);
            $bahans = Bahan::get();
            return view('resep.update', compact('bahans', 'resep'));
            
        }
        elseif (Request::isMethod('post'))  {

            //$item=Resep::find($id);
            //$item->nama=Input::get('nama');
            //$item->kode=Input::get('kode');
            //$item->koki_id=Input::get('koki_id');
            //$item->save();
            
            //return redirect('resep');
            $resep = Resep::findOrFail($id);
            $resep->update(Input::all());
            $newBahanIds = Input::get('bahan_ids');
            $resep->bahan()->sync($newBahanIds);
            return redirect('resep/detail/' .$resep->id);
            
        }
    }

    public function delete($id)
    {
        //
        $item =  Resep::find($id);
        $item->delete();
       $item['resep'] = Resep::all();
        return redirect('resep');
    }
    
    public function detail($id)
    {
        $item = Resep::findOrFail($id);
        return view('resep.detail', compact('item'));
    }
    
    
    public function locale()
    {
        return array(

            /*
            |---------------------------------------------------------------------------------------
            | Baris Bahasa untuk Validasi
            |---------------------------------------------------------------------------------------
            |
            | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
            | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
            | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
            |
             */

            "accepted"             => "Isian :attribute harus diterima.",
            "active_url"           => "Isian :attribute bukan URL yang valid.",
            "after"                => "Isian :attribute harus tanggal setelah :date.",
            "alpha"                => "Isian :attribute hanya boleh berisi huruf.",
            "alpha_dash"           => "Isian :attribute hanya boleh berisi huruf, angka, dan strip.",
            "alpha_num"            => "Isian :attribute hanya boleh berisi huruf dan angka.",
            "array"                => "Isian :attribute harus berupa sebuah array.",
            "before"               => "Isian :attribute harus tanggal sebelum :date.",
            "between"              => array(
                "numeric" => "Isian :attribute harus antara :min dan :max.",
                "file"    => "Isian :attribute harus antara :min dan :max kilobytes.",
                "string"  => "Isian :attribute harus antara :min dan :max karakter.",
                "array"   => "Isian :attribute harus antara :min dan :max item.",
            ),
            "boolean"              => "Isian :attribute harus berupa true atau false",
            "confirmed"            => "Konfirmasi :attribute tidak cocok.",
            "date"                 => "Isian :attribute bukan tanggal yang valid.",
            "date_format"          => "Isian :attribute tidak cocok dengan format :format.",
            "different"            => "Isian :attribute dan :other harus berbeda.",
            "digits"               => "Isian :attribute harus berupa angka :digits.",
            "digits_between"       => "Isian :attribute harus antara angka :min dan :max.",
            "email"                => "Isian :attribute harus berupa alamat surel yang valid.",
            "exists"               => "Isian :attribute yang dipilih tidak valid.",
            "image"                => "Isian :attribute harus berupa gambar.",
            "in"                   => "Isian :attribute yang dipilih tidak valid.",
            "integer"              => "Isian :attribute harus merupakan bilangan bulat.",
            "ip"                   => "Isian :attribute harus berupa alamat IP yang valid.",
            "max"                  => array(
                "numeric" => "Isian :attribute seharusnya tidak lebih dari :max.",
                "file"    => "Isian :attribute seharusnya tidak lebih dari :max kilobytes.",
                "string"  => "Isian :attribute seharusnya tidak lebih dari :max karakter.",
                "array"   => "Isian :attribute seharusnya tidak lebih dari :max item.",
            ),
            "mimes"                => "Isian :attribute harus dokumen berjenis : :values.",
            "min"                  => array(
                "numeric" => "Isian :attribute harus minimal :min.",
                "file"    => "Isian :attribute harus minimal :min kilobytes.",
                "string"  => "Isian :attribute harus minimal :min karakter.",
                "array"   => "Isian :attribute harus minimal :min item.",
            ),
            "not_in"               => "Isian :attribute yang dipilih tidak valid.",
            "numeric"              => "Isian :attribute harus berupa angka.",
            "regex"                => "Format isian :attribute tidak valid.",
            "required"             => "Bidang isian :attribute wajib diisi.",
            "required_if"          => "Bidang isian :attribute wajib diisi bila :other adalah :value.",
            "required_with"        => "Bidang isian :attribute wajib diisi bila terdapat :values.",
            "required_with_all"    => "Bidang isian :attribute wajib diisi bila terdapat :values.",
            "required_without"     => "Bidang isian :attribute wajib diisi bila tidak terdapat :values.",
            "required_without_all" => "Bidang isian :attribute wajib diisi bila tidak terdapat ada :values.",
            "same"                 => "Isian :attribute dan :other harus sama.",
            "size"                 => array(
                "numeric" => "Isian :attribute harus berukuran :size.",
                "file"    => "Isian :attribute harus berukuran :size kilobyte.",
                "string"  => "Isian :attribute harus berukuran :size karakter.",
                "array"   => "Isian :attribute harus mengandung :size item.",
            ),
            "timezone"             => "Isian :attribute harus berupa zona waktu yang valid.",
            "unique"               => "Isian :attribute sudah ada sebelumnya.",
            "url"                  => "Format isian :attribute tidak valid.",

            /*
            |---------------------------------------------------------------------------------------
            | Baris Bahasa untuk Validasi Kustom
            |---------------------------------------------------------------------------------------
            |
            | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
            | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
            | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
            |
             */

            'custom'               => array(
                'attribute-name' => array(
                    'rule-name' => 'custom-message',
                ),
            ),

            /*
            |---------------------------------------------------------------------------------------
            | Kustom Validasi Atribut
            |---------------------------------------------------------------------------------------
            |
            | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
            | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
            | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
            |
             */

            'attributes'           => array(),

        );
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

?>