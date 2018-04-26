<?php
/**
 * PHP version 5.6
 * 
 * Script for connecting PHP app to MySQL database.
 * Documented by Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * 
 * @category Connector
 * @package  Database
 * @author   Bahrain Polytechnic <polytechnic.staff@polytechnic.bh>
 * @link     http://polytechnic.bh
 */

/**
 * PHP version 5.6
 * 
 * MySQL Database connection class.
 * Documented by Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * 
 * @category Connector
 * @author   Bahrain Polytechnic <polytechnic.staff@polytechnic.bh>
 */
class Database
{
    public static $instance = null;
    public $dblink = null;

    /**
     * Create new database instance.
     * 
     * @return void
     */
    public static function getInstance() 
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Database connection constructor.
     * 
     * @return void
     */
    function __construct() 
    {
        if (is_null($this->dblink)) {
            $this->connect();
        }
    }

    /**
     * MySQL database connection string.
     * 
     * @return void
     */
    function connect() 
    {
        $this->dblink = mysqli_connect(
            'localhost', 'root', '', 'development_articles'
        ) 
            or die('CAN NOT CONNECT');
    }

    /**
     * Destroy database instance.
     * 
     * @return void
     */
    function __destruct() 
    {
        if (!is_null($this->dblink)) {
            $this->close($this->dblink);
        }
    }

    /**
     * Close database connection.
     * 
     * @return void
     */
    function close() 
    {
        mysqli_close($this->dblink);
    }

    /**
     * Send PHP query to database.
     * 
     * @param SQL $sql query
     * 
     * @return void
     */
    function querySQL($sql) 
    {
        if ($sql != null || $sql != '') {
            mysqli_query($this->dblink, $sql);
        }
    }

    /**
     * Fetch a single database object/row based on query.
     * 
     * @param SQL $sql query
     * 
     * @return Object
     */
    function singleFetch($sql) 
    {
        //echo $sql = $this->mkSafe($sql);
        $fet = null;
        if ($sql != null || $sql != '') {
            $res = mysqli_query($this->dblink, $sql);
            $fet = mysqli_fetch_object($res);
        }
        return $fet;
    }

    /**
     * Fetch multiple database objects/rows based on query.
     * 
     * @param SQL $sql query
     * 
     * @return Data
     */
    function multiFetch($sql) 
    {
        $sql = $this->mkSafe($sql);
        $result = null;
        $counter = 0;
        if ($sql != null || $sql != '') {
            $res = mysqli_query($this->dblink, $sql);
            while ($fet = mysqli_fetch_object($res)) {
                $result[$counter] = $fet;
                $counter++;
            }
        }
        return $result;
    }

    /**
     * Strip HTML & PHP tags from a string. Use before sending
     * query to database.
     * 
     * @param string $string user input
     * 
     * @return String
     */
    function mkSafe($string) 
    {
          $string = strip_tags($string);
        if (!get_magic_quotes_gpc()) {
            $string = addslashes($string);
        } else {
            $string = stripslashes($string);
        }
          $string = str_ireplace("script", "blocked", $string);

          $string = trim($string);
          $string = mysqli_escape_string($this->dblink, $string);

        return $string;
    }

    /**
     * Return table rows based on query.
     * 
     * @param SQL $sql query
     * 
     * @return Data rows
     */
    function getRows($sql) 
    {
        $rows = 0;
        if ($sql != null || $sql != '') {
            $result = mysqli_query($this->dblink, $sql);
            $rows = mysqli_num_rows($result);
        }
        return $rows;
    }

}