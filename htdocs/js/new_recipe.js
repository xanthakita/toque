		//	For adding and deleting ingredient rows
var rows;
$(document).ready(function(e) {
	
	//	default "select" lists
	var measure_list = document.getElementsByName("msr1")[0].innerHTML;
	var ingredient_list = document.getElementsByName("ing1")[0].innerHTML;
	rows_tmp = $(".row").toArray();
	rows = rows_tmp.length;
	
	//	sets click event handler for each delete button
	$("#delete").click(function(e) {
		$("#row_" + rows).remove();
		rows -= 1;
	});
	
	//	sets click event handler for add button
	$("#add").click(function(e) {
		add_row(measure_list, ingredient_list);
	});
});

function add_row(msr_html, ing_HTML) {
	rows += 1;
	var newRow = '<tr id="row_' + rows + '">'
		+'<td><input type="text" name="qty' + rows + '" size="8"/></td>'
		+'<td><select name="msr' + rows + '">'
			+ msr_html
		+'</select></td>'
		+'<td><select name="ing' + rows + '">'
			+ ing_HTML
		+'</select></td>'
		+'<td>'
			+'<input type="text" name="prep' + rows + '" size="16"/>'
		+'</td>'
	+'</tr>';
	$("#recipe_ingredients").append( newRow );
}