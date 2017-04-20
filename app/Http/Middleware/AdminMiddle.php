<?php
namespace App\Http\Middleware;

use Closure;

class AdminMiddle
{
/**
* 返回请求过滤器
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
    public function handle($request, Closure $next)
    {
        $user = session()->get('user');
        if ($user == '' || $user == null) {
            return redirect('admin/login');
        }

        return $next($request);
    }

}