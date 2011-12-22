<?php
class Book extends AppModel {
	var $name = 'Book';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'author' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'books_users',
			'foreignKey' => 'book_id',
			'associationForeignKey' => 'user_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

    public function getRandomBook($age = null) {
        // Ages greater than 7 need a spread of at least 2
        $range = ($age < 7) ? 1 : 2;

        if (empty($age)) {
            $conditions = array();
        } elseif ($age < 12) {
            $conditions = array('age BETWEEN ? AND ?' => array($age - $range, $age + $range ));
        } else {
            $conditions = array('age >= 12');
        }

        return $this->find('first', array('conditions' => $conditions,
                                        'order' => 'RAND()',
                                        'recursive' => -1));
    }

    public function loadFromAmazon( $book ) {
        App::import('ConnectionManager');
        $amazon =& ConnectionManager::getDataSource("amazon");

        // Get the ASIN number from amazon via search by title/author
        $desc = $amazon->find('Books', array('title' => $book['Book']['title'], 'author' => $book['Book']['author']));

        // Iterate over the results if there's more than 1
        if ($desc['ItemSearchResponse']['Items']['TotalResults'] > 1) {
            foreach ($desc['ItemSearchResponse']['Items']['Item'] AS $result) {
                // Make sure the title's are at least clost, and that we have a Book (not an eBook)
                if ( stristr($result['ItemAttributes']['Title'], $book['Book']['title']) &&
                        $result['ItemAttributes']['ProductGroup'] == 'Book') {
                    $item = $result;
                    break;
                }
            }
        } else {
            if (isset($desc['ItemSearchResponse']['Items']['Item'])) {
                // There's one item in the resultset
                $item = $desc['ItemSearchResponse']['Items']['Item'];
            } else {
                // The result set returned no items.
                return $book;
            }
        }

        if (isset($item['ASIN'])) {
            $book['Book']['asin'] = $item['ASIN'];
            $book['Book']['amzn_url'] = $item['DetailPageURL'];

            $detail = $amazon->findById($book['Book']['asin']);

            if (isset($detail['ItemLookupResponse']['Items']['Item']['LargeImage'])) {
                $book['Book']['amzn_image_url'] = $detail['ItemLookupResponse']['Items']['Item']['LargeImage']['URL'];
            } elseif  (isset($detail['ItemLookupResponse']['Items']['Item']['MediumImage'])) {
                $book['Book']['amzn_image_url'] = $detail['ItemLookupResponse']['Items']['Item']['MediumImage']['URL'];
            } else {
                $book['Book']['amzn_image_url'] = null;
            }

            if (isset($detail['ItemLookupResponse']['Items']['Item']['EditorialReviews']['EditorialReview']['Content'])) {
                $book['Book']['amzn_review'] = $detail['ItemLookupResponse']['Items']['Item']['EditorialReviews']['EditorialReview']['Content'];
            } elseif (isset($detail['ItemLookupResponse']['Items']['Item']['EditorialReviews']['EditorialReview'][0]['Content'])) {
                $book['Book']['amzn_review'] = $detail['ItemLookupResponse']['Items']['Item']['EditorialReviews']['EditorialReview'][0]['Content'];
            }
        }

        return $book;
    }
}
