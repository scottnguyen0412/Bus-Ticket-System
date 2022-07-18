import React from "react";
import { Route, Redirect, useHistory } from "react-router-dom";
import Dashboard from "../layouts/admin/Dashboard";

function AdminPrivateRoute({ ...rest }) {
  return (
    <Route
      {...rest}
      render={
        ({ props, location }) => (
          // Check token trong local storage người dùng đã login hay chưa để truy cập Admin Dashboard
          // nếu chưa thì chuyển hướng đến login
          // Authenticated ? (
          <Dashboard {...props} />
        )
        // ) : (
        //   <Redirect to={{ pathname: "/login", state: { from: location } }} />
        // )
      }
    />
  );
}

export default AdminPrivateRoute;
