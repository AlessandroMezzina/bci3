<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>ERM Web App</title>
    </head>

  <body>

    <!--NAVBAR-->
    <nav class="navbar navbar-dark fixed-top">
      <div class="container-fluid navcontainer">
        <a class="navbar-brand brand-name" href="#"><b>ERM</b> - Emotion Recognition for Music Recommendation</a>
    		<a href="login.html"><button class="btn btn-outline-light">LOGOUT</button></a>
      </div>
    </nav>

    <!--HEADER-->
    <section class="header py-5">
      <div class="container py-5">
        <div class="row">

          <!--TESTO-->
                <div class="col-md-6">
                  <div class="h-100 d-flex flex-column justify-content-center py-5">
                    <div>
                      <div class="text-wrapper">
                        <div class="text-inner">
                          <h2><b><p class="text-justify my-1 text-white">RECOMMENDED SONG & PLAYLIST</p></b></h2>
                          <p class="text-justify my-1 text-white">
                            Based on your dominant emotion, retrived thanks to the analysis of the EEG segnal, which seems to be "HAPPINESS",
                            I would suggest you to listen to this specific song: <br><br></p>
                            <center>
							
							 <?php

                                include './config.php';

                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                  echo "Connessione al database non riuscita: " . mysqli_connect_error();
                                }

                								$sql = "SELECT max(id) AS massimo FROM CANZONE";
                								$result = $link -> query($sql);
                								$row = $result -> fetch_assoc();
                								$id_massimo = $row['massimo'];

                                                //$randomic_value = rand(1, $id_massimo);

                								//echo $id_massimo;
										
											$randomic_value = rand(1, $id_massimo);
											$sql = "SELECT nome, artista, genere, link, copertina FROM CANZONE  WHERE id='$randomic_value'";
                							$result = $link -> query($sql);
                							$row = $result -> fetch_assoc();
                							$nome_canzone = $row['nome'];
                							$artista = $row['artista'];
											$genere = $row['genere'];
											$link_c = $row['link'];
											$copertina = $row['copertina'];
													
											echo "<div class='card' style='width: 18rem'>
												<div class='image'>
												<img src='data:image/gif;base64,".base64_encode($row['copertina'])."'/>
												</div>
												<div class='card-body'>
													<h5 class='card-title'>". $nome_canzone."</h5>
													<a href='#' class='card-link'>". $link_c."</a>
												</div>
											</div>";
											
													
						
                								
                          ?>
							
                            <!-- <div class="card" style="width: 18rem">
                              <img src="./static/raye_song.jpg" class="card-img-top">
                              <div class="card-body">
                                <h5 class="card-title">Call on me - Raye</h5>
                                <a href="#" class="card-link">Spotify link</a>
                              </div>
                            </div> -->
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="h-100 d-flex flex-column justify-content-center py-5">
                    <div class="text-wrapper">
                      <div class="text-inner">
                    <!--<h1><b><p class="text-justify my-1 text-white">RECOMMENDED PLAYLIST</p></b></h1>-->
                      <p class="text-justify my-1 text-white">I also created a playlist of songnames that would fit your current emotional status: <br><br>
                      </p>
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Song Name</th>
                              <th scope="col">Artist</th>
                              <th scope="col">Genre</th>
                              <th scope="col">Spotify Link</th>
                            </tr>
                          </thead>
                          <tbody>

                          <!-- Nuova parte: lettura da db con php -->

                          <?php

                                include './config.php';

                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                  echo "Connessione al database non riuscita: " . mysqli_connect_error();
                                }

                								$sql = "SELECT max(id) AS massimo FROM CANZONE";
                								$result = $link -> query($sql);
                								$row = $result -> fetch_assoc();
                								$id_massimo = $row['massimo'];

                                                //$randomic_value = rand(1, $id_massimo);

                								//echo $id_massimo;
										for($i=1; $i<8;$i++)
										{
											$randomic_value = rand(1, $id_massimo);
											$sql = "SELECT nome, artista, genere, link FROM CANZONE  WHERE id='$randomic_value'";
                							$result = $link -> query($sql);
                							$row = $result -> fetch_assoc();
                							$nome_canzone = $row['nome'];
                							$artista = $row['artista'];
											$genere = $row['genere'];
											$link_c = $row['link'];

                							echo "<tr>
													<td>". $i . "</td>
													<td>" . $nome_canzone . "</td>
													<td>" . $artista . "</td>
													<td>" . $genere . "</td>
													<td>" . $link_c . "</td>
												</tr>";
									}
                								
                          ?>


                          </tbody>
                        </table>
                        <!--<br>-->
                        <center>
                          <img src="./static/spotify_logo.png" width="25%" height="100%">
                        </center>
                  </div>
                  </div>
                </div>
              </div><br>
                <h3><b><p class="text-justify text-center my-1 text-white">FEEDBACK</p></b></h3>
                <p class="text-justify text-center my-1 text-white">Please, rate the obrained recommendations in order to improve them next time</p><br>

                <div class="container">
                  	<div class="row">
                              <div class="text-center">
                                  <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">I like it!</a>
                                  <a class="btn btn-success btn-red" href="#reviews-anchor" id="open-review-box">I don't like it!</a>
                              </div>
                          </div>

                  		</div>
                  	</div>
                  </div>
            </section>


    <!--scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <script src="./script/jquery.min.js"></script>
    <script src="./script/TweenMax.min.js"></script>
    <script src="./script/scriptindex.js"></script>
   </body>
</html>
