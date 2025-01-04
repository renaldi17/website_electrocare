<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\TfIdfHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Sistem Berbasis Komputer,Mekatronika,Sistem Tertanam',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'code' => 'nullable|file|mimes:zip,rar|max:20480', // max 20MB
            'harga' => 'required|numeric',
        ]);

        $data = $validated;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }
        if ($request->hasFile('code')) {
            $data['code'] = $request->file('code')->store('projects/code', 'public');
        }

        Project::create($data);

        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Sistem Berbasis Komputer,Mekatronika,Sistem Tertanam',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'code' => 'nullable|file|mimes:zip,rar|max:20480',
            'harga' => 'required|numeric',
        ]);

        $data = $validated;
        if ($request->hasFile('gambar')) {
            if ($project->gambar) {
                Storage::disk('public')->delete($project->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }
        if ($request->hasFile('code')) {
            if ($project->code) {
                Storage::disk('public')->delete($project->code);
            }
            $data['code'] = $request->file('code')->store('projects/code', 'public');
        }

        $project->update($data);

        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }
        if ($project->code) {
            Storage::disk('public')->delete($project->code);
        }
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus.');
    }
    public function list()
    {
        $projects = Project::latest()->get();
        return view('project', compact('projects'));
    }

    // Menampilkan detail project
    public function detail(Project $project)
    {
        $recommends = self::recommend($project->id);
        return view('detail_project', compact('project', 'recommends'));
    }

    public static function recommend($articleId)
    {
        $articles = Project::all();
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

        // Hitung TF-IDF untuk setiap dokumen
        $tfidfDocs = $tfDocs->map(fn($tf) => TfIdfHelper::computeTFIDF($tf, $idf));

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
            ->filter(fn($score, $index) => $index !== $targetIndex && $score > 0.7) // Filter skor di atas 0.4
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
