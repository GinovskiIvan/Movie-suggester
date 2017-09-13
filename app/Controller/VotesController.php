<?php
App::uses('AppController','Controller');
class VotesController extends AppController{
public function index(){
    $votes = $this->Vote->query("SELECT movie_id,count(user_id) FROM votes GROUP BY(movie_id) ORDER BY count(user_id) DESC");
    $this->set('votes',$votes);
}

    public function add($id){
        @$this->Vote->create();
        if($id!=null){
            $this->request->data['Vote']['user_id']=AuthComponent::user('id');
            @$this->request->data['Vote']['movie_id']=$id;
            try {
                 if(@$this->Vote->save($this->request->data)){
            $this->Session->setFlash('Movie successfully recommended','flash',array('alert'=>'info'));
            }
            else {
                $this->Session->setFlash('Can\'t recommend this movie','flash',array('alert'=>'info'));
            }
                
            } catch (Exception $e) {
                $this->Session->setFlash('Movie already recomended!','flash',array('alert'=>'info'));
            }
            $this->redirect($this->referer());
            
        }
        else {
            $this->Session->setFlash('Can\'t recommend this movie','flash',array('alert'=>'info'));
            $this->redirect($this->referer());
        }

}

}