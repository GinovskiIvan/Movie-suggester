
<?php

?>

<div class="container text-center">
	<form method="post" action="/seminarska/questions/resultMovie" id="form_id">
		<?php
			$counter = 0;
			$numOfQuestions = count($questions);
			foreach ($questions as $subQ) {
				$question = $subQ['Question'];
					if ($counter==0)
						echo "<div id=\"".$counter."\">";
					else
						echo "<div id=\"".$counter."\" style=\"display: none \">";
				if($counter == $numOfQuestions-1){
					?>
						<h1 style="font-size: 1000%"><?=$question['question']?></h1>
						<div class='btn-group' data-toggle='buttons'>
				        <label class="btn btn-default" style="width: 122px">
				            <input type="radio" autocomplete="off" name="<?=$question['priority']?>"  value="<?=$question['yes']?>"> Yes
				        </label>
				        <label class="btn btn-default" style="width: 122px" id="submit_form2">
				            <input type="radio" autocomplete="off" name="<?=$question['priority']?>" value="<?=$question['no']?>"> No
				        </label>
				    	</div>
					    </div>
					<?php
				}
				else{
		?>
			<h1 style="font-size: 1000%"><?=$question['question']?></h1>
			<div class='btn-group' data-toggle='buttons'>
		        <label class="btn btn-default" style="width: 122px" onClick="next()">
		            <input type="radio" autocomplete="off" name="<?=$question['priority']?>"  value="<?=$question['yes']?>"> Yes
		        </label>
		        <label class="btn btn-default" style="width: 122px" onClick="next()">
		            <input type="radio" autocomplete="off" name="no[]" value="<?=$question['no']?>"> No
		        </label>
	    	</div>
	    	</div>
		<?php	
			}
			$counter++;
		}
		?>
    </form>
</div>

<script type="text/javascript">
var id = 0;

function hide (id) {
    document.getElementById(id).style.display = 'none';
}

function show (id) {
    document.getElementById(id).style.display = 'block';
}

function next () {
    if (id < 4){
    hide(id);
    id++;
    show(id);
    }
}


 $(document).ready(function() { 
   $('input[name=3]').change(function(){
        $('form').submit();
   });
  });


</script>