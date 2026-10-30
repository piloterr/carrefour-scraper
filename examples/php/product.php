<?php
// Carrefour Product API – PHP example (ext-curl)
// Usage: PILOTERR_API_KEY=your-key php product.php

$params = http_build_query([
    'query' => 'https://www.carrefour.fr/p/oeufs-de-caille-le-gaulois-3266980075934',
]);

$ch = curl_init('https://api.piloterr.com/v2/carrefour/product?' . $params);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTPHEADER => ['x-api-key: ' . getenv('PILOTERR_API_KEY')],
]);

$body = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status !== 200) {
    fwrite(STDERR, "Piloterr error $status: $body\n");
    exit(1);
}

$data = json_decode($body, true);
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), PHP_EOL;
