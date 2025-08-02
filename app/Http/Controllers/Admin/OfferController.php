<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DealStore;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $query = Offer::with('store');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('short_description', 'like', "%{$keyword}%");
                // Nếu muốn search thêm theo code/offer, bỏ comment dòng dưới:
                // ->orWhere('code', 'like', "%{$keyword}%")
                // ->orWhere('offer', 'like', "%{$keyword}%");
            });
        }

        $offers = $query->latest()->paginate(10);

        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        $stores = DealStore::all();
        return view('admin.offers.form', compact('stores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'offer'             => 'nullable|string|max:255',
            'code'              => 'nullable|string|max:255',
            'url'               => 'nullable|url|max:2048',
            'store_id'          => 'required|exists:deal_stores,id',
            'description'       => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'is_verified'       => 'nullable|boolean',
            'is_approved'       => 'nullable|boolean',
        ]);

        // Checkbox -> boolean
        $data['is_verified'] = $request->has('is_verified');
        $data['is_approved'] = $request->has('is_approved');

        Offer::create($data);

        return redirect()->route('offers.index')->with('success', 'Thêm offer thành công');
    }

    public function edit(Offer $offer)
    {
        $stores = DealStore::all();
        return view('admin.offers.form', compact('offer', 'stores'));
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'offer'             => 'nullable|string|max:255',
            'code'              => 'nullable|string|max:255',
            'url'               => 'nullable|url|max:2048',
            'store_id'          => 'required|exists:deal_stores,id',
            'description'       => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'is_verified'       => 'nullable|boolean',
            'is_approved'       => 'nullable|boolean',
        ]);

        $data['is_verified'] = $request->has('is_verified');
        $data['is_approved'] = $request->has('is_approved');

        $offer->update($data);

        return redirect()->route('offers.index')->with('success', 'Cập nhật offer thành công');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success', 'Xóa offer thành công');
    }
}
