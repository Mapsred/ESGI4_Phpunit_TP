<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 15:25
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use Utils\Product;
use Utils\User;

class ProductTest extends TestCase
{
    /** @var Product $product */
    private $product;
    /** @var Product $product_mock_owner */
    private $product_mock_owner;

    protected function setUp()
    {
        $owner = new User();
        $owner->setEmail("toto@gmail.com")->setFirstname("toto")->setLastname("tata")->setAge(14);

        $this->product = new Product();
        $this->product->setName("Product 1")->setOwner($owner);

        $this->product_mock_owner = clone $this->product;
        /** @var User|\PHPUnit_Framework_MockObject_MockObject $owner */
        $owner = $this->createMock(User::class);
        $owner->expects($this->any())->method("isValid")->will($this->returnValue(true));
        $this->product_mock_owner->setOwner($owner);
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return Product
     */
    public function getProductMockOwner()
    {
        return $this->product_mock_owner;
    }

    public function testIsValid()
    {
        $this->assertTrue($this->getProductMockOwner()->isValid());
    }

    public function testOwnerIsUserInstance()
    {
        $this->assertInstanceOf(User::class, $this->getProduct()->getOwner());
    }

    public function testOwnerIsValid()
    {
        $this->assertTrue($this->getProductMockOwner()->getOwner()->isValid());
    }

    public function testNameNotNull()
    {
        $this->assertNotNull($this->getProduct()->getName());
    }
	
	protected function tearDown()
	{
		$this->product = NULL;
	}
	
}
