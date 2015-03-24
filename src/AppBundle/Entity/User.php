<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="user_user")
 * @ORM\Entity
 */
class User extends AbstractEntity
{
    /**
     * @JMS\MaxDepth(depth=1)
     * @ORM\OneToMany(targetEntity="Token", mappedBy="user")
     */
    protected $tokens;
    
    /**
     * @JMS\MaxDepth(depth=1)
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;
    
    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $name;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tokens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add tokens
     *
     * @param \AppBundle\Entity\Token $tokens
     * @return User
     */
    public function addToken(\AppBundle\Entity\Token $tokens)
    {
        $this->tokens[] = $tokens;

        return $this;
    }

    /**
     * Remove tokens
     *
     * @param \AppBundle\Entity\Token $tokens
     */
    public function removeToken(\AppBundle\Entity\Token $tokens)
    {
        $this->tokens->removeElement($tokens);
    }

    /**
     * Get tokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     * @return User
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
