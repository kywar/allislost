<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * CommandeType
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class CommandeType extends AbstractType
{

    const NAME = "kl_commande";

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add("")
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
            'data_class' => 'ST\BackofficeBundle\Form\Model\Catalogue'
        ));
    }

}
