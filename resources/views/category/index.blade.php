<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <meta name="keywords" content="keywords">
    <meta name="description" content="description_site">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link  href="/css/astyle.css" rel="stylesheet"/>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="admin-menu col-lg-2">
                <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Главная</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Категории</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Товар</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Заказы</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Выйти из админ панели</a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="category">
                    <div class="adm-category">
                        <div class="name-category">
                            <div class="row">
                                <h2 class="col-11">Категории</h2>
                                <a href="{{ route('categories.create') }}"><img src="/images/admin/add_icon.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-category">
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
{{--                                    <a href="{{ route('categories.destroy', $category->id) }}"><img src="/images/admin/delete_icon.png"></a>--}}
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
                </div>
                {{ $categories->links('vendor.pagination.bootstrap-4') }}

            </div>

        </div>

    </div>


</body>
</html>