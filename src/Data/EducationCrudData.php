<?php
namespace App\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Education;
use App\Form\EducationForm;

final class EducationCrudData implements CrudDataInterface
{
    /**
     * @Assert\NotBlank()
     */
    public ?string $degree = null;

    /**
     * @Assert\NotBlank()
     */
    public ?string $school = null;

    public ?\DateTimeInterface $startAt = null;
    public ?\DateTimeInterface $endAt = null;

    /**
     * @Assert\NotBlank()
     */

    public Education $entity;

    public static function make(Education $award): self
    {
        $data = new self();
        $data->degree = $award->getDegree();
        $data->school = $award->getSchool();
        $data->startAt = $award->getStartAt();
        $data->endAt = $award->getEndAt();
        $data->entity = $award;
        return $data;
    }

    public function __construct()
    {
    }

    public function hydrate(): void
    {
        $this->entity
            ->setDegree($this->degree)
            ->setStartAt($this->startAt)
            ->setEndAt($this->endAt)
            ->setSchool($this->school);
    }

    public function getEntity(): object
    {
        return $this->entity;
    }

    public function getFormClass(): string
    {
        return EducationForm::class;
    }
}