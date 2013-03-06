<?php
/**
 * This file is part of the Presta Bundle project.
 *
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Presta\CMSMediaBundle\Block;

use Presta\CMSCoreBundle\Block\BaseModelBlockService;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Gallery Block use SonataMediaBundle
 */
class GalleryBlockService extends BaseModelBlockService
{
    /**
     * @var string
     */
    protected $template = 'PrestaCMSMediaBundle:Block:block_gallery.html.twig';

    /**
     * {@inheritdoc}
     */
    protected function getModelFields()
    {
        return array(
            'gallery' => 'sonata.media.admin.gallery'
        );
    }

    protected function getLayouts()
    {
        return array(
            'vertical'   => $this->trans('gallery.layout.vertical'),
            'horizontal' => $this->trans('gallery.layout.horizontal')
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getFormSettings(FormMapper $formMapper, BlockInterface $block)
    {
        return array_merge(
            array(
                array('layout', 'choice', array('required' => true, 'choices' => $this->getLayouts()))
            )
          ,  parent::getFormSettings($formMapper, $block)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultSettings()
    {
        return array(
            'gallery' => null,
            'layout' => 'vertical'
        );
    }
}
