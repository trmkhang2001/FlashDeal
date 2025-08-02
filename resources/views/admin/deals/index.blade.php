@extends('admin.layouts.app')
@section('title_page')
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Deals
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/admin/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Deals</li>
            </ul>
        </div>
    </div>
@endsection
@section('contents')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title fw-bold">Danh sách Deal</h3>
            <a href="{{ route('deals.create') }}" class="btn btn-primary btn-sm">
                <i class="ki-duotone ki-plus fs-2"></i> Thêm mới
            </a>
        </div>
        <div class="ms-4 mt-5"><!--begin::Search Form-->
            <form method="GET" action="{{ route('deals.index') }}" class="mb-5">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <i class="ki-duotone ki-magnifier fs-1 text-muted"></i>
                    </span>
                    <input type="text" name="keyword" value="{{ request('keyword') }}"
                        class="form-control form-control-solid w-250px ps-14"
                        placeholder="Tìm kiếm Deal theo tên hoặc slug..." />
                    <button type="submit" class="btn btn-light-primary ms-3">
                        <i class="ki-duotone ki-search-list fs-2"></i> Tìm kiếm
                    </button>
                    @if (request()->has('keyword') && request('keyword') != '')
                        <a href="{{ route('deals.index') }}" class="btn btn-light-danger ms-2">
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
                            <th>Tên Deal</th>
                            <th>Slug</th>
                            <th>Danh mục</th>
                            <th>Store</th>
                            <th>Ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>Hiển thị</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deals as $deal)
                            <tr>
                                <td>{{ $deal->id }}</td>
                                <td class="text-dark fw-bold">{{ $deal->name }}</td>
                                <td>{{ $deal->slug }}</td>
                                <td>{{ $deal->category->name ?? '—' }}</td>
                                <td>{{ $deal->store->name ?? '—' }}</td>
                                <td>
                                    @if ($deal->image)
                                        <img src="{{ asset('storage/' . $deal->image) }}" width="60" alt="Ảnh deal">
                                    @endif
                                </td>
                                <td>{{ number_format($deal->original_price, 0, ',', '.') }}đ</td>
                                <td class="text-danger fw-bold">{{ number_format($deal->price, 0, ',', '.') }}đ</td>
                                <td>
                                    @if ($deal->is_approved)
                                        <span class="badge badge-light-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-light-secondary">Không hiển thị</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('deals.edit', $deal) }}"
                                        class="btn btn-warning btn-icon btn-bg-light btn-active-color-warning btn-sm me-1">
                                        Edit
                                    </a>

                                    <form action="{{ route('deals.destroy', $deal) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa deal này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Không có deal nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $deals->links() }}
            </div>
        </div>
    </div>
@endsection
