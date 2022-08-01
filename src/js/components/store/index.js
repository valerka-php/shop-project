import {createStore} from "vuex";

export default createStore({
    state:{
        totalPriceProducts: 0,
    },
    mutations:{
        calculatePrice(state,price){
            state.totalPriceProducts += price
        },
        recalculatePrice(state,price){
            state.totalPriceProducts -= price
        },
        saveToLocalStorage(state){
            localStorage.setItem('totalPrice',state.totalPriceProducts)
        },
    },


})