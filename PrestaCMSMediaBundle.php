<?php
/**
 * This file is part of the PrestaCMSMediaBundle
 *
 * (c) PrestaConcept <www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Presta\CMSMediaBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class PrestaCMSMediaBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $this->addRegisterMappingsPass($container);
    }

    /**
     * @param ContainerBuilder $container
     */
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        $doctrineOrmCompiler = $this->findDoctrineOrmCompiler();
        if (!$doctrineOrmCompiler) {
            return;
        }

        $container->addCompilerPass(
            $doctrineOrmCompiler::createXmlMappingDriver(
                array(
                    realpath($this->getPath()  . '/Resources/config/doctrine-model') => 'Presta\CMSMediaBundle\Model',
                    realpath($this->getPath()  . '/Resources/config/doctrine-orm')   => 'Presta\CMSMediaBundle\Doctrine\Orm'
                ),
                array('presta_cms_media.persistence.orm.manager_name'),
                'presta_cms_media.backend_type_orm'
            )
        );
    }

    /**
     * Looks for a mapping compiler pass. If available, use the one from
     * DoctrineBundle (available only since DoctrineBundle 2.4 and Symfony 2.3)
     * Otherwise use the standalone one from CmfCoreBundle.
     *
     * @return boolean|string the compiler pass to use or false if no suitable
     *      one was found
     */
    private function findDoctrineOrmCompiler()
    {
        if (class_exists('Symfony\Bridge\Doctrine\DependencyInjection\CompilerPass\RegisterMappingsPass')
            && class_exists('Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')
        ) {
            return 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        }

        if (class_exists('Symfony\Cmf\Bundle\CoreBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')) {
            return 'Symfony\Cmf\Bundle\CoreBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        }

        return false;
    }
}
