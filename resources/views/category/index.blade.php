@extends('admin')

@section('content')
                <div class="adm-category">
                    <div class="name-category">
                        <div class="row">
                            <h2 class="col-11">Категории</h2>
                            <a href="{{ route('categories.create') }}"><img src="/images/admin/add_icon.png"></a>
                        </div>
                    </div>
                </div>
                <div class="table">
                    <table class="table table-hover table-Light">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Категории</th>
                            <th scope="col">Доступность</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->title }}</td>
                                @if ($category->availability)
                                    <td>Доступно</td>
                                @else
                                    <td>Недоступно</td>
                                @endif
                                <td class="icon-table">
                                    <a href="{{ route('categories.show', $category->id) }}"><img src="/images/admin/see_icon.png"></a>
                                    <a href="{{ route('categories.edit', $category->id) }}"><img src="/images/admin/edit_icon.png"></a>
                                    {{--                            <a href="{{ route('categories.destroy', $category->id) }}"><img src="/images/admin/delete_icon.png"></a>--}}
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        @if ($category->availability == 1)
                                            <input type="submit" value="не показывать">
                                        @else
                                            <input type="submit" value="показывать">
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
@endsection