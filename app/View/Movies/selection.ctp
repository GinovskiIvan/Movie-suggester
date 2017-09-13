<?php
$movieGenres = array( array( 'id' => '28', 'name' => 'Action'), array( 'id' => '12', 'name' => 'Adventure'), array( 'id' => '16', 'name' => 'Animation'), array( 'id' => '35', 'name' => 'Comedy' ), array( 'id' => '80', 'name' => 'Crime' ), array( 'id' => '99', 'name' => 'Documentary' ), array( 'id' => '18', 'name' => 'Drama' ), array( 'id' => '10751', 'name' => 'Family' ), array('id' =>'14', 'name'=> 'Fantasy' ), array('id' => '10769', 'name'=> 'Foreign' ), array( 'id' => '36', 'name' => 'History' ), array( 'id' => '27', 'name' => 'Horror' ), array( 'id' => '10402', 'name' => 'Music' ), array( 'id' => '9648', 'name'=> 'Mystery' ), array( 'id' => '10749', 'name'=> 'Romance' ), array( 'id' => '878', 'name'=> 'Science Fiction' ), array( 'id' => '10770', 'name' => 'TV Movie' ), array( 'id' => '53', 'name'=> 'Thriller' ), array( 'id' => '10752', 'name'=> 'War' ), array( 'id' => '37', 'name'=> 'Western' ));

$years = array(
    '40s' => '&primary_release_date.gte=1940-01-01&&primary_release_date.lte=1949-12-31',
     '50s' => '&primary_release_date.gte=1950-01-01&&primary_release_date.lte=1959-12-31',
      '60s' => '&primary_release_date.gte=1960-01-01&&primary_release_date.lte=1969-12-31',
       '70s' => '&primary_release_date.gte=1970-01-01&&primary_release_date.lte=1979-12-31',
        '80s' => '&primary_release_date.gte=1980-01-01&&primary_release_date.lte=1989-12-31',
         '90s' => '&primary_release_date.gte=1990-01-01&&primary_release_date.lte=1999-12-31',
          '00s' => '&primary_release_date.gte=2000-01-01&&primary_release_date.lte=2009-12-31',
           '10s' => '&primary_release_date.gte=2010-01-01&&primary_release_date.lte=2019-12-31');

$directors=array( array( 'id' => '138', 'name' => 'Quentin Tarantino'), 
array( 'id' => '525', 'name' => 'Christopher Nolan'),
array( 'id' => '1032', 'name' => 'Martin Scorsese'),
array( 'id' => '1243', 'name' => 'Woody Allen'),
array( 'id' => '108', 'name' => 'Peter Jackson'),
array( 'id' => '240', 'name' => 'Stanley Kubrick'),
array( 'id' => '2636', 'name' => 'Alfred Hitchcock'),
array( 'id' => '488', 'name' => 'Steven Spielberg'),
array( 'id' => '865', 'name' => 'Michael Bay'),
array( 'id' => '510', 'name' => 'Tim Burton'),
array( 'id' => '2710', 'name' => 'James Cameron'),
array( 'id' => '190', 'name' => 'Clint Eastwood'),
array( 'id' => '7467', 'name' => 'David Fincher'),
array( 'id' => '1', 'name' => 'George Lucas'),
array( 'id' => '11218', 'name' => 'Alfonso Cuarón'),
array( 'id' => '3556', 'name' => 'Roman Polanski')
);

