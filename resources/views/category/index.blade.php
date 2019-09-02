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
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->title }}</td>
                    @if ($category->availability)
                        <td>Доступно</td>
                    @else
                        <td>Недоступно</td>
                    @endif
                    <td class="icon-table">
                        <div class="row">
                            <a class="col-1" href="{{ route('categories.show', $category->id) }}">
                                <img src="/images/admin/see_icon.png">
                            </a>
                            <a class="col-1" href="{{ route('categories.edit', $category->id) }}">
                                <img src="/images/admin/edit_icon.png">
                            </a>
                            <input class="col-1" type="submit" value="" id="delButton"/>
                            {{-- <a href="{{ route('categories.destroy', $category->id) }}"><img src="/images/admin/delete_icon.png"></a>--}}
                            <form class="col-4" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                @if ($category->availability == 1)
                                    <input type="submit" class="btn btn-secondary" value="Не отображать">
                                @else
                                    <input type="submit" class="btn btn-secondary" value="Отображать">
                                @endif
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links('vendor.pagination.bootstrap-4') }}
@endsection