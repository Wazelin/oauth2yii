<?php
namespace OAuth2Yii\Storage;

use OAuth2Yii\Component\ServerComponent;
use \CException as CException;

/**
 * Base class for server storages with custom DB class
 *
 * @author Michael Härtl <haertl.mike@gmail.com>
 */
abstract class CustomStorage extends Storage
{
    protected $_storage;

    /**
     * @return string the interface name that the custom storage class must implement
     */
    protected abstract function getInterface();

    /**
     * @param ServerComponent $server the server component
     * @param string $className name of the custom storage class
     *
     * @throws \CException if the specified class doesn't implement the correct interface
     */
    public function __construct(ServerComponent $server, $className)
    {
        parent::__construct($server);
        $this->_storage = new $className;
        if(!is_a($this->_storage, $this->getInterface())) {
            throw new CException("Class must implement {$this->getInterface()}");
        }
    }

    /**
     * @return object the custom storage class that implements the respective interface
     */
    public function getStorage()
    {
        return $this->_storage;
    }
}
