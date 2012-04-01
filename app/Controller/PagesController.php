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

//Text Statistics
App::import('Vendor', 'Text-Statistics/TextStatistics');



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

		$uselessWords = array('a','the','this','of','for','to','from','at','with','where','when','what',' ');
		$haikuArray = array_diff(array_unique(array_merge(split(' ', $entry['Haiku']['line_1']),split(' ', $entry['Haiku']['line_2']),split(' ', $entry['Haiku']['line_3']))), $uselessWords);
		$query = $haikuArray[array_rand($haikuArray)];

		$apiKey = '9807afb683f16f992c1a2d2ee8bf2b49';

		$search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $apiKey . '&text=' . urlencode($query) . '&per_page=1&format=php_serial';

		$result = file_get_contents($search);
		$result = unserialize($result);
		if(!empty($result) && !empty($result['photos']['photo'])){
			$resultURL = "http://farm" . $result['photos']['photo'][0]['farm'] . ".static.flickr.com/" . $result['photos']['photo'][0]['server'] . "/" . $result['photos']['photo'][0]['id'] . "_" . $result['photos']['photo'][0]['secret'] . "_b.jpg";
			$this->set(compact('resultURL', 'query') );
		}



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

	public function count($text){
		echo $this->_syllables($text);
	}

	private function _syllables($text){
		$this->layout = false;
		$this->autoRender = false;

		$text = strip_tags(urldecode($text));

        $statistics = new TextStatistics;
        return $statistics->syllable_count($text);
	}
}