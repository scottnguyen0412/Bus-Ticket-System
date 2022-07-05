import React from "react";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect,
} from "react-router-dom";
import Register from "./components/frontend/auth/Register";
import Home from "./components/frontend/Home";
import axios from "axios";
import Login from "./components/frontend/auth/Login";

// Note: must use localhost:8000
axios.defaults.baseURL = "http://localhost:8000/";
// Mỗi lần request được gửi đến thì dều accept
axios.defaults.headers.post["Content-Type"] = "application/json";
axios.defaults.headers.post["Accept"] = "application/json";
axios.defaults.withCredentials = true;

// get bearer token
// axios.interceptors.request.use(function (config) {
//   const token = localStorage.getItem("auth_token");
//   config.headers.Authorization = token ? `Bearer ${token}` : "";
//   return config;
// });
function App() {
  return (
    <div className="App">
      <Router>
        <Switch>
          {/* Nếu user đã đăng nhập mà tự chỉnh trên thanh url ví dụ: /login thì hệ thống sẽ check
                  người dùng đã đăng nhập hay chưa bằng cách check token trong local storage.
                  Nếu đã đăng nhập mà còn chỉnh trên thanh url: /login thì hệ thống sẽ tự chuyển hướng đến Home page
              */}
          {/* <Route path="/register">
            {localStorage.getItem("auth_token") ? (
              <Redirect to="/" />
            ) : (
              <Register />
            )}
          </Route> */}
          <Route path="/register" component={Register} />
          <Route path="/login" component={Login} />

          <Route path="/" component={Home} />
        </Switch>
      </Router>
    </div>
  );
}

export default App;
