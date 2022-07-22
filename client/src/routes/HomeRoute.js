import React from "react";
import Page403 from "../components/errors/Page403";
import Page404 from "../components/errors/Page404";
import Login from "../components/frontend/auth/Login";
import Register from "../components/frontend/auth/Register";
import Content from "../components/frontend/Content";
import Home from "../components/frontend/Home";

const HomeRoute = [
  { path: "/", exact: true, name: "Home", component: Home },
  { path: "/schedule", exact: true, name: "Content", component: Content },
  { path: "/login", exact: true, name: "Login", component: Login },
  { path: "/register", exact: true, name: "Register", component: Register },
  { path: "/page403", exact: true, name: "Page403", component: Page403 },
  { path: "/page404", exact: true, name: "Page404", component: Page404 },
];

export default HomeRoute;
