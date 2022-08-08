import {createStore} from "vuex";


export default createStore({
    state:{
        totalPriceProducts: 0,
    },
    mutations:{
        calculatePrice(state,price){
            state.totalPriceProducts += price
            this.commit('saveLocalPrice')
        },
        recalculatePrice(state,price){
            state.totalPriceProducts -= price
            this.commit('saveLocalPrice')
        },
        saveLocalPrice(state){
            localStorage.setItem('totalPrice',state.totalPriceProducts)
        },
    },


})