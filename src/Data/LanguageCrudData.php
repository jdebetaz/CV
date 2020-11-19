<?php
namespace App\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Language;
use App\Form\LanguageForm;

final class LanguageCrudData implements CrudDataInterface
{
    /**
     * @Assert\NotBlank()
     */
    public ?string $title = null;

    /**
     * @Assert\NotBlank()
     */
    public ?string $level = null;

    /**
     * @Assert\NotBlank()
     */

    public Language $entity;

    public static function make(Language $award): self
    {
        $data = new self();
        $data->title = $award->getTitle();
        $data->level = $award->getLevel();
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
            ->setLevel($this->level);
    }

    public function getEntity(): object
    {
        return $this->entity;
    }

    public function getFormClass(): string
    {
        return LanguageForm::class;
    }
}