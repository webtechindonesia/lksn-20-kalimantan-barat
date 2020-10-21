import Vue from "vue";
import App from "./App.vue";

import router from "./router";

import axios from "axios";
axios.defaults.baseURL = "http://139.59.108.33:10020/api/";

Vue.config.productionTip = false;

Vue.filter("date", function(val) {
  if (!val) return;

  let dates = new Date();
  return new Intl.DateTimeFormat("en-US", {
    month: "numeric",
    year: "numeric",
    date: "numeric",
    day: "numeric",
    hour: "numeric",
    minute: "numeric",
    second: "numeric",
  }).format(dates);
});

new Vue({
  render: (h) => h(App),
  router,
}).$mount("#app");
