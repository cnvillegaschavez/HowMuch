<?php

class EntidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entidades = entidad::all();
		
		return View::make('entidad.index')->with('entidades', $entidades);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('entidad.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$entidad = new Entidad;
		$entidad->nombre = Input::get('nombre');
		$entidad->etiquetas = Input::get('etiquetas');
		
		$rules = array(
				'nombre' => array('required')
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->passes()){
			$entidad->save();
			return Redirect::to('entidad');
		}else{
			return Redirect::to('entidad/create')->withErrors($validation);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$entidad = Entidad::find($id);
		
		return View::make('entidad.show')->with('entidad', $entidad);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entidad = Entidad::find($id);
		return View::make('entidad.edit')->with('entidad', $entidad);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$entidad = Entidad::find($id);
		$entidad->nombre = $input['nombre'];
		$entidad->etiquetas = $input['etiquetas'];
		
		$entidad->save();
		return Redirect::to('entidad/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$entidad = Entidad::find($id);
		$entidad->delete();
		
		return Redirect::to('entidad'); 
	}
}