<?php
class FipeService {
    public function fetchBrands(string $type): array {
        $url = FIPE_BASE . "/$type/marcas";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ["Accept: application/json"]
        ]);
        $resp = curl_exec($ch);

        if ($resp === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return ["error" => "cURL failed: $error", "data" => []];
        }

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code !== 200) {
            return ["error" => "HTTP status $code", "data" => []];
        }

        $data = json_decode($resp, true);
        if ($data === null) {
            return ["error" => "Invalid JSON", "data" => []];
        }

        return ["error" => null, "data" => $data];
    }
}
