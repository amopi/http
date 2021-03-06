<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2016-05-03
 * Time: 12:05
 */

namespace Amopi\Mlib\Http\ServiceProviders\Security;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class AbstractSimplePreAuthenticateUserProvider implements SimplePreAuthenticateUserProviderInterface
{
    /**
     * @var string
     */
    private $supportedUserClassname;

    public function __construct($supportedUserClassname)
    {
        $this->supportedUserClassname = $supportedUserClassname;
    }

    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @throws UsernameNotFoundException if the user is not found
     */
    public function loadUserByUsername($username)
    {
        throw new \LogicException("You should not load a user by username, try authenticateAndGetUser()");
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class == $this->supportedUserClassname || is_subclass_of($class, $this->supportedUserClassname, true);
    }
}
