<?php
/**
 * This file is part of the PrestaCMSMediaBundle
 *
 * (c) PrestaConcept <www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Presta\CMSMediaBundle\Model;

use Application\Sonata\MediaBundle\Entity\Media;

/**
 * @author Nicolas Joubert <njoubert@prestaconcept.net>
 */
abstract class Carousel
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var string $hook
     */
    protected $hook;

    /**
     * @var Media $media
     */
    protected $media;

    /**
     * @var string $linkUrl
     */
    protected $linkUrl;

    /**
     * @var string $linkLabel
     */
    protected $linkLabel;

    /**
     * @var integer $position
     */
    protected $position;

    /**
     * @var boolean $enabled
     */
    protected $enabled = true;

    /**
     * Return object string description
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->title;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Carousel
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set hook
     *
     * @param string $hook
     * @return Carousel
     */
    public function setHook($hook)
    {
        $this->hook = $hook;

        return $this;
    }

    /**
     * Get hook
     *
     * @return string
     */
    public function getHook()
    {
        return $this->hook;
    }

    /**
     * Set linkUrl
     *
     * @param string $linkUrl
     * @return Carousel
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
    }

    /**
     * Set linkLabel
     *
     * @param string $linkLabel
     * @return Carousel
     */
    public function setLinkLabel($linkLabel)
    {
        $this->linkLabel = $linkLabel;

        return $this;
    }

    /**
     * Get linkLabel
     *
     * @return string
     */
    public function getLinkLabel()
    {
        return $this->linkLabel;
    }

    /**
     * Set media
     *
     * @param Media $media
     * @return Carousel
     */
    public function setMedia(Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Carousel
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Carousel
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
