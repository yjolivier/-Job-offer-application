<!DOCTYPE html>
<html>
	<head>
		<title>Offres d'emplois</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="https://kit.fontawesome.com/d8e469504a.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container-fluid">
			<header class="row">
				<div class="header-logo col-lg-9 col-md-8 col-sm-8 col-8">
					<p><a href="https://github.com/yjolivier/Job-offer-application"> OFFRE<br> EMPLOIS</a></p>
					
				</div>
				<div class="header-menu  col-lg-3 col-md-4 col-sm-4 col-4">
					<nav class="navbar navbar-expand-md navbar-white bg-#3c00c9">
						<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
							<span class="navbar-toggler-icon btn-menu">
								<i class="fas fa-align-justify"></i>
							</span>
						</button>
						<div class="collapse  navbar-collapse " id="collapse_target">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="./">ACCUEIL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="https://github.com/yjolivier/Job-offer-application">A PROPOS</a>
							</li>
						</ul>
						</div>
					</nav>
				</div>
			</header>
			<section class="row">
				<div class="section-actualite-title col-lg-12">
					<h3 align="center">LISTE DES OFFRES DISPONIBLES</h3>
				</div>
			</section>
			<?php
				//recuperation du lien de la page 
				$link = 'http://job.samuelguebo.ci/api/offer';
				if(isset($_GET['page'])){
					$link = 'http://job.samuelguebo.ci/api/offer?page='.$_GET['page'];
				}
				
				//recuperation du contenu du lien de la page
				$link_content = file_get_contents($link); 

				//convert json string to array
				$offers = json_decode($link_content, true);
			?>
			<section class="row">
				<table class="table table-striped" border="1" bordercolor="white" >
				  <thead>
				    <tr>
				      <th scope="col" class="numero-coll">#</th>
				      <th scope="col">Title</th>
				      <th scope="col" class="link-coll">Lien</th>
				      <th scope="col">Contenu</th>
				      <th scope="col" class="type-coll">Type</th>
				      <th scope="col">Date d'édition</th>
				    </tr>
				  </thead>
				  <tbody>
					  <?php
				  		//afficha du resultat
						if (isset($offers["content"])) { 
							$numero = 1;
							foreach ($offers["content"] as $contenu) { 
					  ?>			
				    <tr>
				        <th scope="row" class="numero-coll"><?php echo $numero ?></th>
				        <td class="title-coll"><a href="<?php echo $contenu["url"] ?>"><?php echo $contenu["title"]?></a></td>
				        <td class="link-coll"><a href="<?php echo $contenu["url"] ?>"><i class="fas fa-link"></i></a></td>
				        <td><?php echo $contenu["content"]?></td>
				        <td class="type-coll"><?php echo $contenu["type"]?></td>
				        <td><?php echo $contenu["pubDate"]?></td>
				    </tr>
				  	<?php $numero++;}}?>
				  </tbody>
				</table>
			</section>
			<div class="row justify-content-md-center pagination">
				<nav aria-label="Page navigation example mx-auto">
					<ul class="pagination justify-content-center">
					    <?php for ($i=1; $i <= 12 ; $i++):?>
					    	<li class="page-item">
					    		<a class="page-link" href="./index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
					    	</li>
					    <?php endfor; ?>
					</ul>
				</nav>
			</div>
			<div class="signature row">
				<small>© Developed by <a href="https://github.com/yjolivier/"> Olivier Yao</a> and <a href="https://github.com/samuelguebo/">Samuel Guebo</a> | Source code <a href="https://github.com/yjolivier/Job-offer-application">available on Github</a></small>
			</div>
		</div>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>