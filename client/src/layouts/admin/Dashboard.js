import React, { useState } from "react";
import Main from "./Main";
import NavbarDashboard from "./NavbarDashboard";
import "../../assets/admin/style-admin.css";
import Sidebar from "./Sidebar";
import $ from "jquery";
import AdminRoute from "../../routes/AdminRoute";
import { Switch, Route, Redirect } from "react-router-dom";

function Dashboard() {
  // var el = document.getElementById("wrapper");
  // var toggleButton = document.getElementById("menu-toggle");

  // toggleButton.onClick = function () {
  //   el.classList.toggle("toggled");
  // };
  $(function () {
    $("#menu-toggle").on("click", function () {
      $("#sidebar-wrapper").toggleClass("toggled");
    });
  });

  return (
    <div>
      <div className="d-flex" id="wrapper">
        <Sidebar />
        <div id="page-content-wrapper">
          <NavbarDashboard />
          {/* Main content */}
          <div className="container-fluid px-4">
            <Switch>
              {AdminRoute.map((route, index) => {
                return (
                  route.component && (
                    <Route
                      key={index}
                      path={route.path}
                      exact={route.exact}
                      name={route.name}
                      render={(props) => <route.component {...props} />}
                    />
                  )
                );
              })}
              {/* Auto redirect admin dashboard when access to web */}
              <Redirect from="/admin" to="/admin/dashboard" />
            </Switch>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Dashboard;
