<?php
namespace OAuth2Yii\Storage;

use OAuth2Yii\Component\ServerComponent;

/**
 * Base class for all server storages
 *
 * @author Michael Härtl <haertl.mike@gmail.com>
 */
abstract class Storage
{
    /**
     * @var ServerComponent the server component
     */
    protected $_oauth2;

    /**
     * @var ServerComponent the server component
     */
    public function __construct(ServerComponent $server)
    {
        $this->_server = $server;
    }

    /**
     * @return ServerComponent the server component
     */
    public function getOAuth2()
    {
        return $this->_server;
    }
}
