import React from "react";
// import bus from "../../assets/frontend/img/hero-banner.jpg";

function Slider() {
  return (
    <div>
      <div id="slides" className="carousel slide" data-bs-ride="true">
        <div className="carousel-indicators">
          <button
            type="button"
            data-bs-target="#slides"
            data-bs-slide-to="0"
            className="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#slides"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#slides"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div className="carousel-inner">
          <div className="carousel-item active">
            <img
              src="https://cdn.pixabay.com/photo/2018/02/09/22/34/street-3142617_1280.jpg"
              alt="..."
            />
            <div className="carousel-caption">
              <h1 className="display-2">Journey to explore world</h1>
              <h3>Click the below</h3>
              <button
                className="btn btn-outline-light btn-lg m-2"
                type="button"
              >
                More INFO
              </button>
              <button className="btn btn-primary btn-lg">Explore now</button>
            </div>
          </div>
          <div className="carousel-item">
            <img
              src="https://images.pexels.com/photos/6091193/pexels-photo-6091193.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              alt="..."
            />
          </div>
          <div className="carousel-item">
            <img
              src="https://cdn.pixabay.com/photo/2019/10/25/18/25/night-photograph-4577637_1280.jpg"
              alt="..."
            />
          </div>
        </div>
        <button
          className="carousel-control-prev"
          type="button"
          data-bs-target="#slides"
          data-bs-slide="prev"
        >
          <span
            className="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Previous</span>
        </button>
        <button
          className="carousel-control-next"
          type="button"
          data-bs-target="#slides"
          data-bs-slide="next"
        >
          <span
            className="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  );
}

export default Slider;
