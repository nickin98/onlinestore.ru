var orders = document.querySelectorAll('tr');

for (var i = 1; i < orders.length; i++) {
    var id = orders[i].querySelector('td').innerHTML;
    var select = orders[i].querySelector('select');
    var status = select.value;
    select.addEventListener('change', changeStatusFactory.call(select, id));
}

function changeStatusFactory(id) {
    return (function () {
        return changeStatus.call(this, id);
    }).bind(this);
}

// (function (id) {
//     return function wrapperChangeStatus() {
//         changeStatus.bind(this)(id);
//     }
// })(id)


async function changeStatus(id) {
    // var formData = new FormData();
    // formData.append('id', id);
    // formData.append('status', status);
    // var response = await fetch('/change', {
    //     headers: {
    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //     },
    //     method: 'POST',
    //     body: formData,
    // });
    //
    // let text = await response.text();
    // alert(text);
    // if (!confirm('Вы уверены, что хотите изменить статус заказа? При изменени статуса заказа на "Доставлен", он не будет показываться в списке')) {
    //     return;
    // }
    var status = this.value;

    $.ajax({
        type: "POST",
        url: '/change',
        data: {
            'id': id,
            'status': status
        },
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function (html) {
            alert(html);
        }
    })
}