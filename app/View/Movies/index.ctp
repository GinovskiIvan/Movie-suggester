<?php
$movieGenres = array( array( 'id' => '28', 'name' => 'Action'), array( 'id' => '12', 'name' => 'Adventure'), array( 'id' => '16', 'name' => 'Animation'), array( 'id' => '35', 'name' => 'Comedy' ), array( 'id' => '80', 'name' => 'Crime' ), array( 'id' => '99', 'name' => 'Documentary' ), array( 'id' => '18', 'name' => 'Drama' ), array( 'id' => '10751', 'name' => 'Family' ), array('id' =>'14', 'name'=> 'Fantasy' ), array('id' => '10769', 'name'=> 'Foreign' ), array( 'id' => '36', 'name' => 'History' ), array( 'id' => '27', 'name' => 'Horror' ), array(' id' => '10402', 'name' => 'Music' ), array( 'id' => '9648', 'name'=> 'Mystery' ), array( 'id' => '10749', 'name'=> 'Romance' ), array( 'id' => '878', 'name'=> 'Science Fiction' ), array( 'id' => '10770', 'name' => 'TV Movie' ), array( 'id' => '53', 'name'=> 'Thriller' ), array( 'id' => '10752', 'name'=> 'War' ), array( 'id' => '37', 'name'=> 'Western' ));

?>

<!-- Input for searching movies by title -->
<div class="well">
<div class="container">
    <div class="row">
            <form method="get" class="navbar-form" role="search">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Search movies">
                </div>
                <button type="submit" class="btn btn-default">Search</button>

            </form>
    </div>
</div>
</div>

<!-- Movies -->
<div class="container">
<?php 
echo "KEYWORD: ".$keyW;
$counter = 0;
//$pages = $json['total_pages'];
foreach ($json as $item) {
        //var_dump($item);
        $tmdbID = $item['id']; 
        //$moviesJSON = file_get_contents("http://api.themoviedb.org/3/movie/".$tmdbID."?api_key=cbb012e4e7ece74ac4c32a77b00a43eb");
        //$movie = json_decode($moviesJSON, true);
        $genres = $item['genres'];

        if ($counter % 3 == 0){
            echo '<div class="row">';
        }

?>
        <div class="col-md-4">
            <div>

                <!-- NASLOV -->
                <div class="row ">
                    <div class="col-md-12">
                    <h3> <?php  echo $item['title']; ?> </h3>
                    </div>
                </div>

                
                <div class="row">
                    
                    <!-- SLIKA -->
                    <div class="col-md-7">

                        <?php
                            if ($item['poster_path']){
                            echo $this->Html->link(
                                $this->Html->image('http://image.tmdb.org/t/p/w500'.$item['poster_path'], array('alt' => 'Movie Image')),
                                    array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                    array('escapeTitle' => false, 'class'=>'thumbnail')
                                );
                            }
                            else{
                                echo $this->Html->link(
                                $this->Html->image('movie_tape.png', array('alt' => 'Movie Image')),
                                    array('controller'=> 'movies', 'action'=>'movie', $tmdbID),
                                    array('escapeTitle' => false, 'class'=>'thumbnail')
                                );
                            }
                         ?>

                    </div> 

                    <!-- INFO -->
                    <div class="col-md-5">
                        <div class="caption">
                            <div class="row">

                                <div class="col-md-4"> 
                                    <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                                </div>

                                <div class="col-md-4">
                                    <h4><?=$item['vote_average'];?></h4>
                                </div>

                            </div>

                            <h3>
                                    <?php echo "Vote up";?>
                                    <?php echo $this->Html->link(
                        $this->Html->image('arrow.png', array('width'=>'25px','height'=>'25px')), array('controller'=>'votes','action'=>'add', $tmdbID),array('escape'=>false));?>
                                    </h3>

                            <h4>Time:</h4><?php echo $item['runtime'];?>mins

                            <h4>Release date:</h4>
                            <?php echo $item['release_date'];?>

                            <h4>Genres:</h4>
                            <?php foreach ($genres as $genre) {
                                    echo $genre['name']." ";
                                } ?>
                             <?php if(AuthComponent::user()){?>
                                <br>
                                <?=$this->HTML->link('Add to wishlist',array('controller'=>'wishlists','action'=>'add',$tmdbID, $item['title']));?>
                                <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
    $counter++;
         if ($counter % 3 == 0){
            echo "</div>";
        }
        
         }
     ?> 
 </div>