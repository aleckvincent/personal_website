<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'École / Formation' => 'School',
                    'Professionnel' => 'Work'
                ]
            ])
            ->add('title')
            ->add('location')
            ->add('start', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('end', DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('ongoing', ChoiceType::class, [
                'choices' => [
                    'Non' => false,
                    'Oui' => true
                ],
                'required' => true

            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'required' => false
            ])
        ;
    }

   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }
}
