<?php

namespace App\Form;

use App\Entity\Unsubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UnsubscriberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            //->add('email')
            ->add('email', EmailType::class, array(
                "required"=>true,
                "attr" => array(
                    'class' => "form-control"
                )
             ))
           
             

             //                'choices' => array('foo' => 'Foo', 'bar' => 'Bar', 'baz' => 'Baz'),

           //->add('offerId')
           /* ->add('spsr')
            ->add('isp')
            ->add('unsub_at')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Unsubscriber::class,
        ]);
    }
}
