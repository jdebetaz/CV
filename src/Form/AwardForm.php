<?php

namespace App\Form;

use App\Form\Type\DateTimeType;
use App\Domain\Blog\Category;
use App\Data\AwardCrudData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AwardForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [ 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'form-group']])
            ->add('company', TextType::class, [ 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'form-group']])
            ->add('recievedAt', DateTimeType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AwardCrudData::class,
        ]);
    }
}
