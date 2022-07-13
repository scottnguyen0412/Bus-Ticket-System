import React from "react";
import { Link } from "react-router-dom";
import "../../assets/frontend/css/style.css";
import logo from "../../assets/frontend/img/bus_logo.png";
import Content from "./Content";
import Destination from "./Destination";
import Footer from "./Footer";
import Slider from "./Slider";
function Navbar() {
  return (
    <div>
      {/* navigation */}
      <nav className="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a className="navbar-brand" href="#">
          <div className="logo-holder logo-1 mx-2">
            <h3>Bus Management</h3>
            <p>Traveling with us</p>
          </div>
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav ms-auto float-end">
            <li className="nav-item active">
              <Link className="nav-link" to="/">
                Home <span className="sr-only">(current)</span>
              </Link>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="#">
                About Us
              </a>
            </li>
            <li className="nav-item">
              <Link className="nav-link" to="/destination">
                Destination
              </Link>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="#">
                Schedule
              </a>
            </li>
            <li className="nav-item">
              <Link className="nav-link" to="/login">
                Login
              </Link>
            </li>
            <li className="nav-item dropdown">
              <a
                className="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Profile
              </a>
              <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                <a className="dropdown-item" href="#">
                  Edit My Profile
                </a>
                <div className="dropdown-divider"></div>
                <a className="dropdown-item" href="#">
                  Log out
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      {/* <Slider /> */}
    </div>
  );
}

export default Navbar;
