
var elements = document.querySelectorAll('.managed');

for(var i = 0; i < elements.length; i++) {
	
	elements[i].style.position = "relative";

	var div = document.createElement('div');
	div.style.cursor = "pointer";

	div.style.position = "absolute";

	div.style.width = "6px";
	div.style.height = "6px";
	div.style.left = "0px";
	div.style.top = "0px";
	div.style.backgroundColor = "red";

	div.classList.add('manage-button');
	//div.classList.add('glyphicon');
	//div.classList.add('glyphicon-pencil');

	elements[i].appendChild(div);
}