<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new Lsw\ApiCallerBundle\LswApiCallerBundle(),
            new Dao\DevBundle\DaoDevBundle(),
            new Dao\ApiBundle\DaoApiBundle(),
            new Dao\FrontendBundle\DaoFrontendBundle(),
            new Dao\BackendBundle\DaoBackendBundle(),
            new Dao\DataSourceBundle\DaoDataSourceBundle(),
            # api
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),

            # admin
            new FOS\UserBundle\FOSUserBundle(),
            new JavierEguiluz\Bundle\EasyAdminBundle\EasyAdminBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Cocur\Slugify\Bridge\Symfony\CocurSlugifyBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),

            # frontend
            new Genemu\Bundle\FormBundle\GenemuFormBundle(),


        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();

            $bundles[] = new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle();

            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();

            $bundles[] = new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
