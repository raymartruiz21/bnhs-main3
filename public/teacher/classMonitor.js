let myClassTable = $("#myClassTable").DataTable({
    // lengthChange: false,
    pageLenth: 6,
    processing: true,
    language: {
        processing: `
                <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>`,
    },

    ajax: "monitor/list",
    columns: [
        { data: "roll_no" },
        { data: "fullname" },
        { data: "gender" },
        { data: "student_contact" },
        {
            data: null,
            render: function (data) {
                return data.enroll_status == "Dropped"
                    ? `<span class="badge bg-danger">${data.enroll_status}</span>`
                    : `<span class="badge bg-success">${data.enroll_status}</span>`;
            },
        },
        {
            data: null,
            render: function (data) {
                if (data.enroll_status != "Dropped") {
                    return `<button type="button" class="btn btn-sm text-white btn-warning dropped btnDropped_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">
                    <i class="fas fa-user-times"></i> Drop
                    </button>
                    `;
                } else {
                    return `<button type="button" class="btn btn-sm text-white btn-info dropped btnDropped_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">
                    <i class="fas fa-user-times"></i> Undrop
                    </button>
                    `;
                }
            },
        },
    ],
});

$(document).on("click", ".dropped", function () {
   if (confirm("Are you sure you want drop this student?")) {
    let id = $(this).attr("id");
    $.ajax({
        url: "monitor/dropped/" + id,
        type: "POST",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnDropped_" + id).html(`
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
        },
    })
        .done(function (response) {
            $(".btnDropped_" + id).html("Delete");

            getToast("info", "Done", "Change one record");
            myClassTable.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
   } else {
       return false;
   }
});
