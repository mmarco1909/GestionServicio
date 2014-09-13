<?php

namespace SisVen\SistemaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProspectosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('cuspp')
            ->add('primerNm')
            ->add('segundoNm')
            ->add('primerAp')
            ->add('segundoAp')
            ->add('fecNacimiento')
            ->add('numdoc')
            ->add('direccion')
            ->add('ram')
            ->add('idAfp')
            ->add('idEmpresa')
            ->add('idSexo')
            ->add('idTipdoc')
            ->add('idRangoRam')
            ->add('idDistrito')
            ->add('idUsuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SisVen\SistemaBundle\Entity\Prospectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisven_sistemabundle_prospectos';
    }
}
