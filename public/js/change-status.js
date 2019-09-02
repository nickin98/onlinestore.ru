var orders = document.querySelectorAll('tr');

for (var i = 1; i < orders.length; i++) {
    var id = orders[i].querySelector('td').innerHTML;
    var select = orders[i].querySelector('select');
    var status = select.value;
    select.addEventListener('change', changeStatus.bind(undefined, id, status));
}

async function changeStatus(id, status) {
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