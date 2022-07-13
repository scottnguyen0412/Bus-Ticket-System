import React from "react";
import "../../assets/frontend/css/style.css";

function Destination() {
  return (
    <div id="search">
      <form>
        <div className="container">
          <div className="search-option">
            <div className="item">
              <h5 className="h5 color-primary">Starting Point</h5>
              <input
                type="text"
                className="form-control"
                placeholder="Your Starting Point"
              />
            </div>
            <div className="item">
              <h5 className="h5">Destination</h5>
              <input
                type="text"
                className="form-control"
                placeholder="Your Destination"
              />
            </div>
            <div className="item">
              <h5 className="h5">Date Time</h5>
              <input
                type="datetime-local"
                className="form-control"
                placeholder="Select Date"
              ></input>
            </div>
            <div className="item">
              <button className="btn btn-theme" type="button">
                <i className="fas fa-search"></i>Search
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  );
}

export default Destination;
