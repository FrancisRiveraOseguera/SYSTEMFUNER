$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
});

//Modal Timer
$(function(){
  $('#modalPush').on('show.bs.modal', function(){
      var myModal = $(this);
      clearTimeout(myModal.data('hideInterval'));
      myModal.data('hideInterval', setTimeout(function(){
          myModal.modal('hide');
      }, 7000));
  });
});

//Password validation
$(document).ready(function() {

$('#pass2').keyup(function() {

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if ( pass1 == pass2 ) {
			$('#error2').css("background", "url(/../assets/check.png)");
      $('#G').text("Las contraseñas coinciden").css("color", "green");
		} else {
			$('#error2').css("background", "url(/../assets/check-.png)");
      $('#G').text("Las contraseñas no coinciden").css("color", "red");
      
		}

	});

});