<?php
namespace App\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Experience;
use App\Form\ExperienceForm;

final class ExperienceCrudData implements CrudDataInterface
{
    /**
     * @Assert\NotBlank()
     */
    public ?string $job = null;

    /**
     * @Assert\NotBlank()
     */
    public ?string $company = null;

    /**
     * @Assert\NotBlank()
     */
    public ?string $content = null;

    public ?\DateTimeInterface $startAt = null;
    public ?\DateTimeInterface $endAt = null;

    /**
     * @Assert\NotBlank()
     */

    public Experience $entity;

    public static function make(Experience $experience): self
    {
        $data = new self();
        $data->job = $experience->getJob();
        $data->company = $experience->getCompany();
        $data->startAt = $experience->getStartAt();
        $data->endAt = $experience->getEndAt();
        $data->content = $experience->getContent();
        $data->entity = $experience;
        return $data;
    }

    public function __construct()
    {
    }

    public function hydrate(): void
    {
        $this->entity
            ->setJob($this->job)
            ->setStartAt($this->startAt)
            ->setEndAt($this->endAt)
            ->setContent($this->content)
            ->setCompany($this->company);
    }

    public function getEntity(): object
    {
        return $this->entity;
    }

    public function getFormClass(): string
    {
        return ExperienceForm::class;
    }
}