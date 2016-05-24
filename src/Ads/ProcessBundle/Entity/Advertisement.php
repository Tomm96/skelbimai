<?php

namespace Ads\ProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advertisements
 *
 * @ORM\Table(name="advertisements")
 * @ORM\Entity(repositoryClass="Ads\ProcessBundle\Repository\AdvertisementsRepository")
 */
class Advertisement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="posting_date", type="string", length=20)
     */
    private $postingDate;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_added", referencedColumnName="id")
     */
    private $userAdded;
    

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
     * Set title
     *
     * @param string $title
     * @return Advertisement
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Advertisement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set postingDate
     *
     * @param string $postingDate
     * @return Advertisement
     */
    public function setPostingDate($postingDate)
    {
        $this->postingDate = $postingDate;

        return $this;
    }

    /**
     * Get postingDate
     *
     * @return string 
     */
    public function getPostingDate()
    {
        return $this->postingDate;
    }

    /**
     * Set userAdded
     *
     * @param \Ads\ProcessBundle\Entity\User $userAdded
     * @return Advertisement
     */
    public function setUserAdded(\Ads\ProcessBundle\Entity\User $userAdded = null)
    {
        $this->userAdded = $userAdded;

        return $this;
    }

    /**
     * Get userAdded
     *
     * @return \Ads\ProcessBundle\Entity\User 
     */
    public function getUserAdded()
    {
        return $this->userAdded;
    }
}
