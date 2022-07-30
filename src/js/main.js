import  { createApp } from "vue";
import App from "./App";
import CardList from "./components/CardList";
import components from "./components/UI/index"

const app = createApp(App);
components.forEach( component => {
    app.component(component.name,component)
});


app.component('card-list', CardList)
app.mount('#app')