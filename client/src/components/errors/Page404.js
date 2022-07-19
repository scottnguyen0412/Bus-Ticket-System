import React from "react";
import { Link } from "react-router-dom";
import page404 from "../../assets/errors/img/notfound.svg";
function Page404() {
  return (
    <div class="card border-0 text-center mx-auto" style={{ width: "60%" }}>
      <img
        class="card-img-top img-fluid"
        src={page404}
        alt="Card image cap"
        loading="lazy"
      />
      <div class="card-body">
        <h5 class="card-title font-weight-bold text-danger m-2">
          PAGE NOT FOUND
        </h5>
        <Link to="/" class="btn btn-outline-primary rounded">
          Go Back Home Page
        </Link>
      </div>
    </div>
  );
}

export default Page404;
