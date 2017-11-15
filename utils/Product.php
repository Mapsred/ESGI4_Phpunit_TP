<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 15:23
 */

namespace Utils;


class Product
{
    /** @var string $name */
    private $name;

    /** @var User $owner */
    private $owner;
	
	/** @var bool $status */
	private $status;

	function __construct($name, $status, $user)
	{
		$this->name = $name;
		$this->status = $status;
		$this->owner = $user;
	}
	
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Product
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return null !== $this->name && $this->owner instanceof User && $this->owner->isValid();
    }


}