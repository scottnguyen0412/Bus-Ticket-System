import React, { useState } from "react";
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

  // const [isOpen, setIsOpen] = useState(false);
  // const toogle = () => setIsOpen(!isOpen);

  const [isActive, setIsActive] = useState(false);
  const activeSidebar = () => setIsActive(!isActive);
  const [close, setClose] = useState(false);
  const showSidebar = () => setClose(!close);
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