$actors=array( array( 'id' => '287', 'name' => 'Brad Pitt'), 
array( 'id' => '500', 'name' => 'Tom Cruise'),
array( 'id' => '6193', 'name' => 'Leonardo Di Caprio'),
array( 'id' => '10297', 'name' => 'Matthew Mcconaughey'),
array( 'id' => '514', 'name' => 'Jack Nicholson'),
array( 'id' => '380', 'name' => 'Robert De Niro'),
array( 'id' => '1158', 'name' => 'Al Pacino'),
array( 'id' => '3894', 'name' => 'Christian Bale'),
array( 'id' => '31', 'name' => 'Tom Hanks'),
array( 'id' => '3084', 'name' => 'Marlon Brando'),
array( 'id' => '3223', 'name' => 'Robert Downey Jr'),
array( 'id' => '5292', 'name' => 'Denzel Washington'),
array( 'id' => '192', 'name' => 'Morgan Freeman'),
array( 'id' => '4173', 'name' => 'Anthony Hopkins'),
array( 'id' => '934', 'name' => 'Russell Crowe'),
array( 'id' => '1461', 'name' => 'George Clooney'),
array( 'id' => '190', 'name' => 'Clint Eastwood'),
array( 'id' => '2888', 'name' => 'Will Smith'),
array( 'id' => '2525', 'name' => 'Tom Hardy'),
array( 'id' => '1892', 'name' => 'Matt Damon'),
array( 'id' => '2228', 'name' => 'Sean Penn'),
array( 'id' => '3896', 'name' => 'Liam Neeson'),
array( 'id' => '71580', 'name' => 'Benedict Cumberbatch'),
array( 'id' => '1810', 'name' => 'Heath Ledger'),
array( 'id' => '1979', 'name' => 'Kevin Spacey'),
array( 'id' => '2231', 'name' => 'Samuel L Jackson'),
array( 'id' => '738', 'name' => 'Sean Connery'),
array( 'id' => '2963', 'name' => 'Nicolas Cage'),
array( 'id' => '2157', 'name' => 'Robin Williams'),
array( 'id' => '62', 'name' => 'Bruce Willis'),
array( 'id' => '976', 'name' => 'Jason Statham'),
array( 'id' => '109', 'name' => 'Elijah Wood'),
array( 'id' => '1229', 'name' => 'Jeff Bridges'),
array( 'id' => '27319', 'name' => 'Christoph Waltz'),
array( 'id' => '114', 'name' => 'Orlando Bloom'),
array( 'id' => '1100', 'name' => 'Arnold Schwarzenegger'),
array( 'id' => '30614', 'name' => 'Ryan Gosling'),
array( 'id' => '21007', 'name' => 'Jonah Hill'),
array( 'id' => '11856', 'name' => 'Daniel Day Lewis'),
array( 'id' => '17051', 'name' => 'James Franco'),
);

$actresses=array( array( 'id' => '5064', 'name' => 'Meryl Streep'), 
array( 'id' => '1813', 'name' => 'Anne Hathaway'),
array( 'id' => '53714', 'name' => 'Rachel McAdams'),
array( 'id' => '112', 'name' => 'Cate Blanchett'),
array( 'id' => '1204', 'name' => 'Julia Roberts'),
array( 'id' => '6885', 'name' => 'Charlize Theron'),
array( 'id' => '1038', 'name' => 'Jodie Foster'),
array( 'id' => '72129', 'name' => 'Jennifer Lawrence'),
array( 'id' => '524', 'name' => 'Natalie Portman'),
array( 'id' => '11701', 'name' => 'Angelina Jolie'),
array( 'id' => '18277', 'name' => 'Sandra Bullock'),
array( 'id' => '1231', 'name' => 'Julianne Moore'),
array( 'id' => '4587', 'name' => 'Halle Berry'),
array( 'id' => '54693', 'name' => 'Emma Stone'),
array( 'id' => '4491', 'name' => 'Jennifer Aniston'),
array( 'id' => '9273', 'name' => 'Amy Adams'),
array( 'id' => '1245', 'name' => 'Scarlet Johansson'),
array( 'id' => '12052', 'name' => 'Gwyneth Paltrow'),
array( 'id' => '955', 'name' => 'Penelope Cruz'),
array( 'id' => '139', 'name' => 'Uma Thurman'),
array( 'id' => '3416', 'name' => 'Demi Moore'),
array( 'id' => '4430', 'name' => 'Sharon Stone'),
array( 'id' => '3967', 'name' => 'Kate Beckinsale'),
array( 'id' => '10990', 'name' => 'Emma Watson'),
);

?>


<div class="well">
<div class="container">

    <div class="row">
        <h1>Let us suggest you a movie</h1>
    </div>
</div>
</div>




