<?php

namespace App\Form;

use App\Data\LanguageCrudData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LanguageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [ 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'form-group']])
            ->add('level', ChoiceType::class, [
                'choices'  => [
                    'Langue maternelle' => 'Langue maternelle',
                    'C2' => 'C2',
                    'C1' => 'C1',
                    'B2' => 'B2',
                    'B1' => 'B1',
                    'A2' => 'A2',
                    'A1' => 'A1',
                ],
                'attr' => [
                    'class' => 'form-control'
                ], 'row_attr' => [
                    'class' => 'form-group'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LanguageCrudData::class,
        ]);
    }
}
