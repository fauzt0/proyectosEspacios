<?php session_start (); 
    $boton=$_POST['boton'];                
    //echo "boton = $boton";      
    //Cambio el contenido del DIV con los botones del menu 
                                                  
                            switch ($boton){ 
                                case "1": 
                                    include ("..//inc/ser.inc");  
                                break; 
                                case "2": 
                                    include ("..//inc/obr.inc");
				break;   
				case "3": 
                                    include ("..//inc/clie.inc");
			        break;  
				case "4": 
                                    include ("..//inc/ceo.inc");					
 				break;  
				case "5": 
                                    include ("..//inc/obj.inc");
 				break;  
				
					}
                      
    ?>
