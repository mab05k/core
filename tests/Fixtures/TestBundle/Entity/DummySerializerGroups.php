<?php

declare(strict_types=1);

namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class DummySerializerGroups
 * @package ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity
 *
 * @author Michael Bos <mab05k@gmail.com>
 * @ORM\Entity()
 */
class DummySerializerGroups
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups("output")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column()
     * @Assert\NotBlank()
     * @Groups("output")
     */
    private $index;

    /**
     * @var string
     *
     * @ORM\Column()
     * @Assert\NotBlank()
     * @Groups({"input", "output"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column()
     * @Assert\NotBlank()
     * @Groups({"output"})
     */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param string $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
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
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
