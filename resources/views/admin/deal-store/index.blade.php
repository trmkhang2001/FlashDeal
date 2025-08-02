@extends('admin.layouts.app')
@section('title_page')
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Store
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/admin/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Store</li>
            </ul>
        </div>
    </div>
@endsection
@section('contents')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title fw-bold">Danh sách Deal Store</h3>
            <a href="{{ route('deal-stores.create') }}" class="btn btn-primary btn-sm">
                <i class="ki-duotone ki-plus fs-2"></i> Thêm mới
            </a>
        </div>
        <div class="mt-5 ms-4">
            <!--begin::Search Form-->
            <form method="GET" action="{{ route('deal-stores.index') }}" class="mb-5">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <i class="ki-duotone ki-magnifier fs-1 text-muted"></i>
                    </span>
                    <input type="text" name="keyword" value="{{ request('keyword') }}"
                        class="form-control form-control-solid w-250px ps-14"
                        placeholder="Tìm theo tên hoặc slug cửa hàng..." />
                    <button type="submit" class="btn btn-light-primary ms-3">
                        <i class="ki-duotone ki-search-list fs-2"></i> Tìm kiếm
                    </button>
                    @if (request()->has('keyword') && request('keyword') != '')
                        <a href="{{ route('deal-stores.index') }}" class="btn btn-light-danger ms-2">
                            <i class="ki-duotone ki-cross fs-2"></i> Xóa tìm
                        </a>
                    @endif
                </div>
            </form>
            <!--end::Search Form-->
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th>ID</th>
                            <th>Tên Store</th>
                            <th>Slug</th>
                            <th>Danh mục</th>
                            <th>Events</th>
                            <th>Ảnh</th>
                            <th>Hiển thị</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td class="text-dark fw-bold">{{ $store->name }}</td>
                                <td>{{ $store->slug }}</td>
                                <td>{{ $store->category->name ?? '—' }}</td>
                                <td>{{ $store->events }}</td>
                                <td>
                                    @if ($store->image)
                                        <img src="{{ asset('storage/' . $store->image) }}" alt="" width="60">
                                    @endif
                                </td>
                                <td>
                                    @if ($store->is_approved)
                                        <span class="badge badge-light-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-light-secondary">Không hiển thị</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('deal-stores.edit', $store) }}"
                                        class="btn btn-icon btn-warning btn-sm me-1" title="Sửa">
                                        Sửa
                                    </a>

                                    <form action="{{ route('deal-stores.destroy', $store) }}" method="POST"
                                        style="display:inline-block" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-danger btn-sm" title="Xóa">
                                            Xóa
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Không có store nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $stores->links() }}
            </div>
        </div>
    </div>
@endsection
