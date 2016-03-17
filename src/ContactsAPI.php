<?php
/**
 * Class to serve api calls to manage contacts
 * 
 * @author amit.php@gmail.com
 * 
 */
namespace Perk;

class ContactsAPI extends API
{	
	/**
	 * application config
	 */
	private $config = null;
	
    /*
     * Contact model
     */    
    private $model = null;
    
    /**
     * Constructor: __construct
     */
    public function __construct($request, $origin, $config)
    {
        parent::__construct($request);
        $this->config = $config;
        $this->model = new Contacts($config);
    }
    
    /**
     * add contact
     * 
     * @throws \Exception
     */
    public function add()
    {
        if ($this->method == 'POST') {
        	parse_str($this->request['data'], $contact);
        	if (empty($contact['firstName']) || empty($contact['lastName']) || empty($contact['email'])) {
        		throw new \Exception("Invalid request!");
        	}
        	if (!$this->model->add((array)$contact)) {
        		throw new \Exception("Contact addition was failure!");
        	} else {
        		$this->sendEmail($contact);
        	}
        } else {
            throw new \Exception("Invalid request!");
        }
    }
    
    public function sendEmail($contact)
    {
    	try {
    		$client = new \Postmark\PostmarkClient($this->config['email']['key']);
    		$sendResult = $client->sendEmail($this->config['email']['from'],
    				$contact['email'],
    				"Greetings from Perk!",
    				"This is just a friendly 'hello' from Perk.");
    	} catch (\Postmark\PostmarkException $ex) {
    		throw new \Exception("Email sent was failure! " . $ex->getMessage());
    	} catch (\Exception $ge) {
    		throw new \Exception("Email sent was failure!! " . $ge->getMessage());
    	}
    }
}