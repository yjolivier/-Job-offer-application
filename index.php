<!DOCTYPE html>
<html>
	<head>
		<title>Resurection</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="https://kit.fontawesome.com/d8e469504a.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<div class="container-fluid">
			<header class="row sticky-top">
				<div class="header-logo col-lg-4 col-md-12 col-sm-6 col-6">
					<p>OFFRE<br> EMPLOIS</p>
				</div>
				<div class="header-menu col-lg-8 col-md-12 col-sm-6 col-6">
					<nav class="navbar navbar-expand-md navbar-white bg-#3c00c9">
						<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
							<span class="navbar-toggler-icon btn-menu">
								<i class="fas fa-align-justify"></i>
							</span>
						</button>
						<div class="collapse  navbar-collapse" id="collapse_target">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">ACCUEIL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">TABLEAU DE BORD</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">A PROPOS</a>
							</li>
						</ul>
						</div>
					</nav>
				</div>
			</header>
			<section class="row">
				<div class="section-actualite-title col-lg-12">
					<h2 align="center">LISTE D'EMPLOI DISPONIBLE</h2>
				</div>
			</section>
			<?php
				//recuperation du lien de la page 
				$link = 'http://barra.herokuapp.com/api/offer';

				//recuperation du contenu du lien de la page
				$link_content = file_get_contents($link); 

				//convert json string to array
				$offers = json_decode($link_content, true);
			?>
			<section class="row">
				<table class="table col-lg-12 table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">url</th>
				      <th scope="col">title</th>
				      <th scope="col">content</th>
				      <th scope="col">type</th>
				      <th scope="col">status</th>
				      <th scope="col">pubdate</th>
				    </tr>
				  </thead>
				  <?php
				  		//afficha du resultat
						if (isset($offers["content"])) { 
							$numero = 1;
							foreach ($offers["content"] as $contenu) { 
				  ?>			
				  <tbody>
				    <tr>
				      <th scope="row"><?php echo $numero ?></th>
				      <td><?php echo $contenu["url"] ?> </td>
				      <td><?php echo $contenu["title"]?></td>
				      <td><?php echo $contenu["content"]?></td>
				      <td><?php echo $contenu["type"]?></td>
				      <td><?php echo $contenu["status"]?></td>
				      <td><?php echo $contenu["pubDate"]?></td>
				    </tr>
				  	<?php $numero++;}}?>
				  </tbody>
				</table>
			</section>
		</div>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>