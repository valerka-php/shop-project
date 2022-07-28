import  { createApp } from "vue";
import App from "./App";
import Card from "./components/Card";
import components from "./components/UI/index"

const app = createApp(App);
components.forEach( component => {
    app.component(component.name,component)
});


app.component('card', Card)
app.mount('#app')