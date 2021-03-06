<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="brysontech1.bt_users")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // force all users to the user role first.
        $this->roles = array('ROLE_USER');
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    //force username and email to be the same
    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", nullable=true)
     */
    private $facebookID;
 
    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", nullable=true)
     */
    private $googleID;

    /**
     * Set facebookID.
     *
     * @param string|null $facebookID
     *
     * @return User
     */
    public function setFacebookID($facebookID = null)
    {
        $this->facebookID = $facebookID;

        return $this;
    }

    /**
     * Get facebookID.
     *
     * @return string|null
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * Set googleID.
     *
     * @param string|null $googleID
     *
     * @return User
     */
    public function setGoogleID($googleID = null)
    {
        $this->googleID = $googleID;

        return $this;
    }

    /**
     * Get googleID.
     *
     * @return string|null
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }
}
