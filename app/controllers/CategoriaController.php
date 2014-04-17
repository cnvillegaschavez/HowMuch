<?php

class CategoriaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categoria::all();
		
		return View::make('categoria.index')->with('categorias', $categorias);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('categoria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categoria = new Categoria;
		$categoria->nombre = Input::get('nombre');
		$categoria->etiquetas = Input::get('etiquetas');
		
		$rules = array(
				'nombre' => array('required')
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->passes()){
			$categoria->save();
			return Redirect::to('categoria');
		}else{
			return Redirect::to('categoria/create')->withErrors($validation);
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
		$categoria = Categoria::find($id);
		
		return View::make('categoria.show')->with('categoria', $categoria);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categoria::find($id);
		return View::make('categoria.edit')->with('categoria', $categoria);
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
		$categoria = Categoria::find($id);
		$categoria->nombre = $input['nombre'];
		$categoria->etiquetas = $input['etiquetas'];
		
		$categoria->save();
		return Redirect::to('categoria/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = Categoria::find($id);
		$categoria->delete();
		
		return Redirect::to('categoria'); 
	}
}