<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\TfIdfHelper;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get(); // Added get() to execute the query
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|in:mikrokontroler,sensor,aktuator,other',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = $validated;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|in:mikrokontroler,sensor,aktuator,other',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = $validated;
        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Gagal menghapus produk.');
        }
    }

    public function list()
    {
        $products = Product::latest()->get();
        return view('product', compact('products'));
    }

    // Menampilkan detail produk
    public function detail(Product $product)
    {
        $recommends = self::recommend($product->id);
        return view('detail_product', compact('product', 'recommends'));
    }

    public static function recommend($articleId)
    {
        $articles = Product::all();
        $stopwords = [
            // Bahasa Indonesia
            'dan', 'atau', 'adalah', 'yang', 'di', 'ke', 'dari', 'ini', 'itu', 'untuk', 'dengan',
            'sebuah', 'pada', 'oleh', 'kami', 'kita', 'saya', 'aku', 'anda', 'mereka', 'tidak',
            // Bahasa Inggris
            'and', 'or', 'is', 'the', 'on', 'in', 'at', 'of', 'this', 'that', 'for', 'with',
            'a', 'an', 'to', 'by', 'we', 'our', 'i', 'you', 'they', 'not'
        ];
        // Cari artikel target berdasarkan ID
        $target = $articles->firstWhere('id', $articleId);
        if (!$target) {
            return []; // Jika artikel tidak ditemukan, kembalikan array kosong
        }

        // Tokenisasi dokumen (ubah teks menjadi array kata)
        $docs = $articles->map(function ($article) use ($stopwords) {
            $words = explode(' ', strtolower($article->nama));
            return array_filter($words, fn($word) => !in_array($word, $stopwords));
        });

        // Hitung TF untuk setiap dokumen
        $tfDocs = $docs->map(fn($doc) => TfIdfHelper::computeTF($doc));

        // Hitung IDF berdasarkan semua dokumen
        $idf = TfIdfHelper::computeIDF($docs->toArray());
        // dd($idf);
        // Hitung TF-IDF untuk setiap dokumen
        $tfidfDocs = $tfDocs->map(fn($tf) => TfIdfHelper::computeTFIDF($tf, $idf));
        // dd($tfidfDocs);

        // Dapatkan vektor TF-IDF untuk artikel target
        $targetIndex = $articles->search(fn($article) => $article->id === $articleId);
        $targetVector = $tfidfDocs[$targetIndex];

        // Hitung cosine similarity antara artikel target dan semua artikel lainnya
        $similarities = [];

        foreach ($tfidfDocs as $index => $vector) {
            $similarities[$index] = self::cosineSimilarity($targetVector, $vector);
        }

        // Urutkan hasil berdasarkan nilai kesamaan
        arsort($similarities);
        // Ambil artikel dengan kesamaan tertinggi, kecuali artikel target


        $recommendedIndexes = collect($similarities)
            ->filter(fn($score, $index) => $index !== $targetIndex && $score > 0.98) // Filter skor di atas 0.4
            ->take(4) // Ambil 5 hasil teratas
            ->keys();
        // Kembalikan artikel yang direkomendasikan
        return $recommendedIndexes->map(fn($index) => $articles[$index]);
    }

    public static function cosineSimilarity($vec1, $vec2)
    {
        $dotProduct = array_sum(array_map(fn($v, $w) => $v * $w, $vec1, $vec2));
        $magnitude1 = sqrt(array_sum(array_map(fn($v) => $v * $v, $vec1)));
        $magnitude2 = sqrt(array_sum(array_map(fn($w) => $w * $w, $vec2)));

        if ($magnitude1 == 0 || $magnitude2 == 0) {
            return 0; // Jika magnitudo 0, tidak ada kesamaan
        }

        return $dotProduct / ($magnitude1 * $magnitude2);
    }
}
