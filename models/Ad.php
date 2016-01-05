<?php

class Ad extends Model
{
	protected static $table = 'ads';


	public static function allAds()
	{
		self::dbConnect();
		$query = 'SELECT ' . static::$table .'.*, username, keyword_id, keyword, category, image_id, image_url FROM ' .  static::$table . 
			' LEFT JOIN ' . User::getTableName() . ' ON users.id = ' . static::$table . '.user_id 
			LEFT JOIN categories ON ' . static::$table . '.category_id = categories.id
			LEFT JOIN ad_image ON ' . static::$table .'.id = ad_image.ad_id
			LEFT JOIN images ON ad_image.image_id = images.id 
			LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id 
			LEFT JOIN ' . Keyword::getTableName() . ' ON ad_keyword.keyword_id = keywords.id
            ORDER BY date_posted DESC';
		$stmt = self::$dbc->query($query);
        
        $results = [];

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        	if ( array_key_exists($result['id'], $results) ) {
        		$ad = $results[$result['id']];
        		if ( ! array_key_exists($result['keyword_id'], $ad['keywords']) ) {
        			$ad['keywords'][$result['keyword_id']] = $result['keyword'];
        		}
        		if (! array_key_exists($result['image_id'], $ad['image_urls'])) {
		    		$ad['image_urls'][$result['image_id']] = $result['image_url'];
        		}
        	} else {
				$ad = [];
	        	$ad['id'] = $result['id'];
	    		$ad['username'] = $result['username'];
	    		$ad['title'] = $result['title'];
	    		$ad['description'] = $result['description'];
	    		$ad['price'] = $result['price'];
	    		$ad['date_posted'] = $result['date_posted'];
	    		$ad['category'] = $result['category'];
	    		$ad['keywords'][$result['keyword_id']] = $result['keyword'];
	    		$ad['image_urls'][$result['image_id']] = $result['image_url'];
        	}
    		$results[$result['id']] = $ad;
        }

