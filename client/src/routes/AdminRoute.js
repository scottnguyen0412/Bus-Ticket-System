import React from "react";
import HomeDashboard from "../components/admin/HomeDashboard";
import EditAccount from "../components/admin/account/EditAccount";
import ViewAccount from "../components/admin/account/ViewAccount";

const AdminRoute = [
  { path: "/admin", exact: true, name: "Admin" },
  {
    path: "/admin/dashboard",
    exact: true,
    name: "HomeDashboard",
    component: HomeDashboard,
  },
  {
    path: "/admin/view-account",
    exact: true,
    name: "ViewAccount",
    component: ViewAccount,
  },
  {
    path: "/admin/edit-account",
    exact: true,
    name: "EditAccount",
    component: EditAccount,
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
