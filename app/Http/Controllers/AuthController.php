class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function process(Request $r) {
        if ($r->username == 'admin' && $r->password == 'admin123') {
            session(['user'=>'admin','role'=>'admin']);
        } elseif ($r->username == 'user' && $r->password == 'user123') {
            session(['user'=>'user','role'=>'user']);
        } else return back();

        return redirect('/admin');
    }

    public function logout() {
        session()->flush();
        return redirect('/login');
    }
}



