<?php
App::uses('AppModel', 'Model');
/**
 * Vote Model
 *
 * @property User $User
 * @property Movie $Movie
 */
class Vote extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('user_id','movie_id');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Movie' => array(
			'className' => 'Movie',
			'foreignKey' => 'movie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
