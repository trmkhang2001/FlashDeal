@extends('admin.layouts.app')

@section('contents')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title fw-bold">
                {{ isset($offer) ? 'Cập nhật Offer' : 'Thêm Offer mới' }}
            </h3>
            <a href="{{ route('offers.index') }}" class="btn btn-sm btn-secondary">Quay lại</a>
        </div>

        <div class="card-body">
            <form action="{{ isset($offer) ? route('offers.update', $offer) : route('offers.store') }}" method="POST">
                @csrf
                @if (isset($offer))
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label class="form-label required">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $offer->name ?? '') }}"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Offer</label>
                    <input type="text" name="offer" class="form-control"
                        value="{{ old('offer', $offer->offer ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $offer->code ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">URL</label>
                    <input type="url" name="url" class="form-control" value="{{ old('url', $offer->url ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Store</label>
                    <select name="store_id" class="form-select" required>
                        <option value="">-- Chọn store --</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}"
                                {{ old('store_id', $offer->store_id ?? '') == $store->id ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $offer->description ?? '') }}</textarea>
                </div>

                {{-- Thêm Mô tả ngắn --}}
                <div class="mb-4">
                    <label class="form-label">Mô tả ngắn</label>
                    <input type="text" name="short_description" class="form-control" maxlength="255"
                        value="{{ old('short_description', $offer->short_description ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="form-label">Mã màu (Color)</label>
                    <div class="d-flex align-items-center gap-2">
                        {{-- Nhập mã màu --}}
                        <input type="text" name="color" id="colorText" class="form-control"
                            placeholder="#FF0000 hoặc red" value="{{ old('color', $offer->color ?? '#000000') }}">
                    </div>
                </div>


                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="is_verified" value="1"
                        {{ old('is_verified', $offer->is_verified ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Verified</label>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="is_approved" value="1"
                        {{ old('is_approved', $offer->is_approved ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Hiển thị</label>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('offers.index') }}" class="btn btn-secondary me-2">Hủy</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($offer) ? 'Cập nhật' : 'Thêm mới' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
