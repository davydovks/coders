<?php

namespace App\Form;

use App\Entity\Coder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'ФИО'])
            ->add('position', TextType::class, ['label' => 'Должность'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('phone', TelType::class, ['label' => 'Телефон'])
            ->add('birthdate', DateType::class, ['label' => 'Дата рождения'])
            ->add('save', SubmitType::class, ['label' => 'Сохранить'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coder::class,
        ]);
    }
}