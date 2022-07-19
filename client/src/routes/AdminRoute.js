import React from "react";
import HomeDashboard from "../components/admin/HomeDashboard";
import AddAccount from "../components/admin/account/AddAccount";

const AdminRoute = [
  { path: "/admin", exact: true, name: "Admin" },
  {
    path: "/admin/dashboard",
    exact: true,
    name: "HomeDashboard",
    component: HomeDashboard,
  },
  {
    path: "/admin/add-account",
    exact: true,
    name: "AddAccount",
    component: AddAccount,
  },
  //   {
  //     path: "/admin/view-category",
  //     exact: true,
  //     name: "ViewCategory",
  //     component: ViewCategory,
  //   },
  //   {
  //     path: "/admin/edit-category/:id",
  //     exact: true,
  //     name: "EditCategory",
  //     component: EditCategory,
  //   },
  //   {
  //     path: "/admin/add-product",
  //     exact: true,
  //     name: "AddProduct",
  //     component: AddProduct,
  //   },
  //   {
  //     path: "/admin/view-product",
  //     exact: true,
  //     name: "ViewProduct",
  //     component: ViewProduct,
  //   },
  //   {
  //     path: "/admin/edit-product/:id",
  //     exact: true,
  //     name: "EditProduct",
  //     component: EditProduct,
  //   },
  //   { path: "/admin/profile", exact: true, name: "Profile", component: Profile },
];

export default AdminRoute;
