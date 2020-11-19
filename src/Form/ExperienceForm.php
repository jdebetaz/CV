<?php

namespace App\Form;

use App\Form\Type\DateTimeType;
use App\Form\Type\EditorType;
use App\Domain\Blog\Category;
use App\Data\ExperienceCrudData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('job', TextType::class, [ 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'form-group']])
            ->add('company', TextType::class, [ 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'form-group']])
            ->add('startAt', DateTimeType::class)
            ->add('endAt', DateTimeType::class)
            ->add('content', EditorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExperienceCrudData::class,
        ]);
    }
}
