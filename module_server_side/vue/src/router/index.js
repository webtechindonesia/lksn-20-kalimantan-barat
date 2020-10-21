import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    component: () => import("@/components/Index.vue"),
  },
  {
    path: "/login",
    component: () => import("@/components/Login.vue"),
  },
  {
    path: "/reset",
    component: () => import("@/components/Reset.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  routes,
});

export default router;
