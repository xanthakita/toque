// JavaScript Document

//	calc functions
var quant_vals = Array();
$(document).ready(function(e) {
	//	load ingredients into recipe and calculator
	var rec_list = $("#ingredients_list");
	//var calcHead1 = $("#header_1");
	
	//	get JSON data
	$.getJSON("/js/recipe.json",function(json) {
		var costs = "";
		var cost_vals = $("#vals");
		for(var i = 0; i < json.ingredients.length; i++) {
			//	temporary ingedient string
			var ingTmp = "";
			
			//	add quantity and measurement if quantity greater than 0
			if(parseFloat(json.ingredients[i].quantity) > 0)
				ingTmp += "<td><span class='quantity'>" + json.ingredients[i].quantity + "</span></td><td>" + json.ingredients[i].abbrv + "</td>";
			else
				ingTmp += "<td>&nbsp;</td><td>&nbsp;</td>";
				
			//	add ingredient name
			ingTmp += "<td>" + json.ingredients[i].name;
			
			//	add prep type if prep exists
			if(json.ingredients[i].prep)
				ingTmp += ", " + json.ingredients[i].prep + "</td>";
			else
				ingTmp += "</td>";
			$(rec_list).append("<tr>" + ingTmp + "</tr>");
			
			//	add current ingredient cost to costs string
			costs += (json.ingredients[i].cost.toString() + ";");
			
			//	add new ingredient and information to calc list
			/*$(calcHead1).after("<div id='item" + (i + 1) + "'>"
				+ "<div><p>" + json.ingredients[i].name + "</p></div>"
				+ "<div><p><input type='text' size='3' maxlength='3' value='" + json.ingredients[i].quantity + "' disabled> &minus; <input type='text' size='3' maxlength='3' value='0'></p></div>"
			+ "</div>");*/
		}
		//	insert costs string into #vals
		$(cost_vals).text(costs);
		var temp_q = $(".quantity").toArray();
		for(var i = 0; i < temp_q.length; i++) {
			quant_vals[i] = temp_q[i].innerHTML;
		}
		setRefs();
	});
});

function setRefs() {
	//	get number of items and item prices
	var num = $("#vals").text().match(/;/g).length;
	var prices = $("#vals").text().split(";", num);
	var serv = parseInt($("#calc_servings").val());
	
	for(var i = 0; i < num; i++ ) {
		prices[i] = parseFloat(prices[i]) * 100;
	}
	
	//	reference "need" and "have" fields
	/*var need = new Array(), have = new Array();
	for(var i = 0; i < num; i++) {
		need[i] = $("#item" + (i + 1) + " input:first-child");
		have[i] = $("#item" + (i + 1) + " input:last-child");
	}*/
	recalculate(prices, /*need, have,*/ serv);	
	
	//	recalculate cost
	$("#recalc").click(function(e) {
		recalculate(prices, /*need, have,*/ serv);
	});
	
	//	reset to original values
	$("#reset").click(function(e) {
		resetVals(prices, /*need, have,*/ num, serv);
	});	
}

//	recalculate amounts and price
function recalculate(prices, /*need, have,*/ serv) {
//	calculate costs
	/*var cost = 0;
	
	//	add up costs for ingredients
	for(var i = 0; i < prices.length; i++) {
		if(parseInt( $(have[i]).val() ) >= parseInt( $(need[i]).val() ))
			continue;
		
		cost += ((parseInt( $(need[i]).val() ) - parseInt( $(have[i]).val() )) * prices[i] / 100);
	}
	
	//	multiply ingredient cost by batches being made
	cost = cost * (parseInt($("#calc_servings").val()) / serv);
	
	//	display final cost
	$("#final").val("$" + (parseInt(cost * 100) / 100));*/
	
//	calculate amounts
	var calcServ = parseInt($("#calc_servings").val());
	if(calcServ > 0) {
		var quant = $(".quantity").toArray();
		$("#servings").text( calcServ );
		for(var i = 0; i < quant.length; i++) {
			var multiplier = (calcServ / serv);
			quant[i].innerHTML = parseInt((parseFloat(quant_vals[i]) * multiplier) * 100) / 100;
		}
	} else {
		alert("Please enter a positive serving number!");
	}
}

//	reset values to original
function resetVals(prices, /*need, have,*/ num, serv) {
	/*for(var i = 0; i < num; i++) {
		$("#item" + (i + 1) + " input:last-child").val("0");
	}*/
	$("#servings").text(serv);
	$("#calc_servings").val(serv);
	recalculate(prices, /*need, have,*/ serv);
}