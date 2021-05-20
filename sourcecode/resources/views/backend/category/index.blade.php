@extends('layout')
@section('content')

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Danh sách chuyên mục: {{ $totals }}</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Simple Table</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Khóa thay thế</th>
                                    <th class="text-right" scope="col">Tổng số bài viết</th>
                                    <th class="text-right" scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ ++$key  }}</th>
                                    <td>{{ $category['id'] }}</td>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td class="text-right">{{ $category['total_post'] }}</td>
                                    <td class="text-right">
                                    <a href="{{ route('category.show-edit', $category['id']) }}"><i class="c-light-blue ti-pencil"></i>Edit</a> |
                                    <i class="ti-trash text-danger"></i>Delete
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
