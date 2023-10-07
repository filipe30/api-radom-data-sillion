<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        // instância do cliente Guzzle
        $client = new Client();

        // Aqui seria a URL da rota do usuário, mas a API Random não disponibiliza a rota com o ID
        $apiUrl = config('app.global_url') . 'api/v2/users';
//        $apiUrl = config('app.global_url') . 'api/v2/user/' . $id; Exemplo se existisse a rota

        try {
            // solicitação GET à API
            $response = $client->get($apiUrl);

            // status da resposta
            if ($response->getStatusCode() == 200) {
                //resposta JSON em um array associativo
                $userData = json_decode($response->getBody(), true);

                return view('user', compact('userData'));
            } else {
                return response()->json(['error' => 'Erro na API'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na API'], 500);
        }
    }
}
