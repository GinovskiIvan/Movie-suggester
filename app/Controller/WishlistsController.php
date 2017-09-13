<?php
App::uses('AppController','Controller');
class WishlistsController extends AppController{

    public function index(){
        $userId=AuthComponent::user('id');
        $items=$this->Wishlist->find('all',array(
        'conditions'=>array('user_id'=>$userId)));
        $this->set('items',$items);
    }
    
    public function add($id){
            @$this->Wishlist->create();
            if($id!=null){
                $this->request->data['Wishlist']['user_id']=AuthComponent::user('id');
                @$this->request->data['Wishlist']['movie_id']=$id;
                try {
                        if(@$this->Wishlist->save($this->request->data)){
                    $this->Session->setFlash('Movie successfully added','flash',array('alert'=>'info'));
                    }
                    else {
                         $this->Session->setFlash('Can\'t add this movie','flash',array('alert'=>'info'));
                    }    
                } catch (Exception $e) {
                    $this->Session->setFlash('Movie already added','flash',array('alert'=>'info'));
                }
                $this->redirect($this->referer());
                
            }
            else {
                $this->Session->setFlash('Can\'t add this movie','flash',array('alert'=>'info'));
                $this->redirect($this->referer());
            }
        }

    public function remove($id){

        if ($id != null){
            $user_id=AuthComponent::user('id');
            $query="DELETE FROM wishlists WHERE user_id=".$user_id." AND 
                                        movie_id=".$id;
            $this->Wishlist->query($query);
            $this->redirect($this->referer());
        }
    }
}