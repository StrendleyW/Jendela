document.addEventListener('DOMContentLoaded', function() {
    // Menyeleksi semua link yang memiliki class 'js-scroll-to-about'
    const scrollLinks = document.querySelectorAll('.js-scroll-to-about');

    // Menyeleksi elemen target di footer berdasarkan ID-nya
    const aboutSection = document.getElementById('about-us');

    // Memastikan elemen target dan link pemicu scroll ada di halaman
    if (aboutSection && scrollLinks.length > 0) {
        scrollLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                // Mencegah perilaku default dari link (yaitu menambahkan '#' ke URL dan melompat)
                event.preventDefault(); 

                // Melakukan scroll ke elemen 'aboutSection' dengan animasi yang halus
                aboutSection.scrollIntoView({ behavior: 'smooth' });
            });
        });
    } else {
        if (!aboutSection) {
            console.warn('Elemen target dengan ID "about-us" tidak ditemukan.');
        }
        if (scrollLinks.length === 0) {
            console.warn('Tidak ada link dengan class "js-scroll-to-about" yang ditemukan.');
        }
    }
});