import React from "react";
import { Link } from "react-router-dom";

function Sidebar() {
  return (
    <div className="bg-white" id="sidebar-wrapper">
      <div className="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <a className="text-decoration-none" href="/">
          <i className="fas fa-user-secret me-2"></i>Bus Booking
        </a>
      </div>
      <div className="list-group list-group-flush my-3">
        <Link
          to="/admin/dashboard"
          className="list-group-item list-group-item-action bg-transparent second-text"
        >
          <i className="fas fa-tachometer-alt me-2"></i>Dashboard
        </Link>
        <Link
          to="/admin/view-account"
          className="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        >
          <i className="fa fa-users me-2"></i>Account
        </Link>
        <a
          href="#"
          className="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        >
          <i className="fa-solid fa-route me-2"></i>Routing
        </a>

        <a
          href="#"
          className="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        >
          <i className="fa-solid fa-bus me-2"></i>Bus
        </a>
        <a
          href="#"
          className="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        >
          <i className="fas fa-gift me-2"></i>Coupons
        </a>
        <a
          href="#"
          className="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        >
          <i className="fas fa-comment-dots me-2"></i>Chat
        </a>
        <a
          href="#"
          className="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
        >
          <i className="fas fa-power-off me-2"></i>Logout
        </a>
      </div>
    </div>
  );
}

export default Sidebar;
