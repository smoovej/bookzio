<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
    var $helpers = array('Form', 'Js');

//	var $components = array('Facebook.Connect');

    public function beforeRender() {
        parent::beforeRender();

        App::import('Vendor', 'phpflickr/phpflickr');
        $api_key = "aa44ee91a1d9f30dc4ae4e9fdebf0d65";
        $api_secret = "89572de90ebae17d";
        $flickr = new phpFlickr($api_key, $api_secret);
        $flickr->enableCache("fs", '/tmp/' );

        $tags = array ('reading','books','library','fairy tale','story','novel','tale','writing','poetry');
//                        'seuss','wizard','harry potter','',
//                        'bokeh','exploration','adventure','inspiration','imagination');
//        $tags = array('nursery rhyme');

        $tag = $tags[array_rand($tags,1)];

        $result = $flickr->photos_search(array(
                                            'tags' => $tag,
                                            'tag_mode' => 'all',
                                            'sort' => 'interestingness-desc',
                                            'per_page' => 50,
                                            'safe_search' => 1,
                                            'content_type' => 1,

                                            'media' => 'photos'));
//        debug($result, true, true);
        $max_results = count($result['photo']);
        $index = rand(0, $max_results-1);
        $photo_id = $result['photo'][$index]['id'];
        $photo_info = $flickr->photos_getSizes($photo_id);
        if (isset($photo_info[4])) {
            $photo_url = $photo_info[4]['source'];
        } else {
            $photo_url = $photo_info[3]['source'];
        }
        $this->set('photo_url', $photo_url);
        $this->set('flickr_tag', $tag);
    }
}
