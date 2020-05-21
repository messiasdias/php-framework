<?php
/**
 * User Model Class
 */
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use App\ORM\Model;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 **/

class User extends Model {

    /**
    * @ORM\Column(type="string")
    */
    private $first_name; 
     /**
    * @ORM\Column(type="string")
    */
    private $last_name; 

     /**
    * @ORM\Column(type="string",unique=true)
    */
    private $username ; 

     /**
    * @ORM\Column(type="text")
    */
    private $pass;

     /**
    * @ORM\Column(type="string",unique=true)
    */
    private  $email;
     /**
    * @ORM\Column(type="text",nullable=true)
    */
    private   $remember_token;
     /**
    * @ORM\Column(type="integer")
    */
    private  $rol;
     /**
    * @ORM\Column(type="integer")
    */
    private  $status;
     /**
    * @ORM\Column(type="string",nullable=true)
    */
    private  $img;
    
 

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = ucfirst($firstName);

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = ucfirst($lastName);

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pass.
     *
     * @param string $pass
     *
     * @return User
     */
    public function setPass($pass)
    {
        if ( (isset($pass) && ( count_chars($pass) != 60 ))) {
            $this->pass = password_hash($pass, PASSWORD_BCRYPT);
        }else{
            $this->pass = $pass;  
        }	
        return $this;
    }

    /**
     * Get pass.
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set rememberToken.
     *
     * @param string $rememberToken
     *
     * @return User
     */
    public function setRememberToken($rememberToken)
    {
        $this->remember_token = $rememberToken;
        return $this;
    }

    /**
     * Get rememberToken.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set rol.
     *
     * @param int $rol
     *
     * @return User
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol.
     *
     * @return int
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set img.
     *
     * @param string $img
     *
     * @return User
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    /**
     * Get img.
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    

}
