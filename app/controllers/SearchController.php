<?php

/**
 * ApiSearchController is used for the "smart" search throughout the site.
 * it returns and array of items (with type and icon specified) so that the selectize.js plugin can render the search results properly
 **/

class SearchController extends BaseController {

	public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;
	}
		
	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			$item['url'] = url($prefix.'/'.$item['descripcion']);			
		}
		return $data;
	}

	public function index()
	{
		$query = e(Input::get('q',''));
		
		if(!$query && $query == ''){
			return Response::json(array(), 400);
		}
				
		$ubicaciones = DB::table('ubicacion')
			->where('descripcion', 'like', '%'.$query.'%')
			->get();
		
		/*$categories = Category::where('name','like','%'.$query.'%')
			->has('products')
			->take(5)
			->get(array('slug', 'name'))
			->toArray();*/

		// Data normalization
		// $ubicaciones = $this->appendValue($ubicaciones, url('img/icons/category-icon.png'),'icon');
		
		// $ubicaciones = $this->appendURL($ubicaciones, 'ubicaciones');
		// $categories  = $this->appendURL($categories, 'categories');
		
		// Add type of data to each item of each set of results
		// $products = $this->appendValue($products, 'product', 'class');
		// $categories = $this->appendValue($categories, 'category', 'class');

		// Merge all data into one array
		// $data = array_merge($products, $categories);
		
		return Response::json(array(
			// 'data'=>$data
				'data'=>$ubicaciones
		));
	}

	public function categoria(){
		$query = e(Input::get('q',''));
		
		if(!$query && $query == ''){
			return Response::json(array(), 400);
		}
		
		$categorias = DB::table('categoria')
		->where('nombre', 'like', '%'.$query.'%')
		->orderBy('nombre')
		->take(10)
		->get();
		
		return Response::json(array(
				'data' => $categorias
		));
	}
	
	public function entidad(){
		$query = e(Input::get('q',''));
		
		if(!$query && $query == ''){
			return Response::json(array(), 400);
		}
		
		$entidades = DB::table('entidad')
		->where('nombre', 'like', '%'.$query.'%')
		->orWhere('categoria', 'like', '%'.$query.'%')
		->orWhere('subcategoria', 'like', '%'.$query.'%')
		->orderBy('nombre')
		->take(10)
		->get();
		
		foreach($entidades as $key => $entidad){			
			$entidad->descripcion = $entidad->nombre.', '.$entidad->subcategoria.', '.$entidad->categoria;
		}
		
		return Response::json(array(
				'data' => $entidades
		));
	}
}