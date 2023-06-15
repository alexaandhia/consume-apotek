<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Libraries\BaseApi;
use Illuminate\Http\Request;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        // selain pake new bisa pake BaseApi::
        $data = (new BaseApi)->index('/api/apotek', ['search_nama' => $search]);
        $apotek = $data->json();
        // dd($apotek);
        foreach ($apotek['data'] as &$data) {
            if (is_array($data['obat'])) {
                $data['obat'] = implode(', ', $data['obat']);
            }
            
            if (is_array($data['harga'])) {
                $data['harga'] = implode(', ', $data['harga']);
            }
        }
        return view('index')->with(['apotek' => $apotek['data']]);
    }

    public function landpage(){
        return view('landpage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = [
            'nama' => $request->nama,
            'rujukan' => $request->rujukan,
            'rumah_sakit' =>  $request->rujukan == 1 ? $request->rumah_sakit : null,
            'obat' => $request->obat,
            'harga' => $request->harga,
            'apoteker' => $request->apoteker,
        ];

        

        $added = (new BaseApi)->store('/api/apotek/add', $data);
        // dd($data);
        if ($added->failed()) {
            $errors = $added->json('data');
            return redirect()->back()->with(['error' => $errors]);
        }else{
            return redirect('/index')->with('success', 'Berhasil menambahkan data');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = (new BaseApi)->edit('/api/apotek/'.$id);

        if ($data->failed()) {
            $errors = $data->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            $apotek = $data->json('data');
            return view('edit')->with(['apotek' => $apotek]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = [
            'nama' => $request->nama,
            'rujukan' => $request->rujukan,
            'rumah_sakit' =>  $request->rujukan == 1 ? $request->rumah_sakit : null,
            'obat' => $request->obat,
            'harga' => $request->harga,
            'apoteker' => $request->apoteker,
        ];

        $updated = (new BaseApi)->update('/api/apotek/update/'.$id, $payload);
        //dd($updated);
        if ($updated->failed()) {
            $errors = $updated->json('data');
            return redirect()->back()->with(['error' => $errors]);
        }else{
            return redirect('/index')->with('success', 'Berhasil menambahkan data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = (new BaseApi)->destroy('/api/apotek/delete/{id}'.$id);
        if ($deleted->failed()) {
            $errors = $deleted->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/index')->with('success', 'Delete Succeed!');
        }
    }

    public function trash(){

        $data = (new BaseApi)->trash('/api/apotek/trash');
        $apotek = $data->json();
        // dd($apotek);
        foreach ($apotek['data'] as &$pharmacy) {
            if (is_array($pharmacy['obat'])) {
                $pharmacy['obat'] = implode(', ', $pharmacy['obat']);
            }
            
            if (is_array($pharmacy['harga'])) {
                $pharmacy['harga'] = implode(', ', $pharmacy['harga']);
            }
        }
        
        return view('trash')->with(['trashdata' => $apotek['data']]);
    }

    public function restore(string $id){
        $restore = (new BaseApi)->restore('/api/apotek/trash/restore/'.$id);
        
        //dd($restore);
        if ($restore->failed()) {
            $errors = $restore->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/index')->with('success', 'data Restored');

        }
    }

    public function permanentDelete(string $id){
        $proses = (new BaseApi)->permanentDelete('/api/apotek/delete/permanent/'.$id);
        //dd($proses);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect()->back()->with('success', 'Data deleted permanently');

        }
    }
}
