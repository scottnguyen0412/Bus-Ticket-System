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
      <section className="login py-5 bg-primary">
        <div className="container">
          <div className="row1 g-0">
            <div className="col-lg-5 text-center">
              <img src={register} className="img-fluid" alt="" />
              <h3>Create New Account ?</h3>
              <p>Join us for safe travels</p>
              <Link
                to="/register"
                className="btn btn-outline-primary rounded"
                id="sign-up-btn"
              >
                Sign up
              </Link>
            </div>
            <div className="col-lg-7 text-center py-5">
              <h1 className="animate__animated animate__rubberBand">
                Welcome to our Journey
              </h1>
              <form onSubmit={loginSubmit}>
                <div className="form-row py-auto pt-5">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-at"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      className="inp px-3"
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
                </div>
                <div className="form-row py-auto">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-lock"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      className="inp px-3"
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
                </div>
                <div className="form-row py-3">
                  <div className="offset-1 col-lg-10">
                    <button type="submit" className="btn1">
                      Login
                    </button>
                  </div>
                </div>
              </form>
              <p>Or Login with</p>
              <span>
                <i className="fab fa-facebook"></i>
              </span>
              <span>
                <i className="fab fa-google-plus"></i>
              </span>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Login;
