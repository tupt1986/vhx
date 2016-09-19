<?php

namespace vhx\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()===null){
            flash()->overlay('Yêu cầu đăng nhập để thực hiện chức năng.','Đăng nhập.');
            return redirect('/login');
        }
        $acction = $request->route()->getAction();
        $roles = isset($acction['roles']) ? $acction['roles'] : null;

        if ($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }

        flash()->overlay('Tài khoản không có quyền thực hiện chức năng này.','Không có quyền truy cập.');
        return redirect('/');
    }
}
