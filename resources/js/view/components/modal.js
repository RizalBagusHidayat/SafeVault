export function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("hidden");

    setTimeout(() => {
        modal.classList.remove("opacity-0");
        modal.classList.add("opacity-100");
    }, 100);
}

export function closeModal(id) {
    const modal = document.getElementById(id);

    modal.classList.remove("opacity-100");
    modal.classList.add("opacity-0");

    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300);
}
