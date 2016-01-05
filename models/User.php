<?php

class User extends Model
{
	protected static $table = 'users';

  /*
   * Find a user based on username
   */
    public static function findUserByUsername($username)
    {
        $query = 'SELECT * FROM ' . static::$table . ' WHERE username = :username';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }
}
