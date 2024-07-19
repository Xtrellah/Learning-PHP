<?php

// Registration example - encrypting a plain text password and storing it

// Imagine that this password is coming from a form
$inputtedPassword = 'password132';

// bCrypt is the industry standard way of protecting passwords
// and other sensitive data

$safePassword = password_hash($inputtedPassword, PASSWORD_BCRYPT);

// Now that we've generated the hashed password we can store it in the database
// safely

// The bcrypt string is not reversible