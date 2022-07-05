import React, { useState } from "react";
import { Link, useHistory } from "react-router-dom";
import "../../../assets/frontend/css/login-signup.css";
import register from "../../../assets/frontend/img/register.svg";
import swal from "sweetalert";
import axios from "axios";
function Login() {
  const history = useHistory();
  // Get all value when user type anything
  const [loginInput, setLogin] = useState({
    email: "",
    password: "",
    error_list: [],
  });
  const handleInput = (e) => {
    e.persist();
    setLogin({ ...loginInput, [e.target.name]: e.target.value });
  };

  const loginSubmit = (e) => {
    // prevent reload page
    e.preventDefault();

    const data = {
      email: loginInput.email,
      password: loginInput.password,
    };

    axios.get("/sanctum/csrf-cookie").then((response) => {
      axios.post(`api/login`, data).then((res) => {
        if (res.data.status === 200) {
          localStorage.setItem("auth_token", res.data.token);
          localStorage.setItem("auth_name", res.data.username);
          swal("Success", res.data.message, "success");
          // after login success then redirect to home page
          history.push("/");
        } else if (res.data.status === 401) {
          swal("Warning", res.data.message, "warning");
        } else {
          // Check error input when user submit
          setLogin({ ...loginInput, error_list: res.data.validation_errors });
        }
      });
    });
  };
  return (
    <div>
      <div className="container">
        <div className="forms-container">
          <div className="signin-signup">
            <form onSubmit={loginSubmit}>
              <h2 className="title">Sign in</h2>
              <div className="input-field mb-3">
                <i className="fas fa-at" style={{ marginRight: "10px" }}></i>
                {/* input email */}
                <input
                  type="email"
                  placeholder="Email Address"
                  name="email"
                  onChange={handleInput}
                  value={loginInput.email}
                />
                <br />
                <span className="text-danger">
                  {loginInput.error_list.email}
                </span>
              </div>
              <div className="input-field mb-3">
                <i className="fas fa-lock" style={{ marginRight: "10px" }}></i>
                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  onChange={handleInput}
                  value={loginInput.password}
                />
                <br />
                <span className="text-danger">
                  {loginInput.error_list.password}
                </span>
              </div>
              <button type="submit" className="btn solid mt-3">
                Login
              </button>
              <p className="social-text">Or Sign in with social platforms</p>
              <div className="social-media">
                <Link to="#" className="social-icon">
                  <i className="fab fa-facebook-f"></i>
                </Link>
                <Link to="#" className="social-icon">
                  <i className="fab fa-google"></i>
                </Link>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div className="panels-container">
        <div className="panel left-panel">
          <div className="content">
            <h3>Create New Account ?</h3>
            <p>Join us for safe travels</p>
            <Link to="/register" className="btn transparent" id="sign-up-btn">
              Sign up
            </Link>
          </div>
          <img src={register} className="image" alt="Register here" />
        </div>
      </div>
    </div>
  );
}

export default Login;
