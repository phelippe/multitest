<?php

namespace Multitest\Http\Middleware;

use Closure;
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
        $id = Authorizer::getResourceOwnerId();
        $user = $this->motoristaRepository->find($id);


        dd($id, $user);
        /*if($user->role != $role){
            abort(403, 'Access forbidden');
        }*/

        return $next($request);
    }
}
