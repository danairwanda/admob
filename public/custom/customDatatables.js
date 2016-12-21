$(document).ready(function(){
	$('#example').DataTable({
		initComplete: function(){
			this.api().column().every(function(){
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo($(column.header()).empty())
				.on('change', function(){
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
					);
					column
						.search( val ? '^' +val+ '$' : '', true, false)
						.draw();
				});
					column.data().unique().sort().each( function ( d, j ){
					// select.append('<option value="'+id+'">'+id+'</option>')
					if(column.search() === '^'+d+'$'){
				        select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
				    } else {
				        select.append( '<option value="'+d+'">'+d+'</option>' )
				    }
				});
			});
		}
	});
});