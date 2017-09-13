<?php
	App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

	public function beforeFilter(){
    $this->Auth->allow('index', 'resultMovie');
	}

	public function index(){
		$mainQ = $this->Question->find('all', array('conditions'=>array('priority'=>1)));
		$subQ = $this->Question->find('all', array('conditions'=>array('priority'=>2)));
		$year = $this->Question->find('all', array('conditions'=>array('priority'=>3)));
		$keywords = $this->Question->find('all', array('conditions'=>array('priority'=>4)));
		$questions = array($mainQ[rand(0, count($mainQ) - 1)], $subQ[rand(0, count($subQ) - 1)], 
			$keywords[rand(0, count($keywords) - 1)], $year[rand(0, count($year) - 1)]);
		$this->set('questions', $questions);
	}

    public function resultMovie(){   

        if ($this->request->is('post')){
            $result = array();
            $string = "http://api.themoviedb.org/3/discover/movie?api_key=".Configure::read('API_KEY');
            $flag = false;
            if($this->request->data('1')){
                $selected = $this->request->data('1');
                $flag = true;
                $string.="&with_genres=".$selected;
            }
            if($this->request->data('2')){
                $selected = $this->request->data('2');
                if(!$flag){
                    $string.="&with_genres=".$selected;
                }
                else{
                    $string.=",".$selected;
                }
            }
            if($this->request->data('3')){
                $selected = $this->request->data('3');
                $date = explode('.', $selected);
                if ($date[1] == 'lte'){
                    $string.="&primary_release_date.lte=".$date[0];
                }
                else{
                    $string.="&primary_release_date.gte=".$date[0];
                }
            }
            if($this->request->data('4')){
                $selected = $this->request->data('4');
                $string.="&with_keywords=".$selected;
            }
                $response = file_get_contents($string);
                $json = json_decode($response, true);
                $movies = $json['results'];

                $films = array();

                for ($i=0; $i <count($movies) ; $i++) { 
                    if ($i == 10) break;

                    $id = $movies[$i]['id'];

                    $responseMovie = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "?api_key=" . Configure::read('API_KEY'));
                    $movie = json_decode($responseMovie, true);
                    $responseTeam = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "/credits?api_key=" . Configure::read('API_KEY'));
                    $team = json_decode($responseTeam, true);
                    $responseKeywords = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "/keywords?api_key=" . Configure::read('API_KEY'));
                    $keywords = json_decode($responseKeywords, true);

                    array_push($films, array('movie' => $movie, 'team' => $team,
                             'keywords' => $keywords));

                }

                if (count($films) == 0){

                    $this->Session->setFlash('No movies found. Try Again!','flash',array('alert'=>'info'));
                    $this->redirect(array('controller' => 'questions', 'action' => 'index'));

                }
                $this->set('movies', $films);
        }
    }

}
?>