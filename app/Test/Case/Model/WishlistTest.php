<?php
App::uses('Wishlist', 'Model');

/**
 * Wishlist Test Case
 *
 */
class WishlistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.wishlist',
		'app.user',
		'app.movie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Wishlist = ClassRegistry::init('Wishlist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Wishlist);

		parent::tearDown();
	}

}
