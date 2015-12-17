<?php

class Ad extends Model
{
	protected static $table = 'ads';

	public static function allAdsWithKeywords()
	{
		$query = 'SELECT * FROM ' .  static::$table . ' LEFT JOIN ad_keyword LEFT JOIN keywords';
		$stmt = self::$dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
	}

	public function getKeywords(array)
	{

	}

	public static function withKeywords($id)
	{

	}
}
