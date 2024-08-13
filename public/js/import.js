function importData() {
    var formData = new FormData($('#import-form')[0]);
    $.ajax({
        url: '/import',  // Sesuaikan URL dengan route Anda
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $('#alert').text(response.message).show();
            loadAlumni();
        },
        error: function(response) {
            $('#alert').text('Failed to import data').removeClass('alert-success').addClass('alert-danger').show();
        }
    });
}

function loadAlumni() {
    $.get('/getAlumni', function(data) {
        var rows = '';
        data.forEach(function(alumni) {
            rows += `
                <tr>
                    <td>${alumni.nama}</td>
                    <td>${alumni.jurusan}</td>
                    <td>${alumni.jenis_kelamin}</td>
                    <td>${alumni.tahun_lulus}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-${alumni.id}">
                            Detail
                        </button>
                        <div class="modal fade" id="exampleModal-${alumni.id}" tabindex="-1" aria-labelledby="exampleModalLabel-${alumni.id}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-${alumni.id}">Detail</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="detail-item">
                                            <i class="mdi mdi-account"></i>
                                            <span>Nama Alumni: ${alumni.nama}</span>
                                        </div>
                                        <div class="detail-item">
                                            <i class="mdi mdi-school">
                                                <span>Jurusan: ${alumni.jurusan}</span>
                                            </i>
                                        </div>
                                        <div class="detail-item">
                                            <i class="mdi mdi-gender-male-female">
                                                <span>Jenis Kelamin: ${alumni.jenis_kelamin}</span>
                                            </i>
                                        </div>
                                        <div class="detail-item">
                                            <i class="mdi mdi-calendar">
                                                <span>Tahun Lulus: ${alumni.tahun_lulus}</span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });
        $('#alumni-table').html(rows);
    });
}

$(document).ready(function() {
    loadAlumni();
});