<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2016-03-14
 * Time: 23:58
 */

namespace Amopi\Mlib\Http\ServiceProviders\Security;

use Symfony\Component\HttpFoundation\RequestMatcherInterface;

interface AccessRuleInterface
{
    /**
     * @return string|RequestMatcherInterface
     */
    public function getPattern();

    /**
     * @return string|array
     */
    public function getRequiredRoles();

    /**
     * @return string|null
     */
    public function getRequiredChannel();
}
