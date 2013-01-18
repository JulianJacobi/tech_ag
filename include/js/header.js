function minimize() {
	var head = document.getElementById('head');
	var image = document.getElementById('minimizeIcon');
	if (head.style.height == '100px') {
		fadeDown();
	}
	else {
		head.style.height = '250px';
		fadeUp();
	}
}
function fadeDown() {
	var head = document.getElementById('head');
	var image = document.getElementById('minimizeIcon');
	var zahl = parseInt(head.style.height);
	head.style.height = zahl + 1;
	timeout = setTimeout('fadeDown()', 0.5);
	if(head.style.height == '250px') {
		image.src = 'img/png/Arrow Up 4.png';
		clearTimeout(timeout);
	}
	document.cookie = "head=top; expires=Thu, 01-Jan-70 00:00:01 GMT;";
}
function fadeUp() {
	var head = document.getElementById('head');
	var image = document.getElementById('minimizeIcon');
	var zahl = parseInt(head.style.height);
	head.style.height = zahl - 1;
	timeout = setTimeout('fadeUp()', 0.5);
	if(head.style.height == '100px') {
		image.src = 'img/png/Arrow Down 4.png';
		clearTimeout(timeout);
	}
	document.cookie = "head=top";
}