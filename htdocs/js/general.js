// JavaScript Document

$(document).ready(function(e) {
	//	gather initial information
	var size = new Array();

	//	scroll div into view
	$("#login").click(function(e) {
		size['w'] = $(window).outerWidth();
		size['h'] = $(window).outerHeight();
		var left = (parseInt(size['w']) - parseInt($("#slider").outerWidth())) / 2;
		var top = (parseInt(size['h']) - parseInt($("#slider").outerHeight())) / 2;
		$("#slider").css("left", left);
		$("#trans").css("z-index", 900).animate({"opacity":0.5}, 500);
		//$("#trans").animate({"opacity":0.5}, 500);
		$("#slider").delay(500).animate({"top":top}, 1000);
	});
	//	switch to sign up form
	$("#register").click(function(e) {
		$("#loginDiv").animate({"opacity":0}, 250).delay(250).css("display","none");
		$("#newUser").css("display", "block").animate({"opacity": 100}, 250);
	});
	//	switch back to login
	//	close div
	$("#x").click(function(e) {
		$("#slider").animate({"top":-500}, 1000);
		$("#trans").delay(500).animate({"opacity":0}, 250).delay(250).css("z-index", -10);
		//$("#trans").delay(250).animate({"z-index":-10}, 0);
		$("#newUser").delay(750).css({"opacity":0, "display":"none"});
		$("#loginDiv").delay(750).css({"display":"block", "opacity":100});
	});
	
});