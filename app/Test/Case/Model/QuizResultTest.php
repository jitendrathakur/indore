<?php
App::uses('QuizResult', 'Model');

/**
 * QuizResult Test Case
 *
 */
class QuizResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quiz_result',
		'app.user',
		'app.question',
		'app.category',
		'app.questions_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuizResult = ClassRegistry::init('QuizResult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuizResult);

		parent::tearDown();
	}

}
