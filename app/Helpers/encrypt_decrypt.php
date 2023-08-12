<?php

function encryptId($id) {
   if ($id === null) {
      return null;
   }
   $key = base64_decode(config('app.key'));
   $iv = random_bytes(16);
   $encryptedId = openssl_encrypt($id, 'AES-256-CBC', $key, 0, $iv);
   $encryptedId = base64_encode($encryptedId . ':' . base64_encode($iv));
   return $encryptedId;
}

function decryptId($id) {
   try {
      $encryptedId = base64_decode($id);
      list($encryptedData, $iv) = explode(':', $encryptedId);
      $key = base64_decode(config('app.key'));
      $iv = base64_decode($iv);
      $decryptedId = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, 0, $iv);
      return $decryptedId;
   } catch (\Throwable $e) {
      return back()->with('error','some error occred');
   }
}

?>
