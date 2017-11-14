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

    protected function setUp()
    {
        $this->exchange = new Exchange();

        /** @var User|\PHPUnit_Framework_MockObject_MockObject $owner */
        $owner = $this->createMock(User::class);
        $owner->expects($this->any())->method("isValid")->will($this->returnValue(true));


        /** @var Product|\PHPUnit_Framework_MockObject_MockObject $product */
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method("isValid")->will($this->returnValue(true));
        $product->expects($this->any())->method("getOwner")->will($this->returnValue($owner));


        /** @var User|\PHPUnit_Framework_MockObject_MockObject $receiver */
        $receiver = $this->createMock(User::class);
        $receiver->expects($this->any())->method("isValid")->will($this->returnValue(true));
        $receiver->expects($this->any())->method("getAge")->will($this->returnValue("17"));


        /** @var DatabaseConnection|\PHPUnit_Framework_MockObject_MockObject $dbConnection */
        $dbConnection = $this->createMock(DatabaseConnection::class);
        $dbConnection->expects($this->any())->method("saveProduct")->will($this->returnValue(true));
        $dbConnection->expects($this->any())->method("saveUser")->will($this->returnValue(true));
        $dbConnection->expects($this->any())->method("saveExchange")->will($this->returnValue(true));


        /** @var EmailSender|\PHPUnit_Framework_MockObject_MockObject $emailSender */
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())->method("sendEmail")->will($this->returnValue(true));
        $emailSender->expects($this->any())->method("getMail")->will($this->returnValue("test@gmail.com"));


        $this->exchange
            ->setProduct($product)
            ->setReceiver($receiver)
            ->setStartDate((new \DateTime())->add(new \DateInterval("PT1H")))
            ->setEndDate((new \DateTime())->add(new \DateInterval("PT2H")))
            ->setDbConnection($dbConnection)
            ->setEmailSender($emailSender);
    }

    /**
     * @return Exchange
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    public function testSuccessSave()
    {
        $this->assertTrue($this->getExchange()->save());
    }

    public function testDates()
    {
        $this->assertGreaterThan($this->getExchange()->getStartDate(), $this->getExchange()->getEndDate());
    }

    public function testIsNotSavedEndDateBeforeStartDate()
    {
        $this->getExchange()
            ->setStartDate((new \DateTime())->add(new \DateInterval("PT2H")))
            ->setEndDate((new \DateTime())->add(new \DateInterval("PT1H")));

        $this->assertFalse($this->getExchange()->save());
    }
}