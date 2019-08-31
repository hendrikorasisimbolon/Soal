$(document).ready(function () {

    var url = "http://localhost/soal/soal6/";
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;

    manageData();

    /* tampilkan data */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: url + 'api/read.php',
            data: { page: page }
        }).done(function (data) {
            total_page = Math.ceil(data.total / 10);
            current_page = page;

            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if (is_ajax_fire != 0) {
                        getPageData();
                    }
                }
            });

            manageRow(data.data);
            is_ajax_fire = 1;

        });

    }

    /* tampilkan  data */
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: url + 'api/read.php',
            data: { page: page }
        }).done(function (data) {
            manageRow(data.data);
        });
    }


    /* tambahkan data baru pada table */
    function manageRow(data) {
        var rows = '';
        $.each(data, function (key, value) {
            rows = rows + '<tr>';
            rows = rows + '<td>' + value.name + '</td>';
            rows = rows + '<td>' + value.work + '</td>';
            rows = rows + '<td>Rp.' + value.salary + ',-</td>';
            rows = rows + '<td data-id="' + value.id + '">';
            rows = rows + '<button data-toggle="modal" data-target="#edit-user" class="btn btn-primary btn-sm edit-user"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button> ';
            rows = rows + '<button class="btn btn-danger btn-sm remove-user"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus</button>';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });

        $("tbody").html(rows);
    }

    /* tambah user */
    $(".crud-submit").click(function (e) {
        e.preventDefault();
        var form_action = $("#create-user").find("form").attr("action");
        var name = $("#create-user").find("input[name='name']").val();
        var work = $("#create-user").find("select[name='work']").val();
        var salary = $("#create-user").find("select[name='salary']").val();

        if (name != '' && work != '' && salary != '') {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: url + form_action,
                data: { name: name, work: work, salary: salary }
            }).done(function (data) {
                $("#create-user").find("input[name='name']").val('');
                $("#create-user").find("select[name='work']").val('');
                $("#create-user").find("select[name='salary']").val('');
                getPageData();
                $(".modal").modal('hide');
                alert('Data berhasil ditambah')
            });
        } else {
            alert('Ada data yang kosong')
        }
    });

    /* hapus user */
    $("body").on("click", ".remove-user", function () {
        var id = $(this).parent("td").data('id');
        var c_obj = $(this).parents("tr");

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url + 'api/delete.php',
            data: { id: id }
        }).done(function (data) {
            c_obj.remove();
            getPageData();
            alert('Data berhasil dihapus')
        });

    });


    /* Edit user */
    $("body").on("click", ".edit-user", function () {
        var id = $(this).parent("td").data('id');
        var name = $(this).parent("td").prev("td").prev("td").prev("td").text();
        var work = $(this).parent("td").prev("td").prev("td").text();
        var salary = $(this).parent("td").prev("td").text();
        $("#edit-user").find("input[name='name']").val(name);
        $("#edit-user").find("select[name='work']").val(work);
        $("#edit-user").find("select[name='salary']").val(salary);
        $("#edit-user").find("input[name='id']").val(id);

    });


    /* Update user */
    $(".crud-edit").click(function (e) {

        e.preventDefault();
        var form_action = $("#edit-user").find("form").attr("action");
        var name = $("#edit-user").find("input[name='name']").val();
        var work = $("#edit-user").find("select[name='work']").val();
        var salary = $("#edit-user").find("select[name='salary']").val();
        var id = $("#edit-user").find("input[name='id']").val();

        if (name != '' && work != '' && salary != '') {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: url + form_action,
                data: { name: name, work: work, salary: salary, id: id }
            }).done(function (data) {
                getPageData();
                $(".modal").modal('hide');
                alert('Data berhasil diedit')
            });
        } else {
            alert('Ada data yang kosong')
        }

    });
});