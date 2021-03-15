<?php


namespace App\Services\Database;


use App\Services\Http\Request;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Event\ConnectionEventArgs;
use Doctrine\DBAL\Events;
use Doctrine\DBAL\Exception;

class ApiConnection extends \Doctrine\DBAL\Connection
{

    /** @var ApiDatabaseSwitcher */
    protected $dbSwitcher;
    protected $_params = [];
    protected $_isConn = false;

    /**
     * ApiConnection constructor.
     * @param array $params
     * @param Driver $driver
     * @param Configuration|null $config
     * @param EventManager|null $eventManager
     * @throws Exception
     */
    public function __construct(array $params, Driver $driver, ?Configuration $config = null,?EventManager $eventManager = null)
    {
        parent::__construct($params, $driver, $config, $eventManager);
    }

    /**
     * @param ApiDatabaseSwitcher $dbSwitcher
     */
    public function setDbSwitcher(ApiDatabaseSwitcher $dbSwitcher): void
    {
        $this->dbSwitcher = $dbSwitcher;
    }

    public function connect(): bool
    {
        if ($this->_isConn) {
            return false;
        }

        $this->_params["database"] = Request::getHeader('im-project-tag') ?? 'main';
        $driverOptions = $this->_params['driverOptions'] ?? [];
        $user          = $this->_params['user'] ?? null;
        $password      = $this->_params['password'] ?? null;

        $this->_conn = $this->_driver->connect($this->_params, $user, $password, $driverOptions);
        $this->_isConn = true;

        if ($this->isAutoCommit() === false ) {
            $this->beginOperation();
        }

        if ($this->_eventManager->hasListeners(Events::postConnect)) {
            $eventArgs = new ConnectionEventArgs($this);
            $this->_eventManager->dispatchEvent(Events::postConnect, $eventArgs);
        }

        return true;
    }

}