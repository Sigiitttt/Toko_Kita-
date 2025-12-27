<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'      => 'required|min:3',
            'harga'     => 'required', 
            'deskripsi' => 'required',
            'foto'      => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // --- PERBAIKAN UPLOAD GAMBAR ---
        $image = $request->file('foto');
        // Gunakan parameter ke-3 'public' agar masuk ke storage/app/public/products
        $image->storeAs('products', $image->hashName(), 'public');

        // --- PEMBERSIH HARGA ---
        $cleanHarga = (int) preg_replace('/[^0-9]/', '', $request->harga);

        Product::create([
            'nama'      => $request->nama,
            'harga'     => $cleanHarga,
            'deskripsi' => $request->deskripsi,
            'foto'      => $image->hashName(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama'      => 'required|min:3',
            'harga'     => 'required',
            'deskripsi' => 'required',
            'foto'      => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // --- PEMBERSIH HARGA ---
        $cleanHarga = (int) preg_replace('/[^0-9]/', '', $request->harga);

        $fotoName = $product->foto;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            
            // 1. Upload ke disk 'public'
            $image->storeAs('products', $image->hashName(), 'public');

            // 2. Hapus foto lama dari disk 'public'
            if ($product->foto !== 'noimage.png') {
                Storage::disk('public')->delete('products/' . $product->foto);
            }
            
            $fotoName = $image->hashName();
        }

        $product->update([
            'nama'      => $request->nama,
            'harga'     => $cleanHarga,
            'deskripsi' => $request->deskripsi,
            'foto'      => $fotoName,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        // Hapus foto dari disk 'public'
        if ($product->foto !== 'noimage.png') {
            Storage::disk('public')->delete('products/' . $product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}