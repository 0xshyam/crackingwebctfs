<?php

function usercookie($username){
	return substr(md5('nullcon2017'),0,10).md5($username);
}


function rolecookie($role){
	return substr(md5('nullcon2017'),0,10).md5($role);
}

?>