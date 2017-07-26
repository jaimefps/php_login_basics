<?php

// because we are using sessions
// we must begin the file with session_start():
session_start();

// removes all session data ...?
session_unset();

// ensures that the session is killed ...?
session_destroy();


// redirect the user to the homa page:
header("Location: /")

?>