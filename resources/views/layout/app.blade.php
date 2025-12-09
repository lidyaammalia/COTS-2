<!doctype html>
<html>
<head>
    <title>Produk</title>
</head>
<body>
<nav>
    <a href="/products">Products</a>
</nav>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

@yield('content')
</body>
</html>

