<?php

class Keyword extends Model
{
	protected static $table = 'keywords';

	public static function updateKeywords($id, $keyword = NULL, $keyword2 = NULL, $keyword3 = NULL)
    {
        self::dbConnect();
        $query = 'UPDATE ' . static::$table .
            ' SET keyword = :keyword,
            keyword = :keyword2,
            keyword = :keyword3
            WHERE ' . static::$table . '.id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->bindValue(':keyword2', $keyword2, PDO::PARAM_STR);
        $stmt->bindValue(':keyword3', $keyword3, PDO::PARAM_STR);
        $stmt->execute();
    }
}