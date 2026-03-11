import "./bootstrap";

// Tải thư viện JQuery
import $ from "jquery";
// Gán thư viện jQuery vào biến $ và JQuery của trình duyệt
window.$ = window.jQuery = $;

// Import
import switchMode from './switchMode';
import loadingState from "./loadingState";

$(function () {
    switchMode()
    loadingState()
});
