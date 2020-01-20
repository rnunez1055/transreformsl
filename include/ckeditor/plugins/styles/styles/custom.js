/*
* Author: Jhon Henry
* Date: 28/06/2013
* Comments: reglas para mostrar el dropdownlist stilos en el editor, se hace uso del atributo class del elemento, esto en el archivo css.  
* 			ckeditor/contents.css
* 			$config['stylesSet'] = 'custom';    
*/

/* ----------------------------------------------------------------------------------------------------
CKEDITOR.stylesSet.add( 'custom',
		[
		    // Block-level styles
		    { name : 'Blue Title', element : 'h2', styles : { 'color' : 'Blue' } },
		    { name : 'Red Title' , element : 'h3', styles : { 'color' : 'Red' } },
		    { name : 'Div Custom' , element : 'div', styles : { 'color' : 'peru', 'border' : '1px solid black' }, attributes : { 'class' : 'test' } },

		    // Inline styles
		    { name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
		    { name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } }
		]);
----------------------------------------------------------------------------------------------------  */

CKEDITOR.stylesSet.add( 'custom',
		[
		    // Block-level styles
		    // h3
		    /*{ name : 'Titulo Celeste' , element : 'h3', styles : { 'color' : '#009EE3' } },
		    { name : 'Titulo Amarillo' , element : 'h3', styles : { 'color' : '#F9B335' } },
		    { name : 'Titulo Morado' , element : 'h3', styles : { 'color' : '#352A6D' } },
		    { name : 'Titulo Verde' , element : 'h3', styles : { 'color' : '#95C11E' } },
		    
		    { name : 'Imagen con borde' , element : 'img', attributes : { 'class' : 'img-border' } },*/
		    
		    { name : 'Normal' , element : 'div', attributes : { 'class' : 'clear' } },
		    { name : 'Divicion' , element : 'div', attributes : { 'class' : 'divicion' } },
		    { name : 'Titulo' , element : 'div', attributes : { 'class' : 'links_int1' } },
		    { name : 'Descripcion' , element : 'div', attributes : { 'class' : 'links_int2' }
		    	/*, styles: {'background':'url(./contenido/img/lineas_int.jpg) 0 100% repeat-x', 'padding-bottom':'10px', 'font-size':'12px', 'margin-bottom' : '10px'}*/
		    },
		    //,
		    

		    // Inline styles
		    /*{ name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
		    { name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } }*/
		]);