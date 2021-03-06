<?php

namespace App\Entity\Modules;

use App\Entity\Interfaces\EntityInterface;
use App\Entity\System\LockedResource;
use App\Repository\Modules\ModuleDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\ORM\Mapping\Index;

/**
 *
 * This entity contain overall data that can be supplied for given modules / entries
 * Should contain mostly things like descriptions, headers, etc.
 *
 * No global mechanism logic should be implemented here.
 * Like for example the @see LockedResource is an separate being despite the fact that it could be implemented here
 *
 * @Table(name="module_data",
 *    uniqueConstraints={
 *        @UniqueConstraint(
 *            name="unique_record",
 *            columns={"record_type", "module", "record_identifier"}
 *        )
 *    },
 *    indexes={
 *       @Index(
 *          name="module_data_index",
 *          columns={"id", "record_type", "module", "record_identifier"}
 *        )
 *    }
 * )
 * @ORM\Entity(repositoryClass=ModuleDataRepository::class)
 */
class ModuleData implements EntityInterface
{
    const FIELD_NAME_ID                = "id";
    const FIELD_NAME_RECORD_TYPE       = "record_type";
    const FIELD_NAME_MODULE            = "module";
    const FIELD_NAME_RECORD_IDENTIFIER = "record_identifier";

    const RECORD_TYPE_DIRECTORY = "directory";
    const RECORD_TYPE_MODULE    = "module";
    const RECORD_TYPE_ENTITY    = "entity";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $record_type;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $module;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $record_identifier;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecordType(): ?string
    {
        return $this->record_type;
    }

    public function setRecordType(string $record_type): self
    {
        $this->record_type = $record_type;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getRecordIdentifier(): ?string
    {
        return $this->record_identifier;
    }

    public function setRecordIdentifier(string $record_identifier): self
    {
        $this->record_identifier = $record_identifier;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
