<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2016-03-07
 * Time: 15:13
 */

namespace Amopi\Mlib\Http\Configuration;

use Amopi\Mlib\Utils\ArrayDataProvider;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Processor;

trait ConfigurationValidationTrait
{
    public function processConfiguration(array $configArray, ConfigurationInterface $configurationInterface)
    {
        $processor    = new Processor();
        $processed    = $processor->processConfiguration($configurationInterface, [$configArray]);
        $dataProvider = new ArrayDataProvider($processed);

        return $dataProvider;
    }
}
