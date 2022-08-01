import  { createApp } from "vue";
import CardList from "./components/CardList";
import components from "./components/UI/index"
import MiniCartBody from "./components/MiniCartBody";
import MiniCartButton from "./components/UI/MiniCartButton";


const app = createApp({
    data(){
        return{
            cartList:[],
        }
    },
    methods:{
        getFromStorage(){
            if (localStorage.getItem('cart')) {
                this.cartList = JSON.parse(localStorage.getItem('cart'))
            }
        },
    },
    mounted() {
        this.getFromStorage()
    },
});

components.forEach(component => {
    app.component(component.name,component)
});

app.component('card-list', CardList)
app.component('mini-cart-button', MiniCartButton)
app.component('mini-card-body', MiniCartBody)
app.mount('#app')