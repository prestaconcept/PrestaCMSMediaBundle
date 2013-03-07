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
    const DEFAULT_FORMAT = 'vertical';

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

    /**
     * Returns possible gallery formats
     *
     * @return array
     */
    protected function getFormats()
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
                array('format', 'choice', array('required' => true, 'choices' => $this->getFormats()))
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
            'gallery' => null,
            'format' => self::DEFAULT_FORMAT,
        );
    }
}
