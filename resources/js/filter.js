import Vue from "vue"

// currency format
Vue.filter("numberIdr", number => new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(number))