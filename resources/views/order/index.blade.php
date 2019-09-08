@extends('admin')

@section('content')

        <div class="adm-category">
            <div class="name-category">
                <div class="row">
                    <h2 class="col-11">Товары</h2>
                    <a src="#"><img src="/images/admin/add_icon.png"></a>
                </div>
            </div>

        </div>
        <div class="table-category">
            <table class="table table-hover table-Light">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Действия</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Шаурма</td>
                    <td>Шаурма (сырная)</td>
                    <td>+7(912)285-66-39</td>
                    <td class="icon-table">
                        <a src="#"><img src="/images/admin/see_icon.png"></a>
                        <a src="#"><img src="/images/admin/complete_order.png"></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Шаурма</td>
                    <td>Шаурма (Чесночная)</td>
                    <td>+7(912)285-66-39</td>
                    <td class="icon-table">
                        <a src="#"><img src="/images/admin/see_icon.png"></a>
                        <a src="#"><img src="/images/admin/complete_order.png"></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Вафля</td>
                    <td>Вафля (армянская)</td>
                    <td>+7(912)285-66-39</td>
                    <td class="icon-table">
                        <a src="#"><img src="/images/admin/see_icon.png"></a>
                        <a src="#"><img src="/images/admin/complete_order.png"></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    {{ $categories->links('vendor.pagination.bootstrap-4') }}
@endsection