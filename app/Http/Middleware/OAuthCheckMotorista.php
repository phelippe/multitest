<?php

namespace Multitest\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Multitest\Repositories\MotoristaRepository;

class OAuthCheckMotorista
{
    /**
     * @var UserRepository
     */
    private $motoristaRepository;

    /**
     * @param UserRepository $motoristaRepository
     */
    public function __construct(MotoristaRepository $motoristaRepository)
    {
        $this->motoristaRepository = $motoristaRepository;
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
        /*dd(Authorizer::validateAccessToken(),
            Authorizer::getResourceOwnerId(),
            Authorizer::getResourceOwnerType(),
            Authorizer::getAccessToken());*/

        $validado = Authorizer::validateAccessToken();

        $checker = Authorizer::getChecker();
        $accessToken = $checker->getAccessToken();

        $accessTokenEntity = DB::table('oauth_access_tokens')->where('id', $accessToken)
            ->first();

        $grantType = ($accessTokenEntity->grant_type ? $accessTokenEntity->grant_type : null);

        if($grantType != 'motorista'){
            abort(403, 'Access forbidden');
        }

        return $next($request);
    }
}
