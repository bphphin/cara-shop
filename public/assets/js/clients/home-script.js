var bar = document.getElementById('bar');
bar.onclick = function () {
    document.getElementById('navbar').style.right = '0px';

}

var close = document.getElementById('close');

close.onclick = function () {
    document.getElementById('navbar').style.right = '-300px';

}

const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const price = $('.price')
const pro_name = $('.pro-name')
const pro_img = $('.pro-img')
const pro_box = $('.pro-box')



let list_cart = {
    list_pro: {
        pro_name: "",
        pro_img : "",
        pro_price : "",
    }
}


function buy () {
    list_pro = {
        pro_name: price.innerHTML,
        pro_img : pro_name.innerHTML,
        pro_price : pro_img.src,
    }
    console.log(list_pro)
    console.log(list_cart)
}
console.log(list_cart)
