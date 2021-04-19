<?php
namespace LogCleanup;

interface LogCleanup 
{
    public function clearLogs(\DateTime $timeperoid): void;
    public function setConfiguration(array $data): void;
}