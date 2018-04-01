<?php

/** Checks the format of a date
 * Taken from https://stackoverflow.com/questions/12322824/php-preg-match-with-working-regex/12323025#12323025
 */
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

?>