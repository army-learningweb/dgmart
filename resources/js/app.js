import "./bootstrap";

// Tải thư viện JQuery
import $ from "jquery";
// Gán thư viện jQuery vào biến $ và JQuery của trình duyệt
window.$ = window.jQuery = $;

// Ajax setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Import
import switchMode from './switchMode';
import loadingState from "./loadingState";
import toggleUserMenu from "./toggleUserMenu";
import toggleShortCutMenu from "./toggleShortCutMenu";
import validation from "./validation";


$(function () {
    switchMode()
    loadingState()
    toggleUserMenu()
    toggleShortCutMenu()
    validation()
});
