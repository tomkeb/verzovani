<?php

$file = "Anička šla do zelí.";
$prop = new Proposal($file);
$propStor = new Storage($prop->hash);
echo $propStor->toDir;
