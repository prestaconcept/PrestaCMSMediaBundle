<?php
/**
 * This file is part of the PrestaCMSMediaBundle
 *
 * (c) PrestaConcept <www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Presta\CMSMediaBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Admin\Admin;

/**
 * @author Nicolas Joubert <njoubert@prestaconcept.net>
 */
class CarouselAdmin extends Admin
{
    /**
     * The translation domain to be used to translate messages
     *
     * @var string
     */
    protected $translationDomain = 'PrestaCMSMediaBundle';

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'form.label.title'))
            ->add('position', null, array('label' => 'form.label.position'))
            ->add('enabled', null, array('label' => 'form.label.enabled'))
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit'      => array(),
                        'delete'    => array(),
                    )
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with($this->trans('admin.form.fieldset.general'))
                ->add('title', 'text', array(
                    'required' => true,
                    'attr' => array('class' => 'sonata-medium'),
                    'label' => 'form.label.title'
                ))
                ->add('hook', 'textarea', array(
                    'required' => false,
                    'attr' => array('class' => 'sonata-medium'),
                    'label' => 'form.label.hook'
                ))
                ->add(
                    'media',
                    'sonata_type_model_list',
                    array(
                        'required' => true,
                        'label' => 'form.label.media'
                    ),
                    array('link_parameters' => array('context' => 'prestacms'))
                )
                ->add('linkUrl', 'text', array(
                    'required' => false,
                    'attr' => array('class' => 'sonata-medium'),
                    'label' => 'form.label.link_url'
                ))
                ->add('linkLabel', 'text', array(
                    'required' => false,
                    'attr' => array('class' => 'sonata-medium'),
                    'label' => 'form.label.link_label'
                ))
                ->add('position', 'integer', array(
                    'required' => true,
                    'attr' => array('class' => 'sonata-medium'),
                    'label' => 'form.label.position'
                ))
                ->add('enabled', null, array(
                    'required' => false,
                    'label' => 'form.label.enabled'
                ))
            ->end();

        return;
    }
}
