<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 16:28
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use Utils\DatabaseConnection;
use Utils\EmailSender;
use Utils\Exchange;
use Utils\Product;
use Utils\User;

class ExchangeTest extends TestCase
{
    /** @var Exchange $exchange */
    private $exchange;

    /**
     * Sets up the fixture, the exchange class and the mocks
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->exchange = new Exchange();

        /** @var User|\PHPUnit_Framework_MockObject_MockObject $owner */
        $owner = $this->createMock(User::class);
        $owner->expects($this->any())->method("isValid")->willReturn(true);


        /** @var Product|\PHPUnit_Framework_MockObject_MockObject $product */
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method("isValid")->willReturn(true);
        $product->expects($this->any())->method("getOwner")->willReturn($owner);


        /** @var User|\PHPUnit_Framework_MockObject_MockObject $receiver */
        $receiver = $this->createMock(User::class);
        $receiver->expects($this->any())->method("isValid")->willReturn(true);
        $receiver->expects($this->any())->method("getAge")->willReturn("17");


        /** @var DatabaseConnection|\PHPUnit_Framework_MockObject_MockObject $dbConnection */
        $dbConnection = $this->createMock(DatabaseConnection::class);
        $dbConnection->expects($this->any())->method("saveProduct")->willReturn(true);
        $dbConnection->expects($this->any())->method("saveUser")->willReturn(true);
        $dbConnection->expects($this->any())->method("saveExchange")->willReturn(true);


        /** @var EmailSender|\PHPUnit_Framework_MockObject_MockObject $emailSender */
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())->method("sendEmail")->willReturn(true);
        $emailSender->expects($this->any())->method("getMail")->willReturn("test@gmail.com");


        $this->exchange
            ->setProduct($product)
            ->setReceiver($receiver)
            ->setStartDate((new \DateTime())->add(new \DateInterval("PT1H")))
            ->setEndDate((new \DateTime())->add(new \DateInterval("PT2H")))
            ->setDbConnection($dbConnection)
            ->setEmailSender($emailSender);
    }

    /**
     * Tears down the fixture
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->exchange = null;
    }

    /**
     * @return Exchange
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * @covers Exchange::save()
     */
    public function testSuccessSave()
    {
        $this->assertTrue($this->getExchange()->save());
    }

    /**
     * @covers Exchange::isValid()
     * @covers Exchange::getEndDate()
     * @covers Exchange::getStartDate()
     */
    public function testDates()
    {
        $this->assertGreaterThan($this->getExchange()->getStartDate(), $this->getExchange()->getEndDate());
        $this->assertTrue($this->getExchange()->isValid());
    }

    /**
     * @covers Exchange::save()
     * @covers Exchange::getEndDate()
     * @covers Exchange::getStartDate()
     */
    public function testIsNotSavedBecauseEndDateLesserThanStartDate()
    {
        $this->getExchange()
            ->setStartDate((new \DateTime())->add(new \DateInterval("PT2H")))
            ->setEndDate((new \DateTime())->add(new \DateInterval("PT1H")));

        $this->assertFalse($this->getExchange()->save());
    }

    /**
     * @covers Exchange::save()
     * @covers Exchange::getStartDate()
     */
    public function testIsNotSavedBecauseStartDateLesserThanNow()
    {
        $this->getExchange()
            ->setStartDate((new \DateTime())->sub(new \DateInterval("PT2H")));

        $this->assertFalse($this->getExchange()->save());
    }
}