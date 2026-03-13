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
import toggleElement from "./toggleElement";
import validation from "./validation";
import getFilterValue from "./getFilterValue";
import modal from "./modal";


$(function () {
    switchMode()
    loadingState()
    toggleElement()
    validation()
    getFilterValue()
    modal()
});
