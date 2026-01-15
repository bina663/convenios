<?php

    namespace App\Services;

    use Illuminate\Support\Facades\Http;
    use App\Models\Integracao;
    use App\Models\IntegracaoEndpoint;

    class ApiService
    {
        public function request(Integracao $api, IntegracaoEndpoint $endpoint, array $params = [])
        {
            $url = $api->base_url . $endpoint->endpoint;

            $http = Http::timeout(20);

            if ($api->auth_type === 'bearer') {
                $http = $http->withToken($api->token);
            }

            if ($api->headers) {
                $http = $http->withHeaders($api->headers);
            }

            return match (strtoupper($endpoint->metodo)) {
                'POST' => $http->post($url, $params)->json(),
                'PUT' => $http->put($url, $params)->json(),
                'DELETE' => $http->delete($url)->json(),
                default => $http->get($url, $params)->json(),
            };
        }
    }
