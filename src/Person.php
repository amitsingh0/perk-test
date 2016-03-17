<?php
/**
 * Person Class
 */
namespace Perk;

class Person extends PersonBase
{
	/**
	 * {@inheritDoc}
	 * 
	 * @see \Perk\PersonBase::saySomething()
	 */
	public function saySomething()
	{
		$response = parent::saySomething();
		return strrev($response);
	}
}