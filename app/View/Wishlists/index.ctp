<?php
$movieGenres = array( array( 'id' => '28', 'name' => 'Action'), array( 'id' => '12', 'name' => 'Adventure'), array( 'id' => '16', 'name' => 'Animation'), array( 'id' => '35', 'name' => 'Comedy' ), array( 'id' => '80', 'name' => 'Crime' ), array( 'id' => '99', 'name' => 'Documentary' ), array( 'id' => '18', 'name' => 'Drama' ), array( 'id' => '10751', 'name' => 'Family' ), array('id' =>'14', 'name'=> 'Fantasy' ), array('id' => '10769', 'name'=> 'Foreign' ), array( 'id' => '36', 'name' => 'History' ), array( 'id' => '27', 'name' => 'Horror' ), array(' id' => '10402', 'name' => 'Music' ), array( 'id' => '9648', 'name'=> 'Mystery' ), array( 'id' => '10749', 'name'=> 'Romance' ), array( 'id' => '878', 'name'=> 'Science Fiction' ), array( 'id' => '10770', 'name' => 'TV Movie' ), array( 'id' => '53', 'name'=> 'Thriller' ), array( 'id' => '10752', 'name'=> 'War' ), array( 'id' => '37', 'name'=> 'Western' ));

$myMovies = array();
$tabs = array('0'=> 'Action', '1'=>'Drama', '2'=>'Comedy', '3'=>'Horror', '4'=>'Science Fiction', '5'=>'Animation');
foreach($items as $item){

    $tmdbID = $item['Wishlist']['movie_id'];
    $movies = file_get_contents("http://api.themoviedb.org/3/movie/".$tmdbID."?api_key=cbb012e4e7ece74ac4c32a77b00a43eb");
    $movie = json_decode($movies, true);
    array_push($myMovies, $movie);
}?> 


    <div class="container" style="padding-top:20px">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#All" data-toggle="tab">All</a></li>
            <li><a href="#Action" data-toggle="tab"><?=$movieGenres[0]['name'];?></a></li>
            <li><a href="#Drama" data-toggle="tab"><?=$movieGenres[6]['name'];?></a></li>
            <li><a href="#Comedy" data-toggle="tab"><?=$movieGenres[3]['name'];?></a></li>
            <li><a href="#Horror" data-toggle="tab"><?=$movieGenres[11]['name'];?></a></li>
            <li><a href="#Science" data-toggle="tab"><?=$movieGenres[15]['name'];?></a></li>
            <li><a href="#Animation" data-toggle="tab"><?=$movieGenres[2]['name'];?></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="All">
                <?php  
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                        if ($counter % 3 == 0){
                            $open = true;
                            echo '<div class="row">';
                        }
                ?>

                    <div class="col-md-4">
                        <!-- NASLOV -->
                        <div class="row ">
                            <div class="col-md-12">
                                <h3> <?php  echo $movie['title']; ?> </h3>
                            </div>
                        </div>

                        <!-- PODELBA SLIKA I INFO -->
                        <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                        <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>

                <?php
                        $counter++;
                        if ($counter % 3 == 0){
                            $open = false;
                            echo "</div>";
                        }
                    }
                    if ($open)
                    echo '</div>';
                ?>
            </div>
           
            <div class="tab-pane fade" id="Action">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Action')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                      <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                    }
                
                ?>
            </div>

            <div class="tab-pane fade" id="Drama">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Drama')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                     <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                }
                ?>
            </div>

            <div class="tab-pane fade" id="Comedy">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Comedy')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                     <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                }
                ?>
            </div>
            <div class="tab-pane" id="Horror">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Horror')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                     <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                }
                ?>
            </div>

            <div class="tab-pane" id="Science">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Science Fiction')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                     <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                }
                ?>
            </div>
            <div class="tab-pane" id="Animation">
                <?php
                    $counter = 0;
                    $open = false;
                    foreach ($myMovies as $movie) {
                        $tmdbID = $movie['id'];
                        $genres = $movie['genres'];
                
                           
                                $bool = true;
                                foreach ($genres as $genre) {
                                    if ($genre['name'] == 'Animation')
                                        $bool = false;
                                }
                                if (!$bool){
                                     if ($counter % 3 == 0){
                                        $open = true;
                                        echo '<div class="row">';
                                    }
                        ?>  

                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3> <?php  echo $movie['title']; ?> </h3>
                                    </div>
                                </div>
                                <div class="row">
                            <!-- SLIKA -->
                            <div class="col-md-7">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->image('http://image.tmdb.org/t/p/w500'.$movie['poster_path'], array('alt' => 'Movie Image')),
                                            array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                            array('escapeTitle' => false, 'class'=>'thumbnail')
                                ); ?>
                            </div> 
                            <!-- INFO -->
                            <div class="col-md-5">
                                <div class="caption">
                                    <div class="row">

                                        <div class="col-md-4"> 
                                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h4><?=$movie['vote_average'];?></h4>
                                        </div>

                                    </div>

                                    <h4>Time:</h4><?php echo $movie['runtime'];?>mins

                                    <h4>Release date:</h4>
                                    <?php echo $movie['release_date'];?>

                                    <h4>Genres:</h4>
                                    <?php foreach ($genres as $genre) {
                                            echo $genre['name']." ";
                                        } ?>
                                     <br>
                                    <?php 
                                        echo $this->Html->link('', 
                                            array('controller'=> 'wishlists', 'action' => 'remove', $tmdbID ),
                                            array('class' => 'glyphicon glyphicon-trash btn btn-danger'));
                                    ?>
                                </div>
                            </div>

                        </div>
                            </div>
                        
                <?php
                
                   $counter++; 
                        if ($counter % 3 == 0){
                                $open = false;
                                echo '</div>';
                            }
                        }
                    }
                    if ($open){
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
