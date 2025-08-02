@extends('admin.layouts.app')

@section('title_page')
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Category</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/admin/dashboard" class="text-muted text-hover-primary">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Category</li>
            </ul>
        </div>
    </div>
@endsection

@section('contents')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">
                        {{ isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục mới' }}
                    </span>
                </h3>
            </div>
            <div class="card-body py-3">
                <form method="POST"
                    action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif

                    {{-- Tên danh mục --}}
                    <div class="mb-4">
                        <label class="form-label required">Tên danh mục</label>
                        <input type="text" id="name-input" name="name" class="form-control"
                            value="{{ old('name', $category->name ?? '') }}" required>
                    </div>

                    {{-- Slug --}}
                    <div class="mb-4">
                        <label class="form-label">Slug</label>
                        <input type="text" id="slug-input" name="slug" class="form-control"
                            value="{{ old('slug', $category->slug ?? '') }}">
                    </div>

                    {{-- Sắp xếp --}}
                    <div class="mb-4">
                        <label class="form-label">Thứ tự sắp xếp</label>
                        <input type="number" name="sort_order" class="form-control"
                            value="{{ old('sort_order', $category->sort_order ?? 0) }}">
                    </div>

                    {{-- Danh mục cha --}}
                    <div class="mb-4">
                        <label class="form-label">Danh mục cha</label>
                        <select name="parent_id" class="form-select">
                            <option value="">-- Không có danh mục cha --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ isset($category) && $cat->id == $category->parent_id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ảnh đại diện --}}
                    <div class="mb-4">
                        <label class="form-label">Ảnh danh mục</label>
                        <input type="file" name="image" class="form-control">
                        @if (isset($category) && $category->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Ảnh danh mục" width="120">
                            </div>
                        @endif
                    </div>

                    {{-- Hiển thị --}}
                    <div class="mb-4 form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_visible" value="1"
                            {{ old('is_visible', $category->is_visible ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label">Hiển thị danh mục</label>
                    </div>

                    {{-- Mô tả (CKEditor) --}}
                    <div class="mb-4">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" id="description-editor" class="form-control" rows="5">
                        {{ old('description', $category->description ?? '') }}
                    </textarea>
                    </div>

                    {{-- Meta title --}}
                    <div class="mb-4">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ old('meta_title', $category->meta_title ?? '') }}">
                    </div>

                    {{-- Meta keywords --}}
                    <div class="mb-4">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                            value="{{ old('meta_keywords', $category->meta_keywords ?? '') }}">
                    </div>

                    {{-- Meta description --}}
                    <div class="mb-4">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $category->meta_description ?? '') }}</textarea>
                    </div>

                    {{-- Hành động --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary me-3">Hủy</a>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($category) ? 'Cập nhật' : 'Thêm mới' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('description-editor', {
                height: 300,
                toolbar: [{
                        name: 'document',
                        items: ['Source', '-', 'Preview', 'Print']
                    },
                    {
                        name: 'clipboard',
                        items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo']
                    },
                    {
                        name: 'editing',
                        items: ['Find', 'Replace', '-', 'SelectAll']
                    },
                    {
                        name: 'styles',
                        items: ['Styles', 'Format', 'Font', 'FontSize']
                    },
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Blockquote']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'insert',
                        items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar', 'Iframe']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                    {
                        name: 'colors',
                        items: ['TextColor', 'BGColor']
                    },
                    {
                        name: 'align',
                        items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                    }
                ]
            });
        });
        // Tự sinh slug khi nhập tên danh mục
        const nameInput = document.getElementById('name-input');
        const slugInput = document.getElementById('slug-input');

        nameInput.addEventListener('input', function() {
            let slug = nameInput.value
                .toLowerCase()
                .normalize('NFD') // bỏ dấu tiếng Việt
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '') // bỏ ký tự đặc biệt
                .trim()
                .replace(/\s+/g, '-') // thay khoảng trắng bằng dấu -
                .replace(/-+/g, '-'); // bỏ trùng dấu -

            slugInput.value = slug;
        });
    </script>
@endpush
