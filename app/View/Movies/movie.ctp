

<div class="container" style="padding-top:20px">
    <div class="row">
        <div class="col-md-4">
            <?php if($movie['poster_path']) { ?>
                <img src=http://image.tmdb.org/t/p/w500<?php echo $movie['poster_path'];?>
                class="img-responsive">
            <?php  } else{ 

                echo $this->Html->image('movie_tape.png', array('alt' => 'Movie', 'class'=>'img-responsive'));
             } ?>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                <h1><?=$movie['title']?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo $this->Html->image('rating-star.png', array('alt' => 'Rating')); ?>
                        </div>
                        <div class="col-md-4">
                    <h4><b><?=$movie['vote_average'];?></b></h4>
                    </div>
                    </div>
                </div>

                <div class="col-md-2"><b>Release date:</b> <?=$movie['release_date']?></div>
                <div class="col-md-2"><b>Time:</b><?=$movie['runtime']?> mins</div>
                <div class="col-md-3"><b>Genres:</b>
                    <?php 
                        foreach ($movie['genres'] as $genre) {
                            echo $genre['name']." ";
                        }
                     ?>
                </div>
                <div class="col-md-1">
                    <?php echo $this->Html->link(
                        $this->Html->image('arrow.png', array('width'=>'25px','height'=>'25px')), array('controller'=>'votes','action'=>'add', $movie['id']),array('escape'=>false));
                    ?>
                    Vote
                </div>
                <div class="col-md-2">
                <?php if(AuthComponent::user()){
                                echo $this->HTML->link('Add to wishlist',array('controller'=>'wishlists','action'=>'add',$movie['id'], $movie['title']));
                }?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                <h4>Plot:</h4> <?php echo $movie['overview']; ?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                <b>Directed by: </b>
                <?php
                    //$cast = $team['cast'];
                    $crew = $team['crew'];
                    $bool = true;
                    foreach ($crew as $member) {
                        if ($member['job'] == "Director")
                            if ($bool){
                                echo $member['name'];
                                $bool = false;
                            } else {
                            echo ", ".$member['name'];
                        }
                    }
                ?>
                </div>
            </div>

             <div class="row">
                <div class="col-md-12">
                <b>Writers: </b>
                <?php
                    //$cast = $team['cast'];
                    $crew = $team['crew'];
                    $bool = true;
                    foreach ($crew as $member) {
                        if ($member['job'] == "Story")
                            if ($bool){
                                echo $member['name'];
                                $bool = false;
                            } else {
                            echo ", ".$member['name'];
                        }
                    }
                ?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <b>Stars: </b>
                    <?php
                    $cast = $team['cast'];
                    $bool = true;
                    $counter = 0;
                    foreach ($cast as $member) {
                            if ($bool){
                                echo $member['name'];
                                $bool = false;
                            } else {
                            echo ", ".$member['name'];
                        }
                        if ($counter == 5) break;
                        $counter++;
                    }
                ?>
                </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-md-12">
                        <div style='display: inline-block'>
                    <?php
                    $counter = 0;
                        foreach ($keywords['keywords'] as $key) {
                                echo "<div class='well well-sm' style='display: inline-block'>
                                        <span class='glyphicon glyphicon-tag'></span>";
                                        
                                         echo $this->Html->link(" ".$key['name'],
                                            array('controller'=>'movies', 'action'=>'index', $key['id']));
                            echo " 
                                </div> &nbsp";    
                    }
                    ?>
                    </div>
                    </div>
            </div>
        </div>

    </div>

    <hr>
    <div class="row">
            <h1>Similar Movies</h1>
    </div>

    <div class="row">
        <?php
            $similarMovies = $similar['results'];
            for ($i=0; $i <count($similarMovies) ; $i++) { 
                if ($i == 6) break;
                echo '<div class="col-md-2">';

                //Title
                    echo '<div class="row">
                            <div class="col-md-12" style="height: 57px">';
                                echo "<b>".$similarMovies[$i]['title']."</b>";
                    echo    '</div>
                          </div>';  

                echo '<div class="row">';

                //Picture
                echo $this->Html->link(
                        
                        $this->Html->image(
                            'http://image.tmdb.org/t/p/w500'.$similarMovies[$i]['poster_path'], array('alt' => 'Movie Image')),
            
                array('controller'=> 'movies', 'action'=>'movie', $similarMovies[$i]['id']),
                array('escapeTitle' => false, 'class'=>'thumbnail'));
            
                echo "</div>";
                echo "</div>";
            }
        ?>

    </div>
</div>
