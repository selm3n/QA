<?php

namespace App\Entity;

use Doctrine\ORM\MappingasORM;
use Symfony\Component\Validator\ConstraintsasAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="question")
 *
 */
class Question
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * 
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="promoted", type="boolean", nullable=true)
     *
     */
    private $promoted;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     * @Groups({"list","detailsCommandeAdmin","listCoursesParDriverAdmin","listCoursesPourDriver","detailsCourseDriver","listCommandesPatient"})
     */
    private $created;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     * @Groups({"list","detailsCommandeAdmin","listCoursesParDriverAdmin","listCoursesPourDriver","detailsCourseDriver","listCommandesPatient"})
     */
    private $updated;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * 
     */
    private $body;

    /**
     * @ORM\Column(name="status", type="string", columnDefinition="enum('male', 'femelle')")
     * 
     */
    private $status;//enum
    private $channel;//enum
    
}
