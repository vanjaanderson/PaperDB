function getAttribute(table, key, ref) {
	// Check for response
	if (window.XMLHttpRequest) {
		// If Gecko browser (all browsers except IE < 7)
		xhr = new XMLHttpRequest();
	} else {
		// Else if IE <7
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}
	// Check the state of change (if it's ready)
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// Put content from content.php...
			// document.getElementById('view').style.display = "none";
			document.getElementById('view').innerHTML = xhr.responseText;
		}
	}
	// Take the content from functions parameter and make it an http-request
	xhr.open('GET', 'inc/result.php?filename=' + filename + '&find=' + find + '&replace=' + replace, true);

	// Send content
	xhr.send();
}