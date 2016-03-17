<?php
/**
 * PersonBase Test
 */
namespace Perk\Tests;

use Perk\PersonBase;

class PersonBaseTest extends \PHPUnit_Framework_TestCase
{
	public function testAddHeight()
	{
		$person = new PersonBase();
		
		$person->addHeight(60);
		$this->assertEquals(60, $person->getHeight());
		
		$person->addHeight(5);
		$this->assertEquals(65, $person->getHeight());
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function testAddHeightInvalid()
	{
		$person = new PersonBase();
		$person->addHeight(-1);
	}
	
	public function testGetHeight()
	{
		$person = new PersonBase();
		$person->addHeight(60);
		$this->assertEquals(60, $person->getHeight());
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function testGetHeightInvalid()
	{
		$person = new PersonBase();
		$person->getHeight();
	}
	
	public function testSetRandomAge()
	{
		$person = new PersonBase();
		$person->setRandomAge();
		$this->assertGreaterThanOrEqual(PersonBase::AGE_MIN, $person->age);
		$this->assertLessThanOrEqual(PersonBase::AGE_MIN, $person->age);
	}
	
	public function testSaySomething()
	{
		$person = new PersonBase();
		$this->assertContains('Bacon ipsum dolor amet', $person->saySomething());
	}
}