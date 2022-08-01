import  { createApp } from "vue";
import CardList from "./components/CardList";
import components from "./components/UI/index"
import store from "./components/store";


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

            if (localStorage.getItem('totalPrice')) {
                this.$store.state.totalPriceProducts = JSON.parse(localStorage.getItem('totalPrice'))
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

app.use(store)
app.component('card-list', CardList)
app.mount('#app')