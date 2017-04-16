function field_focus(field, email)
  {
    if(field.value == email)
    {
      field.value = '';
    }
  }

  function field_blur(field, email)
  {
    if(field.value == '')
    {
      field.value = email;
    }
  }

//Fade in dashboard box
$(document).ready(function(){
    $('.box').hide().fadeIn(1000);
    });

//Stop click event
$('a').click(function(event){
    event.preventDefault(); 
	});

function login(){
document.getElementById("loginfrm").submit();
}

function register(){
  var pwd = document.getElementById("password").value;
  var nwpwd = document.getElementById("nwpwd").value;
if (pwd==nwpwd){
  document.getElementById("registerfrm").submit();
  }else{
    document.getElementById("msg").innerHTML = "Password confirmation mismatch."

  }
}