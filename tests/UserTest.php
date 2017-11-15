<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Utils\User;

class UserTest extends TestCase
{
    /** @var User $user */
    private $user;

    public function setUp()
    {
		//$this->user = new User("test@test.fr", "toto", "toto", 20);
        $this->user = new User();
        $this->user->setEmail("toto@gmail.com")->setFirstname("toto")->setLastname("tata")->setAge(14);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function testIsValid()
    {
        $this->assertTrue($this->getUser()->isValid());
    }

    public function testEmailNotNull()
    {
        $this->assertNotNull($this->getUser()->getEmail(), "Email should not be null");
    }

    public function testEmailFormat()
    {
        $this->assertEquals($this->getUser()->getEmail(), filter_var($this->getUser()->getEmail(), FILTER_VALIDATE_EMAIL), "Invalid Email format");
    }

    public function testLastnameNotNull()
    {
        $this->assertNotNull($this->getUser()->getLastname(), "Lastname should not be null");
    }

    public function testFirstnameNotNull()
    {
        $this->assertNotNull($this->getUser()->getFirstname(), "Firstname should not be null");
    }

    public function testAgeNotNull()
    {
        $this->assertNotNull($this->getUser()->getAge(), "Age should not be null");
    }

    public function testAge()
    {
        $this->assertGreaterThan(13, $this->getUser()->getAge(), "Age should be greater than 13");
    }
	
	protected function tearDown()
	{
		$this->user = NULL;
	}
}