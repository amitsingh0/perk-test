<?php
/**
 * Class to test Database functionality
 * 
 * @author amit.php@gmail.com
 * 
 */

namespace Perk\Tests;

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Perk\Database::getInstance
     */
    public function testObjectCanBeConstructedFromGetInstance()
    {
        $db = Perk\Database::getInstance();
        $this->assertInstanceOf(Money::class, $db);
    }
    
    /**
     * @expectedException \Exception
     */
    public function testObjectCanNotBeCloned()
    {
        $db = Perk\Database::getInstance();
        $db2 = clone $db;
    }
}