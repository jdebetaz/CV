<?php
namespace App\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Award;
use App\Form\AwardForm;

final class AwardCrudData implements CrudDataInterface
{
    /**
     * @Assert\NotBlank()
     */
    public ?string $title = null;

    /**
     * @Assert\NotBlank()
     */
    public ?string $company = null;

    public ?\DateTimeInterface $recievedAt = null;

    /**
     * @Assert\NotBlank()
     */

    public Award $entity;

    public static function make(Award $award): self
    {
        $data = new self();
        $data->title = $award->getTitle();
        $data->company = $award->getCompany();
        $data->recievedAt = $award->getRecievedAt();
        $data->entity = $award;
        return $data;
    }

    public function __construct()
    {
    }

    public function hydrate(): void
    {
        $this->entity
            ->setTitle($this->title)
            ->setRecievedAt($this->recievedAt)
            ->setCompany($this->company);
    }

    public function getEntity(): object
    {
        return $this->entity;
    }

    public function getFormClass(): string
    {
        return AwardForm::class;
    }
}