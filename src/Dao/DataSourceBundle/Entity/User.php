<?php

namespace Dao\DataSourceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dao\DataSourceBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    
    /**
     * @Assert\Length(min="8", minMessage="Passwords must have at least 8 characters.")
     */
    protected $plainPassword;
    
    /**
     * @var \DateTime
     * 
     * @Gedmo\Timestampable(on="update")
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
     * @var \DateTime
     * 
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Dao\DataSourceBundle\Entity\Customer", mappedBy="user")
     */
    protected $customers;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->customers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add customers
     *
     * @param \Dao\DataSourceBundle\Entity\Customer $customers
     * @return User
     */
    public function addCustomer(\Dao\DataSourceBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove customers
     *
     * @param \Dao\DataSourceBundle\Entity\Customer $customers
     */
    public function removeCustomer(\Dao\DataSourceBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }
    
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
