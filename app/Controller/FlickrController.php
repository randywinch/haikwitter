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
class FlickrController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Flickr';

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
	public $uses = array();


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function search($id) {



		$apiKey = '9807afb683f16f992c1a2d2ee8bf2b49';

		$search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $apiKey . '&text=' . urlencode($query) . '&per_page=1&format=php_serial';
		$result = file_get_contents($search);
		$result = unserialize($result);

		$this->set(compact('result') );
	}
}
