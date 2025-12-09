class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::when($request->search, function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->search}%");
        })->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => "required|min:3|unique:products,name,$product->id",
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Produk diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success','Produk dihapus');
    }
}