<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="/proyecto/js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Registro</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
	  <a class="navbar-brand" href="/tiendainstrumentos/articulo">Ventana de Registros</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="/tiendainstrumentos/articulo">Articulos</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/tiendainstrumentos/clasificacion">Clasificaciones</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/tiendainstrumentos/marca">Marcas</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" method="post" action="/tiendainstrumentos/login/salir">
		      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
		    </form>
		</div>
	</nav>
<div class="container-fluid bg-dark">