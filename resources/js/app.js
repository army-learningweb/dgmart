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
import loadingState from "./loadingState";
import toggleElement from "./toggleElement";
import validation from "./validation";
import modal from "./modal";
import editModal from "./editModal";
import listFilter from "./listFilter";
import updateStatus from "./updateStatus";
import checkAll from "./checkAll";
import sidebar from "./sidebar";
import file from "./file";
import updateOrder from "./updateOrder";
import createMenu from "./createMenu";
import sliderBanner from "./sliderBanner";
import sliderProduct from "./sliderProduct";
import listFilterClinet from "./listFilterClient";
import backScroll from "./scroll";
import attribute from "./attribute";
import imageProductDetails from "./imageProductDetails";
import productDetailTotal from "./productDetailTotal";
import cart from "./cart";
import productDetailConfig from "./productDetailConfig";
import voteStar from "./voteStar";

$(function () {
    loadingState()
    toggleElement()
    validation()
    modal()
    editModal()
    listFilter()
    listFilterClinet()
    updateStatus()
    checkAll()
    sidebar()
    file()
    updateOrder()
    createMenu()
    sliderBanner()
    sliderProduct()
    backScroll()
    attribute()
    imageProductDetails()
    productDetailTotal()
    productDetailConfig()
    cart()
    voteStar()
});
