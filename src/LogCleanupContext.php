<?php
namespace LogCleanup;

class LogCleanupContext
{
    private $_strategy;

    public function __construct(LogCleanup $strategy)
    {
        $this->_strategy = $strategy;
    }

    public function clearLogs(\DateTime $timeperoid): void
    {
        $this->_strategy->clearLogs($timeperoid);
    }

    public function setConfiguration(array $data): void
    {
        $this->_strategy->setConfiguration($data);
    }
}