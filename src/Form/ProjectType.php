<?php

namespace App\Form;

use App\Entity\Coder;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Название'])
            ->add('customer', TextType::class, ['label' => 'Заказчик'])
            ->add('closed', CheckboxType::class, ['label' => 'Закрыт', 'required' => false])
            ->add('coders', EntityType::class, [
                'label' => 'Разработчики',
                'class' => Coder::class,
                'choice_label' => 'name',
                'multiple' => true,
                'required' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Сохранить'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
