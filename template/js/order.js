
var div = document.getElementById('current-orders');

/*
if(!div) {
	throw "Вы не в режиме администратора";
}
*/

div.onclick = function() {
	window.location = "/orders";
};
