import "./bootstrap";
import "preline";
// import $ from "jquery";
// window.$ = $;

if (window.location.pathname === "/account-manager") {
    import("./view/dashboard/accountManager");
}
