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
 * Carousel Block use SonataMediaBundle
 *
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class CarouselBlockService extends GalleryBlockService
{
    const DEFAULT_FORMAT = 'full';

    /**
     * @var string
     */
    protected $template = 'PrestaCMSMediaBundle:Block:block_carousel.html.twig';

    /**
     * @var string
     */
    protected $preview = 'bundles/prestacmsmedia/admin/img/block/carousel.jpg';

    /**
     * Returns possible formats
     *
     * @return array
     */
    protected function getFormats()
    {
        return array(
            'full'   => $this->trans('carousel.format.full'),
            'medium' => $this->trans('carousel.format.medium'),
            'small'  => $this->trans('carousel.format.small')
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
            'format' => self::DEFAULT_FORMAT
        );
    }
}
