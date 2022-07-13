import React from "react";
import Connect from "./Connect";
// import "../../assets/frontend/css/style.css";

function Footer() {
  return (
    <div>
      <Connect />
      <footer>
        <div className="container-fluid padding">
          <div className="row text-center">
            <div className="col-md-4">
              {/* logo  */}
              <img src="" className="fa fa-bus" />
              <hr className="light" />
              <p className="fa-solid fa-phone"> +84 23456 7889</p>
              <p className="fa-solid fa-envelope"> Scottnguyen0412@gmail.com</p>
            </div>
            <div className="col-md-4">
              <hr className="light" />
              <h5>Our Hours Working</h5>
              <hr className="light" />
              <p>Time: 24/7 days</p>
            </div>
            <div className="col-md-4">
              <hr className="light" />
              <h5>Policy</h5>
              <hr className="light" />
              <p>Policy 1</p>
              <p>Policy 2</p>
              <p>Policy 3</p>
            </div>
            <div className="col-12">
              <hr />
              <h5>Make by Khoi Nguyen &hearts;</h5>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default Footer;
