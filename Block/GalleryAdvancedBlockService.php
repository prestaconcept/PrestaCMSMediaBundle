<?php
/**
 * This file is part of the PrestaCMSMediaBundle
 *
 * (c) PrestaConcept <www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Presta\CMSMediaBundle\Block;

use Presta\CMSMediaBundle\Block\GalleryBlockService;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Gallery Advanced Block use SonataMediaBundle
 *
 * Add a title, a content and the layout
 *
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class GalleryAdvancedBlockService extends GalleryBlockService
{
    const DEFAULT_LAYOUT = 'vertical';

    /**
     * @var string
     */
    protected $template = 'PrestaCMSMediaBundle:Block:block_gallery_advanced.html.twig';

    /**
     * @var string
     */
    protected $preview = 'bundles/prestacmsmedia/admin/img/block/gallery_advanced.jpg';

    /**
     * Returns possible block layouts
     *
     * @return array
     */
    protected function getLayouts()
    {
        return array(
            'vertical' => $this->trans('media.layout.vertical'),
            'left'  => $this->trans('media.layout.left'),
            'right' => $this->trans('media.layout.right')
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getFormSettings(FormMapper $formMapper, BlockInterface $block)
    {
        return array_merge(
            array(
                array('title', 'text', array('required' => false, 'label' => $this->trans('form.label_title'))),
                array('content', 'textarea', array('attr' => array('class' => 'wysiwyg'), 'label' => $this->trans('form.label_content'))),
                array('layout', 'choice', array('required' => true, 'choices' => $this->getLayouts(), 'label' => $this->trans('form.label_layout')))
            ),
            parent::getFormSettings($formMapper, $block)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultSettings()
    {
        return array(
            'gallery'  => null,
            'format' => self::DEFAULT_FORMAT,
            'layout' => self::DEFAULT_LAYOUT,
            'title' => $this->trans('block.default.title'),
            'content' => $this->trans('block.default.content'),
        );
    }
}
