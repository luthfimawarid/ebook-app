<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index() {
        $ebooks = Ebook::orderBy('id')->get();
        return view('dashboard', compact('ebooks'));
    }

    public function store(Request $r) {
        $r->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:10240'
        ]);

        $path = $r->file('file')->store('ebooks');
        Ebook::create(['title' => $r->title, 'file_path' => $path]);

        return back()->with('success', 'Ebook ditambahkan.');
    }

    public function destroy(Ebook $ebook) {
        Storage::delete($ebook->file_path);
        $ebook->delete();
        return back()->with('success', 'Ebook dihapus.');
    }

    public function view(Ebook $ebook) {
        return view('ebook_viewer', compact('ebook'));
    }

    public function file(Ebook $ebook) {
        $stream = Storage::readStream($ebook->file_path);
        return response()->stream(function() use ($stream) {
            fpassthru($stream);
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
        ]);
    }
}

