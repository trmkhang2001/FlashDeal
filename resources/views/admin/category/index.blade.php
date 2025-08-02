@extends('admin.layouts.app')

@section('title_page')
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Danh mục
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/admin/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Danh mục</li>
            </ul>
        </div>
    </div>
@endsection

@section('contents')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 d-flex justify-content-between">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Danh sách danh mục</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Tổng: {{ $categories->count() }} danh mục</span>
                </h3>
                <div class="">
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-light btn-active-primary">
                        <i class="ki-duotone ki-plus fs-2"></i> Thêm danh mục
                    </a>
                </div>
            </div>

            <!--begin::Body-->
            <!--begin::Search Form-->
            <form method="GET" action="{{ route('categories.index') }}" class="mb-5 ms-4">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <i class="ki-duotone ki-magnifier fs-1 text-muted"></i>
                    </span>
                    <input type="text" name="keyword" value="{{ request('keyword') }}"
                        class="form-control form-control-solid w-250px ps-14" placeholder="Tìm theo tên hoặc slug..." />
                    <button type="submit" class="btn btn-light-primary ms-3">
                        <i class="ki-duotone ki-search-list fs-2"></i> Tìm kiếm
                    </button>
                    @if (request()->has('keyword') && request('keyword') != '')
                        <a href="{{ route('categories.index') }}" class="btn btn-light-danger ms-2">
                            <i class="ki-duotone ki-cross fs-2"></i> Xóa tìm
                        </a>
                    @endif
                </div>
            </form>
            <!--end::Search Form-->
            <div class="card-body py-3">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Slug</th>
                                <th>Danh mục cha</th>
                                <th>Sắp xếp</th>
                                <th>Hiển thị</th>
                                <th>Ảnh</th>
                                <th class="text-end">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td class="text-dark fw-bold">{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent?->name ?? '—' }}</td>
                                    <td>{{ $category->sort_order }}</td>
                                    <td>
                                        @if ($category->is_visible)
                                            <span class="badge badge-light-success">Hiển thị</span>
                                        @else
                                            <span class="badge badge-light-secondary">Ẩn</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" width="50"
                                                alt="Ảnh">
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-warning btn-sm me-1">
                                            <i class="ki-duotone ki-pencil fs-4"></i> Sửa
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $category->id }}">
                                            <i class="ki-duotone ki-trash fs-4"></i> Xóa
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $category->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Xác nhận xóa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn xóa <strong>{{ $category->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Không có danh mục nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
