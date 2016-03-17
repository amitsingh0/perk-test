<?php
/**
 * Class to serve api calls to manange contacts
 * 
 * @author amit.php@gmail.com
 * 
 */
namespace Perk;

class Contacts
{
	/**
	 * application config
	 */
	private $config = null;
	
	/*
	 * Database instance
	 */
    private $db = null;
    
    /*
     * Table name for the model
     */
    private $tableName = 'contacts';
    
    /**
     * Constructor: __construct
     */
    public function __construct($config)
    {
    	$this->config = $config;
    	$dns = $config['database']['dns'];
    	$username = $config['database']['username'];
    	$password = $config['database']['password'];
    	$this->db = Database::getInstance($dns, $username, $password);
    }
    
    /**
     * Add a contact to database
     */
    public function add($contact)
    {
        $query = 'INSERT INTO `'.$this->tableName.'` SET first_name=:firstName, last_name=:lastName, email=:email';
        $statement = $this->db->prepare($query);
        $statement = $this->db->bindParams($statement, $contact);
        return $statement->execute();
    }
    
    /**
     * update a contact to database
     */
    public function update($contact)
    {
        $query = 'UPDATE `'.$this->tableName.'` SET first_name=:firstName, last_name=:lastName, email=:email WHERE id=:id LIMIT 1';
        $statement = $this->db->prepare($query);
        $id = $contact['id'];
        $statement = $this->db->bindParams($statement, $contact);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
    
    /**
     * delete a contact from database
     */
    public function delete($contact)
    {
        $query = 'DELETE FROM `'.$this->tableName.'` WHERE id=:id LIMIT 1';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $contact[id], \PDO::PARAM_INT);
        return $statement->execute();
    }
    
    /**
     * listing of all contacts from database
     */
    public function listContacts($search=null)
    {
        $query = 'SELECT * FROM `'.$this->tableName.'`';
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
}