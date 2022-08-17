<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Http\Resources\StudentsResource;

class FormController extends Controller
{

	public function show()
	{
		return ProdukModel::all();
	}

	public function create(Request $request)
    {
    	
    	$request->validate([
		    'nama' => 'required',
		    'sku' => 'required',
		    'brand' => 'required',
			'deskripsi' => 'required',
		    'variasi' => 'required',
		]);

    	// dd($request->all());

    	$data_input = new ProdukModel;
    	$data_input->nama = $request->nama;
    	$data_input->sku = $request->sku;
		$data_input->brand = $request->brand;
    	$data_input->deskripsi = $request->deskripsi;
    	$data_input->variasi = $request->variasi;
    	$data_input->save();

    	return response()->json([
    		'message' => 'data list produk berhasil ditambah',
    		'data_input' => $data_input
    	], 200);
    }

	public function edit($id)
	{
		$data_input = ProdukModel::find($id);
	//   $studentCollection = new StudentsResource($student);
	  // dd($student);

	  return response()->json([
    		'message' => 'Success Found',
    		'data_input' => $data_input
    	], 200);
	}
	
    public function update(Request $request, $id)
	{
		$data_input = ProdukModel::find($id);

		$request->validate([
			'nama' => 'required',
		    'sku' => 'required',
		    'brand' => 'required',
			'deskripsi' => 'required',
		    'variasi' => 'required',
		]);

		$data_input->update([
		    'nama' => $request->nama,
		    'sku' => $request->sku,
		    'brand' => $request->brand,
			'deskripsi' => $request->deskripsi,
		    'variasi' => $request->variasi
		]);

		return response()->json([
    		'message' => 'data produk berhasil update',
    		'data_input' => $data_input
    	], 200);
	}
    
	public function delete($id)
	{
		$data_input = ProdukModel::find($id)->delete();
		return response()->json([
    		'message' => 'data produk berhasil dihapus',	
    	], 200);
	}
}
