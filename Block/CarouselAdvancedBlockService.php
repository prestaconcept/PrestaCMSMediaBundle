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

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Presta\CMSCoreBundle\Block\BaseBlockService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Block carousel advanced
 *
 * @author Nicolas Joubert <njoubert@prestaconcept.net>
 */
class CarouselAdvancedBlockService extends BaseBlockService
{
    /**
     * @var string
     */
    protected $template = 'PrestaCMSMediaBundle:Block:block_carousel_advanced.html.twig';

    /**
     * @var string
     */
    protected $preview = 'bundles/prestacmsmedia/admin/img/block/carousel.jpg';

    /**
     * @var string
     */
    protected $settingsRoute = 'admin_presta_cmsmedia_carousel_list';

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    protected function getAdditionalViewParameters(BlockInterface $block)
    {
        return array(
            'carouselItems' => $this->loadCarouselItemsForBlock($block)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFormSettings(FormMapper $formMapper, BlockInterface $block)
    {
        return array(
            array('title', 'text', array('required' => false, 'label' => $this->trans('form.label_title'))),
            array('title_level', 'text', array('required' => false, 'label' => $this->trans('form.title_level'))),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultSettings()
    {
        return array(
            'title'         => '',
            'title_level'   => 'h2'
        );
    }

    /**
     * Load carousel items to display
     *
     * @param  BlockInterface  $block
     * @return ArrayCollection
     */
    protected function loadCarouselItemsForBlock(BlockInterface $block)
    {
        $settings = $block->getSettings();

        return $this->container->get('doctrine')
            ->getRepository('Presta\CMSMediaBundle\Doctrine\Orm\Carousel')
            ->findLimited();
    }
}
