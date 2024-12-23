import "./bootstrap";
import "preline";
import { openModal, closeModal } from "./view/components/modal";

window.openModal = openModal;
window.closeModal = closeModal;
// import $ from "jquery";
// window.$ = $;

if (window.location.pathname === "/account-manager") {
    import("./view/dashboard/accountManager");
}
