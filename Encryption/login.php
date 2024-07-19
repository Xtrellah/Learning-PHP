<?php

// Login example

// Comparing a plain text password with a hashed password

$storedPassword = '$2y$10$lrGEPTgMG/HqjntN5LCVw.t72C3/mAK6qMK.zzI/8v05siDBO5JuG';

$inputtedPassword = 'password132';

// password_verify is able to compare a plaintext password with a hashed password
// It returns true if they match, false if not
$correct = password_verify($inputtedPassword, $storedPassword);

var_dump($correct);