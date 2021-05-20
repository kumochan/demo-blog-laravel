@extends('layout')

@section('content')
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20  pos-r">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary">Thêm chuyên mục</button>
            </div>
            <div class="col-md-4">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Cập nhật chuyên mục</h6>
                    @if(!empty($msg_sucess))
                    <div class="alert alert-success"> {{ $msg_sucess }}</div>
                    @endif
                    <form method="POST" action="{{ route('category.edit') }}">
                        @csrf
                        <input name="id" type="hidden" value="{{ $cate['id'] }}" />
                        <div class="mT-30">
                            <div class="form-group">
                                <label for="category_name">Tên chuyên mục <span class="text-danger">(*)</span></label>
                                <input name="name" type="text" class="form-control" id="category_name" aria-describedby="category_name" value="{{ $cate['name'] }}" placeholder="Nhập tên chuyên mục">
                                <small id="category_name" class="form-text text-muted">Tên chuyên mục không nên dài quá 100 ký tự.</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Khóa thay thế <span class="text-danger">(*)</span></label>
                                <input name="slug" type="text" class="form-control" id="slug" value="{{ $cate['slug'] }}" placeholder="Khóa thay thế">
                            </div>
                            <!-- <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
                                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Call John for Dinner</span></label>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Danh sách chuyên mục</h6>
                    <div class="mT-30">
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
