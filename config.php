<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_vmtIIUfHMuPvYmXaq7WfsSnW",
  "publishable_key" => "pk_test_NZaksNaAciYW6RnKHIJNGJ3w"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>