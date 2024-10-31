<?php
use App\Contactus;

function footer()
{
    $data['contactno'] = Contactus::first();
    return $data;
}

?>
