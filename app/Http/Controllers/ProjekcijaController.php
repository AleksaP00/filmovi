<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjekcijaResurs;
use App\Models\Projekcija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjekcijaController extends BaseController
{
    public function index()
    {
        $projekcije = Projekcija::all();
        return $this->uspesno(ProjekcijaResurs::collection($projekcije), 'Vracene su sve projekcije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'filmID' => 'required',
            'datum' => 'required',
            'sala' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $projekcija = Projekcija::create($input);

        return $this->uspesno(new ProjekcijaResurs($projekcija), 'Nova projekcija je kreirana.');
    }


    public function show($id)
    {
        $projekcija = Projekcija::find($id);
        if (is_null($projekcija)) {
            return $this->greska('Projekcija sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new ProjekcijaResurs($projekcija), 'Projekcija sa zadatim ID-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $projekcija = Projekcija::find($id);
        if (is_null($projekcija)) {
            return $this->greska('Projekcija sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'filmID' => 'required',
            'datum' => 'required',
            'sala' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $projekcija->filmID = $input['filmID'];
        $projekcija->datum = $input['datum'];
        $projekcija->sala = $input['sala'];
        $projekcija->save();

        return $this->uspesno(new ProjekcijaResurs($projekcija), 'Projekcija je azurirana.');
    }

    public function destroy($id)
    {
        $projekcija = Projekcija::find($id);
        if (is_null($projekcija)) {
            return $this->greska('Projekcija sa zadatim ID-em ne postoji.');
        }

        $projekcija->delete();
        return $this->uspesno([], 'Projekcija je obrisana.');
    }
}
