<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;

/**
 * PropertyType
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class PropertyType extends AbstractType
{

    const NAME = "kl_property";

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
                  "label" => "nom"
              ))
              ->add('format', 'choice', array(
                  "choices" => array(
                      'integer' => 'chiffre entier',
                      'float' => 'chiffre à virgule',
                  )
              ))
              ->add('description', 'textarea', array(
              ))
              ->add('required', 'checkbox', array(
                  "label" => "obligatoire"
              ))
              ->add('public', 'checkbox', array(
              ))
              ->add('position','text',array(
                  
              ))
              ->add('ordering','text',array(
                  "label" => "ordre"
              ))
              
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ST\BackofficeBundle\Entity\Property'
        ));
    }

}
