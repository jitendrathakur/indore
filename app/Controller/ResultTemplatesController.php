<?php
App::uses('AppController', 'Controller');
/**
 * ResultTemplates Controller
 *
 * @property ResultTemplate $ResultTemplate
 * @property PaginatorComponent $Paginator
 */
class ResultTemplatesController extends AppController {

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
		$this->ResultTemplate->recursive = 0;
		$this->set('resultTemplates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ResultTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid result template'));
		}
		$options = array('conditions' => array('ResultTemplate.' . $this->ResultTemplate->primaryKey => $id));
		$this->set('resultTemplate', $this->ResultTemplate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ResultTemplate->create();
			if ($this->ResultTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The result template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result template could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ResultTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid result template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ResultTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The result template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result template could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ResultTemplate.' . $this->ResultTemplate->primaryKey => $id));
			$this->request->data = $this->ResultTemplate->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ResultTemplate->id = $id;
		if (!$this->ResultTemplate->exists()) {
			throw new NotFoundException(__('Invalid result template'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ResultTemplate->delete()) {
			$this->Session->setFlash(__('The result template has been deleted.'));
		} else {
			$this->Session->setFlash(__('The result template could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ResultTemplate->recursive = 0;
		$this->set('resultTemplates', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ResultTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid result template'));
		}
		$options = array('conditions' => array('ResultTemplate.' . $this->ResultTemplate->primaryKey => $id));
		$this->set('resultTemplate', $this->ResultTemplate->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ResultTemplate->create();
			if ($this->ResultTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The result template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result template could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ResultTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid result template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ResultTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The result template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result template could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ResultTemplate.' . $this->ResultTemplate->primaryKey => $id));
			$this->request->data = $this->ResultTemplate->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ResultTemplate->id = $id;
		if (!$this->ResultTemplate->exists()) {
			throw new NotFoundException(__('Invalid result template'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ResultTemplate->delete()) {
			$this->Session->setFlash(__('The result template has been deleted.'));
		} else {
			$this->Session->setFlash(__('The result template could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
