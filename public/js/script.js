// datatables
new DataTable('#dataStatus', {
    language: {
        "search": "Cari :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='../img/404.png' alt='' class='notfound'><p class='fw-semibold mt-5 mb-0'>Data Siswa Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataMapel', {
    language: {
        "search": "Cari Mata Pelajaran :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='img/404.png' alt='' class='notfound'><p class='fw-semibold mt-5 mb-0'>Data Mata Pelajaran Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataKelas',{
    language: {
        "search": "Cari Kelas :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img class='notfound' src='img/404.png' alt=''><p class='fw-semibold mt-5 mb-0'>Data Kelas Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataSiswa', {
    language: {
        "search": "Cari Data Siswa :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img class='notfound' src='img/404.png' alt=''><p class='fw-semibold mt-5 mb-0'>Data Siswa Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataguru', {
    language: {
        "search": "Cari Data Guru :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img class='notfound' class='notfound' src='img/404_guru.png' alt=''><p class='fw-semibold mt-5 mb-0'>Data Guru Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataAdmin', {
    language: {
        "search": "Cari Data Admin :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img class='notfound' src='img/404.png' alt=''><p class='fw-semibold mt-5 mb-0'>Data Admin Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataUser', {
    language: {
        "search": "Cari Data Users :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img class='notfound' src='img/404.png' alt=''><p class='fw-semibold mt-5 mb-0'>Data Users Tidak Ditemukan</p></div>"
    }
});
new DataTable('#dataNilai');

// // new DataTable('#dataSiswa');
// $(document).ready( function () {
//     loadData();
// } );

// function loadData(){ 
//     $('#dataSiswa').DataTable({
//         processing: true,
//         pagination: true,
//         serverSide: true,
//         searching: true,
//         ordering: false,
//         ajax: {
//             url: "/siswa",
//         },
//         columns:[
//             {
//                 data:'nisn',
//                 name:'nisn',
//             },
//             {
//                 data:'name',
//                 name:'name',
//             },
//             {
//                 data:'jenis_kelamin',
//                 name:'jenis_kelamin',
//             },
//             {
//                 data:'jurusan',
//                 name:'jurusan',
//             },
//             {
//                 data:'kelas',
//                 name:'kelas',
//             },
//             {
//                 data:'email',
//                 name:'email',
//             },
//             {
//                 data:'password',
//                 name:'password',
//             },
//             {
//                 data:'alamat',
//                 name:'alamat',
//             },
//             {
//                 data:'tahun_lulus',
//                 name:'tahun_lulus',
//             },
//             {
//                 data:'status',
//                 name:'status',
//             },
//             {
//                 data:'aksi',
//                 name:'aksi',
//             },
//         ]
//     });
// }

// // sweetalert

// // chart nilai
// // <block:segmentUtils:1>
// const skipped = (dataNilai, value) => dataNilai.p0.skip || dataNilai.p1.skip ? value : undefined;
// const down = (dataNilai, value) => dataNilai.p0.parsed.y > dataNilai.p1.parsed.y ? value : undefined;

// const genericOptions = {
//     fill: false,
//     interaction: {
//         intersect: false
//     },
//     radius: 0,
// };
// // </block:genericOptions>

// // <block:config:0>
// const nilaiData = [83, 85.4, 90, 86, 85];
// const dataNilai = document.getElementById('datanilai');
// new Chart(dataNilai, {
//     type: 'line',
//     data: {
//         labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
//         datasets: [{
//             label: 'Grafik Nilai Per Semester',
//             data: nilaiData,
//             borderColor: 'rgb(75, 192, 192)',
//             segment: {
//                 borderColor: dataNilai => skipped(dataNilai, 'rgb(0,0,0,0.2)') || down(dataNilai, 'rgb(192,75,75)'),
//                 borderDash: dataNilai => skipped(dataNilai, [6, 6]),
//             },
//             spanGaps: true
//         }]
//     },
//     options: {
//         scale: {
//             y: {
//                 suggestedMax: 100,
//             }
//         }
//     }

// });
// // </block:config>

// module.exports = {
//     actions: [],
//     config: config,
// };

// Tangkap event submit dari formulir
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.confirm-form-submit').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Menghentikan pengiriman formulir secara langsung

            // Menampilkan SweetAlert konfirmasi penghapusan
            var formId = this.getAttribute('id');
            confirmFormSubmission(formId);
        });
    });
});
