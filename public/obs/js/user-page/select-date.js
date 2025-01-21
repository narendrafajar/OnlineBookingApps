$(document).ready(function () {
    // console.log(localStorage);
    const timeSlots = $("#timeSlots");
    const confirmButton = $("#confirmButton");

    // Fungsi untuk memuat slot waktu yang tersedia
    function fetchAvailableSlots(date) {
        timeSlots.empty();
        confirmButton.prop("disabled", true);

        axios.post('/check-slots', { date: date })
        .then(function (response) {
            renderTimeSlots(response.data.slots); // Pastikan ini sesuai dengan respons yang dikirim oleh controller
        })
        .catch(function (error) {
            alert("Gagal mendapatkan slot waktu. Silakan coba lagi.");
            console.error(error);
        });
    }

    function renderTimeSlots(slots) {
        const timeSlotsContainer = $("#timeSlotsContainer"); // Pastikan elemen dengan ID ini ada
        timeSlotsContainer.empty(); // Kosongkan kontainer sebelum menambahkan slot baru

        // Membuat col-12 untuk memastikan lebar penuh sebelum menambahkan row
        const col12 = $("<div>").addClass("col-12");

        // Membuat row sekali sebelum menambahkan kolom-kolom slot waktu
        const row = $("<div>").addClass("row");

        // Menambahkan slot waktu ke dalam baris
        slots.forEach(function (slot) {
            // Membuat elemen div dengan kelas grid Bootstrap untuk responsivitas
            const slotDiv = $("<div>").addClass("col-3 col-md-4 col-lg-6 mb-3"); // Menambahkan margin bawah untuk jarak antar elemen

            // Membuat tombol untuk setiap slot waktu
            const button = $("<button>")
                .addClass("btn time-slot w-100") // w-100 untuk membuat tombol selebar kolom
                .text(slot.time) // Waktu dari slot
                .attr("data-time", slot.time); // Menambahkan atribut data untuk waktu

            // Mengecek ketersediaan slot dan memberikan kelas yang sesuai
            if (slot.isAvailable) {
                button.addClass("btn-primary").prop("disabled", false); // Slot tersedia
            } else {
                button.addClass("btn-secondary").prop("disabled", true); // Slot tidak tersedia
            }

            slotDiv.append(button); // Menambahkan tombol ke dalam div
            row.append(slotDiv); // Menambahkan div ke dalam row
        });

        // Menambahkan row ke dalam col-12
        col12.append(row);

        // Menambahkan col-12 (yang sudah berisi row) ke dalam timeSlotsContainer
        timeSlotsContainer.append(col12);

         // Menambahkan event listener untuk klik pada tombol slot waktu
         $(".time-slot").on("click", function () {
            $(".time-slot").removeClass("btn-success").addClass("btn-primary");
            $(this).removeClass("btn-primary").addClass("btn-success");

            confirmButton.prop("disabled", false).attr("data-time", $(this).data("time"));

            // Menyimpan waktu yang dipilih ke localStorage
            localStorage.setItem("selectedTime", $(this).data("time"));
        });
    }

    // Initialize Flatpickr
    flatpickr("#inlineDatePicker", {
        inline: true,
        dateFormat: "Y-m-d",
        minDate: "today",
        onChange: function (selectedDates, dateStr) {
            if (dateStr) {
                // Simpan tanggal yang dipilih ke localStorage
                localStorage.setItem("selectedDate", dateStr);
                fetchAvailableSlots(dateStr);
            }
        },
        // locale: "id"
    });

    // Memuat tanggal yang disimpan di localStorage saat halaman dimuat
    const storedDate = localStorage.getItem("selectedDate");
    if (storedDate) {
        // Menetapkan tanggal yang disimpan di Flatpickr
        flatpickr("#inlineDatePicker").setDate(storedDate);
        fetchAvailableSlots(storedDate); // Memuat slot waktu berdasarkan tanggal yang dipilih
    }

    confirmButton.on("click", function () {
        var selectedLocationId = localStorage.getItem('selectedLocationId');
        var selectedCards = JSON.parse(localStorage.getItem('selectedCards')) || [];
        var selectedDate = localStorage.getItem("selectedDate");
        var selectedTime = localStorage.getItem("selectedTime");

        // Pastikan semua data sudah dipilih
        if (selectedLocationId && selectedCards.length > 0 && selectedDate && selectedTime) {
            var dataToSend = {
                location_id: selectedLocationId,
                treatments: selectedCards, // Mengirimkan array treatment
                date: selectedDate,
                time: selectedTime
            };

            // Mengirimkan request POST ke /therapist
            axios.get('/therapist', { params: dataToSend })
            .then(function(response) {
                const personData = response.data;
                
                // Simpan ke localStorage untuk diproses setelah redirect
                localStorage.setItem('personData', JSON.stringify(personData));

                // Redirect dengan query string (opsional untuk konfirmasi parameter)
                const queryString = new URLSearchParams({ treatmentIds: dataToSend.treatments }).toString();
                window.location.href = `/therapist?${queryString}`;
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });
        } else {
            alert('Silakan lengkapi semua pilihan sebelum melanjutkan.');
        }
    });

    $('#backButton').on('click', function(){
        window.location.href = '/treatments';
    });
});
