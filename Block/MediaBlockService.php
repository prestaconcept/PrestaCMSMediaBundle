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

/**
 * Media Block use SonataMediaBundle
 *
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class MediaBlockService extends BaseModelBlockService
{
    /**
     * @var string
     */
    protected $template = 'PrestaCMSMediaBundle:Block:block_media.html.twig';

    /**
     * {@inheritdoc}
     */
    protected function getModelFields()
    {
        return array(
            'media' => 'sonata.media.admin.media'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultSettings()
    {
        return array(
            'media' => null
        );
    }
}
