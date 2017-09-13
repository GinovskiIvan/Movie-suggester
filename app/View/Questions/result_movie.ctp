<?php
if (!isset($movies)){
   header("Location: /seminarska");
die();
}

for ($i=0; $i < count($movies); $i++) { 

	$movie = $movies[$i]['movie'];
	$team = $movies[$i]['team'];
	$keywords = $movies[$i]['keywords'];

	if ($i == 0){
		echo "<div id=\"".$i."\">";
	}
	else{
		echo "<div id=\"".$i."\" style=\"display: none \">";
	}

?>





<div class="container" style="padding-top:20px">

	<div class="row well">
		<div class=col-md-6><h1>Movie based on your questions!</h1></div>
		<div class=col-md-6>
			<h1>Already watched?
			<div class="btn btn-danger" onClick="prev()";>Previous</div>
			<div class="btn btn-info" style="width: 81px" onClick="next()";>Next</div></h1>
		</div>
	</div>

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
                <div class="col-md-5"><b>Genres:</b>
                    <?php 
                        foreach ($movie['genres'] as $genre) {
                            echo $genre['name']." ";
                        }
                     ?>
                </div>
                <div class="col-md-1">
                    <?php echo $this->Html->link('Movie page', array('controller'=>'movies','action'=>'movie', $movie['id']));
                    ?>
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
</div>
</div>
<?php } ?>

<script type="text/javascript">
var id = 0;


function hide (id) {
    document.getElementById(id).style.display = 'none';
}

function show (id) {
    document.getElementById(id).style.display = 'block';
}

function next () {
	var max = <?php echo count($movies) - 1 ?>;
    if (id < max){
    hide(id);
    id++;
    show(id);
    }
}

function prev () {
    if (id > 0){
    hide(id);
    id--;
    show(id);
    }
}

</script>