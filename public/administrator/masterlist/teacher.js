const table_teacher = $("#teacherTable").DataTable({
    // lengthChange: false,
    pageLenth: 6,
    processing: true,
    language: {
        processing: `
                <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>`,
    },

    ajax: `teacher/list`,
    columns: [
        { data: "roll_no" },
        {
            data: null,
            render: function (data) {
                return (
                    data.teacher_lastname +
                    ", " +
                    data.teacher_firstname +
                    " " +
                    data.teacher_middlename
                );
            },
        },
        { data: "teacher_gender" },
        { data: "username" },
        // { data: "orig_password" },
        {
            data: null,
            render: function (data) {
                return `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" style="font-size:12px" class="btn btn-sm text-white btn-info tedit btnEdit_${data.id}" id="${data.id}">Edit </button>
                        <button type="button" style="font-size:12px" class="btn btn-sm text-white btn-danger pl-3 pr-3 tdelete btnDelete_${data.id}" id="${data.id}">Delete</button>
                    </div>
                    `;
            },
        },
    ],
});

$("#teacherForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "teacher/store",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSave").html(`Saving 
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
        },
    })
        .done(function (response) {
            $("#btnSave").html("Save");
            getToast("success", "Successfully", "added new Teacher");
            $("#teacherForm")[0].reset();
            table_teacher.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
});

$(document).on("click", ".tdelete", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "teacher/delete/" + id,
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnDelete_" + id)
                .html(
                    `
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (response) {
            $(".btnDelete_" + id)
                .html(`<i class="fas fa-user-times"></i>`)
                .attr("disabled", false);
            getToast("success", "Successfully", "deleted one record");
            $("#teacherForm")[0].reset();
            table_teacher.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            $(".btnDelete_" + id)
                .html(`<i class="fas fa-user-times"></i>`)
                .attr("disabled", false);
            getToast("error", "Eror", errorThrown);
        });
});

$(document).on("click", ".tedit", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "teacher/edit/" + id,
        type: "GET",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnEdit_" + id).html(`
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
        },
    })
        .done(function (data) {
            $(".modal-title").text("Update Teacher");
            $(".btnEdit_" + id).html(`<i class="fas fa-edit"></i>`);
            $("#staticBackdrop").modal("show");
            $("input[name='roll_no']").val(data.roll_no);
            $("input[name='firstname']").val(data.teacher_firstname);
            $("input[name='middlename']").val(data.teacher_middlename);
            $("input[name='lastname']").val(data.teacher_lastname);
            $("select[name='gender']").val(data.teacher_gender);
            $("input[name='id']").val(data.id);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            $(".btnEdit_" + id).html(`<i class="fas fa-edit"></i>`);
            console.log(jqxHR, textStatus, errorThrown);
        });
});
$("#btnMidalTeacher").on("click", function () {
    $(".modal-title").text("New Teacher");
    $("#teacherForm")[0].reset();
    $("#staticBackdrop").modal("show");
});
