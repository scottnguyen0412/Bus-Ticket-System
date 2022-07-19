import React, { useState, useEffect } from "react";
import { Route, Redirect, useHistory } from "react-router-dom";
import Dashboard from "../layouts/admin/Dashboard";
import axios from "axios";
import swal from "sweetalert";

function AdminPrivateRoute({ ...rest }) {
  const history = useHistory();
  const [Authenticated, setAuthenticated] = useState(false);
  const [loading, setloading] = useState(true);
  // useEffect() cập nhật các state liên tục khi chạy web
  useEffect(() => {
    axios.get(`api/checkAuthenticated`).then((res) => {
      if (res.status === 200) {
        setAuthenticated(true);
      }
      setloading(false);
    });
    return () => {
      setAuthenticated(false);
    };
  }, []);
  axios.interceptors.response.use(
    undefined,
    function axiosRetryInterceptor(errs) {
      if (errs.response.status === 401) {
        swal("Unauthorized", errs.response.data.message, "warning");
        history.push("/");
      }
      // Hiển thị lỗi với Promise
      return Promise.reject(errs);
    }
  );

  axios.interceptors.response.use(
    function (response) {
      return response;
    },
    function (errs) {
      if (errs.response.status === 403) {
        //access denied
        swal("Forbiden", errs.response.data.message, "error");
        history.push("/page403");
      } else if (errs.response.status === 404) {
        swal("404 Not Found", "Url/Page Not Found", "warning");
        history.push("/page404");
      }
      return Promise.reject(errs);
    }
  );
  if (loading) {
    return (
      <div className="text-center">
        Loading...
        <img
          height="20px"
          src="https://gifimage.net/wp-content/uploads/2018/11/loading-gif-free-download-6.gif"
        />
      </div>
    );
  }

  return (
    <Route
      {...rest}
      render={({ props, location }) =>
        // Check token trong local storage người dùng đã login hay chưa để truy cập Admin Dashboard
        // nếu chưa thì chuyển hướng đến login
        Authenticated ? (
          <Dashboard {...props} />
        ) : (
          <Redirect to={{ pathname: "/login", state: { from: location } }} />
        )
      }
    />
  );
}

export default AdminPrivateRoute;
