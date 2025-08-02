@extends('admin.layouts.app')
@section('title_page')
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Offer
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="/admin/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Offer</li>
            </ul>
        </div>
    </div>
@endsection
@section('contents')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Danh sách Offer</h3>
            <a href="{{ route('offers.create') }}" class="btn btn-sm btn-primary">
                <i class="ki-duotone ki-plus fs-2"></i> Thêm mới
            </a>
        </div>
        <div class="mt-5 ms-4">
            <!--begin::Search Form-->
            <form method="GET" action="{{ route('offers.index') }}" class="mb-5">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <i class="ki-duotone ki-magnifier fs-1 text-muted"></i>
                    </span>
                    <input type="text" name="keyword" value="{{ request('keyword') }}"
                        class="form-control form-control-solid w-250px ps-14"
                        placeholder="Tìm theo tên hoặc slug ưu đãi..." />
                    <button type="submit" class="btn btn-light-primary ms-3">
                        <i class="ki-duotone ki-search-list fs-2"></i> Tìm kiếm
                    </button>
                    @if (request()->has('keyword') && request('keyword') != '')
                        <a href="{{ route('offers.index') }}" class="btn btn-light-danger ms-2">
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
                            <th>Tên</th>
                            <th>Offer</th>
                            <th>Code</th>
                            <th>URL</th>
                            <th>Store</th>
                            <th>Verified</th>
                            <th>Hiển thị</th>
                            <th class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td class="text-dark fw-bold">{{ $offer->name }}</td>
                                <td>{{ $offer->offer }}</td>
                                <td>{{ $offer->code }}</td>
                                <td><a href="{{ $offer->url }}" target="_blank">Link</a></td>
                                <td>{{ $offer->store->name ?? '—' }}</td>
                                <td>{!! $offer->is_verified
                                    ? '<span class="badge badge-light-success">Có</span>'
                                    : '<span class="badge badge-light">Không</span>' !!}</td>
                                <td>{!! $offer->is_approved
                                    ? '<span class="badge badge-light-success">Hiển thị</span>'
                                    : '<span class="badge badge-light-warning">Không hiển thị</span>' !!}</td>
                                <td class="text-end">
                                    <a href="{{ route('offers.edit', $offer) }}" class="btn btn-warning btn-sm me-1">
                                        Edit
                                    </a>
                                    <form action="{{ route('offers.destroy', $offer) }}" method="POST"
                                        style="display:inline-block"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Chưa có offer nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $offers->links() }}
            </div>
        </div>
    </div>
@endsection