        return $results;
	}

    public static function sortByCategory($category)
    {
        self::dbConnect();
        $query = 'SELECT ' . static::$table .'.*, username, keyword_id, keyword, category, image_id, image_url FROM ' .  static::$table . 
            ' LEFT JOIN ' . User::getTableName() . ' ON users.id = ' . static::$table . '.user_id 
            LEFT JOIN categories ON ' . static::$table . '.category_id = categories.id
            LEFT JOIN ad_image ON ' . static::$table .'.id = ad_image.ad_id
            LEFT JOIN images ON ad_image.image_id = images.id 
            LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id 
            LEFT JOIN ' . Keyword::getTableName() . ' ON ad_keyword.keyword_id = keywords.id
            WHERE categories.category = :category
            ORDER BY date_posted DESC';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        
        $results = [];

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ( array_key_exists($result['id'], $results) ) {
                $ad = $results[$result['id']];
                if ( ! array_key_exists($result['keyword_id'], $ad['keywords']) ) {
                    $ad['keywords'][$result['keyword_id']] = $result['keyword'];
                }
                if (! array_key_exists($result['image_id'], $ad['image_urls'])) {
                    $ad['image_urls'][$result['image_id']] = $result['image_url'];
                }
            } else {
                $ad = [];
                $ad['id'] = $result['id'];
                $ad['username'] = $result['username'];
                $ad['title'] = $result['title'];
                $ad['description'] = $result['description'];
                $ad['price'] = $result['price'];
                $ad['date_posted'] = $result['date_posted'];
                $ad['category'] = $result['category'];
                $ad['keywords'][$result['keyword_id']] = $result['keyword'];
                $ad['image_urls'][$result['image_id']] = $result['image_url'];
            }
            $results[$result['id']] = $ad;
        }

        return $results;
    }

    public static function getAllCategories()
    {
        self::dbConnect();
        $query = 'SELECT category FROM categories';
        $stmt = self::$dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

	public static function adWithAllFields($id)
	{
		self::dbConnect();
		$query = 'SELECT ' . static::$table .'.*, username, keyword_id, keyword, category, image_id, image_url FROM ' .  static::$table . 
			' LEFT JOIN ' . User::getTableName() . ' ON users.id = ' . static::$table . '.user_id 
			LEFT JOIN categories ON ' . static::$table . '.category_id = categories.id
			LEFT JOIN ad_image ON ' . static::$table .'.id = ad_image.ad_id
			LEFT JOIN images ON ad_image.image_id = images.id 
			LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id 
			LEFT JOIN ' . Keyword::getTableName() . ' ON ad_keyword.keyword_id = keywords.id 
			WHERE ' . static::$table . '.id = :id';
		$stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    		$results['id'] = $result['id'];
    		$results['username'] = $result['username'];
    		$results['title'] = $result['title'];
    		$results['description'] = $result['description'];
    		$results['price'] = $result['price'];
    		$results['date_posted'] = $result['date_posted'];
    		$results['category'] = $result['category'];
    		$results['keywords'][$result['keyword_id']] = $result['keyword'];
    		$results['image_urls'][$result['image_id']] = $result['image_url'];
        }

        $instance = null;
        if ($results)
        {
            $instance = new static;
            $instance->attributes = $results;
        }
        return $instance;
	}

    public static function updateAllFields($id, $keyword)
    {
        self::dbConnect();
        $query = 'SELECT ' . static::$table .'.*, username, keyword_id, keyword, category, image_id, image_url FROM ' .  static::$table . 
            ' LEFT JOIN ' . User::getTableName() . ' ON users.id = ' . static::$table . '.user_id 
            LEFT JOIN categories ON ' . static::$table . '.category_id = categories.id
            LEFT JOIN ad_image ON ' . static::$table .'.id = ad_image.ad_id
            LEFT JOIN images ON ad_image.image_id = images.id 
            LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id 
            LEFT JOIN ' . Keyword::getTableName() . ' ON ad_keyword.keyword_id = keywords.id 
            UPDATE keywords.:keyword
            WHERE ' . static::$table . '.id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':keyword', $id, PDO::PARAM_STR);
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $results['id'] = $result['id'];
            $results['username'] = $result['username'];
            $results['title'] = $result['title'];
            $results['description'] = $result['description'];
            $results['price'] = $result['price'];
            $results['date_posted'] = $result['date_posted'];
            $results['category'] = $result['category'];
            $results['keywords'][$result['keyword_id']] = $result['keyword'];
            $results['image_urls'][$result['image_id']] = $result['image_url'];
        }

        $instance = null;
        if ($results)
        {
            $instance = new static;
            $instance->attributes = $results;
        }
        return $instance;
    }

	public static function allWithKeywords()
	{
		self::dbConnect();
		$query = 'SELECT * FROM ' .  static::$table . ' LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id LEFT JOIN keywords ON ad_keyword.keyword_id = keywords.id';
		$stmt = self::$dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
	}

	public static function withKeywords($id)
	{
		self::dbConnect();
		$query = 'SELECT ' . static::$table .'.*, keyword_id, keyword FROM ' .  static::$table . ' LEFT JOIN ad_keyword ON ' . static::$table . '.id = ad_keyword.ad_id LEFT JOIN keywords ON ad_keyword.keyword_id = keywords.id WHERE ' . static::$table . '.id = :id';
		$stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    		$results['id'] = $result['id'];
    		$results['user_id'] = $result['user_id'];
    		$results['title'] = $result['title'];
    		$results['description'] = $result['description'];
    		$results['price'] = $result['price'];
    		$results['date_posted'] = $result['date_posted'];
    		$results['keywords'][$result['keyword_id']] = $result['keyword'];
        }

        $instance = null;
        if ($results)
        {
            $instance = new static;
            $instance->attributes = $results;
        }
        return $instance;
	}

	public static function allWithImages()
	{
		self::dbConnect();
		$query = 'SELECT * FROM ' .  static::$table . ' LEFT JOIN ad_image ON ' . static::$table . '.id = ad_image.ad_id LEFT JOIN images ON ad_image.image_id = images.id';
		$stmt = self::$dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
	}
}
