<?php

class UbicacionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ubicaciones = Ubicacion::all();
		
		return View::make('ubicacion.index')->with('ubicaciones', $ubicaciones);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ubicacion.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$ubicacion = new Ubicacion;
		$ubicacion->descripcion = Input::get('descripcion');
		
		$rules = array(
				'descripcion' => array('required')
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->passes()){
			$ubicacion->save();
			return Redirect::to('ubicacion');
		}else{
			return Redirect::to('ubicacion/create')->withErrors($validation);
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
		$ubicacion = Ubicacion::find($id);
		
		return View::make('ubicacion.show')->with('ubicacion', $ubicacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ubicacion = Ubicacion::find($id);
		return View::make('ubicacion.edit')->with('ubicacion', $ubicacion);
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
		$ubicacion = Ubicacion::find($id);
		$ubicacion->descripcion = $input['descripcion'];
		
		$ubicacion->save();
		return Redirect::to('ubicacion/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$ubicacion = Ubicacion::find($id);
		$ubicacion->delete();
		
		return Redirect::to('ubicacion'); 
	}
	
	public function ubicacionSearch(){
		$query = Input::get('query');
		
		$ubicaciones = Ubicacion::whereRaw(
				"MATCH(descripcion) AGAINST(? IN BOOLEAN MODE)",
				array($query)
		)->get();
		
		return View::make('ubicacion.index', compact('ubicaciones'));
	}
}