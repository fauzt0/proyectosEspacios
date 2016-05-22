<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyectos Espacios</title>
	<link rel="stylesheet" type="text/css" href="../../conten/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../conten/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../../conten/bootstrap/css/style.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="../../conten/bootstrap/js/bootstrap.js"></script>
</head>

<body>
<header>
  <div class="container" >
    <div class="row">                 
      
        <!--<div class="panel-body">  -->
            <nav class="navbar navbar-default" id="top-pane">
              <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">                  
                    </a>
                    <img class="img-responsive" id="logo" src="../../conten/img/logo.png">
                </div>
<!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="paner1">                      
                      <a href="#" class="btn btn-primary">Galería</a>
                      <a href="#" class="btn btn-success">Blog</a>
                      <!--<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                          </ul>
                      </li>-->
                    </ul> 
                    <ul class="nav navbar-nav navbar-right" id="paner2">
                      <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Inicio">
                         <span class="glyphicon glyphicon-home" aria-hidden="true"></span>              
                      </a>

                      <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Contacto">
                         <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>              
                      </a>
                    
                      <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Mapa de sitio">
                         <span class="glyphicon glyphicon-th-list  " aria-hidden="true"></span>              
                      </a>                                                                                                              
                    </ul>
                    <br>
                    <form class="navbar-form navbar-left" role="search">
                      <div class="form-group">  
                        <input type="text" class="form-control" placeholder="Buscar...">
                      </div>
                      <button type="submit" class="btn btn-default">
                         <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                      </button>
                    </form>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="down-top-pane">
                Arquitectura para proyectos de alto nivel
              </div>
          </nav>                  
          
    </div>      
  </div>  
</header>
<div class="container" id="sliter" >
    <div class="row">      
      <!-- Carrusel -->
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators 
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>-->
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          
          <div class="item active">
            <img src="../../conten/img/slider/pc1.jpg" alt="..." class="img-responsive sliterimg">
              <div class="carousel-caption">
                <!-- un texto-->
              </div>
          </div>
    
         <div class="item">
            <img src="../../conten/img/slider/pc2.jpg" alt="..." class="img-responsive sliterimg">
              <div class="carousel-caption">
              </div>
          </div>    

          <div class="item">
            <img src="../../conten/img/slider/pc3.jpg" alt="..." class="img-responsive sliterimg">
              <div class="carousel-caption">
              </div>
          </div>    


          <div class="item">
            <img src="../../conten/img/slider/pc4.jpg" alt="..." class="img-responsive sliterimg">
              <div class="carousel-caption">
              </div>
          </div>    

          <div class="item">
            <img src="../../conten/img/slider/pc5.jpg" alt="..." class="img-responsive sliterimg">
              <div class="carousel-caption">
              </div>
          </div>    

        </div>

        <!-- Controls 
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
      </div>
    </div>            
  </div>  
<!-- fin del carrusel -->
