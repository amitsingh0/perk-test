<?php
/**
 * Person Test
 */
namespace Perk\Tests;

use Perk\Person;

class PersonBaseTest extends \PHPUnit_Framework_TestCase
{	
	public function testSaySomething()
	{
		$person = new Person();
		$this->assertContains(strrev('Bacon ipsum dolor amet'), $person->saySomething());
	}
}