<?php

namespace Multitest\Http\Middleware;

use Closure;
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
        dd(Authorizer::getResourceOwnerType());
        $id = Authorizer::getResourceOwnerId();
        $user = $this->clienteRepository->find($id);

        #dd('asd');
        #dd(Authorizer::getResourceOwnerType());
        dd($id);
        if(!$user){
            abort(403, 'Access forbidden');
        }

        return $next($request);
    }
}
