<?php
App::uses('ResultTemplate', 'Model');

/**
 * ResultTemplate Test Case
 *
 */
class ResultTemplateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.result_template'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResultTemplate = ClassRegistry::init('ResultTemplate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResultTemplate);

		parent::tearDown();
	}

}
