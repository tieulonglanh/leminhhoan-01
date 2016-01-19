
function echeck(str) {
	var at = "@";
	var dot = ".";
	var lat = str.indexOf(at);
	var lstr = str.length;
	var ldot = str.indexOf(dot);
	if (str.indexOf(at) == -1) {
				   //alert("Invalid E-mail ID")
		return false;
	}
	if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
				   //alert("Invalid E-mail ID")
		return false;
	}
	if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {
				    //alert("Invalid E-mail ID")
		return false;
	}
	if (str.indexOf(at, (lat + 1)) != -1) {
				    //alert("Invalid E-mail ID")
		return false;
	}
	if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
				    //alert("Invalid E-mail ID")
		return false;
	}
	if (str.indexOf(dot, (lat + 2)) == -1) {
				    //alert("Invalid E-mail ID")
		return false;
	}
	if (str.indexOf(" ") != -1) {
				    //alert("Invalid E-mail ID")
		return false;
	}
	return true;
}
function validateNumber(field, min, max) {
	if (isNaN(field.value) || field.value.length < min || field.value.length > max) {
		return false;
	} else {
		return true;
	}
}
function ShowTip(divId) {
	if (document.getElementById(divId) != null) {
		document.getElementById(divId).style.display = "block";
	}
}
function HideTip(divId) {
	if (document.getElementById(divId) != null) {
		document.getElementById(divId).style.display = "none";
	}
}
function isValidBlogAddress(url) {
	var v = new RegExp();
	v.compile("^[A-Za-z0-9-_]+$");
	if (!v.test(url)) {
		return false;
	}
	return true;
}
function retrieveURLAction(url, function_change) {
	var username = document.frmSignup.username.value;
	url = url + "?username=" + username;
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		try {
			req.open("GET", url, true);
		}
		catch (e) {
			alert("Problem Communicating with Server\n" + e);
		}
		req.onreadystatechange = function_change;
		req.send(null);
	} else {
		if (window.ActiveXObject) {
			req = new ActiveXObject("Microsoft.XMLHTTP");
			if (req) {
				req.open("GET", url, true);
				req.onreadystatechange = function_change;
				req.send();
			}
		}
	}
}
function processStateChange() {
	if (req.readyState == 4) {
		if (req.status == 200) {
			  			//alert("req : " + req.responseText);
			document.getElementById("d_user").innerHTML = req.responseText;
		} else {
			alert("Problem with server response:\n " + req.statusText);
		}
	}
}
function retrieveURLActionEmail(url, function_change) {
	var email = document.frmSignup.email.value;
	url = url + "?email=" + email;
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		try {
			req.open("GET", url, true);
		}
		catch (e) {
			alert("Problem Communicating with Server\n" + e);
		}
		req.onreadystatechange = function_change;
		req.send(null);
	} else {
		if (window.ActiveXObject) {
			req = new ActiveXObject("Microsoft.XMLHTTP");
			if (req) {
				req.open("GET", url, true);
				req.onreadystatechange = function_change;
				req.send();
			}
		}
	}
}
function processStateChangeEmail() {
	if (req.readyState == 4) {
		if (req.status == 200) {
			document.getElementById("d_email").innerHTML = req.responseText;
		} else {
			alert("Problem with server response:\n " + req.statusText);
		}
	}
}

