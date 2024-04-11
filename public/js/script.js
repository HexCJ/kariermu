const alertPlaceholder = document.getElementById('alert-test')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('submitUpdate')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Data Anda Berhasil Terkirim!', 'success')
  })
}

new DataTable('#dataSiswa');
new DataTable('#dataguru');
new DataTable('#dataNilai');

// chart nilai
// <block:segmentUtils:1>
const skipped = (dataNilai, value) => dataNilai.p0.skip || dataNilai.p1.skip ? value : undefined;
const down = (dataNilai, value) => dataNilai.p0.parsed.y > dataNilai.p1.parsed.y ? value : undefined;

const genericOptions = {
    fill: false,
    interaction: {
        intersect: false
    },
    radius: 0,
};
// </block:genericOptions>

// <block:config:0>
const nilaiData = [83, 85.4, 90, 86, 85];
const dataNilai = document.getElementById('datanilai');
new Chart(dataNilai, {
    type: 'line',
    data: {
        labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
        datasets: [{
            label: 'Grafik Nilai Per Semester',
            data: nilaiData,
            borderColor: 'rgb(75, 192, 192)',
            segment: {
                borderColor: dataNilai => skipped(dataNilai, 'rgb(0,0,0,0.2)') || down(dataNilai, 'rgb(192,75,75)'),
                borderDash: dataNilai => skipped(dataNilai, [6, 6]),
            },
            spanGaps: true
        }]
    },
    options: {
        scale: {
            y: {
                suggestedMax: 100,
            }
        }
    }

});
// </block:config>

module.exports = {
    actions: [],
    config: config,
};

// Tangkap event submit dari formulir
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.confirm-form-submit').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir secara langsung

            // Menampilkan SweetAlert konfirmasi penghapusan
            var formId = this.getAttribute('id');
            confirmFormSubmission(formId);
        });
    });
});
