<?php

namespace Multitest\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Multitest\Repositories\ClienteRepository;

class OAuthCheckCliente
{
    /**
     * @var UserRepository
     */
    private $clienteRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        #Precisa desse validate para funcionar
        $validado = Authorizer::validateAccessToken();

        /*dd(Authorizer::validateAccessToken(),
            Authorizer::getResourceOwnerId(),
            Authorizer::getResourceOwnerType(),
            Authorizer::getAccessToken()->getId(),
            Authorizer::getAccessToken());*/



        /*$token = Authorizer::getAccessToken()->getId();
        $id_cliente = Authorizer::getResourceOwnerId();

        $token_db = DB::table('oauth_access_tokens')
            ->where('id', $token)
            ->where('grant_type', 'cliente')->first();

        #dd($token_db);

        if($validado && $token_db){

        }*/

        $checker = Authorizer::getChecker();
        $accessToken = $checker->getAccessToken();

        #dd($checker);
        #dd($accessToken);
        $accessTokenEntity = DB::table('oauth_access_tokens')->where('id', $accessToken)
            ->first();
        #dd($accessTokenEntity);
        $grantType = ($accessTokenEntity->grant_type ? $accessTokenEntity->grant_type : null);

        #dd($grantType);
        if($grantType != 'cliente'){
            abort(403, 'Access forbidden');
        }

        return $next($request);
    }
}
