<?php
App::uses('AppController', 'Controller');

class MoviesController extends AppController
{
    public function beforeFilter()
    {
        $this->Auth->allow('index', 'home', 'movie', 'selection', 'result', 'contact');
    }


    public function index($keyword = null){
        try{
        //Search by title
        if ($this->request->is('get')) {
            if ($this->request->query('title')) {
                $title = $this->request->query('title');
                $title = str_replace(' ', '%20', $title);
                $response = file_get_contents(
                    "http://api.themoviedb.org/3/search/movie?api_key=" . Configure::read('API_KEY') . "&query=" . $title);
                $json = json_decode($response, true);
                $movies = array();
                    foreach ($json['results'] as $item) {
                        $moviesJSON = file_get_contents("http://api.themoviedb.org/3/movie/".$item['id']."?api_key=cbb012e4e7ece74ac4c32a77b00a43eb");
                        $movie = json_decode($moviesJSON, true);
                        array_push($movies, $movie);
                }
                $this->set('json', $movies);
            } else if ($keyword != null) {
                $response = file_get_contents(
                    "http://api.themoviedb.org/3/discover/movie?api_key=" . Configure::read('API_KEY') . "&with_keywords=" . $keyword);
                $json = json_decode($response, true);
                $movies = array();
                    foreach ($json['results'] as $item) {
                        $moviesJSON = file_get_contents("http://api.themoviedb.org/3/movie/".$item['id']."?api_key=cbb012e4e7ece74ac4c32a77b00a43eb");
                        $movie = json_decode($moviesJSON, true);
                        array_push($movies, $movie);
                }
                $this->set('json', $movies);
                $this->set('keyW', $keyword);
            } //Prebaruvanje filmovi spored popularnost //DEFAULT
            else {
                $response = Cache::read('newest_movies', 'short');
                if (!$response){
                    $response = file_get_contents("http://api.themoviedb.org/3/discover/movie?api_key=" . Configure::read('API_KEY') . "&sort_by=popularity.desc&page=1");
                    //Cache::write('newest_movies', $response, 'short');
                    $json = json_decode($response, true);
                    $movies = array();
                    foreach ($json['results'] as $item) {
                        $moviesJSON = file_get_contents("http://api.themoviedb.org/3/movie/".$item['id']."?api_key=cbb012e4e7ece74ac4c32a77b00a43eb");
                        $movie = json_decode($moviesJSON, true);
                        array_push($movies, $movie);
                    }
                    Cache::write('newest_movies', $movies, 'short');
                    $response = $movies;
                }
                $this->set('json', $response);
            }
        }
            
        } catch (Exception $e) {
            echo "Check internet connection";   
        }
    }

    public function home(){
    }

    public function selection(){

    }

    public function result(){
        $result = "http://api.themoviedb.org/3/discover/movie?api_key=" . Configure::read('API_KEY');
        $hasActor = false;
        if ($this->request->is('post')) {
            if ($this->request->data('genre')) {
                $selected = $this->request->data('genre');
                $result .= "&with_genres=" . $selected[0];
                for ($i = 1; $i < count($selected); $i++) {
                    $result .= "|" . $selected[$i];
                }
            }
            if ($this->request->data('year')) {
                $selected = $this->request->data('year');
                $result .= $selected[0];
            }
            if ($this->request->data('director')) {
                $selected = $this->request->data('director');
                $result .= "&with_crew=" . $selected[0];
                for ($i = 1; $i < count($selected); $i++) {
                    $result .= "|" . $selected[$i];
                }
            }
            if ($this->request->data('actor')) {
                $hasActor = true;
                $selected = $this->request->data('actor');
                $result .= "&with_cast=" . $selected[0];
                for ($i = 1; $i < count($selected); $i++) {
                    $result .= "|" . $selected[$i];
                }
            }
            if ($this->request->data('actress')) {
                $selected = $this->request->data('actress');
                if (!$hasActor) {
                    $result .= "&with_cast=" . $selected[0];
                    for ($i = 1; $i < count($selected); $i++) {
                        $result .= "|" . $selected[$i];
                    }
                } else {
                    for ($i = 0; $i < count($selected); $i++) {
                        $result .= "|" . $selected[$i];
                    }
                }
            }
            $response = file_get_contents($result);
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
                    $this->redirect(array('controller' => 'movies', 'action' => 'selection'));

                }
                
                $this->set('movies', $films);
        }
    }

    public function contact()
    {
       
    }

    public function movie($id){
        $responseMovie = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "?api_key=" . Configure::read('API_KEY'));
        $movie = json_decode($responseMovie, true);
        $responseTeam = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "/credits?api_key=" . Configure::read('API_KEY'));
        $team = json_decode($responseTeam, true);
        $responseKeywords = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "/keywords?api_key=" . Configure::read('API_KEY'));
        $keywords = json_decode($responseKeywords, true);
        $responseSimilar = file_get_contents("http://api.themoviedb.org/3/movie/" . $id . "/similar?api_key=" . Configure::read('API_KEY'));
        $similar = json_decode($responseSimilar, true);

        $this->set('movie', $movie);
        $this->set('team', $team);
        $this->set('keywords', $keywords);
        $this->set('similar', $similar);
    }

    public function add($id, $title){
        if ($id != null) {
            @$this->Movie->create();
            $this->request->data['Movie']['id'] = $id;
            @$this->request->data['Movie']['title'] = $title;

            if (@$this->Movie->save($this->request->data)) {
                $this->Session->setFlash('New movie added.');
            } else {
                $this->Session->setFlash('Can\'t add new movie');
            }
            $this->redirect('index');

        } else {
            $this->Session->setFlash('Can\'t add new movie');
            $this->redirect('index');
        }
    }
}

?>