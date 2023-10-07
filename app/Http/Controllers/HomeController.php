<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        // instância do cliente Guzzle
        $client = new Client();

        // URL da API externa
        $apiUrl = config('app.global_url') . 'api/v2/users?size=100';

        try {
            // solicitação GET à API
            $response = $client->get($apiUrl);

            // status da resposta
            if ($response->getStatusCode() == 200) {
                // Converta a resposta JSON em um array associativo
                $users = json_decode($response->getBody(), true);

                // número de itens por página
                $perPage = 10;

                // Obtenha a página atual da consulta a partir da query string
                $currentPage = request()->query('page', 1);

                // instância de LengthAwarePaginator para paginar os dados
                $paginator = new LengthAwarePaginator(
                    array_slice($users, ($currentPage - 1) * $perPage, $perPage),
                    count($users),
                    $perPage,
                    $currentPage,
                    ['path' => route('home')]
                );

                return view('home', compact('paginator'));
            } else {
                return response()->json(['error' => 'Erro na API'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na API'], 500);
        }
    }
}
