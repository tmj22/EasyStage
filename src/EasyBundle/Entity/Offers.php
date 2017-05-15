<?php

namespace EasyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offers
 *
 * @ORM\Table(name="offers")
 * @ORM\Entity(repositoryClass="EasyBundle\Repository\OffersRepository")
 */
class Offers
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="beginDate", type="string", length=255)
     */
    private $beginDate;

    /**
     * @var string
     *
     * @ORM\Column(name="endDate", type="string", length=255)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=255)
     */
    private $area;

    /**
     * @var int
     *
     * @ORM\Column(name="location", type="integer")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks", type="text")
     */
    private $tasks;

    /**
     * @var string
     *
     * @ORM\Column(name="remuneration", type="text")
     */
    private $remuneration;

    /**
     * @var string
     *
     * @ORM\Column(name="stay", type="text")
     */
    private $stay;

    /**
     * @var string
     *
     * @ORM\Column(name="availability", type="text")
     */
    private $availability;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="text")
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="studies", type="text")
     */
    private $studies;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="text")
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="documents", type="text")
     */
    private $documents;


    /**
     * @var string
     *
     * @ORM\Column(name="clothing", type="text")
     */
    private $clothing;

    /**
     * @var string
     *
     * @ORM\Column(name="tools", type="text")
     */
    private $tools;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="text")
     */
    private $information;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Offers
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
     * Set city
     *
     * @param string $city
     *
     * @return Offers
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offers
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
     * Set beginDate
     *
     * @param string $beginDate
     *
     * @return Offers
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    /**
     * Get beginDate
     *
     * @return string
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     *
     * @return Offers
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Offers
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Offers
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }



    /**
     * Set area
     *
     * @param string $tasks
     *
     * @return Offers
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return string
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set remuneration
     *
     * @param string $remuneration
     *
     * @return Offers
     */
    public function setRemuneration($remuneration)
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    /**
     * Get remuneration
     *
     * @return string
     */
    public function getRemuneration()
    {
        return $this->remuneration;
    }

    /**
     * Set stay
     *
     * @param string $stay
     *
     * @return Offers
     */
    public function setStay($stay)
    {
        $this->stay = $stay;

        return $this;
    }

    /**
     * Get stay
     *
     * @return string
     */
    public function getStay()
    {
        return $this->stay;
    }

    /**
     * Set availability
     *
     * @param string $availability
     *
     * @return Offers
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Offers
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set studies
     *
     * @param string $studies
     *
     * @return Offers
     */
    public function setStudies($studies)
    {
        $this->studies = $studies;

        return $this;
    }

    /**
     * Get studies
     *
     * @return string
     */
    public function getStudies()
    {
        return $this->studies;
    }

    /**
     * Set skills
     *
     * @param string $skills
     *
     * @return Offers
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }



    /**
     * Set documents
     *
     * @param string $documents
     *
     * @return Offers
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Get documents
     *
     * @return string
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set clothing
     *
     * @param string $clothing
     *
     * @return Offers
     */
    public function setClothing($clothing)
    {
        $this->clothing = $clothing;

        return $this;
    }

    /**
     * Get clothing
     *
     * @return string
     */
    public function getClothing()
    {
        return $this->clothing;
    }


    /**
     * Set tools
     *
     * @param string $tools
     *
     * @return Offers
     */
    public function setTools($tools)
    {
        $this->tools = $tools;

        return $this;
    }

    /**
     * Get tools
     *
     * @return string
     */
    public function getTools()
    {
        return $this->tools;
    }


    /**
     * Set location
     *
     * @param integer $location
     *
     * @return Offers
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return Offers
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set area
     *
     * @param string $area
     *
     * @return Offers
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

}
