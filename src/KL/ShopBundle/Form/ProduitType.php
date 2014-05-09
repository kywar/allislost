<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ProduitType
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class ProduitType extends AbstractType
{

    const NAME = "kl_produit";

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('marque', 'entity', array(
                  'class' => 'KL\ShopBundle\Entity\Marque'
              ))
              ->add('name', 'text', array(
                  "label" => "nom"
              ))
              ->add('active', 'checkbox', array(
                  "label" => "actif",
                  "required" => false
              ))
              ->add('reference', 'text', array(
                  
              ))
              ->add('description','textarea',array(
                  
              ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KL\ShopBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

}
