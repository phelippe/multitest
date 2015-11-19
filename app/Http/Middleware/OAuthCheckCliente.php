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

        $checker = Authorizer::getChecker();
        $accessToken = $checker->getAccessToken();

        #dd($checker);
        dd($accessToken);
        $accessTokenEntity = DB::table('oauth_access_tokens')->where('id', $accessToken)
            ->first();
        dd($accessToken);
        $grantType = $accessTokenEntity->grant_type;

        dd($grantType);
        if($grantType != 'cliente'){
            abort(403, 'Access forbidden');
        }

        return $next($request);
    }
}
