<?php
namespace KL\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MarqueType extends AbstractType
{
    const NAME = "kl_marque";
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('name',"text",array(
                  "label" => "nom",
                  "required" => true
              ))
              ->add('website',"text",array(
                  "label" => "url site",
                  "required" => false
              ))
              ->add('logo','file',array(
                  "required" => false
              ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KL\ShopBundle\Entity\Marque'
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
