
var elements = document.querySelectorAll('.managed');

for(var i = 0; i < elements.length; i++) {
	
	/*var parent = elements[i].parentElement;
	parent.style.position = "relative";

	var div = document.createElement('div');
	div.style.width = "5px";
	div.style.height = "5px";
	div.style.backgroundColor = "red";
	div.style.position = "absolute";
	div.style.left = "0px";
	div.style.top = "0px";

	parent.appendChild(div);*/
	elements[i].style.position = "relative";

	var div = document.createElement('div');
	div.style.width = "5px";
	div.style.height = "5px";
	div.style.backgroundColor = "red";
	div.style.position = "absolute";
	div.style.left = "0px";
	div.style.top = "0px";

	elements[i].appendChild(div);
}