<?php


function getHash($str){
	/*
	
		Cette fonction hash un string (on l'utilisera quasiment que pour les mdp et les urls')
	
	*/
	return hash('md5',$str);

}



function checkHash($plainSTR,$hashedSTR){
	/*
	
		Cette fonction vérifie que le string en entrée soit identique au string hashé 
		
		/!\ ATTENTION :
			> cette fonction return un int ! 
					- checkHash(x,y) == 0 : 
							les chaines de charactère sont identiques

					- checkHash(x,y) != 0 : 
							les chaines de charactère sont diferentes 

	*/


	return strcmp( $hashedSTR, hash('md5',$plainSTR) );

}


?>