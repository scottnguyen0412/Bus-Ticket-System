import React from "react";
import { Link } from "react-router-dom";
import "../../assets/errors/css/style-403.css";
import page403 from "../../assets/errors/img/denied.svg";
function Page403() {
  return (
    <div className="page403">
      <img src={page403} alt="" loading="lazy" />
      <div class="message-box">
        <h1>403 Forbidden</h1>
        <p>Access Denied! You cannot access to this page</p>
        <div className="buttons-con">
          <div className="action-link-wrap">
            <Link to="/" className="link-button">
              Go to Home Page
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Page403;
