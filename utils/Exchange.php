<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 16:23
 */

namespace Utils;

class Exchange
{
    /** @var User $receiver */
    private $receiver;

    /** @var Product $product */
    private $product;

    /** @var EmailSender $emailSender */
    private $emailSender;

    /** @var DatabaseConnection $dbConnection */
    private $dbConnection;

    /** @var \DateTime $start_date */
    private $start_date;

    /** @var \DateTime $end_date */
    private $end_date;

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     * @return Exchange
     */
    public function setStartDate(\DateTime $start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param \DateTime $end_date
     * @return Exchange
     */
    public function setEndDate(\DateTime $end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * @return User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param User $receiver
     * @return Exchange
     */
    public function setReceiver(User $receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return Exchange
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return EmailSender
     */
    public function getEmailSender()
    {
        return $this->emailSender;
    }

    /**
     * @param EmailSender $emailSender
     * @return Exchange
     */
    public function setEmailSender(EmailSender $emailSender)
    {
        $this->emailSender = $emailSender;

        return $this;
    }

    /**
     * @return DatabaseConnection
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * @param DatabaseConnection $dbConnection
     * @return Exchange
     */
    public function setDbConnection(DatabaseConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;

        return $this;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if ($this->getReceiver()->getAge() < 18) {
            $this->getEmailSender()->sendEmail($this->getReceiver(), "message");
        }

        return $this->getProduct()->isValid() &&
            $this->getProduct()->getOwner()->isValid() &&
            $this->getStartDate() > new \DateTime() &&
            $this->getEndDate() > $this->getStartDate() &&
            $this->getDbConnection()->saveExchange($this);
    }
}