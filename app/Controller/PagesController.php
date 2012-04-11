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

//IP logging
var $components = array(
    'RequestHandler'
);
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
	public $helpers = array('Html', 'Session', 'Js');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Haiku', 'Flag');

	public function view($id=null){

    	//collect userIP
    	$userIP = $this->RequestHandler->getClientIp();

		//Delete Session
		/*$this->Session->delete('Flagged');*/

		//Check for ID
		if($id != null){
			$entry = $this->Haiku->find('first',array(
				'contain' => 'Flag',
				'conditions' => array(
				    'Haiku.active'=>1,
				    'Haiku.id' => $id
	            ),
	        ));
		} else {
			$entry = $this->Haiku->find('first',array(
				'contain' => 'Flag',
				'conditions' => array(
				    'Haiku.active'=>1,
	            ),
	            'order' => 'rand()',
	            'limit' => '1'
	        ));
		}

		if(empty($entry)){
			$this->redirect('/view');
		}

		$flags = count($entry['Flag']);

		$uselessWords = array(
			'a',
			'the',
			'this',
			'of',
			'for',
			'to',
			'that',
			'there',
			'from',
			'at',
			'with',
			'where',
			'when',
			'what',
			'is',
			'my',
			'by',
			'too',
			'are',
			'they',
			'then',
			'and',
			'me',
			'be',
			'if',
			'it',
			'am',
			'in',
			'do',
			'on',
			'mr',
			'through',
			'you',
			'fuck',
			'porn',
			'tits',
			'boobs',
			'dick',
			'ass',
			'pussy',
			'cunt',
			'blowjob',
			'anal',
			'fucking',
			'tit',
			'boob',
			' '
		);

		$haikuArray = array_diff(
			explode('_',
				strtolower(
					join('_',
						array_unique(
							array_merge(
								split(' ', $entry['Haiku']['line_1']),
								split(' ', $entry['Haiku']['line_2']),
								split(' ', $entry['Haiku']['line_3'])
							)
						)
					)
				)
			), $uselessWords
		);

		$query = $haikuArray[array_rand($haikuArray)];

		$apiKey = '9807afb683f16f992c1a2d2ee8bf2b49';

		$search = 'http://www.flickr.com/services/rest/?method=flickr.photos.search&safe_search=1&tag_mode=any&api_key=' . $apiKey . '&tags=' . str_replace('%2C',',',urlencode($query)) . '&license=1,2,5,7&per_page=200&format=php_serial';


		$ch = curl_init($search);
		$timeout = 15; // set to zero for no timeout
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$response 		= curl_exec($ch);

		$result = unserialize($response);

		if(!empty($result) && !empty($result['photos']['photo'])){
			$id = array_rand($result['photos']['photo'],1);
			$resultURL = "http://farm" . $result['photos']['photo'][$id]['farm'] . ".static.flickr.com/" . $result['photos']['photo'][$id]['server'] . "/" . $result['photos']['photo'][$id]['id'] . "_" . $result['photos']['photo'][$id]['secret'] . "_b.jpg";
			$linkBack = "http://www.flickr.com/photos/" . $result['photos']['photo'][$id]['owner'] . "/" . $result['photos']['photo'][$id]['id'] . "/";


			$this->set(compact('resultURL', 'query', 'linkBack', 'userIP') );
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
        $this->set(compact('userIP'));
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

		$entry = $this->Haiku->find('first',array(
			'conditions' => array(
			    'Haiku.active'=>1,
            ),
            'order' => 'rand()',
            'limit' => '1'
        ));

		$next = $this->Haiku->find('first',array(
			'conditions' => array(
			    'Haiku.active'=>1,
			    'Haiku.id <>' => $entry['Haiku']['id']
            ),
            'order' => 'rand()'
        ));

        $this->set('next',$next);
        $this->set('entry',$entry);
	}

	public function count($text){
		$this->layout = false;
		$this->autoRender = false;

		echo $this->_syllables($text);
	}

	private function _syllables($text){
		$text = strip_tags(urldecode($text));

        $statistics = new TextStatistics;
        return $statistics->syllable_count($text);
	}

	public function flag(){
		$this->autoRender = false;

		//check for request
		if(!empty($this->request->data) && !empty($this->request->data['Flag']['haikwitter_id'])){

			//initialize return data array
			$return = array();

			//save haiku_id
			$flagHaikwitter = $this->request->data['Flag']['haikwitter_id'];

			//keep an eye on whether they have already flagged this item in this session (I don't know what what am is doing, array_merge?)
			if ($this->Session->check('Flagged.' . $flagHaikwitter)) {

				$return['flagged'] = false;

				//return data
				echo json_encode($return);

				exit;
			} else {

				//save data
				if($this->Flag->save($this->request->data)){

					//save session variable
				    $this->Session->write('Flagged.' . $flagHaikwitter, $flagHaikwitter);

					//look for other flags
					$flag = $this->Flag->find('count',
						array(
							'conditions'=>array(
								'haikwitter_id' => $flagHaikwitter
							),
							'contains' => array()
						)
					);

					//echoing 1 for successful save
					$return['flagged'] = true;

					//save
					if($flag >= 3){
						$this->Haiku->id = $flagHaikwitter;
						$this->Haiku->saveField('active', 0);
						$return['state'] = 'deactivated';
					}
				} else {

					//echoing 0 for unsuccessful save
					$return['saveError'] = true;
				}
			}

			//return data
			echo json_encode($return);
		}
	}
}