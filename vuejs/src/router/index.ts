import { createWebHistory, createRouter } from "vue-router";
import * as Master from "../modules/pages/router";

const routes = [
    {
        path: "/",
        component: Master.MainPage,
        name: "main",
    },
    {
        path: "/create",
        component: Master.CreatePage,
        name: "create",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    next();
});

export default router;
