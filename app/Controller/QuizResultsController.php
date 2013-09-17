<?php
App::uses('AppController', 'Controller');
/**
 * QuizResults Controller
 *
 * @property QuizResult $QuizResult
 * @property PaginatorComponent $Paginator
 */
class QuizResultsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuizResult->recursive = 0;
		$this->set('quizResults', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuizResult->exists($id)) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		$options = array('conditions' => array('QuizResult.' . $this->QuizResult->primaryKey => $id));
		$this->set('quizResult', $this->QuizResult->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuizResult->create();
			if ($this->QuizResult->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz result could not be saved. Please, try again.'));
			}
		}
		$users = $this->QuizResult->User->find('list');
		$categories = $this->QuizResult->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuizResult->exists($id)) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuizResult->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuizResult.' . $this->QuizResult->primaryKey => $id));
			$this->request->data = $this->QuizResult->find('first', $options);
		}
		$users = $this->QuizResult->User->find('list');
		$categories = $this->QuizResult->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QuizResult->id = $id;
		if (!$this->QuizResult->exists()) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuizResult->delete()) {
			$this->Session->setFlash(__('The quiz result has been deleted.'));
		} else {
			$this->Session->setFlash(__('The quiz result could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->QuizResult->recursive = 0;
		$this->set('quizResults', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->QuizResult->exists($id)) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		$options = array('conditions' => array('QuizResult.' . $this->QuizResult->primaryKey => $id));
		$this->set('quizResult', $this->QuizResult->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuizResult->create();
			if ($this->QuizResult->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz result could not be saved. Please, try again.'));
			}
		}
		$users = $this->QuizResult->User->find('list');
		$categories = $this->QuizResult->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->QuizResult->exists($id)) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuizResult->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuizResult.' . $this->QuizResult->primaryKey => $id));
			$this->request->data = $this->QuizResult->find('first', $options);
		}
		$users = $this->QuizResult->User->find('list');
		$categories = $this->QuizResult->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->QuizResult->id = $id;
		if (!$this->QuizResult->exists()) {
			throw new NotFoundException(__('Invalid quiz result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuizResult->delete()) {
			$this->Session->setFlash(__('The quiz result has been deleted.'));
		} else {
			$this->Session->setFlash(__('The quiz result could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
