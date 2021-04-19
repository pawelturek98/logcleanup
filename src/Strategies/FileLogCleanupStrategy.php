<?php
namespace LogCleanup\Strategies;

use DateTime;
use Exception;
use LogCleanup\LogCleanup;

class FileLogCleanupStrategy implements LogCleanup
{
    private $file;

    public function clearLogs(DateTime $timeperoid): void
    {
        $file = fopen($this->getFile(), "r+");
        $output = "";

        foreach(file($this->getFile()) as $line) {
            $matches = $this->getMatchedDate($line);
            if($matches == "") continue;

            $matchesDateTime = new DateTime($matches);
            if($matchesDateTime->getTimestamp() < $timeperoid->getTimestamp()) {
                continue;
            }

            $output .= $line;
        }

        file_put_contents($this->getFile(), $output);
    }

    public function setConfiguration(array $data): void
    {
        if(isset($data['file']))
        {
            $this->file = $data['file'];
        } else {
            throw new Exception("File configuration cannot be empty");
        }
    }

    private function getFile(): string
    {
        return $this->file !== null ? $this->file : __DIR__.'/var/logs/debug.log'; 
    }

    private function getMatchedDate(string $stringToMatch): string 
    {
        if(preg_match('/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/', $stringToMatch, $matches)) {
            var_dump($matches[0]);
            return $matches[0];
        }

        return "";
    }
}