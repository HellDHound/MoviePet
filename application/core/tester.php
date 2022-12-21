<?php
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/testerlog.txt', print_r('111111', true) . "\r\n", FILE_APPEND | LOCK_EX);
