<?php

namespace Multitest\OAuth2;

use League\OAuth2\Server\Event;
use League\OAuth2\Server\Exception;
use League\OAuth2\Server\Grant\PasswordGrant;

/**
 * Password grant class
 */
class MotoristaPasswordGrant extends PasswordGrant
{
    /**
     * Grant identifier
     *
     * @var string
     */
    protected $identifier = 'motorista';

}