<div class="container">
	<div class="row">
            <div class="col-md-1">
                <a onClick="prev()" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-chevron-left"></span> Prev
                </a>
            </div>
		<div class="col-md-10">
            <form method="post" action="/seminarska/movies/result">
            <div class="row">
                <div class="col-md-12 text-center" id="1">
        			<?php
                        $counter = 0;
                        $open = false;
                        foreach ($movieGenres as $genre) { 
                            if ($counter % 4 == 0){
                                $open = true;
                                echo "<div class='row'>";
                            }
                    ?>
                            
                            <div class="col-md-3">
                                <div class='btn-group' data-toggle='buttons'>
                                <label class="btn btn-default" style="width: 122px">
                                    <input type="checkbox" autocomplete="off" name="genre[]" value="<?=$genre['id']?>" > <?=$genre['name']?>
                                </label>
                                </div>
                            </div>  

                    <?php 
                        $counter++;
                            if ($counter % 4 == 0){
                                echo "<hr>";
                                $open =false;
                                echo "</div>";
                            }

                    }
                    if ($open){
                        echo "</div>";
                    }
                    ?>
                    <hr>
        		</div>

                <div class="col-md-12 text-center" style="display: none" id="2">
                    <div class="row">
                    <div class="btn-group" data-toggle="buttons">
                    <?php
                        foreach ($years as $key => $value) { 
                    ?>       

                        <label class="btn btn-default" style="width: 100px">
                            <input type="radio" autocomplete="off" name="year[]" value="<?=$value?>" > <?=$key?>
                        </label>

                    <?php  }
                    ?>
                    </div>
                    </div>
                    <hr>
                </div>

                <div class="col-md-12 text-center" style="display: none" id="3">
                    <?php
                        $counter = 0;
                        $open = false;
                        foreach ($directors as $director) { 
                            if ($counter % 4 == 0){
                                $open = true;
                                echo "<div class='row'>";
                            }
                    ?>
                            
                            <div class="col-md-3">
                                <div class='btn-group' data-toggle='buttons'>
                                <label class="btn btn-default" style="width: 141px">
                                    <input type="checkbox" autocomplete="off" name="director[]" value="<?=$director['id']?>" > <?=$director['name']?>
                                </label>
                                </div>
                            </div>  

                    <?php 
                        $counter++;
                            if ($counter % 4 == 0){
                                echo "<hr>";
                                $open =false;
                                echo "</div>";
                            }

                    }
                    if ($open){
                        echo "</div>";
                    }
                    ?>
                    <hr>
                </div>

                <div class="col-md-12 text-center" style="display: none" id="4">
                    <?php
                        $counter = 0;
                        $open = false;
                        foreach ($actors as $actor) { 
                            if ($counter % 4 == 0){
                                $open = true;
                                echo "<div class='row'>";
                            }
                    ?>
                            
                            <div class="col-md-3">
                                <div class='btn-group' data-toggle='buttons'>
                                <label class="btn btn-default" style="width: 178px">
                                    <input type="checkbox" autocomplete="off" name="actor[]" value="<?=$actor['id']?>" > <?=$actor['name']?>
                                </label>
                                </div>
                            </div>  

                    <?php 
                        $counter++;
                            if ($counter % 4 == 0){
                                echo "<hr>";
                                $open =false;
                                echo "</div>";
                            }

                    }
                    if ($open){
                        echo "</div>";
                    }
                    ?>
                    <hr>
                </div>

                <div class="col-md-12 text-center" style="display: none" id="5">
                    <?php
                        $counter = 0;
                        $open = false;
                        foreach ($actresses as $actress) { 
                            if ($counter % 4 == 0){
                                $open = true;
                                echo "<div class='row'>";
                            }
                    ?>
                            
                            <div class="col-md-3">
                                <div class='btn-group' data-toggle='buttons'>
                                <label class="btn btn-default" style="width: 178px">
                                    <input type="checkbox" autocomplete="off" name="actress[]" value="<?=$actress['id']?>" > <?=$actress['name']?>
                                </label>
                                </div>
                            </div>  

                    <?php 
                        $counter++;
                            if ($counter % 4 == 0){
                                echo "<hr>";
                                $open =false;
                                echo "</div>";
                            }

                    }
                    if ($open){
                        echo "</div>";
                    }
                    ?>
                    <hr>
                    <input type="submit" value="get movie" class="btn btn-primary btn-lg">
                </div>
                </form>
            </div>
           
        </div>
        <div class="col-md-1">
            <a onClick="next()" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-chevron-right"></span> Next
            </a>
        </div>

</div>

<script type="text/javascript">
var id = 1;

function hide (id) {
    document.getElementById(id).style.display = 'none';
}

function show (id) {
    document.getElementById(id).style.display = 'block';
}

function next () {
    if (id < 5){
    hide(id);
    id++;
    show(id);
    }
}
function prev () {
    if (id > 1){
    hide(id);
    id--;
    show(id);
    }
}
</script>