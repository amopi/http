<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2016-03-16
 * Time: 15:57
 */

namespace Amopi\Mlib\Http\ServiceProviders\Security;

use Amopi\Mlib\Http\Configuration\ConfigurationValidationTrait;
use Amopi\Mlib\Http\Configuration\SimpleAccessRuleConfiguration;
use Amopi\Mlib\Utils\DataProviderInterface;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;

class SimpleAccessRule implements AccessRuleInterface
{
    use ConfigurationValidationTrait;

    /** @var  string|RequestMatcherInterface */
    protected $pattern;
    /** @var  array */
    protected $requiredRoles;
    /** @var  string|null */
    protected $requiredChannel;

    public function __construct(array $ruleConfiguration)
    {
        $dp = $this->processConfiguration($ruleConfiguration, new SimpleAccessRuleConfiguration());

        $this->pattern         = $dp->getMandatory('pattern', DataProviderInterface::MIXED_TYPE);
        $this->requiredRoles   = $dp->getMandatory('roles', DataProviderInterface::ARRAY_TYPE);
        $this->requiredChannel = $dp->getOptional('channel', DataProviderInterface::STRING_TYPE);
    }

    /**
     * @return string|RequestMatcherInterface
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return array
     */
    public function getRequiredRoles()
    {
        return $this->requiredRoles;
    }

    /**
     * @param array $requiredRoles
     */
    public function setRequiredRoles($requiredRoles)
    {
        $this->requiredRoles = $requiredRoles;
    }

    /**
     * @return null|string
     */
    public function getRequiredChannel()
    {
        return $this->requiredChannel;
    }

    /**
     * @param null|string $requiredChannel
     */
    public function setRequiredChannel($requiredChannel)
    {
        $this->requiredChannel = $requiredChannel;
    }
}
