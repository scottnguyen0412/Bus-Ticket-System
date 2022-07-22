import React from "react";
import { Route } from "react-router-dom";
import Home from "../layouts/frontend/Home";
function HomePagePrivateRoute({ ...rest }) {
  return <Route {...rest} render={(props) => <Home {...props} />} />;
}

export default HomePagePrivateRoute;
