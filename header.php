
<!doctype html>
<?php
date_default_timezone_set('America/Sao_Paulo');
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pizzaria Per Favore</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/slick.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Permanent+Marker|Raleway:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    </head>
    
    <body>

		<header>
			
			<div class="main-header large-12 columns no-padding">

				<div class="global-page-container">
				
					<div class="logo small-6 small-offset-3 large-3 large-offset-0 columns no-padding">
						<a href="index.php" title="home">
							<div class="table">
								<div class="table-cell">
                                <img src="./img/Component 1.png" alt="">
                                <img src="./img/menu/navbar-brand.svg" width="80" alt="" class="mb-0">
                                
								</div>
							</div>
						</a>
					</div>

					<div class="main-menu show-for-large-up large-9 columns text-right">		
						<div class="table">
							<div class="table-cell">
								<ul class="menu-items">
                                <?php

                                    include 'navegar-lista.php';

                                ?>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="hamburguer-icon small-2 columns text-right">
                        <div class="table">
                            <div class="table-cell">
                                <img src="img/menu/hamburguer.svg">
                            </div> 
                        </div>
					</div>

					<div class="right-space small-1 columns"></div>

				</div>
			</div>			
					
            <div class="sliding-header-menu-outer">						
                <div class="sliding-header-menu">
                    
                    <div class="sliding-header-menu-close-button small-12 columns">
                        <div class="table">
                            <div class="table-cell">
                                <img class="close-icon" src="img/menu/close.svg">
                            </div>	
                        </div>	
                    </div>

                    

                    <div class="sliding-header-menu-main-menu small-12 columns">
                        
                        <div class="table">
                            <div class="table-cell">
                                <ul class="sliding-header-menu-li">
                                <?php

                                    include 'navegar-lista.php';

                                ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>                           
                </div>
            </div>

		</header>

		<div class="ghost-element">
		</div>
