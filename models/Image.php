<?php

class Image extends Model
{
	protected static $table = 'images';

	public static function updateImages($id, $image, $image2, $image3)
    {
        self::dbConnect();
        $query = 'UPDATE ' . static::$table .
            ' SET image_url = :image,
            image_url = :image2,
            image_url = :image3
            WHERE ' . static::$table . '.id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':image2', $image2, PDO::PARAM_STR);
        $stmt->bindValue(':image3', $image3, PDO::PARAM_STR);
        $stmt->execute();
    }
}