<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Haiku');

	public function view($id=null){

		//Check for ID
		if($id != null){
			$entry = $this->Haiku->find('first',array(
				'conditions' => array(
				    'Haiku.active'=>1,
				    'Haiku.id' => $id
	            ),
	        ));			
		} else {
			$entry = $this->Haiku->find('first',array(
				'conditions' => array(
				    'Haiku.active'=>1,
	            ),
	            'order' => 'rand()',
	            'limit' => '1'
	        ));
		}
		

		//Get Random Next Entry
		$next = $this->Haiku->find('first',array(
			'conditions' => array(
			    'Haiku.active'=>1,
			    'Haiku.id <>' => $entry['Haiku']['id']
            ),
            'order' => 'rand()'
        ));


        $this->set('entry',$entry);
        $this->set('next',$next);
	}

	public function add(){

	    if ($this->request->is('post')) {
	        // If the form data can be validated and saved...
	    	$data = $this->request->data;
	    	$data['Haiku']['id'] = substr(MD5( time() ) ,0,12);
	    	$data['Haiku']['active'] = 1;
	    	$data['Haiku']['name'] = 'Anonymous';

	        if ($this->Haiku->save($data)) {

	            $this->redirect('/view/'. $data['Haiku']['id']);
	        }
	    }
	}
}