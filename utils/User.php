<?php

namespace Utils;

class User
{
    /** @var string $email */
    private $email;

    /** @var string $lastname */
    private $lastname;

    /** @var string $firstname */
    private $firstname;

    /** @var int $age */
    private $age;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL)
		&& !empty($this->firstname)
		&& !empty($this->lastname)
		&& is_int($this->age)
		&& $this->age >= 13;
		
		/*  
			return $this->email !== null && filter_var($this->email, FILTER_VALIDATE_EMAIL) &&
            $this->lastname !== null &&
            $this->firstname !== null &&
            $this->age !== null && $this->age > 13;
			*/
    }
}