function show() {
    var p = document.getElementById('pass1');
    var o = document.getElementById('pass2');
    p.setAttribute('type', 'text');
    o.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pass1');
    var o = document.getElementById('pass2');
    p.setAttribute('type', 'password');
    o.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;	
				document.getElementById("eye").classList.add("fa-eye-slash");
				document.getElementById("eye").classList.remove("fa-eye");
        show();
    } else {
        pwShown = 0;
			  document.getElementById("eye").classList.add("fa-eye");
				document.getElementById("eye").classList.remove("fa-eye-slash");
        hide();
    }
}, false);