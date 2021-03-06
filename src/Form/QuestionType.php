<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Question;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
// use Symfony\Component\Form\Extension\Core\Type\AnswerType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('promoted')
            ->add('created', DateType::class , array('format' => 'yyyy-MM-dd  HH:mm:ss', 'widget' => 'single_text'))
            ->add('updated', DateType::class , array('format' => 'yyyy-MM-dd  HH:mm:ss', 'widget' => 'single_text'))
            ->add('answers',CollectionType::class, array('allow_add' => true ,'entry_type' => AnswerType::class,'by_reference' =>false))
            ->add('status')
            //->add('channel')
            ->add('save', SubmitType::class);
            
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
            'csrf_protection' => false
        ));
    }
}
