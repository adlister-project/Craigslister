<?php

class Model
{
    protected static $dbc;
    protected static $table;

    protected $attributes = [];

    public function __construct()
    {
        self::dbConnect();
    }

    private static function dbConnect()
    {
        if (!self::$dbc)
        {
            require '../database/db_connect.php';
            self::$dbc = $dbc;
        }
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        return (array_key_exists($name, $this->attributes)) ? $this->attributes[$name] : NULL;
    }

    /*
     * Get entire attributes array
     */
    public function getAttributes()
    {
        return (!empty($this->attributes)) ? $this->attributes : NULL;
    }

    /*
     * Run update on table
     */
    public function update($id)
    {
        $update = 'UPDATE ' . static::$table . ' SET ';
        $first_value = true;

        foreach ($this->attributes as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            if ($first_value) {
                $first_value = false;
                $update .= $key . ' = :' . $key;
            } else {
                $update .= ', ' . $key . ' = :' . $key;
            }
        }

        $update .= ' WHERE id = ' . $id;
        $stmt = self::$dbc->prepare($update);

        foreach ($this->attributes as $key => $value) {
            if($key == 'id') {
                continue;
            } else {
                $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }
        }

        $stmt->execute();
        $this->attributes = array();
    }

    /*
     * Run insert on table
     */
    public function insert()
    {
        $dynamicParams = array();
        $attributeKeys = array_keys($this->attributes);

        $query = 'INSERT INTO ' . static::$table . '(';
        $query .= implode(', ', $attributeKeys);
        $query .= ') VALUES (';

        foreach ($attributeKeys as $key) {
            $dynamicParams[] .= ':' . $key;
        }

        $query .= implode(', ', $dynamicParams);
        $query .= ');';

        $stmt = self::$dbc->prepare($query);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
        }

        $stmt->execute();
        $this->attributes = array();
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        if(!empty($this->attributes)) {
            if(isset($this->attributes['id'])) {
                $this->update($this->attributes['id']);
            } else {
                $this->insert();
            }
        }
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();

        $query = 'SELECT * FROM ' .  static::$table;
        $stmt = self::$dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    /*
     * Get table column names
     */
    public function getColumnNames()
    {
        self::dbConnect();

        $query = self::$dbc->prepare("DESCRIBE " . static::$table);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_COLUMN);

        return $results;
    }
}
