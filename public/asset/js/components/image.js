const images = document.querySelectorAll('img[data-src]');
const config = {
    rootMargin: '0px',
    threshold: 0.1
};

let imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src; // Tải hình ảnh
            img.onload = () => {
                img.classList.add('loaded'); // Hiển thị hình ảnh
            };
            observer.unobserve(img); // Ngừng quan sát
        }
    });
}, config);

images.forEach(image => {
    imageObserver.observe(image); // Bắt đầu quan sát từng hình ảnh
});
