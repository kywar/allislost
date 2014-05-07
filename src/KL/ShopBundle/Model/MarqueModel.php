<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Model;

/**
 * MarqueModel
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
abstract class MarqueModel
{
    abstract public function getPath();


    public function getAbsolutePath()
    {
        return null === $this->getPath()
            ? null
            : $this->getUploadRootDir().'/'.$this->getPath();
    }

    public function getWebPath()
    {
        return null === $this->getPath()
            ? null
            : $this->getUploadDir().'/'.$this->getPath();
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
}
