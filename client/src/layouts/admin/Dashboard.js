import React, { useState } from "react";
import Main from "./Main";
import NavbarDashboard from "./NavbarDashboard";
import "../../assets/admin/style-admin.css";
import Sidebar from "./Sidebar";
import $ from "jquery";

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
          <Main />
        </div>
      </div>
    </div>
  );
}

export default Dashboard;
