// fomantic-init.js
// Inisialisasi semua komponen Fomantic-UI

document.addEventListener('DOMContentLoaded', () => {
    // Modal (login, register, tambah data, edit, dll.)
    $('.ui.modal').modal({
        detachable: false,
        closable: true,
        dimmerSettings: { opacity: 0.4 }
    });

    // Dropdown (sub-menu sidebar, select di form, dll.)
    $('.ui.dropdown').dropdown({
        on: 'hover'  // muncul saat hover (bisa diganti 'click' kalau mau)
    });

    // Checkbox (Ingat Saya, aktif/nonaktif, dll.)
    $('.ui.checkbox').checkbox();

    console.log('Fomantic-UI components diinisialisasi');
});