## LogCleanup
Simple application designed for cleaning old logs.

### Installation
At the first please install composer dependency:

```
$ composer requre pawel/logcleanup
```

And inside .php file just add lines:
```
<?php

use LogCleanup\LogCleanupContext;
use LogCleanup\Strategies\FileLogCleanupStrategy;

...

 // For example
 $logCleanupContext = new LogCleanupContext(new FileLogCleanupStrategy());
 $logCleanupContext->setConfiguration(['file' => 'var/logs/app.log']);
 $logCleanupContext->clearLogs(new DateTime('2021-03-01 00:00:00'));


```