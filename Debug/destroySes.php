<?php
session_start();
session_destroy();
if (session_destroy()){
    echo('session destroyed');
}
?>
