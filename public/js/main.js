$(document).ready(function(){
	$('#ghost_form').bind("keyup keypress", function(e) {
	  var code = e.keyCode || e.which; 
	  if (code  == 13) {               
	    e.preventDefault();
	    return false;
	  }
	});

	$('#ubicacion').blur(function(){
		if($(this).val() !== ""){
			$('#pickup').animate({height:'235px'});    		
		}else{
			$('#pickup').animate({height:'60px'});
			
			$('#latitud').val('');
			$('#longitud').val('');
		}
	});
    
    $('#searchbox_entidades').selectize({
        valueField: 'id',
        labelField: 'nombre',
        searchField: ['descripcion'],
        maxOptions: 10,
        options: [],
        create: true,
        render: {
            option: function(item, escape) {
                // return '<div><img src="'+ item.icon +'">' + escape(item.descripcion) + '</div>';            	
            	return '<div>' + escape(item.nombre) + '<div class="contenedor-categoria">' + escape(item.subcategoria) + ', ' + escape(item.categoria) + '</div></div>';
            }
        },
        optgroups: [
            {value: 'entidad', label: 'Entidades'}
        ],
        /*optgroupField: 'class',
        optgroupOrder: ['product','category'],*/
        load: function(query, callback) {        	
            
        	if (!query.length){
            	return callback();
            }
        	
            $.ajax({
                url: root + '/search/entidad',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                	callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
        	// alert($('#searchbox').val());
            // window.location = this.items[0];
        }
    });
});