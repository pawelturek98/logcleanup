<?php

use PHPUnit\Framework\TestCase;
use LogCleanup\LogCleanupContext;
use LogCleanup\Strategies\FileLogCleanupStrategy;

final class FileLogCleanupTest extends TestCase
{
    public function testFileCleaned()
    {
        $logCleanupContext = new LogCleanupContext(new FileLogCleanupStrategy());
        $logCleanupContext->setConfiguration(['file' => 'var/logs/app.log']);
        $logCleanupContext->clearLogs(new DateTime('2021-03-01 00:00:00'));

        $this->assertStringNotContainsString(file_get_contents('var/logs/app.log'), '2021-02-27');
    }
}