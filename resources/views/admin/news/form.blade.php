@extends('admin.layouts.app')

@section('contents')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($news) ? 'Cập nhật Tin tức' : 'Thêm Tin tức mới' }}</h3>
        </div>

        <div class="card-body">
            <form action="{{ isset($news) ? route('news.update', $news) : route('news.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($news))
                    @method('PUT')
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tên bài viết</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $news->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                            value="{{ old('slug', $news->slug ?? '') }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Danh mục</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $news->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if (isset($news) && $news->image)
                        <div class="mt-2"><img src="{{ asset('storage/' . $news->image) }}" width="120"></div>
                    @endif
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="is_approved" value="1"
                        {{ old('is_approved', $news->is_approved ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">Duyệt bài</label>
                </div>

                <div class="mb-4">
                    <label class="form-label">Mô tả ngắn</label>
                    <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description', $news->short_description ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nội dung chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $news->content ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"
                        value="{{ old('meta_title', $news->meta_title ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control"
                        value="{{ old('meta_keywords', $news->meta_keywords ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control">{{ old('meta_description', $news->meta_description ?? '') }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary me-3">Hủy</a>
                    <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Cập nhật' : 'Thêm mới' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace('short_description');
        CKEDITOR.replace('content');

        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim().replace(/\s+/g, '-').replace(/-+/g, '-');
            document.getElementById('slug').value = slug;
        });
    </script>
@endpush
