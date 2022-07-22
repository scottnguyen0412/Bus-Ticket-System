import React from "react";
import { Link, useHistory } from "react-router-dom";
import "../../assets/frontend/css/style.css";

import axios from "axios";
import swal from "sweetalert";

function Navbar() {
  const history = useHistory();
  const logoutSubmit = (e) => {
    e.preventDefault();
    axios.post(`/api/logout`).then((res) => {
      if (res.data.status === 200) {
        // Khi user click logout thì sẽ remove token và name của user
        localStorage.removeItem("auth_token");
        localStorage.removeItem("auth_name");
        swal("Success", res.data.message, "success");
        history.push("/");
      }
    });
  };

  var CheckLoggedIn = "";
  // Nếu không có token trong local storage thì sẽ show ra Login cho user
  if (!localStorage.getItem("auth_token")) {
    CheckLoggedIn = (
      <ul className="navbar-nav ms-auto float-end">
        <li className="nav-item">
          <Link className="nav-link" to="/login">
            Login
          </Link>
        </li>
      </ul>
    );
  } else {
    CheckLoggedIn = (
      <ul className="navbar-nav ms-auto float-end">
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
            <Link className="dropdown-item" to="/logout" onClick={logoutSubmit}>
              Log out
            </Link>
          </div>
        </li>
      </ul>
    );
  }

  return (
    <div>
      {/* navigation */}
      <nav className="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <Link className="navbar-brand" to="/">
          <div className="logo-holder logo-1 mx-2">
            <h3>Bus Management</h3>
            <p>Traveling with us</p>
          </div>
        </Link>
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
              <Link className="nav-link" to="/schedule">
                Schedule
              </Link>
            </li>
            {CheckLoggedIn}
          </ul>
        </div>
      </nav>
      {/* <Slider /> */}
    </div>
  );
}

export default Navbar;
