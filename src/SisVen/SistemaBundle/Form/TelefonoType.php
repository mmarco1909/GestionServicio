<?php

namespace SisVen\SistemaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TelefonoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('anexo')
            ->add('fechaAlta')
            ->add('tipoTelefono')
            ->add('cuspp')
            ->add('estado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SisVen\SistemaBundle\Entity\Telefono'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisven_sistemabundle_telefono';
    }
}
