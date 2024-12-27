<?php
namespace App\Http\Controllers\Admin;

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
        return view('detail_project', compact('project'));
    }
}
