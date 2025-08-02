@extends('admin.layouts.app')

@section('contents')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ isset($deal_store) ? 'Cập nhật Deal Store' : 'Thêm Deal Store' }}
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($deal_store) ? route('deal-stores.update', $deal_store) : route('deal-stores.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($deal_store))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Tên Store</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $deal_store->name ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                            value="{{ old('slug', $deal_store->slug ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ isset($deal_store) && $cat->id == $deal_store->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Events</label>
                        <input type="text" name="events" class="form-control"
                            value="{{ old('events', $deal_store->events ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Ảnh (upload)</label>
                        <input type="file" name="image" class="form-control">
                        @if (isset($deal_store) && $deal_store->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $deal_store->image) }}" width="120">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Ảnh (chọn từ CKFinder)</label>
                        <div class="input-group">
                            <input type="text" name="image_input" id="image_input" class="form-control"
                                value="{{ old('image_input', '') }}">
                            <button type="button" id="image" class="btn btn-light-primary">Chọn ảnh</button>
                        </div>
                        <img id="image_preview" src="" class="mt-2" style="max-width: 120px;">
                    </div>

                    <div class="col-md-12 mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_approved" value="1"
                                {{ old('is_approved', $deal_store->is_approved ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label">Hiển thị</label>
                        </div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">Mô tả ngắn</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $deal_store->description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">About Store</label>
                        <textarea name="about_store" id="about_store" class="form-control">{{ old('about_store', $deal_store->about_store ?? '') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">How to apply</label>
                        <textarea name="how_to_apply" id="how_to_apply" class="form-control">{{ old('how_to_apply', $deal_store->how_to_apply ?? '') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">FAQs</label>
                        <textarea name="faqs" id="faqs" class="form-control">{{ old('faqs', $deal_store->faqs ?? '') }}</textarea>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ old('meta_title', $deal_store->meta_title ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                            value="{{ old('meta_keywords', $deal_store->meta_keywords ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $deal_store->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-5">
                    <a href="{{ route('deal-stores.index') }}" class="btn btn-light me-3">Hủy</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });

        var button1 = document.getElementById("image");
        button1.onclick = function() {
            selectFileWithCKFinder("image_input", "image_preview");
        };

        function selectFileWithCKFinder(inputId, previewId) {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var url = file.getUrl();
                        document.getElementById(inputId).value = url;
                        document.getElementById(previewId).src = url;
                    });
                }
            });
        }

        // CKEditor
        CKEDITOR.replace("description");
        CKEDITOR.replace("about_store");
        CKEDITOR.replace("how_to_apply");
        CKEDITOR.replace("faqs");
    </script>
@endpush
