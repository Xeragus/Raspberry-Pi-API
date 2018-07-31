<?php
$response = file_get_contents('http://192.168.43.95:8080/jsonrpc?request={%22jsonrpc%22:%222.0%22,%22method%22:%22Player.GetItem%22,%22params%22:{%22playerid%22:1},%22id%22:%22VideoGetItem%22}');
//echo json_decode($response)->result->item->label;
$raw_movie_name = json_decode($response)->result->item->label;
$movie_name = str_replace(" ", "%20", $raw_movie_name);
$url = "http://www.omdbapi.com/?t=" . $movie_name . "&apikey=e42e14ed";
$response = json_decode(file_get_contents($url));
//echo file_get_contents($url);
$movie_title = $response->Title;
$movie_year = $response->Year;
$movie_genre = $response->Genre;
$movie_released = $response->Released;
$movie_runtime = $response->Runtime;
$movie_director = $response->Director;
$movie_writer = $response->Writer;
$movie_actors = $response->Actors;
$movie_awards = $response->Awards;
$movie_img = $response->Poster;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Raspberry Pi App</title>
  </head>
  <body class="bg-info">
    

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="row align-items-center">    
                    <div class="col-sm-6">
                        <img src="<?php echo $movie_img ?>" alt="" class="img-fluid border border-secondary">
                    </div>
                    <div class="col-sm-6">
                        <div class="app text-white">
                            <h4><?php echo $movie_title . " (" . $movie_year . ")"?></h4>
                            <hr>
                            <p>Genre: <strong><?php echo $movie_genre ?></strong></p>
                            <p>Released: <strong><?php echo $movie_released ?></strong></p>
                            <p>Runtime: <strong><?php echo $movie_runtime ?></strong></p>
                            <p>Director: <strong><?php echo $movie_director ?></strong></p>
                            <p>Writer: <strong><?php echo $movie_writer ?></strong></p>
                            <p>Actors: <strong><?php echo $movie_actors ?></strong></p>
                            <p>Awards: <strong><?php echo $movie_awards ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>