<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZanrResurs;
use App\Models\Zanr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZanrController extends BaseController
{
    public function index()
    {
        $zanrovi = Zanr::all();
        return $this->uspesno(ZanrResurs::collection($zanrovi), 'Vraceni su svi zanrovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'zanr' => 'required',
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $zanr = Zanr::create($input);

        return $this->uspesno(new ZanrResurs($zanr), 'Novi zanr je kreiran.');
    }


    public function show($id)
    {
        $zanr = Zanr::find($id);
        if (is_null($zanr)) {
            return $this->greska('Zanr sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new ZanrResurs($zanr), 'Zanr sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $zanr = Zanr::find($id);
        if (is_null($zanr)) {
            return $this->greska('Zanr sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'zanr' => 'required',
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $zanr->zanr = $input['zanr'];
        $zanr->save();

        return $this->uspesno(new ZanrResurs($zanr), 'Zanr je azuriran.');
    }

    public function destroy($id)
    {
        $zanr = Zanr::find($id);
        if (is_null($zanr)) {
            return $this->greska('Zanr sa zadatim ID-em ne postoji.');
        }

        $zanr->delete();
        return $this->uspesno([], 'Zanr je obrisan.');
    }
}
