@extends('admin.layouts.app')

@section('contents')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold">{{ isset($deal) ? 'Cập nhật Deal' : 'Thêm Deal mới' }}</h3>
        </div>

        <div class="card-body">
            <form action="{{ isset($deal) ? route('deals.update', $deal) : route('deals.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($deal))
                    @method('PUT')
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label required">Tên Deal</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $deal->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                            value="{{ old('slug', $deal->slug ?? '') }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Danh mục</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $deal->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">Store</label>
                    <select name="store_id" class="form-select">
                        <option value="">-- Chọn store --</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}"
                                {{ old('store_id', $deal->store_id ?? '') == $store->id ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Giá gốc</label>
                        <input type="number" name="original_price" step="0.01" class="form-control"
                            value="{{ old('original_price', $deal->original_price ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Giá khuyến mãi</label>
                        <input type="number" name="price" step="0.01" class="form-control"
                            value="{{ old('price', $deal->price ?? '') }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">URL</label>
                    <input type="url" name="url" class="form-control" value="{{ old('url', $deal->url ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if (isset($deal) && $deal->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $deal->image) }}" alt="Ảnh" width="120">
                        </div>
                    @endif
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
                    <input class="form-check-input" type="checkbox" name="is_approved" value="1"
                        {{ old('is_approved', $deal->is_approved ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Hiển thị</label>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả ngắn</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $deal->description ?? '') }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label">Mô tả chi tiết</label>
                    <textarea name="short_description" id="short_description" class="form-control" rows="4">
                        {{ old('short_description', $deal->short_description ?? '') }}
                    </textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"
                        value="{{ old('meta_title', $deal->meta_title ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control"
                        value="{{ old('meta_keywords', $deal->meta_keywords ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">
                        {{ old('meta_description', $deal->meta_description ?? '') }}
                    </textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('deals.index') }}" class="btn btn-secondary me-3">Hủy</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($deal) ? 'Cập nhật' : 'Thêm mới' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace('short_description');

        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim().replace(/\s+/g, '-').replace(/-+/g, '-');
            document.getElementById('slug').value = slug;
        });
    </script>
@endpush
