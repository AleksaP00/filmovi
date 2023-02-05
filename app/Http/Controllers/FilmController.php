<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResurs;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends BaseController
{
    public function index()
    {
        $filmovi = Film::all();
        return $this->uspesno(FilmResurs::collection($filmovi), 'Vraceni su svi filmovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'zanrID' => 'required',
            'reditelj' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $film = Film::create($input);

        return $this->uspesno(new FilmResurs($film), 'Novi film je kreiran.');
    }


    public function show($id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return $this->greska('Film sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new FilmResurs($film), 'Film sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return $this->greska('Film sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'zanrID' => 'required',
            'reditelj' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $film->naziv = $input['naziv'];
        $film->zanrID = $input['zanrID'];
        $film->reditelj = $input['reditelj'];
        $film->save();

        return $this->uspesno(new FilmResurs($film), 'Film je azuriran.');
    }

    public function destroy($id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return $this->greska('Film sa zadatim ID-em ne postoji.');
        }
        $film->delete();
        return $this->uspesno([], 'Film je obrisan.');
    }
}
