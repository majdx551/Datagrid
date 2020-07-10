<?php

	
		
		include 'connect.php';
		// ROUTERS
		$tpl	 	 =		 'Template/'; 			// Template Directory
		$function    =       'Func/';			//Function Directory
		$css		 =		 'Css/'; 				// Css Directory
		

		//INCLUDE THE IMPORTANT FILE
		
		include $function.'func.php';
		include $tpl.'header.php';
		include $tpl.'footer.php';
	