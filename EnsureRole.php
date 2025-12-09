public function handle($request, Closure $next)
{
    if (session('role') !== 'admin') {
        abort(403);
    }
    return $next($request);
}