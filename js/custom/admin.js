var LBN_PATH_IMAGES = '../images/';
var LBN_PATH_SWF    = '../swf/';
var LBN_PATH_UPLOAD = '../upload/';

function initSearchBox(page,msg){
	$("#search_box").Watermark(msg);
	$(".search_button").click(function() {
		var search_word = $("#search_box").val();
		var dataString = 'search_word='+ search_word;
		if(search_word==''){}
		else{
			$.ajax({
			type: "GET",
			url: page,
			data: dataString,
			cache: false,
			beforeSend: function(html) { 
				document.getElementById("insert_search").innerHTML = ''; 
				$("#flash").show();
				$("#searchword").show();
				$(".searchword").html(search_word);
				$("#flash").html('<img src="/images/ajax-loader.gif" align="absmiddle">&nbsp; loading results...');      
				},
			success: function(html){
			   $("#insert_search").show();	  
			   $("#insert_search").append(html);
			   $("#flash").hide();	
			   $('table tr:even').addClass('even');  
			   $('table tr:odd').addClass('odd');
			  }
			});
		}
    	return false;
	});
	$("#search_box").click(function() {
		 this.focus();
		 this.select();										
	});
}

function initFilter(){
		var de = $('#listin').listnav({
			   onClick:function(){
				   $("#ikeyword").val('enter keywords');
				   $("#ikeyword").css("color","#ccc");
		   }
		});   
		$('#listin tr').quicksearch({
					attached: '#filter',
					position: 'append',
					labelText: '',
					inputText: 'enter keywords',
					loaderImg: '../images/ajax-loader.gif',
					loaderText: 'Searching...',
					randomElement:'ikeyword'
			});	
}

function getFileExts(strExts) {
	var out = "";
	var arrExts = strExts.split("|");
	
	for (ele in arrExts)
		arrExts[ele] = "*." + arrExts[ele];
	
	out	= arrExts.join(";");
	out	+= "&" + out.replace(/[*]/gi, "").
                     replace(/;/gi, ", ").toUpperCase();
	return out;
}

function uploadImages(file, options) {
	var defaults = {
			'uploader'	: LBN_PATH_SWF + 'uploadify.swf',
			'script'	: 'uploadify.php',
			'cancelImg' : LBN_PATH_IMAGES +'cancel.png',
	        'folder'    : LBN_PATH_UPLOAD,
	        'queueID'   : 'fileQueue',
	        'buttonText': 'Upload Images',
	        'multi'     : true,
	        'auto'      : true
	};
	
	$("#"+ file).uploadify($.extend(defaults, options));
}

function ajaxAdmin(options) {
	var defaults = { 
		type: "POST",
		url: "admin-ajax.php"
	};
	$.ajax($.extend(defaults, options));
}

function Notify(msg, type) {
	var head = {};
	switch (type) {
		case 1:
			head = { header: '<span class="ui-icon ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><b>Alert :</b>', themeClass:'ui-state-error' };
			break;
		default:
			head = { header: '<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><b>Notification :</b>'};
			break;
	}
	$.jGrowl(msg, head);
}


function formValidate(){
	$("#oForm").validate({
		submitHandler: function(form) {
			 $('#loading').show();
			 $(':submit', form).attr('disabled', 'disabled');
		     form.submit();
		}
	});
}

function itemSortable(id,table){
 	$("#"+ id +" ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
        var order = $(this).sortable("serialize") + '&action=updateRecordsListings&table='+table; 
        $.post("order-item.php", order, function(theResponse){
             $.jGrowl("<b>Notification:</b><br>Order Updated!");
        }); 															 
    }});
}
function itemSortableJSON(id,table,json,ida,field){
 	$("#"+ id +" ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
        var order = $(this).sortable("serialize") + '&table='+table + '&json='+json + '&id='+ida + '&field='+field; 
        $.post("order-item-json.php", order, function(theResponse){
			 //alert(theResponse)	;
             $.jGrowl("<b>Notification:</b><br>Order Updated!");
        }); 															 
    }});
}	

(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( this.value.match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<button>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			}
		});
	})( jQuery );


$(document).ready(function() {
	$("font#featured").click(function(){
		var ele = $(this);
		$.post("admin-ajax.php",{action:"featured", id: $(this).attr("data-id"), 'class': $(this).attr("data-obj")}, function(response){
			$.jGrowl("<b>Notification:</b><br>Registro actualizado.!");
			$(ele).removeClass("on");
			$(ele).addClass(response);
		});
	});
});


//--- extending y/o creating a plugin jquery
(function($) {
	$.extend($.fn, {
		admin_sortable : function(cls) {
			var settings = {
					opacity: 0.6, 
					cursor: 'move',
					update: function() {
						var order = $(this).sortable("serialize") + "&action=ordering-records&class="+cls;					
						$.post("admin-ajax.php", order, function(response){
							$.jGrowl("<b>Notification:</b><br>Order Updated!");
						});
					}
			};
			return this.sortable(settings).disableSelection();
		},
		
		checkedToggle : function (wrap, execClass) {
			var $ele = this;
			var $checks = $(wrap).find('input:checkbox');
			
			
			
			$ele.bind('change', function(){
				$checks.attr('checked', this.checked).trigger('change');
			});
			
			$checks.bind('change', function() {
				if (this.checked) $(this).closest("li").addClass('selected'); else $(this).closest("li").removeClass('selected');
				$ele.attr('checked', $checks.filter(':checked').length == $checks.length ? true : false);
			});
			
			$(wrap).find('#del').live('click', function() {
				var obj = $(this).closest('li').find('input:checkbox');
				obj.attr('checked', true);
				obj.trigger('change');
				_removeItem(obj);
			});
			
			$ele.closest('ul').find('#remAll').bind('click', function() {
				_removeItem(this);
			});
			
			
			
			function _removeItem(obj) {
				
				var checkeds = $(wrap).find('input:checkbox:checked');
				
				if (checkeds.length == 0) {
					Notify('Select a item.!',1);
					return false;
				} else {
					var items, li;
					if (obj.id == "remAll") {
						items = checkeds.serialize();
						li = checkeds.closest("li");
					} else {
						items = $(obj).serialize();
						li = $(obj).closest("li");
					}
					
					items = decodeURIComponent(items);
					
					if (! confirm("You going to delete "+ li.length +" items ?")){
						return false;
					} else {
						ajaxAdmin({
							data: items + "&action=item-delete&class=" + execClass,
							success: function(response) {
								if (response) {
									Notify(response, 0);
									li.fadeOut(300, function(){$(this).remove();});
								}	
							}
						});
					}					
				}
			}
		}
	})
})( jQuery );