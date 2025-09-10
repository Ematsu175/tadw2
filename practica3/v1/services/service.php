<?php
class FipeService {
    public function fetchBrands(string $type): array {
        $url = FIPE_BASE . "/$type/marcas";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ["Accept: application/json"]
        ]);
        echo "URL: $url\n";
        $resp = curl_exec($ch);
        curl_close($ch);

        return json_decode($resp, true) ?? [];
    }
}
