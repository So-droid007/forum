<?php
session_start();
echo 'Logging you out....';
session_destroy();
header("location:/forum?logout=true");





?>