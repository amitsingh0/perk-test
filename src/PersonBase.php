<?php
/**
 * PersonBase class
 */
namespace Perk;

class PersonBase
{
	/*
	 * Minimum value for random age
	 */
	const AGE_MIN = 18;
	
	/*
	 * Miximum value for random age
	 */
	const AGE_MAX = 90;

	/*
	 * API url
	 */
	const API_URL = 'https://baconipsum.com/api/?type=all-meat&sentences=1&start-with-lorem=1';
	
	/*
	 * Person Age
	 */
	public $age;
	
	/*
	 * Person Height in inches
	 */
	private $height = 0;
	
	/**
	 * Increments Person's height
	 * 
	 * @param int $inches
	 * @throws \Exception
	 */
	public function addHeight($inches) 
	{
		$inches = floatval($inches);
		if ($inches < 0) {
			throw new \Exception('Height must be a positive number.');
		}
		$this->height += $inches;
		return $this;
	}
	
	/**
	 * Get Person's hight
	 * 
	 * @throws \Exception
	 */
	private function getHeight()
	{
		if ($this->height <= 0) {
			throw new \Exception('Please add the height before getting it.');
		}
		return $this->height;
	}
	
	/**
	 * Set a random value to age between AGE_MIN and AGE_MAX
	 */
	public function setRandomAge()
	{
		$this->age = rand(self::AGE_MIN, self::AGE_MAX);
		return $this;
	}
	
	/**
	 * Make an API call and return the response
	 */
	public function saySomething()
	{
		$response = json_decode(file_get_contents(self::API_URL));
		$result = isset($response[0])?$response[0]:'';
		return $result;
	}
}